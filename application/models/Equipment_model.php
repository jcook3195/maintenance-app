<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  /**
    * Equipment model to handle db functions for equipment.
    *
    * Version 1.0
    */

    class Equipment_model extends CI_Model {

      // Constructor
      public function __construct() {
        parent:: __construct();
        // Load form helper to be used in all functions
        $this->load->helper('custom_form_helper');
      }

      // Get all equipment
      public function get_equipment() {
        $this->db->select('*');
        $this->db->from('equipment');
        $this->db->order_by('pm_num');
        $results = $this->db->get();

        if($results->num_rows() > 0) {
          foreach($results->result_array() as $row) {
            $equipment[] = array(
              'id'                => $row['id'],
              'pm_num'            => $row['pm_num'],
              'description'       => $row['description'],
              'purchase_date'     => $row['purchase_date'],
              'price'             => $row['price'],
              'model_num'         => $row['model_num'],
              'serial_num'        => $row['serial_num'],
              'asset_num'         => $row['asset_num'],
              'mobility_type'     => $row['mobility_type']
            );
          }
        }

        return $equipment;
      }

      // Add equipment
      public function add_equipment($data) {
        // prepare data to be inserted
        $data_prepped = array(
          'pm_num'              => trim($data['pm_num']),
          'description'         => $data['description'],
          'purchase_date'       => $data['purchase_date'],
          'price'               => $data['price'],
          'model_num'           => trim($data['model_num']),
          'serial_num'          => trim($data['serial_num']),
          'asset_num'           => trim($data['asset_num'])
        );

        // Run insert query
        $this->db->insert('equipment', $data_prepped);
      }

      // Get equipment info by id
      public function get_equipment_details_by_id($equip_id) {
        $this->db->select('*');
        $this->db->from('equipment');
        $this->db->where('id', $equip_id);
        $results = $this->db->get();
        
        if($results->num_rows() > 0) {
          foreach($results->result_array() as $row) {
            $equipment[] = array(
              'id'                => $row['id'],
              'pm_num'            => $row['pm_num'],
              'description'       => $row['description'],
              'purchase_date'     => $row['purchase_date'],
              'price'             => $row['price'],
              'model_num'         => $row['model_num'],
              'serial_num'        => $row['serial_num'],
              'asset_num'         => $row['asset_num'],
              'mobility_type'     => $row['mobility_type']
            );
          }
        }

        return $equipment;
      }

      // Get maintenance records for single equipment
      public function get_maint_history($equip_id) {
        $this->db->select('*');
        $this->db->from('maintenance_requests');
        $this->db->where('equipment', $equip_id);
        $this->db->order_by('complete', 'ASC');
        $this->db->order_by('start_date', 'DESC');
        $this->db->order_by('comp_date', 'DESC');
        $results = $this->db->get();

        if($results->num_rows() > 0) {
          foreach($results->result_array() as $row) {
            $requests[] = array(
              'id'                => $row['id'],
              'complete'          => $row['complete'],
              'description'       => $row['description'],
              'req_date'          => $row['req_date'],
              'comp_date'         => $row['comp_date'],
              'start_date'        => $row['start_date'],
              'location'          => $row['location'],
              'equipment'         => $row['equipment'],
              'service_type'      => $row['service_type'],
              'comp_by'           => $row['comp_by']
            );
          }
        } else {
          $requests = 0;
        }

        return $requests;
      }

    }

  ?>
