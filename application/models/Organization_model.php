<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization_model extends CI_Model
{
    public function get_new_applications($id)
    {
        $this->db->where('org_id', $id);
        $this->db->where('status', 'pending');
        $query = $this->db->get('applications');

        return $query->result();
    }

    public function get_beneficiaries($id)
    {
        $this->db->where('org_id', $id);
        $this->db->where('status', 'beneficiary');
        $query = $this->db->get('applications');

        return $query->result();
    }

    public function get_opportunities($id)
    {
        $this->db->where('org_id', $id);
        $query = $this->db->get('opportunities');

        return $query->result();
    }

    public function get_new_messages($id)
    {
        $this->db->where('org_id', $id);
        $this->db->where('seen_by_org', 0);
        $query = $this->db->get('org_messages');

        return $query->result();
    }

    public function get_emailAward_content($id)
    {
        $this->db->where('org_id', $id);
        $this->db->where('target_group', 'awarded');
        $query = $this->db->get('email_template');

        if($query->num_rows() == 0)
        {
            $content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in eleifend leo, non efficitur elit. Morbi eu venenatis purus.";
            return $content;
        }

        if($query->num_rows() == 1)
        {
            $content = $query->row()->content;
            return $content;
        }
    }

    public function get_emailDecline_content($id)
    {
        $this->db->where('org_id', $id);
        $this->db->where('target_group', 'declined');
        $query = $this->db->get('email_template');

        if($query->num_rows() == 0)
        {
            $content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in eleifend leo, non efficitur elit. Morbi eu venenatis purus.";
            return $content;
        }

        if($query->num_rows() == 1)
        {
            $content = $query->row()->content;
            return $content;
        }
    }

    public function get_smsAward_content($id)
    {
        $this->db->where('org_id', $id);
        $this->db->where('target_group', 'awarded');
        $query = $this->db->get('sms_template');

        if($query->num_rows() == 0)
        {
            $content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in eleifend leo, non efficitur elit. Morbi eu venenatis purus.";
            return $content;
        }

        if($query->num_rows() == 1)
        {
            $content = $query->row()->content;
            return $content;
        }
    }

    public function get_smsDecline_content($id)
    {
        $this->db->where('org_id', $id);
        $this->db->where('target_group', 'declined');
        $query = $this->db->get('sms_template');

        if($query->num_rows() == 0)
        {
            $content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in eleifend leo, non efficitur elit. Morbi eu venenatis purus.";
            return $content;
        }

        if($query->num_rows() == 1)
        {
            $content = $query->row()->content;
            return $content;
        }
    }

    public function get_org_users($id)
    {
        $this->db->where('org_id', $id);
        $query = $this->db->get('org_users');

        return $query->result();
    }

    public function edit_users($id)
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('org_users');

        return $query->result();
    }

    public function get_opportunity_applications($opp_id, $org_id)
    {
        $this->db->where('opp_id', $opp_id);
        $this->db->where('org_id', $org_id);
        $this->db->where('status', 'pending');
        $query = $this->db->get('applications');

        return $query->num_rows();
    }

    public function get_org_template_sections($org_id)
    {
        $this->db->where('org_id', $org_id);
        $query = $this->db->get(' form_section_template');

        return $query->result();
    }

    public function get_org_template_questions($org_id)
    {
        $this->db->where('org_id', $org_id);
        $query = $this->db->get(' form_questions_template');

        return $query->result();
    }

    public function get_org_template_questions_fields($org_id)
    {
        $this->db->where('org_id', $org_id);
        $query = $this->db->get(' form_questions_template_fields');

        return $query->result();
    }


}