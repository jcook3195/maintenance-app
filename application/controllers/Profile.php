<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  /**
    * Profile controller to handle requests by all users.
    *
    * Version 1.0
    */

  class Profile extends CI_Controller {

    // Constructor
    public function __construct() {
      parent:: __construct();

      // Load profile model
      $this->load->model('Profile_model');
    }

    public function logout() {
      session_destroy();
      $this->session->set_flashdata("success", "You have logged out.");
      redirect("welcome");
    }

    public function login() {
      if(isset($_POST['login'])) {
        // Send the inputs over to verify and login
        $login = $this->Profile_model->login($_POST['uname'], $_POST['pass']);

        // Login if true
        if($login) {
          // Redirect to landing page
          $this->session->set_flashdata("success", "Welcome " . $_POST['uname'] . "!");
          redirect('welcome/landing');
        } else {
          $this->session->set_flashdata("error", "Incorrect login information provided.");
          redirect("welcome", "refresh");
        }
      }
    }

    public function management() {
      if(isset($_POST['update-profile'])) {
        // do something
      }
  		// Set the data to be passed to the view
  		$data = array(
  			'view'          => 'profile/management',
  			'title'         => 'Manage Profile'
  		);
  		// Load the view
  		$this->load->view('templates/template', $data);
    }

    public function update_information() {
      if(isset($_POST['update-profile'])) {
        // do something
      }
      // Set the data to be passed to the view
      $data = array(
        'view'          => 'profile/management',
        'title'         => 'Manage Profile'
      );
      // Load the view
      $this->load->view('templates/template', $data);
    }

  }

?>
