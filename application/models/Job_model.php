<?php
  class Job_model extends CI_Model{
    public function get_home_jobs(){
      $result=$this->db->select('*')->from('jobs')->order_by('created_at','DESC')->limit(8)->get();
      return $result->result();
    }
    public function get_search_jobs($search='',$city='default',$category='default'){
      $search=explode(' ',trim($search));
      $first=true;
      $string="SELECT * FROM jobs ";
      if($search[0]!=''){
        $string=$string.'WHERE (';
        $first=false;
        for($i=0;$i<sizeof($search);$i++){
          if($i!=sizeof($search)-1) $string=$string."company_name LIKE '%".$search[$i]."%' OR title LIKE '%".$search[$i]."%' OR";
          else $string=$string."company_name LIKE '%".$search[$i]."%' OR title LIKE '%".$search[$i]."%')";
        }
      }
      if($search[0]=='') $prefix='';
      else $prefix=' AND ';
      if($city!='default' && $first==true){
        $string=$string.'WHERE '.$prefix."fk_city_id='".$city.'\'';
        $first=false;
      }
      else if($city!='default' && $first==false) $string=$string.$prefix."fk_city_id='".$city.'\'';
      if($category!='default' && $first==true){
        $string=$string.'WHERE '.$prefix." fk_category_id='".$category.'\'';
      }
      else if($category!='default' && $first==false) $string=$string.$prefix." fk_category_id='".$category.'\'';
      $string=$string.' ORDER BY created_at DESC';
      $result=$this->db->query($string);
      return $result->result();

    }
    public function get_color($id){
      $color=$this->db->select('*')->from('type')->where('id',$id)->get();
      return $color->row();
    }
    public function get_location($id){
      $location=$this->db->select('*')->from('city')->where('id',$id)->get();
      return $location->row();
    }
    public function get_pronvinces(){
      $result=$this->db->select('*')->from('province')->order_by('name','ASC')->get();
      return $result->result();
    }
    public function get_cities($id){
      $result=$this->db->select('*')->from('city')->where('fk_province_id',$id)->order_by('city_name','ASC')->get();
      return $result->result();
    }
    public function get_categories(){
      $result=$this->db->select('*')->from('categories')->order_by('category_name','ASC')->get();
      return $result->result();
    }
    public function get_job($id){
      $result=$this->db->select('*')->from('jobs')->where('id',$id)->get();
      return $result->row();
    }
    public function insertdata($id){
      $image=$_FILES['image']['name'];
      $allowedexts=array('png','jpg','jpeg');
      $ext= strtolower(substr($image,strrpos($image,'.')+1));
      if(in_array($ext,$allowedexts) === false ){
        $this->session->set_flashdata('badext','The allowed image types are png, jpg and jpeg.');
        return false;
      }
      $data=array(
        'fk_user_id'      => $id,
        'fk_category_id'  => htmlentities($this->input->post('category')),
        'fk_city_id'      => htmlentities($this->input->post('city')),
        'fk_type_id'      => htmlentities($this->input->post('type')),
        'company_name'    => htmlentities($this->input->post('company_name')),
        'title'           => htmlentities($this->input->post('title')),
        'description'     => htmlentities($this->input->post('description')),
        'ext'             =>$ext
      );
      if($this->input->post('latitude')!=41.3273) $data['latitude']=$this->input->post('latitude');
      if($this->input->post('longtitude')!=19.8187) $data['longtitude']=$this->input->post('longtitude');
      $info=$this->db->insert('jobs',$data);
      $get_id=$this->db->select('id')->from('jobs')->order_by('id','DESC')->get()->result();
      if(move_uploaded_file($_FILES['image']['tmp_name'],'assets/images/job'.$get_id[0]->id.'.'.$ext)==false){
        echo "Deshtoi";
        die();
      }
      return $info;
    }
    public function get_myjobs($id){
      $results=$this->db->select('*')->from('jobs')->where('fk_user_id',$id)->get();
      return $results->result();
    }
    public function delete_job($id){
      $job=$this->Job_model->get_job($id);
      if($job->fk_user_id==$this->session->userdata('user_id')){
        $this->db->where('id',$id)->delete('jobs');
        unlink('assets/images/job'.$id.'.png');
        unlink('assets/images/job'.$id.'.jpg');
        unlink('assets/images/job'.$id.'.jpeg');
      }
    }
  }
?>
