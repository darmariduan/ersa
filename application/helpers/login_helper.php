<?php


defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('check_login')) {

    function check_login($role = null)
    {
        $CI = &get_instance();
        if (!$CI->session->userdata('email')) {
            redirect('auth'); // arahkan ke halaman login jika belum login
        }
        if ($role && !$CI->session->userdata('role_id') === $role) {
            redirect('auth/blocked'); // arahkan ke halaman error jika tidak sesuai role
        }
    }
}
