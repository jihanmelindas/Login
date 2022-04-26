<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
 
  function index(){
    //Allowing access to admin only
      if($this->session->userdata('role_id')==='1'){
          $this->load->view('dashboard_view');
      }else{
          echo "Access Denied";
      }
 
  }
 
  function staff(){
    //Allowing access to staff only
    if($this->session->userdata('role_id')==='2'){
      $this->load->view('dashboard_view');
    }else{
        echo "Access Denied";
    }
  }
 
  function author(){
    //Allowing access to author only
    if($this->session->userdata('role_id')==='3'){
      $this->load->view('dashboard_view');
    }else{
        echo "Welcome";
    }
  }
 
}