<?php
  class User_model extends CI_Model{
    public function register(){
			$data = array(
			'first_name' => htmlentities($this->input->post('first_name')),
			'last_name' => htmlentities($this->input->post('last_name')),
			'email' 	=> htmlentities($this->input->post('email')),
			'username' => htmlentities($this->input->post('username')),
			'password' => htmlentities(md5($this->input->post('password'))),
      'access' => 'normal'
			);
			if($this->db->insert('users', $data)) return true;
      else return false;
		}
    public function login($username,$password){
			//Validate
			$this->db->where('username', htmlentities($username));
			$this->db->where('password', md5(htmlentities($password)));

			$result = $this->db->get('users');
			if($result->num_rows() == 1){
				return $result->row();
			}else{
				return false;
			}
		}
  }
?>
