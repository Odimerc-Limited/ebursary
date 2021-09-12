<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function org_login($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('organizations');

        if($query->num_rows() == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function get_org_id($email, $password)
    {
        $this->db->select('org_id');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('organizations');

        if($query->num_rows() == 1)
        {
            return $query->row(0)->org_id;
        }
        else
        {
            return false;
        }
    }
}