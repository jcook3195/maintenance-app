<?php

  /**
    * General helper functions to help with database functions
    */

    // Get location from id
    function get_location_by_id($loc_id) {
      $this->db->select('*');
      $this->db->from('locations');
      $this->db->where('id', $loc_id);
      $results = $this->db->get();

      if($results->num_rows() > 0) {
        $location = $results['location'];
      } else {
        $location = 'N/A';
      }

      return $location;
    }

    // Get equipment from id
    function change_default_zero_date($date) {
      $format_date = '';
      echo "<script>alert('$date');</script>";
    if($date == '1970-01-01') {
        echo "<script>alert('here');</script>";
        $format_date = "None entered.";
      } else {
        $format_date = date("M d, Y", strtodate('1970-01-01'));
      }
      //echo "<script>alert('here');</script>";
      return $format_date;
    }

    // Get service type from id

    // Get user from id
