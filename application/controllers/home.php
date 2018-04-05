<?php
  class Home extends CI_Controller{
    public function index($page=''){

      $config['center'] = '41.3273, 19.8187';
      $config['zoom'] = 'auto';
      $this->googlemaps->initialize($config);

      $data['page']=$page;
      if($page==''){
        $data['maincontent']='home';
        $data['jobs']=$this->Job_model->get_home_jobs();


        $data['map'] = $this->googlemaps->create_map();

      }
      else if($page=='jobs'){
        $data['maincontent']='jobs';

        if(empty($_POST)){
          $searchterms='';
          $city='default';
          $category='default';
        }
        else{
          $searchterms=htmlentities($this->input->post('searchterms'));
          $city=$this->input->post('city');
          $category=$this->input->post('category');
        }
        $data['jobs']=$this->Job_model->get_search_jobs($searchterms,$city,$category);
        foreach($data['jobs'] as $job){
          $marker = array();
          $marker['position'] = $job->latitude.','.$job->longtitude;
          $marker['infowindow_content']='<h5>'.$job->company_name.' - '.$job->title.'</h5><hr><img  width="300" src="'.base_url().'assets/images/job'.$job->id.'.'.$job->ext.'" alt="No image"/>';
          $this->googlemaps->add_marker($marker);
        }

        $data['map'] = $this->googlemaps->create_map();
      }
      else if($page=='register'){
        $data['maincontent']='register';
        $this->form_validation->set_rules('first_name','First Name', 'trim|required');
  			$this->form_validation->set_rules('last_name','Last Name','trim|required');
  			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
  			$this->form_validation->set_rules('username','Username','trim|required|min_length[4]|max_length[16]');
  			$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]');
  			$this->form_validation->set_rules('password2','Confirm Password','trim|required|matches[password]');

        if($this->form_validation->run() == FALSE){
          $data['page']=$page;
          $data['maincontent'] = 'register';

          $data['map'] = $this->googlemaps->create_map();

        }
        else{
          if($this->User_model->register()){
            $this->session->set_flashdata('registered','You are now registered and can login');
  					redirect('home');
          }
          else{
            $this->session->set_flashdata('signupfail','The username or email you used already has an account.');
            redirect('home/register');
          }
        }
      }
      else if($page=='signin'){
        $data['maincontent']='login';
        $this->form_validation->set_rules('username','Username','trim|required|min_length[4]|max_length[16]');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]');

        if($this->form_validation->run() == FALSE){
          $data['page']='signin';
          $data['maincontent'] = 'login';

          $data['map'] = $this->googlemaps->create_map();

        } else {
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $user_id= $this->User_model->login($username,$password);
          if($user_id){
            $data = array(
              'user_id' 	=> $user_id->id,
              'username' 	=> $user_id->username,
              'logged_in' => true,
            );
            $this->session->set_userdata($data);
            redirect('home');
          }else{
            $this->session->set_flashdata('fail_login','Sorry the login info is not correct');
            redirect('home/signin');
          }
        }
      }
      else if($page=='logout'){
        $data['maincontent']='';

        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();

        redirect('home');
      }
      else if($page=='addjob'){
        if($this->session->userdata('logged_in')){

          $this->form_validation->set_rules('company_name','Company Name', 'trim|required');
    			$this->form_validation->set_rules('title','Job Title','trim|required');
    			$this->form_validation->set_rules('city','Location','trim|required');
    			$this->form_validation->set_rules('type','Type','trim|required');
    			$this->form_validation->set_rules('category','Category','trim|required');
    			$this->form_validation->set_rules('description','Job Description','trim|required|min_length[20]|max_length[1000]');

          if($this->form_validation->run()==FALSE){
            $data['maincontent']='addjob';

            $marker = array();
            $marker['position'] = '41.3273, 19.8187';
            $marker['draggable'] = true;
            $marker['ondragend'] = "$('input[name=\"latitude\"]').val(event.latLng.lat());$('input[name=\"longtitude\"]').val(event.latLng.lng());";
            $this->googlemaps->add_marker($marker);

            $data['map'] = $this->googlemaps->create_map();
          }
          else{
            if($this->input->post('type')=='default' || $this->input->post('category')=='default' || $this->input->post('city')=='default'){
              $data['maincontent']='addjob';
              $this->session->set_flashdata('typefail','You have to select a job type.');
              $this->session->set_flashdata('categoryfail','You have to select a job category.');
              $this->session->set_flashdata('cityfail','You have to select a job city.');

              $data['map'] = $this->googlemaps->create_map();
            }
            else{
              $insertinfo=$this->Job_model->insertdata($this->session->userdata('user_id'));
              if($insertinfo){
                $this->session->set_flashdata('successfuladd','You have successfully added a job.');
                redirect('home');
              }
              else{
                redirect('home/addjob');
              }
            }
          }
        }
        else{
          redirect('home');
        }
      }
      else if($page='myjobs'){
        if($this->session->userdata('logged_in')){
          $data['page']='';
          $data['maincontent']='myjobs';
          $data['myjobs']=$this->Job_model->get_myjobs($this->session->userdata('user_id'));
          $data['map'] = $this->googlemaps->create_map();
        }
        else{
          redirect('home');
        }
      }
      else {
        redirect('home');
      }
      $this->load->view('layout',$data);
    }

    public function delete($id){
      if($this->session->userdata('logged_in')){
        $this->Job_model->delete_job($id);
        redirect('home/myjobs');
      } else{
        redirect('home');
      }
    }
    public function details($id){
      $config['center'] = '41.3273, 19.8187';
      $config['zoom'] = 'auto';
      $this->googlemaps->initialize($config);

      $data['page']='';
      $data['maincontent']='details';
      $data['job']=$this->Job_model->get_job($id);

      $marker = array();
      $marker['position'] = $data['job']->latitude.','.$data['job']->longtitude;
      $marker['infowindow_content']='<h5>'.$data['job']->company_name.' - '.$data['job']->title.'</h5><hr><img  width="300" src="'.base_url().'assets/images/job'.$data['job']->id.'.'.$data['job']->ext.'" alt="No image"/>';
      $this->googlemaps->add_marker($marker);
      $data['map'] = $this->googlemaps->create_map();

      $this->load->view('layout',$data);
    }
  }

?>
