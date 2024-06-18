<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Master';
        $data['user'] = $this->Penggajian_model->get_where('user', 'email', $this->session->userdata('email'))->row_array();

        $data['pekerjaan'] = $this->Penggajian_model->get('pekerjaan')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambahpekerjaan()
    {

        $this->Penggajian_model->insert_data(['pekerjaan' => $this->input->post('pekerjaan')], 'pekerjaan');
        $this->session->set_flashdata('message', 'Pekerjaan baru ditambahkan!');
        redirect('master');
    }

    public function editpekerjaan($id)
    {
        $data =
            [
                'pekerjaan' => $this->input->post('pekerjaan'),
            ];
        $this->Penggajian_model->update_data('pekerjaan', $data, ['id' => $id]);
        $this->session->set_flashdata('message', 'pekerjaan diubah!');
        redirect('master');
    }

    public function deletepekerjaan($id)
    {

        $this->Penggajian_model->delete_data('pekerjaan', ['id' => $id]);
        $this->session->set_flashdata('message', 'pekerjaan dihapus!');
        redirect('master');
    }
}
