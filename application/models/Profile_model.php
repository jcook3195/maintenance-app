<?php

  /**
    * Auth model to handle DB interactions invloving user accounts.
    *
    * Version 1.0
    */

  class Profile_model extends CI_Model {

    // Constructor
    public function __construct() {
      parent:: __construct();

      // Load form helpers
      $this->load->helper('custom_form_helper');
    }

    // Login function
    public function login($username, $password) {
      // Run validation rules
      $this->form_validation->set_rules('uname', 'Username', 'required');
      $this->form_validation->set_rules('pass', 'Password', 'required');

      if($this->form_validation->run() == TRUE) {
        // check for the user in the database
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('username'=>$username));
        $results = $this->db->get();

        $user = $results->row();

        // Get the password from the user
        $correct_password = $user->pass;

        // Use a function in the helper  to check if the hashed passwords match
        if(verify_password($password, $correct_password)) {
          // Set the rest of the session variables
          $_SESSION['logged-in'] = TRUE;
          $_SESSION['username'] = $user->username;
          $_SESSION['first_name'] = $user->first_name;
          $_SESSION['last_name'] = $user->last_name;
          $_SESSION['id'] = $user->id;
          $_SESSION['p_lvl'] = $user->permission_lvl;

          if($_SESSION['p_lvl'] == 3) {
            $_SESSION['is_admin'] = true;
          } else {
            $_SESSION['is_admin'] = false;
          }

          // Return true to allow login
          return TRUE;
        } else {
          return FALSE;
        }
      }
    }

    // Update password function

    // Update email function

    // Update username function

    // Update name function

    // Change user permissions

    // Remove user

  }

?>
