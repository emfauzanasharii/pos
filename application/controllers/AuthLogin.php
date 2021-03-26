<?php
class AuthLogin extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('mlogin');
        $this->load->helper('form');
    }
    function index(){
        $this->load->view('admin/v_login');
    }
    function cekuser(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $u=$username;
        $p=$password;
        
        $cadmin=$this->mlogin->cekadmin($u,$p);
        // var_dump($cadmin->num_rows());
        // die();
        if ($cadmin->num_rows()>0) {
            $this->session->set_userdata('masuk',true);
            $this->session->set_userdata('user',$u);
             $xcadmin=$cadmin->row_array();

             if ($xcadmin['user_level']=='1') {
                  $this->session->set_userdata('akses','1');
                 $idadmin=$xcadmin['user_id'];
                 $user_nama=$xcadmin['user_nama'];
                 $this->session->set_userdata('idadmin',$idadmin);
                 $this->session->set_userdata('nama',$user_nama);
                  redirect('AuthLogin/berhasillogin');
             }elseif ($xcadmin['user_level']=='2') {
                 $this->session->set_userdata('akses','2');
                 $idadmin=$xcadmin['user_id'];
                 $user_nama=$xcadmin['user_nama'];
                 $this->session->set_userdata('idadmin',$idadmin);
                 $this->session->set_userdata('nama',$user_nama);
                  redirect('AuthLogin/berhasillogin');
             }
        } else {
            redirect('AuthLogin/gagallogin');
        }
        
    }
        function berhasillogin(){
            redirect('welcome');
        }
        function gagallogin(){
            $url=base_url('AuthLogin');
            echo $this->session->set_flashdata('msg','Username Atau Password Salah');
            redirect($url);
        }
        function logout(){
            $this->session->sess_destroy();
            $url=base_url('AuthLogin');
            redirect($url);
        }
}