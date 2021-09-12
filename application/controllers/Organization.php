<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->session->keep_flashdata('user');
        $this->session->keep_flashdata('opp_session');
    }

    public function dashboard()
    {
        $this->check_session();
        $sess_data = $this->session->userdata('loggedin');

            $data = array
            (
                'title' => 'Admin Dashboard',
                'org_id' => $sess_data['org_id'],
                'new_applications' => $this->Organization_model->get_new_applications($sess_data['org_id']),
                'beneficiaries' => $this->Organization_model->get_beneficiaries($sess_data['org_id']),
                'opportunities' => $this->Organization_model->get_opportunities($sess_data['org_id']),
                'new_messages' => $this->Organization_model->get_new_messages($sess_data['org_id']),
            );

        $this->load->view('organization/temps/head_all', $data);
        $this->load->view('organization/temps/header', $data);
        $this->load->view('organization/temps/nav', $data);
        $this->load->view('organization/pages/dashboard', $data);
        $this->load->view('organization/temps/footer');
        $this->load->view('organization/temps/scripts_all');

    }

    public function change_pass()
    {
        $this->check_session();
        $sess_data = $this->session->userdata('loggedin');

        $data = array
        (
            'title' => 'Change Password',
            'org_id' => $sess_data['org_id'],
            'new_applications' => $this->Organization_model->get_new_applications($sess_data['org_id']),
            'beneficiaries' => $this->Organization_model->get_beneficiaries($sess_data['org_id']),
            'opportunities' => $this->Organization_model->get_opportunities($sess_data['org_id']),
            'new_messages' => $this->Organization_model->get_new_messages($sess_data['org_id']),
        );

        $this->load->view('organization/temps/head_all', $data);
        $this->load->view('organization/temps/header', $data);
        $this->load->view('organization/temps/nav', $data);
        $this->load->view('organization/pages/change_password', $data);
        $this->load->view('organization/temps/footer');
        $this->load->view('organization/temps/scripts_all');
    }

    public function change_pass_action()
    {
        $old = sha1($this->input->post('old_pass'));
        $new1 = sha1($this->input->post('new_pass'));
        $new2 = sha1($this->input->post('new_pass2'));
        $id = $this->input->post('id');

        $db_pass = $this->db->get_where('organizations', array('org_id'=> $id))->row('password');

        if($old != $db_pass)
        {
            $message = array('message'=> 'Existing password does not match database password', 'class'=> 'alert alert-danger fade in');
            $this->session->set_flashdata('user', $message);
            redirect('organization/change_pass');
        }

        if($old == $db_pass)
        {
            if($new1 != $new2)
            {
                $message = array('message'=> 'New password does not match confirm password', 'class'=> 'alert alert-danger fade in');
                $this->session->set_flashdata('user', $message);
                redirect('organization/change_pass');
            }

            if($new1 == $new2)
            {
                $this->db->where('org_id', $id);
                $this->db->set('password', $new1);
                $this->db->update('organizations');

                $message = array('message'=> 'Password has been changed successfully.', 'class'=> 'alert alert-success fade in');
                $this->session->set_flashdata('user', $message);
                redirect('organization/change_pass');
            }
        }
    }

    public function account_info()
    {
        $this->check_session();
        $sess_data = $this->session->userdata('loggedin');

        $data = array
        (
            'title' => 'Account Information',
            'org_id' => $sess_data['org_id'],
            'new_applications' => $this->Organization_model->get_new_applications($sess_data['org_id']),
            'beneficiaries' => $this->Organization_model->get_beneficiaries($sess_data['org_id']),
            'opportunities' => $this->Organization_model->get_opportunities($sess_data['org_id']),
            'new_messages' => $this->Organization_model->get_new_messages($sess_data['org_id']),
        );

        $this->load->view('organization/temps/head_all', $data);
        $this->load->view('organization/temps/header', $data);
        $this->load->view('organization/temps/nav', $data);
        $this->load->view('organization/pages/account_info', $data);
        $this->load->view('organization/temps/footer');
        $this->load->view('organization/temps/scripts_all');
    }

    public function edit_account_info()
    {
        $data1 = array(
            'name' => $this->input->post('name'),
            'country' => $this->input->post('country'),
            'email' => $this->input->post('email'),
        );

        $data2 = array(
            'org_id' => $this->input->post('id'),
            'email' => $data1['email'],
            'code' => $this->input->post('code'),
            'telephone' => $this->input->post('phone'),
            'website' => $this->input->post('website'),
            'facebook' => $this->input->post('facebook'),
            'twitter' => $this->input->post('twitter'),
            'instagram' => $this->input->post('instagram'),
            'youtube' =>  $this->input->post('youtube'),
            'about' => $this->input->post('about'),
        );

        $this->db->where('org_id', $this->input->post('id'));
        $query1 = $this->db->update('organizations', $data1);

        if($query1)
        {
            $check_exists = $this->db->get_where('org_profile', array('org_id'=>$this->input->post('id')))->num_rows();

            if($check_exists == 0)
            {
                $this->db->insert('org_profile', $data2);

                $message = array('message'=> 'Account information has been changed successfully.', 'class'=> 'alert alert-success fade in');
                $this->session->set_flashdata('user', $message);
                redirect('organization/account_info');
            }

            if($check_exists == 1)
            {
                $this->db->where('org_id', $this->input->post('id'));
                $this->db->update('org_profile', $data2);

                $message = array('message'=> 'Account information has been changed successfully.', 'class'=> 'alert alert-success fade in');
                $this->session->set_flashdata('user', $message);
                redirect('organization/account_info');
            }

        }
    }

    public function sms_email_temps()
    {
        $this->check_session();
        $sess_data = $this->session->userdata('loggedin');

        $data = array
        (
            'title' => 'SMS / Email Template',
            'org_id' => $sess_data['org_id'],
            'new_applications' => $this->Organization_model->get_new_applications($sess_data['org_id']),
            'beneficiaries' => $this->Organization_model->get_beneficiaries($sess_data['org_id']),
            'opportunities' => $this->Organization_model->get_opportunities($sess_data['org_id']),
            'new_messages' => $this->Organization_model->get_new_messages($sess_data['org_id']),
            'emailAwarded' => $this->Organization_model->get_emailAward_content($sess_data['org_id']),
            'emailDeclined' => $this->Organization_model->get_emailDecline_content($sess_data['org_id']),
            'smsAwarded' => $this->Organization_model->get_smsAward_content($sess_data['org_id']),
            'smsDeclined' => $this->Organization_model->get_smsDecline_content($sess_data['org_id']),

        );

        $this->load->view('organization/temps/head_all', $data);
        $this->load->view('organization/temps/header', $data);
        $this->load->view('organization/temps/nav', $data);
        $this->load->view('organization/pages/sms_email_temp', $data);
        $this->load->view('organization/temps/footer');
        $this->load->view('organization/temps/scripts_all');
    }

    public function create_email_temp()
    {
        $group = $this->input->post('group');
        $id = $this->input->post('id');
        $content = $this->input->post('content');

        $data = array(
            'org_id' => $id,
            'target_group' => $group,
            'content' => $content
        );

        $exists = $this->db->get_where('email_template', array('org_id'=> $data['org_id'], 'target_group'=> $data['target_group']))->num_rows();

        if ($exists == 0)
        {
            $query = $this->db->insert('email_template', $data);

            if($query)
            {
                $message = array('message'=> 'Email template edited successfully.', 'class'=> 'alert alert-success fade in');
                $this->session->set_flashdata('user', $message);
                redirect('organization/sms_email_temps');
            }
        }

        if ($exists == 1)
        {
            $this->db->where('org_id', $data['org_id']);
            $query = $this->db->update('email_template', $data);

            if($query)
            {
                $message = array('message'=> 'Email template edited successfully.', 'class'=> 'alert alert-success fade in');
                $this->session->set_flashdata('user', $message);
                redirect('organization/sms_email_temps');
            }
        }
    }

    public function create_sms_temp()
    {
        $group = $this->input->post('group');
        $id = $this->input->post('id');
        $content = $this->input->post('content');

        $data = array(
            'org_id' => $id,
            'target_group' => $group,
            'content' => $content
        );

        $exists = $this->db->get_where('sms_template', array('org_id'=> $data['org_id'], 'target_group'=> $data['target_group']))->num_rows();

        if ($exists == 0)
        {
            $query = $this->db->insert('sms_template', $data);

            if($query)
            {
                $message = array('message'=> 'SMS template edited successfully.', 'class'=> 'alert alert-success fade in');
                $this->session->set_flashdata('user', $message);
                redirect('organization/sms_email_temps');
            }
        }

        if ($exists == 1)
        {
            $this->db->where('org_id', $data['org_id']);
            $query = $this->db->update('sms_template', $data);

            if($query)
            {
                $message = array('message'=> 'SMS template edited successfully.', 'class'=> 'alert alert-success fade in');
                $this->session->set_flashdata('user', $message);
                redirect('organization/sms_email_temps');
            }
        }
    }

    public function toggle_sms_email_setting()
    {
        $this->check_session();
        $sess_data = $this->session->userdata('loggedin');

        $org_id = $sess_data['org_id'];
        $status = $this->uri->segment(3);

        $exists = $this->db->get_where('sms_email_temp_setting', array('org_id'=> $org_id))->num_rows();

        if($exists == 0)
        {
            $this->db->set('org_id', $org_id);
            $this->db->set('status', $status);

            $this->db->insert('sms_email_temp_setting');
        }

        if($exists == 1)
        {
            $this->db->where('org_id', $org_id);
            $this->db->set('status', $status);

            $this->db->update('sms_email_temp_setting');
        }
    }

    public function get_toggle_sms_email_setting()
    {
        $this->check_session();
        $sess_data = $this->session->userdata('loggedin');

        $org_id = $sess_data['org_id'];

        $this->db->where('org_id', $org_id);
        $query = $this->db->get('sms_email_temp_setting');

       if($query->num_rows() == 1)
       {
           if($query->row()->status == 'on')
           {
               echo 'block';
           }

           if($query->row()->status == 'off')
           {
               echo 'none';
           }
       }

        if($query->num_rows() == 0)
        {
            echo 'out';
        }
    }

    public function users()
    {
        $this->check_session();
        $sess_data = $this->session->userdata('loggedin');

        $data = array
        (
            'title' => 'Users',
            'org_id' => $sess_data['org_id'],
            'new_applications' => $this->Organization_model->get_new_applications($sess_data['org_id']),
            'beneficiaries' => $this->Organization_model->get_beneficiaries($sess_data['org_id']),
            'opportunities' => $this->Organization_model->get_opportunities($sess_data['org_id']),
            'new_messages' => $this->Organization_model->get_new_messages($sess_data['org_id']),
            'users' => $this->Organization_model->get_org_users($sess_data['org_id']),
        );

        $this->load->view('organization/temps/head_all', $data);
        $this->load->view('organization/temps/header', $data);
        $this->load->view('organization/temps/nav', $data);
        $this->load->view('organization/pages/users', $data);
        $this->load->view('organization/temps/footer');
        $this->load->view('organization/temps/scripts_all');
    }

    public function create_user()
    {
        $raw_pass = uniqid();
        $org_name = $this->db->get_where('organizations', array('org_id' => $this->input->post('id')))->row('name');

        $data = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'email' => $this->input->post('email'),
            'telephone' => $this->input->post('telephone'),
            'user_type' => $this->input->post('level'),
            'status' => $this->input->post('status'),
            'org_id' => $this->input->post('id'),
            'password' => sha1($raw_pass),
            'user_id' => uniqid(),
            'date' => date('Y-m-d')
        );

        $email_exists = $this->db->get_where('org_users', array('email' => $data['email']))->row('email');
        $phone_exists = $this->db->get_where('org_users', array('telephone' => $data['telephone']))->row('telephone');

        if(!empty($email_exists) || !empty($phone_exists))
        {
            $message = array('message'=> 'Email address or telephone number exists.', 'class'=> 'alert alert-danger fade in');
            $this->session->set_flashdata('user', $message);
            redirect('organization/users');
        }
        else
        {
            $query = $this->db->insert('org_users', $data);
            if($query)
            {
                $this->General_model->send_new_org_user_email($data['fname'], $data['email'], $org_name, $raw_pass);
                $this->General_model->send_new_org_user_sms($data['fname'], $data['telephone'], $data['email'], $org_name);

                $message = array('message'=> 'User details added successfully.', 'class'=> 'alert alert-success fade in');
                $this->session->set_flashdata('user', $message);
                redirect('organization/users');
            }
        }
    }

    public function edit_users()
    {
        $this->check_session();
        $sess_data = $this->session->userdata('loggedin');

        $data = array
        (
            'title' => 'Users',
            'org_id' => $sess_data['org_id'],
            'new_applications' => $this->Organization_model->get_new_applications($sess_data['org_id']),
            'beneficiaries' => $this->Organization_model->get_beneficiaries($sess_data['org_id']),
            'opportunities' => $this->Organization_model->get_opportunities($sess_data['org_id']),
            'new_messages' => $this->Organization_model->get_new_messages($sess_data['org_id']),
            'users' => $this->Organization_model->edit_users($this->uri->segment(3)),
        );

        $this->load->view('organization/temps/head_all', $data);
        $this->load->view('organization/temps/header', $data);
        $this->load->view('organization/temps/nav', $data);
        $this->load->view('organization/pages/edit_users', $data);
        $this->load->view('organization/temps/footer');
        $this->load->view('organization/temps/scripts_all');
    }

    public function edit_user_details()
    {
        $data = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'email' => $this->input->post('email'),
            'telephone' => $this->input->post('telephone'),
            'user_type' => $this->input->post('level'),
            'status' => $this->input->post('status'),
        );

        $org_id = $this->db->get_where('org_users', array('user_id'=> $this->input->post('user_id')))->row('org_id');
        $org_name = $this->db->get_where('organizations', array('org_id'=> $org_id))->row('name');

        $this->db->where('user_id', $this->input->post('user_id'));
        $query = $this->db->update('org_users', $data);

        if($query)
        {
            $this->General_model->send_user_edit_sms($data['telephone'], $data['fname'], $org_name);
            $this->General_model->send_user_edit_email($data['email'], $data['fname'], $org_name);

            $message = array('message'=> 'User details Edited successfully.', 'class'=> 'alert alert-success fade in');
            $this->session->set_flashdata('user', $message);
            redirect('organization/users');
        }
    }

    public function delete_user_details()
    {
        $id = $this->uri->segment(3);

        $data = array(
            'fname' => $this->db->get_where('org_users', array('user_id'=> $id))->row('fname'),
            'telephone' => $this->db->get_where('org_users', array('user_id'=> $id))->row('telephone'),
            'org_id' => $this->db->get_where('org_users', array('user_id'=> $id))->row('org_id'),
        );

        $org_name = $this->db->get_where('organizations', array('org_id'=> $data['org_id']))->row('name');

        $this->db->where('user_id', $id);
        $query = $this->db->delete('org_users');

        if($query)
        {
            $this->General_model->send_user_delete_sms($data['telephone'], $data['fname'], $org_name);
            $this->General_model->send_user_delete_email($data['email'], $data['fname'], $org_name);

            $message = array('message'=> 'User details Edited successfully.', 'class'=> 'alert alert-success fade in');
            $this->session->set_flashdata('user', $message);
            redirect('organization/users');
        }

    }

    public function activate_user()
    {
        $id = $this->uri->segment(3);

        $data = array(
            'fname' => $this->db->get_where('org_users', array('user_id'=> $id))->row('fname'),
            'telephone' => $this->db->get_where('org_users', array('user_id'=> $id))->row('telephone'),
            'org_id' => $this->db->get_where('org_users', array('user_id'=> $id))->row('org_id'),
        );

        $org_name = $this->db->get_where('organizations', array('org_id'=> $data['org_id']))->row('name');

        $this->db->where('user_id', $id);
        $this->db->set('status', 'active');
        $query = $this->db->update('org_users');

        if($query)
        {
            $this->General_model->send_user_activate_sms($data['telephone'], $data['fname'], $org_name);
            $this->General_model->send_user_activate_email($data['email'], $data['fname'], $org_name);

            $message = array('message'=> 'User account has been activated successfully.', 'class'=> 'alert alert-success fade in');
            $this->session->set_flashdata('user', $message);
            redirect('organization/users');
        }

    }

    public function suspend_user()
    {
        $id = $this->uri->segment(3);

        $data = array(
            'fname' => $this->db->get_where('org_users', array('user_id'=> $id))->row('fname'),
            'telephone' => $this->db->get_where('org_users', array('user_id'=> $id))->row('telephone'),
            'org_id' => $this->db->get_where('org_users', array('user_id'=> $id))->row('org_id'),
        );

        $org_name = $this->db->get_where('organizations', array('org_id'=> $data['org_id']))->row('name');

        $this->db->where('user_id', $id);
        $this->db->set('status', 'suspended');
        $query = $this->db->update('org_users');

        if($query)
        {
            $this->General_model->send_user_suspend_sms($data['telephone'], $data['fname'], $org_name);
            $this->General_model->send_user_suspend_email($data['email'], $data['fname'], $org_name);

            $message = array('message'=> 'User account has been activated successfully.', 'class'=> 'alert alert-success fade in');
            $this->session->set_flashdata('user', $message);
            redirect('organization/users');
        }

    }

    public function look_and_feel()
    {
        $this->check_session();
        $sess_data = $this->session->userdata('loggedin');

        $data = array
        (
            'title' => 'Look and Feel',
            'org_id' => $sess_data['org_id'],
            'new_applications' => $this->Organization_model->get_new_applications($sess_data['org_id']),
            'beneficiaries' => $this->Organization_model->get_beneficiaries($sess_data['org_id']),
            'opportunities' => $this->Organization_model->get_opportunities($sess_data['org_id']),
            'new_messages' => $this->Organization_model->get_new_messages($sess_data['org_id']),
            'users' => $this->Organization_model->edit_users($this->uri->segment(3)),
            'logo' => $this->db->get_where('org_logo', array('org_id'=> $sess_data['org_id']))->row('logo'),

        );

        $this->load->view('organization/temps/head_all', $data);
        $this->load->view('organization/temps/header', $data);
        $this->load->view('organization/temps/nav', $data);
        $this->load->view('organization/pages/look_and_feel', $data);
        $this->load->view('organization/temps/footer');
        $this->load->view('organization/temps/scripts_all');
    }

    public function edit_look_feel()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //logo details

            $logo = $_FILES['logo']['name'];
            $tmp_name_logo = $_FILES['logo']['tmp_name'];
            $size_logo = $_FILES['logo']['size'];
            $ext_logo = (explode('.', $logo));
            $extension_logo = end($ext_logo);

            //banner details

            $banner = $_FILES['banner']['name'];
            $tmp_name_banner = $_FILES['banner']['tmp_name'];
            $size_banner = $_FILES['banner']['size'];
            $ext_banner = (explode('.', $banner));
            $extension_banner = end($ext_banner);

            $allowed = array('png', 'PNG','jpg', 'JPG', 'gif', 'GIF', 'jpeg', 'JPEG');
            $path = './assets/logos/';

            //checking file available or not
            if (!empty($logo) && !empty($banner)) {

                if (in_array($extension_logo, $allowed) && in_array($extension_banner, $allowed)) {
                    $uploaded_logo = $path . $logo;
                    $uploaded_banner = $path . $banner;
                    $org_id = $this->input->post('org_id');

                    $exists = $this->db->get_where('look_setting', array('org_id' => $org_id))->num_rows();

                    if($exists == 0)
                    {
                        //update org logo table

                        $this->db->where('org_id', $org_id);
                        $this->db->set('logo', $uploaded_logo);
                        $this->db->update('org_logo');

                        //send data to look and feel settings table

                        $data = array(
                            'org_id' => $org_id,
                            'logo' => $uploaded_logo,
                            'color_scheme' => '',
                            'head_banner' => $uploaded_banner
                        );
                        $result = $this->db->insert('look_setting', $data);

                        if ($result == true) {

                            move_uploaded_file($tmp_name_logo, $path . $logo);
                            move_uploaded_file($tmp_name_banner, $path . $banner);

                            $message = array('message' => 'Look and Feel settings saved Successfully', 'class' => 'alert alert-success fade in');
                            $this->session->set_flashdata('user', $message);
                            redirect('organization/look_and_feel');

                        } else {

                            $message = array('message' => 'Imaged Failed to upload', 'class' => 'alert alert-danger fade in');
                            $this->session->set_flashdata('user', $message);
                            redirect('organization/look_and_feel');
                        }
                    }

                    if($exists == 1)
                    {
                        //update org logo table

                        $this->db->where('org_id', $org_id);
                        $this->db->set('logo', $uploaded_logo);
                        $this->db->update('org_logo');

                        //send data to look and feel settings table

                        $data = array(
                            'logo' => $uploaded_logo,
                            'color_scheme' => '',
                            'head_banner' => $uploaded_banner
                        );

                        $this->db->where('org_id', $org_id);
                        $result = $this->db->update('look_setting', $data);

                        if ($result == true) {

                            move_uploaded_file($tmp_name_logo, $path . $logo);
                            move_uploaded_file($tmp_name_banner, $path . $banner);

                            $message = array('message' => 'Look and Feel settings updated Successfully', 'class' => 'alert alert-success fade in');
                            $this->session->set_flashdata('user', $message);
                            redirect('organization/look_and_feel');

                        } else {
                            $message = array('message' => 'Imaged Failed to upload', 'class' => 'alert alert-danger fade in');
                            $this->session->set_flashdata('user', $message);
                            redirect('organization/look_and_feel');
                        }
                    }

                } else {

                    $message = array('message' => 'Image type not supported', 'class' => 'alert alert-danger fade in');
                    $this->session->set_flashdata('user', $message);
                    redirect('organization/look_and_feel');

                }
            }
        }
    }

    public function form_template()
    {
        $this->check_session();
        $sess_data = $this->session->userdata('loggedin');

        $data = array
        (
            'title' => 'Form Template',
            'org_id' => $sess_data['org_id'],
            'new_applications' => $this->Organization_model->get_new_applications($sess_data['org_id']),
            'beneficiaries' => $this->Organization_model->get_beneficiaries($sess_data['org_id']),
            'opportunities' => $this->Organization_model->get_opportunities($sess_data['org_id']),
            'new_messages' => $this->Organization_model->get_new_messages($sess_data['org_id']),
            'sections' => $this->db->get_where('form_section_template', array('org_id' => $sess_data['org_id']))->result()
        );

        $this->load->view('organization/temps/head_all', $data);
        $this->load->view('organization/temps/header', $data);
        $this->load->view('organization/temps/nav', $data);
        $this->load->view('organization/pages/form_template', $data);
        $this->load->view('organization/temps/footer');
        $this->load->view('organization/temps/scripts_all');
    }

    /************************************ Creating Form Template start *******************************************/

    public function create_section_temp()
    {
        $data = array(
            'section_id' => uniqid(),
            'org_id' => $this->uri->segment(3),
            'name' => 'New Section'.substr(md5(microtime()),rand(0,26),5)
        );

        $query = $this->db->insert('form_section_template', $data);

        if($query)
        {
            redirect('organization/section_form_template/'.$data['section_id']);
        }
    }

    public function section_form_template()
    {
        $this->check_session();
        $sess_data = $this->session->userdata('loggedin');
        $section_id = $this->uri->segment(3);

        $data = array
        (
            'title' => 'Form Template',
            'org_id' => $sess_data['org_id'],
            'new_applications' => $this->Organization_model->get_new_applications($sess_data['org_id']),
            'beneficiaries' => $this->Organization_model->get_beneficiaries($sess_data['org_id']),
            'opportunities' => $this->Organization_model->get_opportunities($sess_data['org_id']),
            'new_messages' => $this->Organization_model->get_new_messages($sess_data['org_id']),
            'sections' => $this->db->get_where('form_section_template', array('org_id' => $sess_data['org_id']))->result(),
            'section_id' => $section_id,
            'current_section' => $this->db->get_where('form_section_template', array('org_id' => $sess_data['org_id'], 'section_id'=> $section_id))->row('name'),
            'section_changed' => $this->db->get_where('form_section_template', array('org_id' => $sess_data['org_id'], 'section_id'=> $section_id))->row('changed'),
            'section_questions' => $this->db->get_where('form_questions_template', array('section_id' => $section_id, 'org_id' => $sess_data['org_id']))->result()
        );

        $this->load->view('organization/temps/head_all', $data);
        $this->load->view('organization/temps/header', $data);
        $this->load->view('organization/temps/nav', $data);
        $this->load->view('organization/pages/section_form_template', $data);
        $this->load->view('organization/temps/footer');
        $this->load->view('organization/temps/scripts_all');
    }

    public function add_open_ended_quiz()
    {
        $data = array(
            'question_id' => uniqid(),
            'name' => $this->input->post('name'),
            'section_id' => $this->input->post('section_id'),
            'org_id' => $this->input->post('org_id'),
            'response' => 'text'
        );

        $query = $this->db->insert('form_questions_template', $data);

        if($query)
        {
            $this->return_new_records($data['org_id'], $data['section_id']);
        }
    }

    public function add_lengthy_quiz()
    {
        $data = array(
            'question_id' => uniqid(),
            'name' => $this->input->post('name'),
            'section_id' => $this->input->post('section_id'),
            'org_id' => $this->input->post('org_id'),
            'response' => 'textarea',
            'word_count' => $this->input->post('word_count')
        );

        $query = $this->db->insert('form_questions_template', $data);

        if($query)
        {
            $this->return_new_records($data['org_id'], $data['section_id']);
        }
    }

    public function add_file_upload()
    {
        $data = array(
            'question_id' => uniqid(),
            'name' => $this->input->post('name'),
            'section_id' => $this->input->post('section_id'),
            'org_id' => $this->input->post('org_id'),
            'response' => 'file',
        );

        $query = $this->db->insert('form_questions_template', $data);

        if($query)
        {
            $this->return_new_records($data['org_id'], $data['section_id']);
        }
    }


    public function add_multi_choice()
    {
        $fields = $this->input->post('fields');
        $no_fields = count($fields);
        $tot_fields = $no_fields - 1;
        $new_fields = array_slice($fields,0, $tot_fields);

        $data = array(
            'question_id' => uniqid(),
            'name' => $this->input->post('name'),
            'section_id' => $this->input->post('section_id'),
            'org_id' => $this->input->post('org_id'),
            'response' => 'radio',
        );

        foreach ($new_fields as $field)
        {
           $data2 = array(
               'org_id' => $data['org_id'],
               'section_id' => $data['section_id'],
               'question_id' => $data['question_id'],
               'field' => $field
           );

           $this->db->insert('form_questions_template_fields', $data2);
        }

        $query = $this->db->insert('form_questions_template', $data);

        if($query)
        {
            $this->return_new_records($data['org_id'], $data['section_id']);
        }
    }

    public function add_more_multi_choice_response()
    {
        $fields = $this->input->post('new_radio_fields');
        $no_fields = count($fields);
        $tot_fields = $no_fields - 1;
        $new_fields = array_slice($fields,0, $tot_fields);
        $s_q_id = $this->input->post('s_q_id');

        foreach ($new_fields as $field)
        {
            $data = array(
                'org_id' => $this->input->post('org_id'),
                'section_id' => $this->input->post('section_id'),
                'question_id' => $this->input->post('question_id'),
                'field' => $field
            );

            $this->db->insert('form_questions_template_fields', $data);
        }

        $this->return_new_radio_fields($this->input->post('org_id'), $this->input->post('section_id'), $this->input->post('question_id'),$s_q_id);
    }


    public function add_multiple_answers()
    {
        $fields = $this->input->post('answers');
        $no_fields = count($fields);
        $tot_fields = $no_fields - 1;
        $new_fields = array_slice($fields,0, $tot_fields);

        $data = array(
            'question_id' => uniqid(),
            'name' => $this->input->post('name'),
            'section_id' => $this->input->post('section_id'),
            'org_id' => $this->input->post('org_id'),
            'response' => 'checkbox',
        );

        foreach ($new_fields as $field)
        {
            $data2 = array(
                'org_id' => $data['org_id'],
                'section_id' => $data['section_id'],
                'question_id' => $data['question_id'],
                'field' => $field
            );

            $this->db->insert('form_questions_template_fields', $data2);
        }

        $query = $this->db->insert('form_questions_template', $data);

        if($query)
        {
            $this->return_new_records($data['org_id'], $data['section_id']);
        }
    }

    public function add_more_multiple_answers()
    {
        $fields = $this->input->post('checkbox_answers');
        $no_fields = count($fields);
        $tot_fields = $no_fields - 1;
        $new_fields = array_slice($fields,0, $tot_fields);
        $s_q_id = $this->input->post('s_q_id');

        foreach ($new_fields as $field)
        {
            $data = array(
                'org_id' => $this->input->post('org_id'),
                'section_id' => $this->input->post('section_id'),
                'question_id' => $this->input->post('question_id'),
                'field' => $field
            );

            $this->db->insert('form_questions_template_fields', $data);
        }

        $this->return_new_checkbox_fields($this->input->post('org_id'), $this->input->post('section_id'), $this->input->post('question_id'), $s_q_id);
    }


    public function add_numeric_answer()
    {
        $data = array(
            'question_id' => uniqid(),
            'name' => $this->input->post('name'),
            'section_id' => $this->input->post('section_id'),
            'org_id' => $this->input->post('org_id'),
            'response' => 'number'
        );

        $query = $this->db->insert('form_questions_template', $data);

        if($query)
        {
            $this->return_new_records($data['org_id'], $data['section_id']);
        }
    }

    public function add_date_answer()
    {
        $data = array(
            'question_id' => uniqid(),
            'name' => $this->input->post('name'),
            'section_id' => $this->input->post('section_id'),
            'org_id' => $this->input->post('org_id'),
            'response' => 'date'
        );

        $query = $this->db->insert('form_questions_template', $data);

        if($query)
        {
            $this->return_new_records($data['org_id'], $data['section_id']);
        }
    }



    public function update_section_name()
    {
        $org_id = $this->input->post('org_id');
        $section_id = $this->input->post('section_id');
        $name = $this->input->post('name');

        $this->db->where('org_id', $org_id);
        $this->db->where('section_id', $section_id);
        $this->db->set('name', $name);
        $this->db->set('Changed', 1);

        $query = $this->db->update('form_section_template');

        if($query)
        {
            echo $name;
        }
    }

    public function update_form_section_name()
    {
        $org_id = $this->input->post('org_id');
        $section_id = $this->input->post('section_id');
        $name = $this->input->post('name');

        $this->db->where('org_id', $org_id);
        $this->db->where('section_id', $section_id);
        $this->db->set('name', $name);
        $this->db->set('Changed', 1);

        $query = $this->db->update('form_sections');

        if($query)
        {
            echo $name;
        }
    }

    public function get_organization_sections()
    {
        $this->check_session();
        $sess_data = $this->session->userdata('loggedin');
        $org_id = $sess_data['org_id'];

        $this->db->where('org_id', $org_id);
        $sections = $this->db->get('form_section_template')->result();

        foreach ($sections as $section)
        {
            $status = ($this->uri->segment(3) == $section->section_id ? "slide-active" : "slide");
            $url = base_url()."organization/section_form_template/".$section->section_id;

            echo
                '
                <a href="'.$url.'">
                                                    <div class="'.$status.'">
                                                        <h6 style="margin-bottom: 10px;">
                                                            '.$section->name.'
                                                        </h6>
                                                    </div>
                                                </a>
            ';
        }
    }

    public function edit_section_question()
    {
        $org_id = $this->input->post('org_id');
        $section_id = $this->input->post('section_id');
        $q_id = $this->input->post('q_id');
        $name = $this->input->post('name');
        $word_count = $this->input->post('word_count');
        $option = isset($_POST['option']) && $_POST['option']  ? "1" : "0";

        $this->db->where('org_id', $org_id);
        $this->db->where('section_id', $section_id);
        $this->db->where('question_id', $q_id);
        $this->db->set('name', $name);
        $this->db->set('required', $option);
        $this->db->set('word_count', $word_count);
        $query = $this->db->update('form_questions_template');

        if($query)
        {
            echo $name;
        }
    }

    public function delete_section_question()
    {
        $q_id = $this->uri->segment(3);
        $section_id = $this->uri->segment(4);
        $org_id = $this->uri->segment(5);

        $this->db->where('question_id', $q_id);
        $query =  $this->db->delete('form_questions_template');

        if($query)
        {
            $this->return_new_records($org_id, $section_id);
        }
    }

    public function delete_radio_field()
    {
        $id = $this->uri->segment(3);
        $org_id = $this->uri->segment(4);
        $section_id = $this->uri->segment(5);
        $question_id = $this->uri->segment(6);
        $question_q_id = $this->uri->segment(7);

        $this->db->where('id', $id);
        $query =  $this->db->delete('form_questions_template_fields');

        if($query)
        {
            $this->return_new_radio_fields($org_id, $section_id, $question_id,$question_q_id);
        }
    }

    public function delete_checkbox_field()
    {
        $id = $this->uri->segment(3);
        $org_id = $this->uri->segment(4);
        $section_id = $this->uri->segment(5);
        $question_id = $this->uri->segment(6);
        $question_q_id = $this->uri->segment(7);

        $this->db->where('id', $id);
        $query =  $this->db->delete('form_questions_template_fields');

        if($query)
        {
            $this->return_new_checkbox_fields($org_id, $section_id, $question_id,$question_q_id);
        }
    }

    /************************************ Creating Form Template End *******************************************/


    /************************************ Creating Opportunity Form Start *************************************/

    public function org_opportunities()
    {
        $this->check_session();
        $sess_data = $this->session->userdata('loggedin');

        $data = array
        (
            'title' => 'Organization Opportunities',
            'org_id' => $sess_data['org_id'],
            'new_applications' => $this->Organization_model->get_new_applications($sess_data['org_id']),
            'beneficiaries' => $this->Organization_model->get_beneficiaries($sess_data['org_id']),
            'opportunities' => $this->Organization_model->get_opportunities($sess_data['org_id']),
            'new_messages' => $this->Organization_model->get_new_messages($sess_data['org_id']),
        );

        $this->load->view('organization/temps/head_all', $data);
        $this->load->view('organization/temps/header', $data);
        $this->load->view('organization/temps/nav', $data);
        $this->load->view('organization/pages/org_opportunities', $data);
        $this->load->view('organization/temps/footer');
        $this->load->view('organization/temps/scripts_all');
    }

    public function toggle_opportunity_status()
    {
        $today = date('Y-m-d');
        $opportunities = $this->db->get('opportunities')->result();

        foreach ($opportunities as $opportunity)
        {
            if($opportunity->date_online == $today)
            {
                $this->db->set('status', 'online');
                $this->db->update('opportunities');
            }

            if($opportunity->date_offline == $today)
            {
                $this->db->set('status', 'offline');
                $this->db->update('opportunities');
            }
        }
    }


    public function add_opportunity()
    {
        $this->check_session();
        $sess_data = $this->session->userdata('loggedin');
        $section_id = $this->uri->segment(3);
        $opp_session = $this->session->flashdata('opp_session');
        $opp_id = $opp_session['opportunity_id'];

        $data = array
        (
            'title' => 'Create Opportunity',
            'org_id' => $sess_data['org_id'],
            'new_applications' => $this->Organization_model->get_new_applications($sess_data['org_id']),
            'beneficiaries' => $this->Organization_model->get_beneficiaries($sess_data['org_id']),
            'opportunities' => $this->Organization_model->get_opportunities($sess_data['org_id']),
            'new_messages' => $this->Organization_model->get_new_messages($sess_data['org_id']),
            'sections' => $this->db->get_where('form_sections', array('org_id' => $sess_data['org_id'], 'opp_id' => $opp_id))->result(),
            'section_id' => $section_id,
            'opp_id' => $opp_id,
            'current_section' => $this->db->get_where('form_sections', array('org_id' => $sess_data['org_id'], 'section_id'=> $section_id, 'opp_id' => $opp_id))->row('name'),
            'section_changed' => $this->db->get_where('form_sections', array('org_id' => $sess_data['org_id'], 'section_id'=> $section_id, 'opp_id' => $opp_id))->row('changed'),
            'section_questions' => $this->db->get_where('form_questions', array('section_id' => $section_id, 'org_id' => $sess_data['org_id'], 'opp_id' => $opp_id))->result()
        );

        $this->load->view('organization/temps/head_all', $data);
        $this->load->view('organization/temps/header', $data);
        $this->load->view('organization/temps/nav', $data);
        $this->load->view('organization/pages/add_opportunity', $data);
        $this->load->view('organization/temps/footer');
        $this->load->view('organization/temps/scripts_all');
    }

    public function add_opportunity_general_setting()
    {
        $this->check_session();
        $sess_data = $this->session->userdata('loggedin');

        $title = $this->input->post('title');
        $type = $this->input->post('type');
        $amount = $this->input->post('amount');
        $description  = $this->input->post('description');
        $gender = $this->input->post('gender');
        $education = $this->input->post('education');
        $date_online = $this->input->post('date_online');
        $date_offline = $this->input->post('date_offline');
        $advertise = $this->input->post('advertise');
        $org_id = $sess_data['org_id'];
        $opp_id = uniqid();

        $data = array(
            'title' => $title,
            'type' => $type,
            'description' => $description,
            'advertise' => $advertise,
            'opp_id' => $opp_id,
            'gender' => $gender,
            'education' => $education,
            'date_posted' => date('Y-m-d'),
            'date_online' => $date_online,
            'date_offline' => $date_offline,
            'org_id' => $org_id,
            'amount' => $amount
        );

        $query = $this->db->insert('opportunities', $data);

        $opportunity_session = array('opportunity_id' => $opp_id);
        $this->session->set_flashdata('opp_session', $opportunity_session);
        $this->session->keep_flashdata('opp_session');

        if($query)
        {
            $sections = $this->Organization_model->get_org_template_sections($org_id);
            $questions = $this->Organization_model->get_org_template_questions($org_id);
            $form_fields = $this->Organization_model->get_org_template_questions_fields($org_id);

            foreach ($questions as $question)
            {
                $data = array(
                    'question_id' => $question->question_id,
                    'name' => $question->name,
                    'section_id' => $question->section_id,
                    'org_id' => $question->org_id,
                    'opp_id' => $opp_id,
                    'response' => $question->response,
                    'required' => $question->required,
                    'word_count' => $question->word_count
                );

                $this->db->insert('form_questions', $data);
            }

            foreach ($form_fields as $form_field)
            {
                $data = array(
                    'section_id' => $form_field->section_id,
                    'question_id' => $form_field->question_id,
                    'org_id' => $form_field->org_id,
                    'field' => $form_field->field,
                    'opp_id' => $opp_id,
                );

                $this->db->insert('form_questions_fields', $data);
            }

            foreach ($sections as $section)
            {
                $data = array(
                    'section_id' => $section->section_id,
                    'opp_id' => $opp_id,
                    'name' => $section->name,
                    'org_id' => $section->org_id,
                );

                $this->db->insert('form_sections', $data);
            }

            foreach ($sections as $section)
            {
                $form_section = base_url()."organization/form_section/".$section->section_id;
                $status = ($this->uri->segment(3) == $section->section_id ? "slide-active" : "slide");

                echo
                '
                    <a href="'.$form_section.'">
                                                <div class="'.$status.'">
                                                    <h6>
                                                        '.$section->name.'
                                                    </h6>
                                                </div>
                                            </a>
                ';
            }
        }

    }

    public function form_section()
    {
        $this->check_session();
        $sess_data = $this->session->userdata('loggedin');
        $section_id = $this->uri->segment(3);
        $opp_session = $this->session->flashdata('opp_session');
        $opp_id = $opp_session['opportunity_id'];

        $data = array
        (
            'title' => 'Form Template',
            'org_id' => $sess_data['org_id'],
            'new_applications' => $this->Organization_model->get_new_applications($sess_data['org_id']),
            'beneficiaries' => $this->Organization_model->get_beneficiaries($sess_data['org_id']),
            'opportunities' => $this->Organization_model->get_opportunities($sess_data['org_id']),
            'new_messages' => $this->Organization_model->get_new_messages($sess_data['org_id']),
            'sections' => $this->db->get_where('form_sections', array('org_id' => $sess_data['org_id'], 'opp_id' => $opp_id))->result(),
            'section_id' => $section_id,
            'opp_id' => $opp_id,
            'current_section' => $this->db->get_where('form_sections', array('org_id' => $sess_data['org_id'], 'section_id'=> $section_id, 'opp_id' => $opp_id))->row('name'),
            'section_changed' => $this->db->get_where('form_sections', array('org_id' => $sess_data['org_id'], 'section_id'=> $section_id, 'opp_id' => $opp_id))->row('changed'),
            'section_questions' => $this->db->get_where('form_questions', array('section_id' => $section_id, 'org_id' => $sess_data['org_id'], 'opp_id' => $opp_id))->result()
        );

        $this->load->view('organization/temps/head_all', $data);
        $this->load->view('organization/temps/header', $data);
        $this->load->view('organization/temps/nav', $data);
        $this->load->view('organization/pages/form_section', $data);
        $this->load->view('organization/temps/footer');
        $this->load->view('organization/temps/scripts_all');
    }

    public function add_opportunity_open_ended_quiz()
    {
        $data = array(
            'question_id' => uniqid(),
            'name' => $this->input->post('name'),
            'section_id' => $this->input->post('section_id'),
            'org_id' => $this->input->post('org_id'),
            'opp_id' => $this->session->flashdata('opp_session')['opportunity_id'],
            'response' => 'text'
        );

        $query = $this->db->insert('form_questions', $data);

        if($query)
        {
            $this->return_new_opportunity_records($data['org_id'], $data['section_id'], $data['opp_id']);
        }
    }

    public function add_opportunity_lengthy_quiz()
    {
        $data = array(
            'question_id' => uniqid(),
            'name' => $this->input->post('name'),
            'section_id' => $this->input->post('section_id'),
            'org_id' => $this->input->post('org_id'),
            'opp_id' => $this->session->flashdata('opp_session')['opportunity_id'],
            'response' => 'textarea',
            'word_count' => $this->input->post('word_count')
        );

        $query = $this->db->insert('form_questions', $data);

        if($query)
        {
            $this->return_new_opportunity_records($data['org_id'], $data['section_id'], $data['opp_id']);
        }
    }

    public function add_opportunity_file_upload()
    {
        $data = array(
            'question_id' => uniqid(),
            'name' => $this->input->post('name'),
            'section_id' => $this->input->post('section_id'),
            'org_id' => $this->input->post('org_id'),
            'opp_id' => $this->session->flashdata('opp_session')['opportunity_id'],
            'response' => 'file',
        );

        $query = $this->db->insert('form_questions', $data);

        if($query)
        {
            $this->return_new_opportunity_records($data['org_id'], $data['section_id'], $data['opp_id']);
        }
    }


    public function add_opportunity_multi_choice()
    {
        $fields = $this->input->post('fields');
        $no_fields = count($fields);
        $tot_fields = $no_fields - 1;
        $new_fields = array_slice($fields,0, $tot_fields);

        $data = array(
            'question_id' => uniqid(),
            'name' => $this->input->post('name'),
            'section_id' => $this->input->post('section_id'),
            'org_id' => $this->input->post('org_id'),
            'opp_id' => $this->session->flashdata('opp_session')['opportunity_id'],
            'response' => 'radio',
        );

        foreach ($new_fields as $field)
        {
            $data2 = array(
                'org_id' => $data['org_id'],
                'section_id' => $data['section_id'],
                'question_id' => $data['question_id'],
                'field' => $field,
                'opp_id' => $this->session->flashdata('opp_session')['opportunity_id'],
            );

            $this->db->insert('form_questions_fields', $data2);
        }

        $query = $this->db->insert('form_questions', $data);

        if($query)
        {
            $this->return_new_opportunity_records($data['org_id'], $data['section_id'], $data['opp_id']);
        }
    }

    public function add_opportunity_more_multi_choice_response()
    {
        $fields = $this->input->post('new_radio_fields');
        $no_fields = count($fields);
        $tot_fields = $no_fields - 1;
        $new_fields = array_slice($fields,0, $tot_fields);
        $s_q_id = $this->input->post('s_q_id');

        foreach ($new_fields as $field)
        {
            $data = array
            (
                'org_id' => $this->input->post('org_id'),
                'section_id' => $this->input->post('section_id'),
                'question_id' => $this->input->post('question_id'),
                'field' => $field,
                'opp_id' => $this->session->flashdata('opp_session')['opportunity_id'],
            );

            $this->db->insert('form_questions_fields', $data);
        }

        $this->return_new_opportunity_radio_fields($this->input->post('org_id'), $this->input->post('section_id'), $this->input->post('question_id'),$s_q_id, $data['opp_id']);
    }

    public function add_opportunity_multiple_answers()
    {
        $fields = $this->input->post('answers');
        $no_fields = count($fields);
        $tot_fields = $no_fields - 1;
        $new_fields = array_slice($fields,0, $tot_fields);

        $data = array(
            'question_id' => uniqid(),
            'name' => $this->input->post('name'),
            'section_id' => $this->input->post('section_id'),
            'org_id' => $this->input->post('org_id'),
            'opp_id' => $this->session->flashdata('opp_session')['opportunity_id'],
            'response' => 'checkbox',
        );

        foreach ($new_fields as $field)
        {
            $data2 = array(
                'org_id' => $data['org_id'],
                'section_id' => $data['section_id'],
                'question_id' => $data['question_id'],
                'field' => $field,
                'opp_id' => $this->session->flashdata('opp_session')['opportunity_id'],
            );

            $this->db->insert('form_questions_fields', $data2);
        }

        $query = $this->db->insert('form_questions', $data);

        if($query)
        {
            $this->return_new_opportunity_records($data['org_id'], $data['section_id'], $data['opp_id']);
        }
    }

    public function add_opportunity_more_multiple_answers()
    {
        $fields = $this->input->post('checkbox_answers');
        $no_fields = count($fields);
        $tot_fields = $no_fields - 1;
        $new_fields = array_slice($fields,0, $tot_fields);
        $s_q_id = $this->input->post('s_q_id');

        foreach ($new_fields as $field)
        {
            $data = array(
                'org_id' => $this->input->post('org_id'),
                'section_id' => $this->input->post('section_id'),
                'question_id' => $this->input->post('question_id'),
                'field' => $field,
                'opp_id' => $this->session->flashdata('opp_session')['opportunity_id'],
            );

            $this->db->insert('form_questions_fields', $data);
        }

        $this->return_new_opportunity_checkbox_fields($this->input->post('org_id'), $this->input->post('section_id'), $this->input->post('question_id'), $s_q_id, $data['opp_id']);
    }


    public function add_opportunity_numeric_answer()
    {
        $data = array(
            'question_id' => uniqid(),
            'name' => $this->input->post('name'),
            'section_id' => $this->input->post('section_id'),
            'org_id' => $this->input->post('org_id'),
            'opp_id' => $this->session->flashdata('opp_session')['opportunity_id'],
            'response' => 'number'
        );

        $query = $this->db->insert('form_questions', $data);

        if($query)
        {
            $this->return_new_opportunity_records($data['org_id'], $data['section_id'], $data['opp_id']);
        }
    }

    public function add_opportunity_date_answer()
    {
        $data = array(
            'question_id' => uniqid(),
            'name' => $this->input->post('name'),
            'section_id' => $this->input->post('section_id'),
            'org_id' => $this->input->post('org_id'),
            'opp_id' => $this->session->flashdata('opp_session')['opportunity_id'],
            'response' => 'date'
        );

        $query = $this->db->insert('form_questions', $data);

        if($query)
        {
            $this->return_new_opportunity_records($data['org_id'], $data['section_id'], $data['opp_id']);
        }
    }


    public function update_opportunity_section_name()
    {
        $org_id = $this->input->post('org_id');
        $section_id = $this->input->post('section_id');
        $name = $this->input->post('name');
        $opp_id = $this->session->flashdata('opp_session')['opportunity_id'];

        $this->db->where('org_id', $org_id);
        $this->db->where('section_id', $section_id);
        $this->db->where('opp_id', $opp_id);
        $this->db->set('name', $name);
        $this->db->set('Changed', 1);

        $query = $this->db->update('form_sections');

        if($query)
        {
            echo $name;
        }
    }

    public function get_edited_opportunity_sections()
    {
        $this->check_session();
        $sess_data = $this->session->userdata('loggedin');
        $opp_session = $this->session->flashdata('opp_session');
        $opp_id = $opp_session['opportunity_id'];
        $org_id = $sess_data['org_id'];

        $this->db->where('org_id', $org_id);
        $this->db->where('opp_id', $opp_id);
        $sections = $this->db->get('form_sections')->result();

        foreach ($sections as $section)
        {
            $status = ($this->uri->segment(3) == $section->section_id ? "slide-active" : "slide");
            $url = base_url()."organization/form_section/".$section->section_id;

            echo
            '
                <a href="'.$url.'">
                                                    <div class="'.$status.'">
                                                        <h6 style="margin-bottom: 10px;">
                                                            '.$section->name.'
                                                        </h6>
                                                    </div>
                                                </a>
            ';
        }
    }

    public function edit_opportunity_section_question()
    {
        $org_id = $this->input->post('org_id');
        $section_id = $this->input->post('section_id');
        $q_id = $this->input->post('q_id');
        $name = $this->input->post('name');
        $word_count = $this->input->post('word_count');
        $option = isset($_POST['option']) && $_POST['option']  ? "1" : "0";
        $opp_id = $this->session->flashdata('opp_session')['opportunity_id'];

        $this->db->where('org_id', $org_id);
        $this->db->where('section_id', $section_id);
        $this->db->where('question_id', $q_id);
        $this->db->set('name', $name);
        $this->db->set('required', $option);
        $this->db->set('word_count', $word_count);
        $this->db->set('opp_id', $opp_id);
        $query = $this->db->update('form_questions');

        if($query)
        {
            echo $name;
        }
    }

    public function delete_opportunity_section_question()
    {
        $q_id = $this->uri->segment(3);
        $section_id = $this->uri->segment(4);
        $org_id = $this->uri->segment(5);
        $opp_id = $this->uri->segment(6);

        $this->db->where('question_id', $q_id);
        $this->db->where('section_id', $section_id);
        $this->db->where('org_id', $org_id);
        $this->db->where('opp_id', $opp_id);
        $query =  $this->db->delete('form_questions');

        if($query)
        {
            $this->return_new_opportunity_records($org_id, $section_id,$opp_id);
        }
    }

    public function delete_opportunity_radio_field()
    {
        $id = $this->uri->segment(3);
        $org_id = $this->uri->segment(4);
        $section_id = $this->uri->segment(5);
        $question_id = $this->uri->segment(6);
        $section_q_id = $this->uri->segment(7);
        $opp_id = $this->uri->segment(8);

        $this->db->where('id', $id);
        $this->db->where('section_id', $section_id);
        $this->db->where('question_id', $question_id);
        $this->db->where('org_id', $org_id);
        $this->db->where('opp_id', $opp_id);
        $query =  $this->db->delete('form_questions_fields');

        if($query)
        {
            $this->return_new_opportunity_radio_fields($org_id,$section_id,$question_id,$section_q_id,$opp_id);
        }
    }

    public function delete_opportunity_checkbox_field()
    {
        $id = $this->uri->segment(3);
        $org_id = $this->uri->segment(4);
        $section_id = $this->uri->segment(5);
        $question_id = $this->uri->segment(6);
        $section_q_id = $this->uri->segment(7);
        $opp_id = $this->uri->segment(8);

        $this->db->where('id', $id);
        $this->db->where('section_id', $section_id);
        $this->db->where('question_id', $question_id);
        $this->db->where('org_id', $org_id);
        $this->db->where('opp_id', $opp_id);
        $query =  $this->db->delete('form_questions_fields');
        if($query)
        {
            $this->return_new_opportunity_checkbox_fields($org_id,$section_id,$question_id,$section_q_id,$opp_id);
        }
    }



    /************************************ Creating Opportunity Form End *************************************/



    public function return_new_records($org, $section_id)
    {
        $questions = $this->db->get_where('form_questions_template', array('org_id'=> $org, 'section_id'=> $section_id))->result();

        foreach ($questions as $question)
        {
            $jquery_src = base_url()."assets/bower_components/jquery/dist/jquery.min.js";
            $status = $question->required == 1 ? "checked" : "";
            $url = base_url()."organization/delete_section_question/".$question->question_id."/".$question->section_id."/".$question->org_id;

            echo
                '
                   
                    <div class="panel panel-default">
                                                            <a role="button" data-toggle="collapse" href="#collapseOne'.$question->id.'"
                                                               aria-expanded="true" aria-controls="collapseOne"
                                                               class="trigger collapsed mdl-color-text--grey-700">
                                                                <div class="panel-heading" role="tab" id="headingOne'.$question->id.'">
                                                                    <h4 class="panel-title" id="p_title">
                                                                        <div class="row">
                                                                            <div class="col-xs-11" id="section-question-name'.$question->id.'">
                                                                                '.$question->name.'
                                                                            </div>
                                                                            <div class="col-xs-1">
                                                                                <i class="fa fa-chevron-down">
                                                                                </i>
                                                                            </div>
                                                                        </div>
                                                                    </h4>
                                                                </div>
                                                            </a>
                                                            <div id="collapseOne'.$question->id.'" class="panel-collapse collapse"
                                                                 role="tabpanel" aria-labelledby="headingOne'.$question->id.'">
                                                                <div class="panel-body" style="border-top: solid 1px;">
                                                                    <form id="edit-section-question-form'.$question->id.'" method="post">
                                                                    ';


                                                                       if($question->response == "textarea"){
             echo   '
                <div class="col-sm-7">
                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        Question for student
                                                                                    </label>
                                                                                    <input type="text"  name="name" class="form-control" value="'.$question->name.'">
                                                                                    <input type="hidden" name="org_id" value="'.$question->org_id.'">
                                                                                    <input type="hidden" name="section_id" value="'.$question->section_id.'">
                                                                                    <input type="hidden" name="q_id" value="'.$question->question_id.'">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-5">
                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        Maximum word count
                                                                                    </label>
                                                                                    <input type="number" class="form-control" name="word_count" value="'.$question->word_count.'" placeholder="enter number">
                                                                                </div>
                                                                            </div>
                ';
                                                                        }

                                                                         elseif($question->response == "radio"){
                                                                           echo  '
                                                                            <div class="col-sm-8">
                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        Question for student
                                                                                    </label>
                                                                                    <input type="text"  name="name" class="form-control" value="'.$question->name.'">
                                                                                    <input type="hidden" name="org_id" value="'.$question->org_id.'">
                                                                                    <input type="hidden" name="section_id" value="'.$question->section_id.'">
                                                                                    <input type="hidden" name="q_id" value="'.$question->question_id.'">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">
                                                                                    <label class = "mdl-checkbox mdl-js-checkbox radio-inline" for = "checkbox'.$question->id.'" style="margin-top: 30px;">
                                                                                        <input type = "checkbox" id = "checkbox'.$question->id.'"
                                                                                               class = "mdl-checkbox__input" name="option" value="1" '.$status.'>
                                                                                        <span class = "mdl-checkbox__label">Make mandatory</span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            ';
                                                                         }


                                                                        elseif($question->response == "checkbox"){
                                                                           echo  '
                                                                             <div class="col-sm-8">
                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        Question for student
                                                                                    </label>
                                                                                    <input type="text"  name="name" class="form-control" value="'.$question->name.'">
                                                                                    <input type="hidden" name="org_id" value="'.$question->org_id.'">
                                                                                    <input type="hidden" name="section_id" value="'.$question->section_id.'">
                                                                                    <input type="hidden" name="q_id" value="'.$question->question_id.'">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">
                                                                                    <label class = "mdl-checkbox mdl-js-checkbox radio-inline" for = "checkbox'.$question->id.'" style="margin-top: 30px;">
                                                                                        <input type = "checkbox" id = "checkbox'.$question->id.'"
                                                                                               class = "mdl-checkbox__input" name="option" value="1" '.$status.'>
                                                                                        <span class = "mdl-checkbox__label">Make mandatory</span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                             ';
                                                                        }

                                                                        else {
                                                                         echo   '
                                                                            <div class="col-sm-8">
                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        Question for student
                                                                                    </label>
                                                                                    <input type="text"  name="name" class="form-control" value="'.$question->name.'">
                                                                                    <input type="hidden" name="org_id" value="'.$question->org_id.'">
                                                                                    <input type="hidden" name="section_id" value="'.$question->section_id.'">
                                                                                    <input type="hidden" name="q_id" value="'.$question->question_id.'">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">
                                                                                    <label class = "mdl-checkbox mdl-js-checkbox radio-inline" for = "checkbox'.$question->id.'" style="margin-top: 30px;">
                                                                                        <input type = "checkbox" id = "checkbox'.$question->id.'"
                                                                                               class = "mdl-checkbox__input" name="option" value="1" '.$status.'>
                                                                                        <span class = "mdl-checkbox__label">Make mandatory</span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            ';
                                                                        }

                                                                      echo  '
                                                                        <div class="col-md-12">
                                                                            <ul class="list-inline">
                                                                                <li>
                                                                                    <button type="submit" class="btn btn-success btn-sm">
                                                                                        Edit Question
                                                                                    </button>
                                                                                </li>
                                                                                <li>
                                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="delete_section_question'.$question->id.'()">
                                                                                        Delete question
                                                                                    </button>
                                                                                    <script type="text/javascript">
                                                                                        function delete_section_question'.$question->id.'() {
                                                                                            $.ajax({
                                                                                                type: "POST",
                                                                                                url: "'.$url.'",
                                                                                                success: function (results) {
                                                                                                    $(".section_questions").html(results);
                                                                                                }
                                                                                            });
                                                                                        }
                                                                                    </script>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <br>
                                                                            <p class="text-success" id="change_success'.$question->id.'" style="display: none;">
                                                                                Changes save successfully
                                                                            </p>
                                                                        </div>
                                                                    </form>
                                                                        ';


                                                                        if($question->response == 'radio'){
                                                                            $add_multi_choice_response_action = base_url()."organization/add_more_multi_choice_response";

                                                                       echo     '
                                                                            <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>
                                                                                    Responses
                                                                                </label>
                                                                                ';

                                                                                $responses = $this->db->get_where("form_questions_template_fields", array("section_id" => $question->section_id, "question_id"=> $question->question_id))->result();

                                                                            echo    '<ul class="list-unstyled response_values'.$question->id.'">';
                                                                                    foreach ($responses as $response) {

                                                                                        $delete_action = base_url()."organization/delete_radio_field /".$response->id."/".$response->org_id."/".$response->section_id."/".$question->id;

                                                                                 echo   '
                                                                                    <li>
                                                                                            <div class="col-xs-6">
                                                                                                '.$response->field.'
                                                                                            </div>
                                                                                            <div class="col-xs-6">
                                                                                                <a href="javascript:;" class="delete_radio_field_value" onclick="delete_radio_response'.$response->id.'()">
                                                                                                    <i class="glyphicon glyphicon-remove"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                            <script type="text/javascript">
                                                                                                function delete_radio_response'.$response->id.'() {
                                                                                                    $.ajax({
                                                                                                        url : "'.$delete_action.'",
                                                                                                        success: function (result) {
                                                                                                            $(".response_values'.$question->id.'").html(result);
                                                                                                        }
                                                                                                    });
                                                                                                }
                                                                                            </script>
                                                                                        </li>
                                                                                    ';
                                                                                    }

                                                                              echo  ' </ul>
                                                                            </div>
                                                                        </div>

                                                                        <br>
                                                                        <form method="post" id="add_more_multi_choice_responses'.$question->id.'">
                                                                            <input type="hidden" name="org_id" value="'.$question->org_id.'">
                                                                            <input type="hidden" name="section_id" value="'.$question->section_id.'">
                                                                            <input type="hidden" name="question_id" value="'.$question->question_id.'">
                                                                            <input type="hidden" name="s_q_id" value="'.$question->id.'">
                                                                            <div class="col-md-12">
                                                                                <div class="input-group control-group after-add-fields'.$question->id.'">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="input-group-btn">
                                                                                                <button class="btn btn-primary btn-xs add-radio-field'.$question->id.'" type="button">
                                                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                                                    &nbsp;
                                                                                                    Add more responses
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div id="new_question_responses'.$question->id.'" style="display: none;">
                                                                                    <div class="copy-radio-fields'.$question->id.' hide ">
                                                                                        <div class="control-group radio-filed-display input-group" style="margin-top:10px;">
                                                                                            <input type="text" name="new_radio_fields[]" class="form-control" placeholder="Enter Response">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <br>
                                                                                <button class="btn btn-success btn-sm btn-response'.$question->id.'"
                                                                                        type="submit" style="display: none;">
                                                                                    Submit
                                                                                </button>
                                                                            </div>
                                                                        </form>

                                                                        <script type="text/javascript" src="'.$jquery_src.'"></script>

                                                                        <script type="text/javascript">

                                                                            $(document).ready(function() {

                                                                                //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
                                                                                $(".add-radio-field'.$question->id.'").click(function(){
                                                                                    var html = $(".copy-radio-fields'.$question->id.'").html();
                                                                                    $(".after-add-fields'.$question->id.'").after(html);
                                                                                    $("#new_question_responses'.$question->id.'").show();
                                                                                    $(".btn-response'.$question->id.'").show();
                                                                                });
                                                                            });

                                                                        </script>
                                                                        <script type="text/javascript">
                                                                            $(document).ready(function () {
                                                                                $("#add_more_multi_choice_responses'.$question->id.'").submit(function (e) {
                                                                                    e.preventDefault();
                                                                                    $.ajax({
                                                                                        type: "POST",
                                                                                        url : "'.$add_multi_choice_response_action.'",
                                                                                        data : $("#add_more_multi_choice_responses'.$question->id.'").serializeArray(),
                                                                                        success: function (result) {
                                                                                            $(".response_values'.$question->id.'").html(result);
                                                                                            $("#add_more_multi_choice_responses'.$question->id.'")[0].reset();
                                                                                            $("#new_question_responses'.$question->id.'").hide();
                                                                                        }
                                                                                    });
                                                                                });
                                                                            });
                                                                        </script>
                                                                            ';
                                                                        }


                                                                    if($question->response == 'checkbox'){

                                                                        $add_multiple_answers_action = base_url()."organization/add_more_multiple_answers";

                                                                         echo   '
                                                                            <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>
                                                                                    Answers
                                                                                </label>
                                                                                ';

                                                                                $answers = $this->db->get_where("form_questions_template_fields", array("section_id" => $question->section_id, "question_id"=> $question->question_id))->result();


                                                                              echo  '<ul class="list-unstyled checkbox_answers'.$question->id.'">';
                                                                                    foreach ($answers as $answer)
                                                                                    {
                                                                                        $delete_checkbox_action = base_url()."organization/delete_checkbox_field/".$answer->id."/".$answer->org_id."/".$answer->section_id."/".$answer->question_id."/".$question->id;

                                                                                    echo    '
                                                                                        <li>
                                                                                            <div class="col-xs-6">
                                                                                                '.$answer->field.'
                                                                                            </div>
                                                                                            <div class="col-xs-6">
                                                                                                <a href="javascript:;" class="delete_radio_field_value" onclick="delete_checkbox_answer'.$answer->id.'()">
                                                                                                    <i class="glyphicon glyphicon-remove"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                            <script type="text/javascript">
                                                                                                function delete_checkbox_answer'.$answer->id.'() {
                                                                                                    $.ajax({
                                                                                                        url : "'.$delete_checkbox_action.'",
                                                                                                        success: function (result) {
                                                                                                            $(".checkbox_answers'.$question->id.'").html(result);
                                                                                                        }
                                                                                                    });
                                                                                                }
                                                                                            </script>
                                                                                        </li>
                                                                                        ';
                                                                                    }

                                                                             echo  '</ul>
                                                                            </div>
                                                                        </div>

                                                                        <br>
                                                                        <form method="post" id="add_more_multiple_answers'.$question->id.'">
                                                                            <input type="hidden" name="org_id" value="'.$question->org_id.'">
                                                                            <input type="hidden" name="section_id" value="'.$question->section_id.'">
                                                                            <input type="hidden" name="question_id" value="'.$question->question_id.'">
                                                                            <input type="hidden" name="s_q_id" value="'.$question->id.'">
                                                                            <div class="col-md-12">
                                                                                <div class="input-group control-group after-add-answers'.$question->id.'">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="input-group-btn">
                                                                                                <button class="btn btn-primary btn-xs add-checkbox'.$question->id.'" type="button">
                                                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                                                    &nbsp;
                                                                                                    Add more answers
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div id="new_question_answers'.$question->id.'" style="display: none;">
                                                                                    <div class="copy-checkboxes'.$question->id.' hide ">
                                                                                        <div class="control-group radio-filed-display input-group" style="margin-top:10px;">
                                                                                            <input type="text" name="checkbox_answers[]" class="form-control" placeholder="Enter Response">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <br>
                                                                                <button class="btn btn-success btn-sm btn-answer'.$question->id.'"
                                                                                        type="submit" style="display: none;">
                                                                                    Submit
                                                                                </button>
                                                                            </div>
                                                                        </form>

                                                                        <script type="text/javascript" src="'.$jquery_src.'"></script>

                                                                        <script type="text/javascript">
                                                                            $(document).ready(function() {

                                                                                //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
                                                                                $(".add-checkbox'.$question->id.'").click(function(){
                                                                                    var html = $(".copy-checkboxes'.$question->id.'").html();
                                                                                    $(".after-add-answers'.$question->id.'").after(html);
                                                                                    $("#new_question_answers'.$question->id.'").show();
                                                                                    $(".btn-answer'.$question->id.'").show();
                                                                                });
                                                                            });

                                                                        </script>
                                                                        <script type="text/javascript">
                                                                            $(document).ready(function () {
                                                                                $("#add_more_multiple_answers'.$question->id.'").submit(function (e) {
                                                                                    e.preventDefault();
                                                                                    $.ajax({
                                                                                        type: "POST",
                                                                                        url : "'.$add_multiple_answers_action.'",
                                                                                        data : $("#add_more_multiple_answers'.$question->id.'").serializeArray(),
                                                                                        success: function (result) {
                                                                                            $(".checkbox_answers'.$question->id.'").html(result);
                                                                                            $("#add_more_multiple_answers'.$question->id.'")[0].reset();
                                                                                            $("#new_question_answers'.$question->id.'").hide();
                                                                                        }
                                                                                    });
                                                                                });
                                                                            });
                                                                        </script>
                                                                            ';
                                                                    }

                                                                    $edit_section_question_form_action = base_url()."organization/edit_section_question";
                                                                    $delete_section_question_action = base_url()."organization/delete_section_question/".$question->section_id."/".$question->org_id;

                                                               echo     '
                                                                    <script type="text/javascript" src="'.$jquery_src.'"></script>
                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $("#edit-section-question-form'.$question->id.'").submit(function (e) {
                                                                                e.preventDefault();
                                                                                $.ajax({
                                                                                    type: "POST",
                                                                                    url: "'.$edit_section_question_form_action.'",
                                                                                    data : $("#edit-section-question-form'.$question->id.'").serializeArray(),
                                                                                    success: function (results) {
                                                                                        $("#section-question-name'.$question->id.'").html(results);
                                                                                        $("#change_success'.$question->id.'").show();
                                                                                        $("#change_success'.$question->id.'").fadeOut(6000);

                                                                                    }
                                                                                });
                                                                            });
                                                                        });
                                                                        
                                                                    </script>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                                    
                                                                    ';
                                                      

        }
    }


    public function return_new_opportunity_records($org, $section_id, $opp_id)
    {
        $questions = $this->db->get_where('form_questions', array('org_id'=> $org, 'section_id'=> $section_id, 'opp_id' => $opp_id))->result();

        foreach ($questions as $question)
        {
            $jquery_src = base_url()."assets/bower_components/jquery/dist/jquery.min.js";
            $status = $question->required == 1 ? "checked" : "";
            $url = base_url()."organization/delete_opportunity_section_question/".$question->question_id."/".$question->section_id."/".$question->org_id.'/'.$question->opp_id;

            echo
                '
                   
                    <div class="panel panel-default">
                                                            <a role="button" data-toggle="collapse" href="#collapseOne'.$question->id.'"
                                                               aria-expanded="true" aria-controls="collapseOne"
                                                               class="trigger collapsed mdl-color-text--grey-700">
                                                                <div class="panel-heading" role="tab" id="headingOne'.$question->id.'">
                                                                    <h4 class="panel-title" id="p_title">
                                                                        <div class="row">
                                                                            <div class="col-xs-11" id="opportunity-section-question-name'.$question->id.'">
                                                                                '.$question->name.'
                                                                            </div>
                                                                            <div class="col-xs-1">
                                                                                <i class="fa fa-chevron-down">
                                                                                </i>
                                                                            </div>
                                                                        </div>
                                                                    </h4>
                                                                </div>
                                                            </a>
                                                            <div id="collapseOne'.$question->id.'" class="panel-collapse collapse"
                                                                 role="tabpanel" aria-labelledby="headingOne'.$question->id.'">
                                                                <div class="panel-body" style="border-top: solid 1px;">
                                                                    <form id="edit-opportunity-section-question-form'.$question->id.'" method="post">
                                                                    ';


            if($question->response == "textarea"){
                echo   '
                <div class="col-sm-7">
                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        Question for student
                                                                                    </label>
                                                                                    <input type="text"  name="name" class="form-control" value="'.$question->name.'">
                                                                                    <input type="hidden" name="org_id" value="'.$question->org_id.'">
                                                                                    <input type="hidden" name="section_id" value="'.$question->section_id.'">
                                                                                    <input type="hidden" name="q_id" value="'.$question->question_id.'">
                                                                                     <input type="hidden" name="opp_id" value="'.$question->opp_id.'">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-5">
                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        Maximum word count
                                                                                    </label>
                                                                                    <input type="number" class="form-control" name="word_count" value="'.$question->word_count.'" placeholder="enter number">
                                                                                </div>
                                                                            </div>
                ';
            }

            elseif($question->response == "radio"){
                echo  '
                                                                            <div class="col-sm-8">
                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        Question for student
                                                                                    </label>
                                                                                    <input type="text"  name="name" class="form-control" value="'.$question->name.'">
                                                                                    <input type="hidden" name="org_id" value="'.$question->org_id.'">
                                                                                    <input type="hidden" name="section_id" value="'.$question->section_id.'">
                                                                                    <input type="hidden" name="q_id" value="'.$question->question_id.'">
                                                                                     <input type="hidden" name="opp_id" value="'.$question->opp_id.'">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">
                                                                                    <label class = "mdl-checkbox mdl-js-checkbox radio-inline" for = "checkbox'.$question->id.'" style="margin-top: 30px;">
                                                                                        <input type = "checkbox" id = "checkbox'.$question->id.'"
                                                                                               class = "mdl-checkbox__input" name="option" value="1" '.$status.'>
                                                                                        <span class = "mdl-checkbox__label">Make mandatory</span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            ';
            }


            elseif($question->response == "checkbox"){
                echo  '
                                                                             <div class="col-sm-8">
                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        Question for student
                                                                                    </label>
                                                                                    <input type="text"  name="name" class="form-control" value="'.$question->name.'">
                                                                                    <input type="hidden" name="org_id" value="'.$question->org_id.'">
                                                                                    <input type="hidden" name="section_id" value="'.$question->section_id.'">
                                                                                    <input type="hidden" name="q_id" value="'.$question->question_id.'">
                                                                                     <input type="hidden" name="opp_id" value="'.$question->opp_id.'">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">
                                                                                    <label class = "mdl-checkbox mdl-js-checkbox radio-inline" for = "checkbox'.$question->id.'" style="margin-top: 30px;">
                                                                                        <input type = "checkbox" id = "checkbox'.$question->id.'"
                                                                                               class = "mdl-checkbox__input" name="option" value="1" '.$status.'>
                                                                                        <span class = "mdl-checkbox__label">Make mandatory</span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                             ';
            }

            else {
                echo   '
                                                                            <div class="col-sm-8">
                                                                                <div class="form-group">
                                                                                    <label>
                                                                                        Question for student
                                                                                    </label>
                                                                                    <input type="text"  name="name" class="form-control" value="'.$question->name.'">
                                                                                    <input type="hidden" name="org_id" value="'.$question->org_id.'">
                                                                                    <input type="hidden" name="section_id" value="'.$question->section_id.'">
                                                                                    <input type="hidden" name="q_id" value="'.$question->question_id.'">
                                                                                     <input type="hidden" name="opp_id" value="'.$question->opp_id.'">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">
                                                                                    <label class = "mdl-checkbox mdl-js-checkbox radio-inline" for = "checkbox'.$question->id.'" style="margin-top: 30px;">
                                                                                        <input type = "checkbox" id = "checkbox'.$question->id.'"
                                                                                               class = "mdl-checkbox__input" name="option" value="1" '.$status.'>
                                                                                        <span class = "mdl-checkbox__label">Make mandatory</span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            ';
            }

            echo  '
                                                                        <div class="col-md-12">
                                                                            <ul class="list-inline">
                                                                                <li>
                                                                                    <button type="submit" class="btn btn-success btn-sm">
                                                                                        Edit Question
                                                                                    </button>
                                                                                </li>
                                                                                <li>
                                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="delete_opportunity_section_question'.$question->id.'()">
                                                                                        Delete question
                                                                                    </button>
                                                                                    <script type="text/javascript">
                                                                                        function delete_opportunity_section_question'.$question->id.'() {
                                                                                            $.ajax({
                                                                                                type: "POST",
                                                                                                url: "'.$url.'",
                                                                                                success: function (results) {
                                                                                                    $(".opportunity_section_questions").html(results);
                                                                                                }
                                                                                            });
                                                                                        }
                                                                                    </script>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <br>
                                                                            <p class="text-success" id="change_opportunity_success'.$question->id.'" style="display: none;">
                                                                                Changes saved successfully
                                                                            </p>
                                                                        </div>
                                                                    </form>
                                                                        ';


            if($question->response == 'radio'){
                $add_opportunity_multi_choice_response_action = base_url()."organization/add_opportunity_more_multi_choice_response";

                echo     '
                                                                            <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>
                                                                                    Responses
                                                                                </label>
                                                                                ';

                $responses = $this->db->get_where("form_questions_fields", array("section_id" => $question->section_id, "question_id"=> $question->question_id, 'opp_id' => $question->opp_id))->result();

                echo    '<ul class="list-unstyled opportunity_response_values'.$question->id.'">';
                foreach ($responses as $response) {

                    $delete_action = base_url()."organization/delete_opportunity_radio_field /".$response->id."/".$response->org_id."/".$response->section_id."/".$question->id.'/'.$response->opp_id;

                    echo   '
                                                                                    <li>
                                                                                            <div class="col-xs-6">
                                                                                                '.$response->field.'
                                                                                            </div>
                                                                                            <div class="col-xs-6">
                                                                                                <a href="javascript:;" class="delete_opportunity_radio_field_value" onclick="delete_opportunity_radio_response'.$response->id.'()">
                                                                                                    <i class="glyphicon glyphicon-remove"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                            <script type="text/javascript">
                                                                                                function delete_opportunity_radio_response'.$response->id.'() {
                                                                                                    $.ajax({
                                                                                                        url : "'.$delete_action.'",
                                                                                                        success: function (result) {
                                                                                                            $(".opportunity_response_values'.$question->id.'").html(result);
                                                                                                        }
                                                                                                    });
                                                                                                }
                                                                                            </script>
                                                                                        </li>
                                                                                    ';
                }

                echo  ' </ul>
                                                                            </div>
                                                                        </div>

                                                                        <br>
                                                                        <form method="post" id="add_opportunity_more_multi_choice_responses'.$question->id.'">
                                                                            <input type="hidden" name="org_id" value="'.$question->org_id.'">
                                                                            <input type="hidden" name="section_id" value="'.$question->section_id.'">
                                                                            <input type="hidden" name="question_id" value="'.$question->question_id.'">
                                                                            <input type="hidden" name="s_q_id" value="'.$question->id.'">
                                                                             <input type="hidden" name="opp_id" value="'.$question->opp_id.'">
                                                                            <div class="col-md-12">
                                                                                <div class="input-group control-group after-add-opportunity-fields'.$question->id.'">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="input-group-btn">
                                                                                                <button class="btn btn-primary btn-xs add-opportunity-radio-field'.$question->id.'" type="button">
                                                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                                                    &nbsp;
                                                                                                    Add more responses
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div id="new_opportunity_question_responses'.$question->id.'" style="display: none;">
                                                                                    <div class="copy-opportunity-radio-fields'.$question->id.' hide ">
                                                                                        <div class="control-group opportunity-radio-filed-display input-group" style="margin-top:10px;">
                                                                                            <input type="text" name="new_radio_fields[]" class="form-control" placeholder="Enter Response">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <br>
                                                                                <button class="btn btn-success btn-sm opportunity-btn-response'.$question->id.'"
                                                                                        type="submit" style="display: none;">
                                                                                    Submit
                                                                                </button>
                                                                            </div>
                                                                        </form>

                                                                        <script type="text/javascript" src="'.$jquery_src.'"></script>

                                                                        <script type="text/javascript">

                                                                            $(document).ready(function() {

                                                                                //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
                                                                                $(".add-opportunity-radio-field'.$question->id.'").click(function(){
                                                                                    var html = $(".copy-opportunity-radio-fields'.$question->id.'").html();
                                                                                    $(".after-add-opportunity-fields'.$question->id.'").after(html);
                                                                                    $("#new_opportunity_question_responses'.$question->id.'").show();
                                                                                    $(".opportunity-btn-response'.$question->id.'").show();
                                                                                });
                                                                            });

                                                                        </script>
                                                                        <script type="text/javascript">
                                                                            $(document).ready(function () {
                                                                                $("#add_opportunity_more_multi_choice_responses'.$question->id.'").submit(function (e) {
                                                                                    e.preventDefault();
                                                                                    $.ajax({
                                                                                        type: "POST",
                                                                                        url : "'.$add_opportunity_multi_choice_response_action.'",
                                                                                        data : $("#add_opportunity_more_multi_choice_responses'.$question->id.'").serializeArray(),
                                                                                        success: function (result) {
                                                                                            $(".opportunity_response_values'.$question->id.'").html(result);
                                                                                            $("#add_opportunity_more_multi_choice_responses'.$question->id.'")[0].reset();
                                                                                            $("#new_opportunity_question_responses'.$question->id.'").hide();
                                                                                        }
                                                                                    });
                                                                                });
                                                                            });
                                                                        </script>
                                                                            ';
            }


            if($question->response == 'checkbox'){

                $add_opportunity_multiple_answers_action = base_url()."organization/add_opportunity_more_multiple_answers";

                echo   '
                                                                            <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <label>
                                                                                    Answers
                                                                                </label>
                                                                                ';

                $answers = $this->db->get_where("form_questions_fields", array("section_id" => $question->section_id, "question_id"=> $question->question_id, 'opp_id'=> $question->opp_id))->result();


                echo  '<ul class="list-unstyled opportunity_checkbox_answers'.$question->id.'">';
                foreach ($answers as $answer)
                {
                    $delete_opportunity_checkbox_action = base_url()."organization/delete_opportunity_checkbox_field/".$answer->id."/".$answer->org_id."/".$answer->section_id."/".$answer->question_id."/".$question->id.'/'.$answer->opp_id;

                    echo    '
                                                                                        <li>
                                                                                            <div class="col-xs-6">
                                                                                                '.$answer->field.'
                                                                                            </div>
                                                                                            <div class="col-xs-6">
                                                                                                <a href="javascript:;" class="delete_opportunity_checkbox_field_value" onclick="delete_opportunity_checkbox_answer'.$answer->id.'()">
                                                                                                    <i class="glyphicon glyphicon-remove"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                            <script type="text/javascript">
                                                                                                function delete_opportunity_checkbox_answer'.$answer->id.'() {
                                                                                                    $.ajax({
                                                                                                        url : "'.$delete_opportunity_checkbox_action.'",
                                                                                                        success: function (result) {
                                                                                                            $(".opportunity_checkbox_answers'.$question->id.'").html(result);
                                                                                                        }
                                                                                                    });
                                                                                                }
                                                                                            </script>
                                                                                        </li>
                                                                                        ';
                }

                echo  '</ul>
                                                                            </div>
                                                                        </div>

                                                                        <br>
                                                                        <form method="post" id="add_opportunity_more_multiple_answers'.$question->id.'">
                                                                            <input type="hidden" name="org_id" value="'.$question->org_id.'">
                                                                            <input type="hidden" name="section_id" value="'.$question->section_id.'">
                                                                            <input type="hidden" name="question_id" value="'.$question->question_id.'">
                                                                            <input type="hidden" name="s_q_id" value="'.$question->id.'">
                                                                            <input type="hidden" name="opp_id" value="'.$question->opp_id.'">
                                                                            <div class="col-md-12">
                                                                                <div class="input-group control-group after-add-opportunity-answers'.$question->id.'">
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="input-group-btn">
                                                                                                <button class="btn btn-primary btn-xs add-opportunity-checkbox'.$question->id.'" type="button">
                                                                                                    <i class="glyphicon glyphicon-plus"></i>
                                                                                                    &nbsp;
                                                                                                    Add more answers
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div id="new_opportunity_question_answers'.$question->id.'" style="display: none;">
                                                                                    <div class="copy-opportunity-checkboxes'.$question->id.' hide ">
                                                                                        <div class="control-group opportunity-checkbox-filed-display input-group" style="margin-top:10px;">
                                                                                            <input type="text" name="checkbox_answers[]" class="form-control" placeholder="Enter Response">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <br>
                                                                                <button class="btn btn-success btn-sm opportunity-btn-answer'.$question->id.'"
                                                                                        type="submit" style="display: none;">
                                                                                    Submit
                                                                                </button>
                                                                            </div>
                                                                        </form>

                                                                        <script type="text/javascript" src="'.$jquery_src.'"></script>

                                                                        <script type="text/javascript">
                                                                            $(document).ready(function() {

                                                                                //here first get the contents of the div with name class copy-fields and add it to after "after-add-more" div class.
                                                                                $(".add-opportunity-checkbox'.$question->id.'").click(function(){
                                                                                    var html = $(".copy-opportunity-checkboxes'.$question->id.'").html();
                                                                                    $(".after-add-opportunity-answers'.$question->id.'").after(html);
                                                                                    $("#new_opportunity_question_answers'.$question->id.'").show();
                                                                                    $(".opportunity-btn-answer'.$question->id.'").show();
                                                                                });
                                                                            });

                                                                        </script>
                                                                        <script type="text/javascript">
                                                                            $(document).ready(function () {
                                                                                $("#add_opportunity_more_multiple_answers'.$question->id.'").submit(function (e) {
                                                                                    e.preventDefault();
                                                                                    $.ajax({
                                                                                        type: "POST",
                                                                                        url : "'.$add_opportunity_multiple_answers_action.'",
                                                                                        data : $("#add_opportunity_more_multiple_answers'.$question->id.'").serializeArray(),
                                                                                        success: function (result) {
                                                                                            $(".opportunity_checkbox_answers'.$question->id.'").html(result);
                                                                                            $("#add_opportunity_more_multiple_answers'.$question->id.'")[0].reset();
                                                                                            $("#new_opportunity_question_answers'.$question->id.'").hide();
                                                                                        }
                                                                                    });
                                                                                });
                                                                            });
                                                                        </script>
                                                                            ';
            }

            $edit_section_question_form_action = base_url()."organization/edit_opportunity_section_question";
            $delete_section_question_action = base_url()."organization/delete_opportunity_section_question/".$question->section_id."/".$question->org_id;

            echo     '
                                                                    <script type="text/javascript" src="'.$jquery_src.'"></script>
                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $("#edit-opportunity-section-question-form'.$question->id.'").submit(function (e) {
                                                                                e.preventDefault();
                                                                                $.ajax({
                                                                                    type: "POST",
                                                                                    url: "'.$edit_section_question_form_action.'",
                                                                                    data : $("#edit-opportunity-section-question-form'.$question->id.'").serializeArray(),
                                                                                    success: function (results) {
                                                                                        $("#opportunity-section-question-name'.$question->id.'").html(results);
                                                                                        $("#change_opportunity_success'.$question->id.'").show();
                                                                                        $("#change_opportunity_success'.$question->id.'").fadeOut(6000);

                                                                                    }
                                                                                });
                                                                            });
                                                                        });
                                                                      
                                                                    </script>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                                    
                                                                    ';


        }
    }


    public function return_new_radio_fields($org_id, $section_id, $question_id, $section_q_id)
    {
        $fields =$this->db->get_where('form_questions_template_fields',array('org_id' => $org_id, 'section_id'=> $section_id, 'question_id'=> $question_id))->result();

        foreach ($fields as $field)
        {
            $action = base_url()."organization/delete_radio_field/".$field->id."/".$field->org_id."/".$field->section_id."/".$field->question_id."/".$section_q_id;
            echo
            '
                <li>
                                                                                                <div class="col-xs-6">
                                                                                                    '.$field->field.'
                                                                                                </div>
                                                                                               <div class="col-xs-6">
                                                                                                <a href="javascript:;" class="delete_radio_field_value" onclick="delete_radio_response'.$field->id.'()">
                                                                                                    <i class="glyphicon glyphicon-remove"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                            <script type="text/javascript">
                                                                                                function delete_radio_response'.$field->id.'() {
                                                                                                    $.ajax({
                                                                                                        url : "'.$action.'",
                                                                                                        success: function (result) {
                                                                                                            $(".response_values'.$section_q_id.'").html(result);
                                                                                                        }
                                                                                                    });
                                                                                                }
                                                                                            </script>
                                                                                            </li>
            ';
        }
    }

    public function return_new_checkbox_fields($org_id, $section_id, $question_id, $section_q_id)
    {
        $fields =$this->db->get_where('form_questions_template_fields',array('org_id' => $org_id, 'section_id'=> $section_id, 'question_id'=> $question_id))->result();

        foreach ($fields as $field)
        {
            $action = base_url()."organization/delete_checkbox_field/".$field->id."/".$field->org_id."/".$field->section_id."/".$field->question_id."/".$section_q_id;
            echo
                '
                <li>
                                                                                                <div class="col-xs-6">
                                                                                                    '.$field->field.'
                                                                                                </div>
                                                                                               <div class="col-xs-6">
                                                                                                <a href="javascript:;" class="delete_radio_field_value" onclick="delete_checkbox_answer'.$field->id.'()">
                                                                                                    <i class="glyphicon glyphicon-remove"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                            <script type="text/javascript">
                                                                                                function delete_checkbox_answer'.$field->id.'() {
                                                                                                    $.ajax({
                                                                                                        url : "'.$action.'",
                                                                                                        success: function (result) {
                                                                                                            $(".checkbox_answers'.$section_q_id.'").html(result);
                                                                                                        }
                                                                                                    });
                                                                                                }
                                                                                            </script>
                                                                                            </li>
            ';
        }
    }

    public function return_new_opportunity_radio_fields($org_id, $section_id, $question_id,$section_q_id, $opp_id)
    {
        $fields =$this->db->get_where('form_questions_fields',array('org_id' => $org_id, 'section_id'=> $section_id, 'question_id'=> $question_id, 'opp_id' => $opp_id))->result();

        foreach ($fields as $field)
        {
            $action = base_url()."organization/delete_opportunity_radio_field/".$field->id."/".$field->org_id."/".$field->section_id."/".$field->question_id."/".$section_q_id."/".$field->opp_id;
            echo
                '
                <li>
                                                                                                <div class="col-xs-6">
                                                                                                    '.$field->field.'
                                                                                                </div>
                                                                                               <div class="col-xs-6">
                                                                                                <a href="javascript:;" class="delete_opportunity_radio_field_value" onclick="delete_opportunity_radio_response'.$field->id.'()">
                                                                                                    <i class="glyphicon glyphicon-remove"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                            <script type="text/javascript">
                                                                                                function delete_opportunity_radio_response'.$field->id.'() {
                                                                                                    $.ajax({
                                                                                                        url : "'.$action.'",
                                                                                                        success: function (result) {
                                                                                                            $(".opportunity_response_values'.$section_q_id.'").html(result);
                                                                                                        }
                                                                                                    });
                                                                                                }
                                                                                            </script>
                                                                                            </li>
            ';
        }
    }


    public function return_new_opportunity_checkbox_fields($org_id, $section_id, $question_id, $section_q_id, $opp_id)
    {
        $fields =$this->db->get_where('form_questions_fields',array('org_id' => $org_id, 'section_id'=> $section_id, 'question_id'=> $question_id, 'opp_id' => $opp_id))->result();

        foreach ($fields as $field)
        {
            $action = base_url()."organization/delete_opportunity_checkbox_field/".$field->id."/".$field->org_id."/".$field->section_id."/".$field->question_id."/".$section_q_id.'/'.$field->opp_id;
            echo
                '
                <li>
                                                                                                <div class="col-xs-6">
                                                                                                    '.$field->field.'
                                                                                                </div>
                                                                                               <div class="col-xs-6">
                                                                                                <a href="javascript:;" class="delete_radio_field_value" onclick="delete_opportunity_checkbox_answer'.$field->id.'()">
                                                                                                    <i class="glyphicon glyphicon-remove"></i>
                                                                                                </a>
                                                                                            </div>
                                                                                            <script type="text/javascript">
                                                                                                function delete_opportunity_checkbox_answer'.$field->id.'() {
                                                                                                    $.ajax({
                                                                                                        url : "'.$action.'",
                                                                                                        success: function (result) {
                                                                                                            $(".opportunity_checkbox_answers'.$section_q_id.'").html(result);
                                                                                                        }
                                                                                                    });
                                                                                                }
                                                                                            </script>
                                                                                            </li>
            ';
        }
    }


    public function check_session()
    {
        if($this->session->userdata('loggedin'))
        {
            return true;
        }
        else{
            redirect('auth/org_login');
        }
    }
}