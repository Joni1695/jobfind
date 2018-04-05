<?php
  function get_color_h($id){
    $CI = get_instance();
    $color = $CI->Job_model->get_color($id);
    return $color;
  }
  function get_location_h($id){
    $CI = get_instance();
    $location = $CI->Job_model->get_location($id);
    return $location;
  }
  function get_provinces_h(){
    $CI=get_instance();
    $locations =$CI->Job_model->get_pronvinces();
    return $locations;
  }
  function get_cities_h($id){
    $CI=get_instance();
    $locations =$CI->Job_model->get_cities($id);
    return $locations;
  }
  function get_categories_h(){
    $CI=get_instance();
    $locations =$CI->Job_model->get_categories();
    return $locations;
  }
?>
