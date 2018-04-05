<?php
  class detyra2 extends CI_Controller{
    public function index(){
      $this->load->view('detyra2');
    }
    public function detyra3a(){
      $this->load->view('detyra3a');
    }
    public function detyra3b(){
      $this->load->view('detyra3b');
    }
    public function detyra4(){
      $CI=get_instance();
      $data['cord']=$CI->db->select('*')->from('detyra4')->get()->result();
      $this->load->view('detyra4',$data);
    }
    public function deleteNode(){
      $CI=get_instance();
      $CI->db->where('id',$this->input->post('node_id'))->delete('detyra4');
    }
    public function detyra5(){
      $this->load->view('detyra5');
    }
    public function detyra6(){
      $CI=get_instance();
      $data['address']=$CI->db->select('*')->from('detyra6')->get()->result();
      $this->load->view('detyra6',$data);
    }
  }
 ?>
