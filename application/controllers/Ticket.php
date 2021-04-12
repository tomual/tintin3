<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ticket extends Authenticated_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ticket_model');
        $this->load->model('project_model');
        $this->load->library('form_validation');
    }

    public function create()
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|required|callback_status_check');
            $this->form_validation->set_rules('project_id', 'Project', 'trim|callback_project_check');

            if ($this->form_validation->run() !== false) {
                $data = array(
                    'title' => $this->input->post('title'),
                    'user_id' => $this->user->id,
                    'project_id' => $this->input->post('project_id'),
                    'description' => $this->input->post('description'),
                    'status' => $this->input->post('status'),
                    'created' => date('Y-m-d H:i:s'),
                    'created_by' => $this->user->id,
                );
                if ($ticket_id = $this->ticket_model->create($data)) {
                    $this->session->set_flashdata('success', 'Ticket has been created.');
                    redirect("ticket/view/$ticket_id");
                } else {
                    $this->session->set_flashdata('error', 'Ticket creation failed.');
                }
            } else {
                $this->session->set_flashdata('error', 'Please fill in fields with valid values.');
            }
        }
        $projects = $this->project_model->get_by_user($this->user->id);
        set_title('New Ticket');
        $this->load->view('ticket/create', compact('projects'));
    }

    public function status_check($status)
    {
        if (!$this->ticket_model->is_status($status)) {
            $this->form_validation->set_message('status_check', 'Invalid status');
            return false;
        } else {
            return true;
        }
    }

    public function project_check($project_id)
    {
        if (!empty($project_id) && !$this->project_model->get($project_id, $this->user->id)) {
            $this->form_validation->set_message('project_check', 'Invalid project');
            return false;
        } else {
            return true;
        }
    }

    public function view($id)
    {
        $ticket = $this->ticket_model->get($id, $this->user->id);
        if (!$ticket) {
            show_404();
        }
        set_title($ticket->title);
        $this->load->view('ticket/view', compact('ticket'));
    }

    public function list()
    {
        $tickets = $this->ticket_model->get_by_user($this->user->id);
        set_title('All Tickets');
        $this->load->view('ticket/list', compact('tickets'));
    }

    public function edit($id)
    {
        $ticket = $this->ticket_model->get($id, $this->user->id);
        if (!$ticket) {
            show_404();
        }

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|required|callback_status_check');
            $this->form_validation->set_rules('project_id', 'Project', 'trim|callback_project_check');

            if ($this->form_validation->run() !== false) {
                $data = array(
                    'title' => $this->input->post('title'),
                    'user_id' => $this->user->id,
                    'project_id' => $this->input->post('project_id'),
                    'description' => $this->input->post('description'),
                    'status' => $this->input->post('status'),
                    'modified' => date('Y-m-d H:i:s'),
                    'modified_by' => $this->user->id,
                );
                if ($this->ticket_model->update($id, $data) !== false) {
                    $this->session->set_flashdata('success', 'Ticket has been updated.');
                    redirect("ticket/view/$id");
                } else {
                    $this->session->set_flashdata('error', 'Ticket update failed.');
                }
            } else {
                $this->session->set_flashdata('error', 'Please fill in fields with valid values.');
            }
        }
        $projects = $this->project_model->get_by_user($this->user->id);
        set_title('Edit Ticket');
        $this->load->view('ticket/edit', compact('ticket', 'projects'));
    }

    public function remove($id)
    {
        $ticket = $this->ticket_model->get($id, $this->user->id);
        if (!$ticket) {
            show_404();
        }
        $data = array(
            'removed' => 1,
            'modified' => date('Y-m-d H:i:s'),
            'modified_by' => $this->user->id,
        );
        if ($this->ticket_model->update($id, $data) !== false) {
            $this->session->set_flashdata('success', 'Ticket has been deleted.');
        } else {
            $this->session->set_flashdata('error', 'Ticket deletion failed.');
        }
        redirect('ticket/list');
    }

    public function search()
    {
        $keywords = $this->input->get('keywords');
        $tickets = $this->ticket_model->search($keywords);
        set_title($keywords . " - Search");
        $this->load->view('ticket/list', compact('tickets'));
    }
}
