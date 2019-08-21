<?php

  /**
  * Load header and footer templates, and place views for body pages inside
  */

  if(!isset($p_lvls)) {
    $p_lvls = '';
  }

  if(!isset($equipment)) {
    $equipment = '';
  }

  if(!isset($users)) {
    $users = '';
  }

  if(!isset($locations)) {
    $locations = '';
  }

  if(!isset($service_types)) {
    $service_types = '';
  }

  $extra_data = array(
    'p_lvls'            => $p_lvls,
    'equipment'         => $equipment,
    'users'             => $users,
    'locations'         => $locations,
    'service_types'     => $service_types
  );

  $this->load->view('templates/header', $title);
  $this->load->view($view, $extra_data);
  $this->load->view('templates/footer');

?>
