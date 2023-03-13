<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data = array(
            'title' => 'Home',
        );
        $this->load->view('front/layout/header', $data);
        $this->load->view('front/home/home', $data);
        $this->load->view('front/layout/footer', $data);
    }
}

/* End of file Home.php */
