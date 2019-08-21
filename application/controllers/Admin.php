<?php

  /**
    * Admin controller to handle superuser specific reuests.
    *
    * Version 1.0
    */

    class Admin extends CI_Controller {

      public function __construct() {
        parent:: __construct();
        // load model to be used in all functions
        $this->load->model('Admin_model');
      }

      // Admin index
      public function index() {
        // Get permissions
        $permissions = $this->Admin_model->get_permissions();

        // Set the data to be passed to the view
        $data = array(
          'view'          => 'admin/management',
          'title'         => 'Admin',
          'p_lvls'        => $permissions
        );

        if(isset($_SESSION['logged-in']) && $_SESSION['is_admin']) {
          // Load the view
          $this->load->view('templates/template', $data);
        } else {
          // Set error flashdata
          $this->session->set_flashdata("error", "Page not found.");
          if(isset($_SESSION['logged-in'])) {
            // Redirect to landing
            redirect('welcome/landing');
          } else {
            // Redirect to welcome
            redirect('welcome');
          }
        }
      }

      // Add new user
      public function add_user() {
        // If the add-user button has been submitted
        if(isset($_POST['add-user'])) {
          // Create data array of inputs to be passed to model
          $form_data = array(
            'fname'       => $_POST['add_fname'],
            'lname'       => $_POST['add_lname'],
            'uname'       => $_POST['add_username'],
            'email'       => $_POST['add_email'],
            'pass'        => $_POST['add_password'],
            'cpass'       => $_POST['confirm_password'],
            'plvl'        => $_POST['permission_lvl']
          );

          // Run add user function in model
          if($this->Admin_model->verify_add_user($form_data) == FALSE) {
            // Set error flashdata
            $this->session->set_flashdata("error", "There was an error adding the user.");
            // Load the view
            redirect('admin');
          } else {
            // Add the new user
            $this->Admin_model->add_user($form_data);
            // Set success flashdata
            $this->session->set_flashdata("success", "The new user was added.");
            // Load the view
            redirect('admin');
          }
        }

      }

      // Reset other users passwords

      // Change other users username

      // Change other users emails

      // Change other users name

      // Remove users
    }

?>
