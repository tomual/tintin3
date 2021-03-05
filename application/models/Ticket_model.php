<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ticket_model extends CI_Model
{
    public function is_status($status)
    {
        $statuses = ['open', 'working', 'closed', 'canceled'];
        return in_array($status, $statuses);
    }

    public function create($data)
    {
        $this->db->insert('tickets', $data);
        return $this->db->insert_id();
    }

    public function get($id, $user_id)
    {
        $this->db->where('id', $id);
        $this->db->where('user_id', $user_id);
        $this->db->where('removed', 0);
        $this->db->from('tickets');
        $ticket = $this->db->get()->first_row();
        return $ticket;
    }

    public function get_by_user($user_id)
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('removed', 0);
        $this->db->where('user_id', $user_id);
        $this->db->from('tickets');
        $tickets = $this->db->get()->result();
        return $tickets;
    }

    public function update($id, $data)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('tickets');
        return $this->db->affected_rows();
    }
}
