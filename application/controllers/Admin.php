<?php
// cek
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->Penggajian_model->get_where('user', 'email', $this->session->userdata('email'))->row_array();
        $data['admin'] =  $this->Penggajian_model->get_where('user', 'role_id', 1)->num_rows();
        $data['pegawai'] =  $this->Penggajian_model->get('user_pegawai')->num_rows();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }


    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->Penggajian_model->get_where('user', 'email', $this->session->userdata('email'))->row_array();

        $data['role'] =  $this->Penggajian_model->get('user_role')->result_array();
        $data['access'] =  $this->Penggajian_model->get('user_role')->result_array();



        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Penggajian_model->insert_data(['role' => $this->input->post('role')], 'user_role');
            $this->session->set_flashdata('message', 'New role added!');
            redirect('admin/role');
        }
    }
    public function roleaccess($role_id)
    {
        $data['title'] = 'Role';
        $data['user'] = $this->Penggajian_model->get_where('user', 'email', $this->session->userdata('email'))->row_array();

        $data['role'] =  $this->Penggajian_model->get_where('user_role', 'id', $role_id)->row_array();
        $this->db->order_by('sort', 'ASC');
        $data['menu'] =  $this->Penggajian_model->get_where('user_menu', 'id !=', 1)->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/roleaccess', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data =
            [
                'role' => $this->input->post('role'),
            ];
        $this->Penggajian_model->update_data('user_role', $data, ['id' => $id]);
        $this->session->set_flashdata('message', 'role edited!');
        redirect('admin/role');
    }
    public function delete($id)
    {

        $this->Penggajian_model->delete_data('user_role', ['id' => $id]);
        $this->session->set_flashdata('message', 'role deleted!');
        redirect('admin/role');
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');


        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result =  $this->Penggajian_model->get_where2('user_access_menu', $data);

        if ($result->num_rows() < 1) {

            $this->Penggajian_model->insert_data($data, 'user_access_menu');
            $this->session->set_flashdata('message', 'access changed!');
        } else {
            $this->Penggajian_model->delete_data('user_access_menu', $data);
            $this->session->set_flashdata('message', 'access changed!');
        }
    }

    public function useradmin()
    {
        $data['title'] = 'User';
        $data['user'] = $this->Penggajian_model->get_where('user', 'email', $this->session->userdata('email'))->row_array();

        $data['useradmin'] =  $this->Penggajian_model->getuseradmin()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/useradmin', $data);
        $this->load->view('templates/footer');
    }

    public function adduseradmin()
    {
        $data['title'] = 'User';
        $data['user'] = $this->Penggajian_model->get_where('user', 'email', $this->session->userdata('email'))->row_array();

        $data['useradmin'] =  $this->Penggajian_model->getuseradmin()->result_array();
        $data['role'] =  $this->Penggajian_model->get('user_role')->result_array();
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/adduseradmin', $data);
            $this->load->view('templates/footer');
        } else {

            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $this->do_upload();
            } else {
                $data = [
                    'name' => htmlspecialchars($this->input->post('name', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'image' => 'default.jpg',
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id' => $this->input->post('role_id'),
                    'is_active' =>  $this->input->post('is_active'),
                    'date_created' => time()
                ];
                $this->Penggajian_model->insert_data($data, 'user');
                $this->session->set_flashdata('message', 'account has been created!');
                redirect('admin/useradmin');
            }
        }
    }

    public function edituseradmin($id)
    {
        $data['title'] = 'User';
        $data['user'] = $this->Penggajian_model->get_where('user', 'email', $this->session->userdata('email'))->row_array();

        $data['useradmin'] =  $this->Penggajian_model->get_where2('user', ['id' => $id])->row_array();

        $data['role'] =  $this->Penggajian_model->get('user_role')->result_array();
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/edituseradmin', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $this->do_uploadedit($id);
            } else {

                $data = [
                    'name' => htmlspecialchars($this->input->post('name', true)),
                    'email' => htmlspecialchars($this->input->post('email2', true)),
                    'role_id' => $this->input->post('role_id'),
                    'is_active' =>  $this->input->post('is_active'),
                    'date_created' => time()
                ];
                if ($this->input->post('password1') != null) {
                    $data = ['password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)];
                }
                $where = ['id' => $id];
                $this->Penggajian_model->update_data('user', $data, $where);
                $this->session->set_flashdata('message', 'account has been edited!');
                redirect('admin/useradmin');
            }
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
    public function do_upload()
    {

        $config['allowed_types'] = 'gif|jpg|png|jpeg|webp|JPEG|JPG|PNG|GIF|WEBP';
        $config['max_size']     = '5000';
        $config['upload_path'] = './assets/img/profile/';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
            $new_image = $this->upload->data('file_name');
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => $new_image,
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id'),
                'is_active' =>  $this->input->post('is_active'),
                'date_created' => time()
            ];

            $this->Penggajian_model->insert_data($data, 'user');
            $this->session->set_flashdata('message', 'account has been created!');
            redirect('admin/useradmin');
        } else {

            $this->session->set_flashdata('gagal', $this->upload->display_errors());
            redirect('admin/adduseradmin');
        }
    }
    public function do_uploadedit($id)
    {
        $user = $this->Penggajian_model->get_where('user', 'id', $id)->row_array();
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
                $new_image = $this->upload->data('file_name');
                $data = [
                    'name' => htmlspecialchars($this->input->post('name', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'image' => $new_image,
                    'role_id' => $this->input->post('role_id'),
                    'is_active' =>  $this->input->post('is_active'),
                    'date_created' => time()
                ];
                if ($this->input->post('password1') != null) {
                    $data = ['password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)];
                }
                $where = ['id' => $id];
                $this->Penggajian_model->update_data('user', $data, $where);
                $this->session->set_flashdata('message', 'account has been edited!');
                redirect('admin/useradmin');
            } else {
                $this->session->set_flashdata('gagal', $this->upload->display_errors());
                redirect('admin/edituseradmin/' . $user['id']);
            }
        }
    }
    public function deleteuseradmin($id)
    {
        $user = $this->Penggajian_model->get_where('user', 'id', $id)->row_array();
        $old_image = $user['image'];
        if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $old_image);
        }

        //$this->db->where('id', $id);
        $this->Penggajian_model->delete_data('user', ['id' => $id]);
        $this->session->set_flashdata('message', 'account deleted!');
        redirect('admin/useradmin');
    }
}
