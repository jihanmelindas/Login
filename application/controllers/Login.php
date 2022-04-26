<?php
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('login_model');
  }
 
  function index(){
    $this->load->view('login_view');
  }
 
  function auth(){
    $email    = $this->input->post('email',TRUE);
    $password = ($this->input->post('password',TRUE));
    $validate = $this->login_model->validate($email,$password);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $name  = $data['name'];
        $email = $data['email'];
        $role_id = $data['role_id'];
      
        $sesdata = array(
            'username'  => $name,
            'email'     => $email,
            'role_id'     => $role_id,
            'logged_in' => TRUE
          
        );
       
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($role_id == 1){
            redirect('page');
 
        // access login for staff
        }elseif($role_id == 2){
            redirect('page/staff');
 
        // access login for author
        }else{
            redirect('page/author');
        }
    }else{
        echo $this->session->set_flashdata('msg','Email atau Password yang anda masukkan Salah   ');
        redirect('login');
    }
  }
 
  function logout(){
      $this->session->sess_destroy();
      redirect('login');
  }
 
}