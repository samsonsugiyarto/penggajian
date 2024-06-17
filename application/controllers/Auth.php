<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->_rules();
        if ($this->form_validation->run() == false) {
            $data['title'] = 'RSE User Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email1');
        $password = $this->input->post('password');

        $user = $this->Penggajian_model->get_where('user', 'email', $email)->row_array();

        // jika user ada
        if ($user) {
            // jika user aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('gagal', 'Wrong password!');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('gagal', 'This email has not been activated!');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Email is not registered!');
            redirect('auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->_rules();
        if ($this->form_validation->run() == false) {
            $data['title'] = 'RSE User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->Penggajian_model->insert_data($data, 'user');
            $this->session->set_flashdata('message', 'your account has been created. Please Login');
            redirect('auth');
        }
    }
    // untuk form validasi email jika email sudah ada di db
    function check_email_exists()
    {
        $count = $this->Penggajian_model->isemailExists($this->input->post('email'));
        if ($count == TRUE) {
            echo json_encode(FALSE);
        } else {
            echo json_encode(TRUE);
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('email', 'Email', 'is_unique[user.email]');
        $this->form_validation->set_rules('email1', 'Email', 'required');
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', 'you have been logged out!');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
