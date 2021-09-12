<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->session->keep_flashdata('user');
    }

    public function index()
    {
        $this->load->view('auth/org_signup');
    }

    public function org_login()
    {
        $this->load->view('auth/org_login');
    }

    public function forgot_password()
    {
        $this->load->view('auth/forgot_password');
    }

    public function register_organization()
    {
        $data = array(
            'org_id' => uniqid(),
            'name' => $this->input->post('name'),
            'country' => $this->input->post('country'),
            'person_name' => $this->input->post('person_name'),
            'email' => $this->input->post('email'),
            'password' => sha1($this->input->post('password')),
            'date' => date('Y-m-d')
        );

        $data2 = array(
            'org_id' => $data['org_id'],
            'logo' => './assets/logos/default-logo.jpg'
        );

        $email_exists = $this->db->get_where('organizations', array('email'=> $data['email']))->num_rows();

        if($email_exists == 0)
        {
            /*$cpanel_skin = 'paper_lantern';
            $cpanel_url = 'frontend/'.$cpanel_skin.'/subdomain/doadddomain.html?';
            $subdomain = str_replace(" ","", $data['name']);
            $subdomain_holder = 'domain='.$subdomain;
            $root_domain = 'coderonnie.co.ke';
            $root_domain_holder = 'rootdomain='.$root_domain;
            $directory = $subdomain.$root_domain;
            $directory_holder = 'dir='.$directory;
            $action = 'create';
            $cpanel_credentials = 'https://cpanel.'.$root_domain.'/cpsess5711036868/';

            $create_link = $cpanel_credentials.$cpanel_url.$subdomain_holder.'&'.$root_domain_holder.'&'.$directory_holder.'&'.$action;

            $callurl = curl_init();

            curl_setopt($callurl , CURLOPT_URL, "$create_link");
            curl_setopt($callurl , CURLOPT_HEADER, 0);
            curl_exec($callurl );
            curl_close($callurl );*/

            $this->db->insert('org_logo', $data);

            $query = $this->db->insert('organizations', $data);

            if($query)
            {
               $email = $data['email'];
               $password = $data['password'];

               $login_action = $this->Auth_model->org_login($email, $password);
               $org_id = $this->Auth_model->get_org_id($email, $password);

               if($login_action == true)
               {
                    $session_data = array(
                        'org_id' => $org_id
                    );

                    $this->session->set_userdata('loggedin', $session_data);

                    $this->General_model->send_new_org_email($email,$data['name']);

                    redirect('organization/dashboard');
               }

               else{
                   $message = array('message'=> 'Incorrect username or password', 'class'=> 'alert alert-danger fade in');
                   $this->session->set_flashdata('user', $message);
                   redirect('auth/org_login');
               }
            }
        }

        if($email_exists > 0)
        {
            $message = array('message'=> 'Organization with that email already exists. Please use another email', 'class'=> 'alert alert-danger fade in');
            $this->session->set_flashdata('user', $message);
            redirect('auth/');
        }

    }

    public function forgot_pass()
    {
        $email = $this->input->post('email');

        $email_exists = $this->db->get_where('organizations', array('email'=> $email))->num_rows();

        if($email_exists == 0)
        {
            $message = array('message'=> 'Email address does not exists', 'class'=> 'alert alert-danger fade in');
            $this->session->set_flashdata('user', $message);
            redirect('auth/forgot_password');
        }

        if($email_exists == 1)
        {
            $name = $this->db->get_where('organizations', array('email' => $email))->row('id');
            $org_id = $this->db->get_where('organizations', array('email' => $email))->row('org_id');

            $this->General_model->send_password_recovery_link_email($email, $name, $org_id);

            $message = array('message'=> 'Password recovery link has been sent to '.$email, 'class'=> 'alert alert-success fade in');
            $this->session->set_flashdata('user', $message);
            redirect('auth/forgot_password');
        }
    }

    public function change_password()
    {
        $data = array(
            'id' => $this->uri->segment(3)
        );

        $this->load->view('auth/change_password', $data);

    }

    public function reset_password()
    {
        $pass = sha1($this->input->post('password'));
        $pass2 = sha1($this->input->post('password2'));
        $id = $this->input->post('id');

        if($pass != $pass2)
        {
            $message = array('message'=> 'Password do not match', 'class'=> 'alert alert-danger fade in');
            $this->session->set_flashdata('user', $message);
            redirect('auth/change_password/'.$id);
        }

        if($pass == $pass2)
        {
            $this->db->where('org_id', $id);
            $this->db->set('password', $pass);
            $this->db->update('organizations');

            $message = array('message'=> 'Password reset successful.', 'class'=> 'alert alert-success fade in');
            $this->session->set_flashdata('user', $message);
            redirect('auth/org_login');
        }
    }

    public function login_org()
    {
        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));

        $login_action = $this->Auth_model->org_login($email, $password);
        $org_id = $this->Auth_model->get_org_id($email, $password);

        if($login_action == true)
        {
            $session_data = array(
                'org_id' => $org_id
            );

            $this->session->set_userdata('loggedin', $session_data);

            redirect('organization/dashboard');
        }

        else{
            $message = array('message'=> 'Incorrect username or password', 'class'=> 'alert alert-danger fade in');
            $this->session->set_flashdata('user', $message);
            redirect('auth/org_login');
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();

        redirect('auth/org_login');
    }
}