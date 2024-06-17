<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->Penggajian_model->get_where('user', 'email', $this->session->userdata('email'))->row_array();


        $this->db->order_by('sort', 'ASC');
        $data['menu'] = $this->Penggajian_model->get('user_menu')->result_array();
        $menu = $this->Penggajian_model->get('user_menu')->result_array();


        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $sort = $this->input->post('sort');
            foreach ($menu as $m) {
                if ($sort == 0) {
                    $data = ['sort' => $m['sort'] + 1];
                    $where = ['id' =>  $m['id']];
                    $this->Penggajian_model->update_data('user_menu', $data, $where);
                    $data = [
                        'menu' => $this->input->post('menu'),
                        'sort' => 1
                    ];
                } else {
                    if ($sort < $m['sort']) {
                        $data = ['sort' => $m['sort'] + 1];
                        $where = ['id' =>  $m['id']];
                        $this->Penggajian_model->update_data('user_menu', $data, $where);
                    }
                    $data = [
                        'menu' => $this->input->post('menu'),
                        'sort' => $sort + 1
                    ];
                }
            }
            $this->Penggajian_model->insert_data($data, 'user_menu');

            // $this->Penggajian_model->insert_data(, 'user_menu');
            $this->session->set_flashdata('message', 'New menu added!');
            redirect('menu');
        }
    }

    public function edit($id)
    {

        $this->db->order_by('sort', 'ASC');
        $menu = $this->Penggajian_model->get('user_menu')->result_array();


        $sort = $this->input->post('sort');
        if ($sort != null) {
            foreach ($menu as $m) {
                if ($sort == 0) {
                    $data = ['sort' => $m['sort'] + 1];
                    $where = ['id' =>  $m['id']];
                    $this->Penggajian_model->update_data('user_menu', $data, $where);

                    $data = ['sort' => 1];
                    $where = ['id' =>  $id];
                    $this->Penggajian_model->update_data('user_menu', $data, $where);
                } else {
                    if ($sort < $m['sort']) {
                        $data = ['sort' => $m['sort'] + 1];
                        $where = ['id' =>  $m['id']];
                        $this->Penggajian_model->update_data('user_menu', $data, $where);
                    }
                    $data = [
                        'sort' => $sort + 1
                    ];
                    $where = ['id' =>  $id];
                    $this->Penggajian_model->update_data('user_menu', $data, $where);
                }
            }
        }
        $this->session->set_flashdata('message', 'Menu edited!');
        redirect('menu');
    }

    public function delete($id)
    {

        $this->Penggajian_model->delete_data('user_menu', ['id' => $id]);
        $this->session->set_flashdata('message', 'menu deleted!');
        redirect('menu');
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->Penggajian_model->get_where('user', 'email', $this->session->userdata('email'))->row_array();

        $data['submenu'] = $this->Penggajian_model->getSubMenu()->result_array();
        $data['menu'] = $this->Penggajian_model->get('user_menu')->result_array();
        $this->form_validation->set_rules('title', 'Title', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->Penggajian_model->insert_data($data, 'user_sub_menu');
            $this->session->set_flashdata('message', 'new submenu added!');
            redirect('menu/submenu');
        }
    }

    public function editsubmenu($id)
    {
        $data =
            [
                'menu_id' => $this->input->post('menu_id'),
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active'),
            ];
        $this->Penggajian_model->update_data('user_sub_menu', $data, ['id' => $id]);
        $this->session->set_flashdata('message', 'Submenu edited!');
        redirect('menu/submenu');
    }
    public function deletesubmenu($id)
    {

        $this->Penggajian_model->delete_data('user_sub_menu', ['id' => $id]);
        $this->session->set_flashdata('message', 'submenu deleted!');
        redirect('menu/submenu');
    }
}
