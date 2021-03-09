<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ticket_model extends CI_Model
{
    public function is_status($status)
    {
        $statuses = ['open', 'working', 'completed', 'canceled'];
        return in_array($status, $statuses);
    }

    public function create($data)
    {
        $this->db->insert('tickets', $data);
        return $this->db->insert_id();
    }

    public function get($id, $user_id)
    {
        $this->db->select('tickets.*, projects.label as project_label');
        $this->db->where('tickets.id', $id);
        $this->db->where('tickets.user_id', $user_id);
        $this->db->where('tickets.removed', 0);
        $this->db->from('tickets');
        $this->db->join('projects', 'tickets.project_id = projects.id', 'left');
        $ticket = $this->db->get()->first_row();
        return $ticket;
    }

    public function get_by_user($user_id)
    {
        $this->db->select('tickets.*, projects.label as project_label');
        $this->db->order_by('tickets.id', 'desc');
        $this->db->where('tickets.removed', 0);
        $this->db->where('tickets.user_id', $user_id);
        $this->db->from('tickets');
        $this->db->join('projects', 'tickets.project_id = projects.id', 'left');
        $tickets = $this->db->get()->result();
        return $tickets;
    }

    public function update($id, $data)
    {
        $this->db->set($data);
        $this->db->where('tickets.id', $id);
        $this->db->update('tickets');
        return $this->db->affected_rows();
    }
}
