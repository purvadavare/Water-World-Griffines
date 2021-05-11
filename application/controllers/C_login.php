<?php
class C_login extends CI_Controller{
  function __construct(){
    parent::__construct();
    
  }

  function index(){
    $this->load->view('V_adminLogin');
  }

  function auth(){
    $username    = $this->input->post('role_username',TRUE);
    $password = $this->input->post('role_password',TRUE);
    $this->load->model('M_adminHome');
    $validate = $this->M_adminHome->validate($username,$password);
    
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $name  = $data['role_username'];
        $level = $data['role_level'];
        $sesdata = array(
            'username'  => $name,
            'level'     => $level,
            'logged_in' => TRUE
        );
        
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($level === '1'){
            redirect('C_adminHome/admin');
        }elseif($level === '2'){
            redirect('C_adminHome/homePage');
        }else{
            redirect('C_login');
        }
    }else{
        echo $this->session->set_flashdata('msg','Username or Password is Wrong');
        redirect('C_login');
    }
  }

  function logout(){
      $this->session->sess_destroy();
      redirect('C_login');
  }

}
