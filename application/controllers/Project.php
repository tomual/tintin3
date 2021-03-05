<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project extends Authenticated_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('project_model');
        $this->load->library('form_validation');
    }

    public function create()
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('label', 'Label', 'trim|required');

            if ($this->form_validation->run() !== false) {
                $data = array(
                    'label' => $this->input->post('label'),
                    'user_id' => $this->user->id,
                    'created' => date('Y-m-d H:i:s'),
                    'created_by' => $this->user->id,
                );
                if ($project_id = $this->project_model->create($data)) {
                    $this->session->set_flashdata('success', 'Project has been created.');
                    redirect("project/list");
                } else {
                    $this->session->set_flashdata('error', 'Project creation failed.');
                }
            } else {
                $this->session->set_flashdata('error', 'Please fill in fields with valid values.');
            }
        }
        set_title('New Project');
        $this->load->view('project/create');
    }

    public function list()
    {
        $projects = $this->project_model->get_by_user($this->user->id);
        set_title('All Projects');
        $this->load->view('project/list', compact('projects'));
    }

    public function edit($id)
    {
        $project = $this->project_model->get($id, $this->user->id);
        if (!$project) {
            show_404();
        }

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('label', 'Label', 'trim|required');

            if ($this->form_validation->run() !== false) {
                $data = array(
                    'label' => $this->input->post('label'),
                    'user_id' => $this->user->id,
                    'modified' => date('Y-m-d H:i:s'),
                    'modified_by' => $this->user->id,
                );
                if ($this->project_model->update($id, $data) !== false) {
                    $this->session->set_flashdata('success', 'Project has been updated.');
                    redirect("project/list");
                } else {
                    $this->session->set_flashdata('error', 'Project update failed.');
                }
            } else {
                $this->session->set_flashdata('error', 'Please fill in fields with valid values.');
            }
        }
        set_title('Edit Project');
        $this->load->view('project/edit', compact('project'));
    }

    public function remove($id)
    {
        $project = $this->project_model->get($id, $this->user->id);
        if (!$project) {
            show_404();
        }
        $data = array(
            'removed' => 1,
            'modified' => date('Y-m-d H:i:s'),
            'modified_by' => $this->user->id,
        );
        if ($this->project_model->update($id, $data) !== false) {
            $this->session->set_flashdata('success', 'Project has been deleted.');
        } else {
            $this->session->set_flashdata('error', 'Project deletion failed.');
        }
        redirect('project/list');
    }
}
