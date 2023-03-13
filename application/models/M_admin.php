<?php



defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{


    public function get_user()
    {
        $this->db->select('*', 'user.email', 'user.status');
        $this->db->from('instansi');
        $this->db->join('user', 'user.id = instansi.user_id');
        return $this->db->get()->result();
    }


    public function detail_user($id)
    {
        $this->db->select('*', 'user.email', 'user.status');
        $this->db->from('instansi');
        $this->db->join('user', 'user.id = instansi.user_id');
        $this->db->where('instansi.user_id', $id);
        return $this->db->get()->row();
    }

    public function get_sub_layanan()
    {
        $this->db->select('* , jenis_layanan.id as layanan_id, sub_layanan.id as sub_layanan_id, jenis_layanan.nama_layanan ');
        $this->db->from('sub_layanan');
        $this->db->join('jenis_layanan', 'jenis_layanan.id = sub_layanan.id_layanan');
        return $this->db->get()->result();
    }


    public function get_profile()
    {
        $this->db->select('*', 'user.email', 'user.status', 'user.image');
        $this->db->from('admin');
        $this->db->join('user', 'user.id = admin.user_id');
        return $this->db->get()->row();
    }
}

/* End of file M_admin.php */
