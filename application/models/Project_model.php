<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project_model extends CI_Model
{
    public function create($data)
    {
        $this->db->insert('projects', $data);
        return $this->db->insert_id();
    }

    public function get($id, $user_id)
    {
        $this->db->where('id', $id);
        $this->db->where('user_id', $user_id);
        $this->db->where('removed', 0);
        $this->db->from('projects');
        $ticket = $this->db->get()->first_row();
        return $ticket;
    }

    public function get_by_user($user_id)
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('removed', 0);
        $this->db->where('user_id', $user_id);
        $this->db->from('projects');
        $projects = $this->db->get()->result();
        return $projects;
    }

    public function update($id, $data)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('projects');
        return $this->db->affected_rows();
    }
}
