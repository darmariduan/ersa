<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    public function index()
    {
        if ($this->session->userdata('email')) {
            if ($this->session->userdata('role_id') == 1) {

                redirect('admin', 'refresh');
            } else {
                redirect('user', 'refresh');
            }
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Email tidak valid'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]', ['required' => 'Password tidak boleh kosong', 'min_length' => 'Password terlalu pendek']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if ($user['status'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'id_user' => $user['id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } elseif ($user['role_id'] == 2) {
                        redirect('user');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('password_salah', 'Password salah!');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('akun', 'Akun anda belum aktif !');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('email', 'Email belum terdaftar!');
            redirect('auth');
        }
    }
    public function registration()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Email tidak valid'
        ]);
        $this->form_validation->set_rules('instansi', 'Nama Instansi', 'trim|required', [
            'required' => 'Nama Instansi tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', [
            'required' => 'Alamat tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('no_pks', 'No PKS', 'trim|required', [
            'required' => 'No PKS tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('nama_ketua', 'Nama Ketua Instansi', 'trim|required', [
            'required' => 'Nama Ketua Instansi tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]', [
            "required" => "Password tidak boleh kosong",
            "min_length" => "Password terlalu pendek"
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|matches[password]', [
            "required" => "Field tidak boleh kosong",
            "matches" => "Password tidak sama"
        ]);
        $this->form_validation->set_rules('terms', 'Terms', 'trim|required', [
            'required' => 'Anda harus menyetujui syarat dan ketentuan'
        ]);


        if ($this->form_validation->run() ==   FALSE) {
            $this->load->view('auth/registration');
        } else {
            $email = $this->input->post('email');
            $cek_email =  $this->db->get_where('user', ['email' => $email])->row_array();
            if ($cek_email) {

                $this->session->set_flashdata('email', 'Email Sudah Terdaftar');
                $this->load->view('auth/registration');
            } else {
                $data = [
                    "email" => $this->input->post('email'),
                    "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    "role_id" => 2,
                    "status" => 0,
                    "created_at" => date('Y-m-d'),
                ];
                $this->db->insert('user', $data);

                $user_id = $this->db->insert_id();

                $data2 = [

                    "user_id" => $user_id,
                    "nama_instansi" => $this->input->post('instansi'),
                    "alamat" => $this->input->post('alamat'),
                    "no_pks" => $this->input->post('no_pks'),
                    "ketua_instansi" => $this->input->post('nama_ketua'),
                ];

                $this->db->insert('instansi', $data2);
                $this->session->set_flashdata('message', 'Mohon tunggu aktivasi akun anda dalam 1x24 Jam. Kami akan segera kirim ke email terdaftar');
                redirect('auth');
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}

/* End of file Auth.php */
