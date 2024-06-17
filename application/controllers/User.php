<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'My Profile';

        // $data['user'] = $this->Penggajian_model->get_where('user', 'email', $this->session->userdata('email'))->row_array();

        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT user.*, user_role.role
                      FROM user JOIN user_role
                      ON user.role_id = user_role.id
                      WHERE user.role_id = $role_id          
            ";
        $data['user'] = $this->db->query($queryMenu)->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->Penggajian_model->get_where('user', 'email', $this->session->userdata('email'))->row_array();
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email2');

            $data = ['name' => $name];
            $where = ['email' => $email];

            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $this->do_upload();
            } else {
                $this->Penggajian_model->update_data('user', $data, $where);
                $this->session->set_flashdata('message', 'your profile has been updated!');
                redirect('user');
            }
        }
    }

    public function do_upload()
    {
        $user = $this->Penggajian_model->get_where('user', 'email', $this->session->userdata('email'))->row_array();
        $email = $this->input->post('email2');
        $name = $this->input->post('name');

        //cek jika ada gambar yang akan diupload
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|webp|JPEG|JPG|PNG|GIF|WEBP';
            $config['max_size']     = '5000';
            $config['upload_path'] = './assets/img/profile/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $old_image = $user['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }
                $name = $this->input->post('name');
                $new_image = $this->upload->data('file_name');
                $data = [
                    'image' => $new_image,
                    'name' => $name
                ];
                $where = ['email' => $email];
                $this->Penggajian_model->update_data('user', $data, $where);
                $this->session->set_flashdata('message', 'your profile has been updated!');
                redirect('user');
            } else {
                $this->session->set_flashdata('gagal', $this->upload->display_errors());
                redirect('user/edit');
            }
        }
    }

    public function changepassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->Penggajian_model->get_where('user', 'email', $this->session->userdata('email'))->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('gagal', 'Wrong current password!');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('gagal', 'New password cannot be the same as current password!');
                    redirect('user/changepassword');
                } else {
                    // password sudah oke 
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $data = ['password' => $password_hash];
                    $where = ['email' => $this->session->userdata('email')];
                    $this->Penggajian_model->update_data('user', $data, $where);
                    $this->session->set_flashdata('message', 'Password changed!');
                    redirect('user');
                }
            }
        }
    }
}
