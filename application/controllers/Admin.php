<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        check_login('1');
        $this->load->model('m_admin');
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
        );

        $this->load->view('dashboard/layout/header', $data);
        $this->load->view('dashboard/layout/navbar', $data);
        $this->load->view('dashboard/layout/sidebar', $data);
        $this->load->view('dashboard/admin/dashboard', $data);
        $this->load->view('dashboard/layout/footer', $data);
    }

    public function user()
    {
        $data = array(
            'title' => 'Dashboard',
            'user' => $this->m_admin->get_user(),
        );

        $this->load->view('dashboard/layout/header', $data);
        $this->load->view('dashboard/layout/navbar', $data);
        $this->load->view('dashboard/layout/sidebar', $data);
        $this->load->view('dashboard/admin/user', $data);
        $this->load->view('dashboard/layout/footer', $data);
    }

    public function activated_user($id)
    {

        $data = array(
            'status' => '1',
        );
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        $this->session->set_flashdata('message', 'User Berhasil Di Aktivasi');
        redirect('admin/user');
    }
    public function deactivated_user($id)
    {

        $data = array(
            'status' => '0',
        );
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        $this->session->set_flashdata('messages', 'User Berhasil Di Nonaktifkan');
        redirect('admin/user');
    }

    public function detail_user($id)
    {
        $data = array(
            'title' => 'Detail User',
            'user' => $this->m_admin->detail_user($id),

        );

        // var_dump($data['user']);
        // die;

        $this->load->view('dashboard/layout/header', $data);
        $this->load->view('dashboard/layout/navbar', $data);
        $this->load->view('dashboard/layout/sidebar', $data);
        $this->load->view('dashboard/admin/detail', $data);
        $this->load->view('dashboard/layout/footer', $data);
    }

    public function change_password()
    {

        if ($this->input->is_ajax_request() == true) {

            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
                'min_length' => 'Password Terlalu Pendek',
                'required' => 'Password Tidak Boleh Kosong',
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
                'matches' => 'Password Tidak Sama',
                'required' => 'Ulangi Password',
            ]);


            if ($this->form_validation->run() == FALSE) {
                $response = array(

                    'password_error' => form_error('password'),
                    'password2_error' => form_error('password2'),
                );
            } else {

                $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $data = array(
                    'password' => $password,
                );
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('user', $data);

                $response = array(
                    'sukses' => 'Password Berhasil Di Ubah',
                );
            }
            echo json_encode($response);
        }
    }


    public function layanan()
    {
        $data = [
            'title' => 'Layanan',
            'sub_layanan' => $this->m_admin->get_sub_layanan(),
            'layanan' => $this->db->get('jenis_layanan')->result(),
        ];


        $this->load->view('dashboard/layout/header', $data);
        $this->load->view('dashboard/layout/navbar', $data);
        $this->load->view('dashboard/layout/sidebar', $data);
        $this->load->view('dashboard/admin/layanan', $data);
        $this->load->view('dashboard/layout/footer', $data);
    }
    public function tambah_layanan()
    {
        $data = [
            'nama_layanan' => $this->input->post('nama_layanan'),
        ];

        $this->db->insert('jenis_layanan', $data);
        $this->session->set_flashdata('tambah_layanan', 'Layanan Berhasil Di Tambahkan');
        redirect('admin/layanan');
    }

    public function edit_layanan()
    {
        $data = [
            'nama_layanan' => $this->input->post('nama_layanan'),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('jenis_layanan', $data);
        $this->session->set_flashdata('edit_layanan', 'Layanan Berhasil Di Ubah');
        redirect('admin/layanan');
    }

    public function hapus_layanan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jenis_layanan');
        $this->session->set_flashdata('hapus_layanan', 'Layanan Berhasil Di Hapus');
        redirect('admin/layanan');
    }


    public function tambah_sub_layanan()
    {
        $data = [
            'nama_sub' => $this->input->post('nama_sub_layanan'),
            'id_layanan' => $this->input->post('jenis_layanan'),
            'uraian' => $this->input->post('uraian')

        ];

        $this->db->insert('sub_layanan', $data);
        $this->session->set_flashdata('tambah_sub_layanan', 'Layanan Berhasil Di Tambahkan');
        redirect('admin/layanan');
    }
    public function sub_layanan_upload()
    {
        if (isset($_FILES['upload']['tmp_name'])) {
            $file = $_FILES['upload']['tmp_name'];
            $filename = $_FILES['upload']['name'];
            $fileNameArray = explode('.', $filename);
            $fileExtension = end($fileNameArray);
            $newFileName = rand() . '.' . $fileExtension;
            $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg', 'JPG', 'GIF', 'PNG', 'JPEG');
            if (in_array($fileExtension, $allowedfileExtensions)) {
                move_uploaded_file($file, 'assets/img/sub-layanan/' . $newFileName);
                $CKEditorFuncNum = $_GET['CKEditorFuncNum'];
                $url = base_url() . 'assets/img/sub-layanan/' . $newFileName;
                $message = "";
                echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message');</script>";
            }
        }
    }

    public function edit_sub_layanan()
    {
        $data = [
            'nama_sub' => $this->input->post('nama_sub_layanan'),
            'id_layanan' => $this->input->post('jenis_layanan'),
            'uraian' => $this->input->post('uraian')

        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('sub_layanan', $data);
        $this->session->set_flashdata('edit_sub_layanan', 'Layanan Berhasil Di Ubah');
        redirect('admin/layanan');
    }
    public function hapus_sublayanan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sub_layanan');
        $this->session->set_flashdata('hapus_layanan', 'Layanan Berhasil Di Hapus');
        redirect('admin/layanan');
    }


    public function profile()
    {
        $data = [
            'title' => 'Profile',
            'user' => $this->m_admin->get_profile(),
        ];

        $this->load->view('dashboard/layout/header', $data);
        $this->load->view('dashboard/layout/navbar', $data);
        $this->load->view('dashboard/layout/sidebar', $data);
        $this->load->view('dashboard/admin/profile', $data);
        $this->load->view('dashboard/layout/footer', $data);
    }

    function update_profil()
    {
        if ($this->input->is_ajax_request() == true) {

            $this->form_validation->set_rules('nama', 'Nama', 'trim|required', ['required' => 'Nama Tidak Boleh Kosong']);
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', ['required' => 'Email Tidak Boleh Kosong', 'valid_email' => 'Email Tidak Valid']);


            if ($this->form_validation->run() == false) {
                $response = array(

                    'nama_error' => form_error('nama'),
                    'email_error' => form_error('email'),
                );
            } else {
                $data1 = [
                    'nama' => $this->input->post('nama'),
                ];
                $this->db->where('user_id', $this->session->userdata('id_user'));
                $this->db->update('admin', $data1);

                $data2 = [
                    'email' => $this->input->post('email'),

                ];

                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('user', $data2);

                $response = array(
                    'sukses' => 'Data Berhasil Di Ubah',
                );
            }


            echo json_encode($response);
        }
    }


    public function change_photo()
    {
        if ($this->input->is_ajax_request() == true) {
            $data =  ['user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()];
            $file_name = $data['user']['id']  . time();
            $config['upload_path'] = './assets/img/profile/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = '5600';
            $config['file_name'] = $file_name;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {

                $old_image = $data['user']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }
                $upload = array('uploads' => $this->upload->data());
                $datas = [
                    'image' => $upload['uploads']['file_name'],
                ];

                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('user', $datas);
                $response = array(
                    'sukses' => 'Foto Berhasil Di Ubah',
                );
            } else {


                $response = array(
                    'error' => $this->upload->display_errors(),
                );
            }
            echo json_encode($response);
        }
    }
}

/* End of file Admin.php */
