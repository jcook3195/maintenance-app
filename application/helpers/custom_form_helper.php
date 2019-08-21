<?php

  /**
    * General helper functions to help with form handling data
    */

    // Use blowfish to hash passwords
    function blowfish_hash($password) {
      return password_hash($password, PASSWORD_BCRYPT);
    }

    // Verify that the entered password matches the hashed password
    function verify_password($entered_password, $correct_password) {
      if(password_verify($entered_password, $correct_password)) {
        return true;
      } else {
        return false;
      }
    }

    // Make sure a valid email is entered
    function verify_email($email) {
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
      } else {
        return true;
      }
    }
