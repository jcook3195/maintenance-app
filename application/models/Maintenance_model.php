<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  /**
    * Maintenance model to handle db functions for maintenance.
    *
    * Version 1.0
    */

    class Maintenance_model extends CI_Model {

      // Constructor
      public function __construct() {
        parent:: __construct();
        // Load custom form helper for all functions
        $this->load->helper('custom_form_helper');
      }

      // Function to get all maintenance requests
      public function get_maintenance() {

      }

      // Function to add maintenance request
      public function add_maintenance($data) {
        $this->db->insert('maintenance_requests', $data);
      }

      // Function to get maintenance record by id
      public function get_maintenance_details_by_id($maint_id) {

      }

      // Get all locations
      public function get_locations() {
        $this->db->select('*');
        $this->db->from('location');
        $results = $this->db->get();

        if($results->num_rows() > 0) {
          foreach($results->result_array() as $row) {
            $locations[] = array(
              'id'                => $row['id'],
              'location'          => $row['location']
            );
          }
        }

        return $locations;
      }

      // Get all service types
      public function get_service_types() {
        $this->db->select('*');
        $this->db->from('service_type');
        $results = $this->db->get();

        if($results->num_rows() > 0) {
          foreach($results->result_array() as $row) {
            $service_types[] = array(
              'id'                    => $row['id'],
              'service_type'          => $row['service_type']
            );
          }
        }

        return $service_types;
      }

      // Get location by id
      public function get_location_by_id($loc_id) {
        $this->db->select('*');
        $this->db->from('location');
        $this->db->where('id', $loc_id);
        $results = $this->db->get();

        if($results->num_rows() > 0) {
          foreach($results->result_array() as $row) {
            $locations[] = array(
              'id'                => $row['id'],
              'location'          => $row['location']
            );
          }
        }

        return $locations;
      }

      // Get service types by id
      public function get_service_type_by_id($type_id) {
        $this->db->select('*');
        $this->db->from('service_type');
        $this->db->where('id', $type_id);
        $results = $this->db->get();

        if($results->num_rows() > 0) {
          foreach($results->result_array() as $row) {
            $service_types[] = array(
              'id'                    => $row['id'],
              'service_type'          => $row['service_type']
            );
          }
        }

        return $service_types;
      }
    }
