<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  /**
    * Maintenance controller to handle all Maintenance related requests.
    *
    * Version 1.0
    */

    class Maintenance extends CI_Controller {

      // Constructor
      public function __construct() {
        parent:: __construct();

        // Load the maintenance model
        $this->load->model('Maintenance_model');
      }

      // Add maintenance
      public function add_maintenance() {
        echo "<script>alert('".$_POST['comp_date'].", ".$_POST['start_date']."');</script>";
        // if add maintenance has been submitted
        if(isset($_POST['add-maintenance'])) {
          // Create data to pass to model
          $form_data = array(
            'complete'        => $_POST['status'],
            'description'     => $_POST['add_maint_description'],
            'req_date'        => date('Y-m-d'),
            'comp_date'       => $_POST['comp_date'] = '' ? date('Y-m-d', strtotime('0000-00-00')) : Date('Y-m-d', strtotime($_POST['comp_date'])),
            'start_date'      => $_POST['start_date'] = '' ? date('Y-m-d', strtotime('0000-00-00')) : Date('Y-m-d', strtotime($_POST['start_date'])),
            'location'        => $_POST['location'],
            'equipment'       => $_SESSION['equip_id'],
            'service_type'    => $_POST['service_type'],
            'comp_by'         => $_POST['comp_by'] ?? "NULL"
          );

          // Pass data to model for creation
          $this->Maintenance_model->add_maintenance($form_data);
          $this->session->set_flashdata("success", "New Maintenance added.");
          redirect('equipment/management');
        }
      }

    }
?>
