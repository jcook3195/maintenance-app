<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  /**
    * Equipment controller to handle all Equipment related requests.
    *
    * Version 1.0
    */

    class Equipment extends CI_Controller {

      // Constructor
      public function __construct() {
        parent:: __construct();

        // Load db helper
        $this->load->helper('db_helper');

        // Load equipment model
        $this->load->model('Equipment_model');
        // Load admin model
        $this->load->model('Admin_model');
        // Load the maintenance model
        $this->load->model('Maintenance_model');
      }

      // Default view
      public function management() {

        // Get equipment
        $equipment = $this->Equipment_model->get_equipment();
        // Get the users
        $users = $this->Admin_model->get_users();
        // Get the locations
        $locations = $this->Maintenance_model->get_locations();
        //Get the service types
        $service_types = $this->Maintenance_model->get_service_types();

        // Set data to be passed to the view
        $data = array(
          'view'          => 'equipment/management',
          'title'         => 'Manage Equipment',
          'equipment'     => $equipment,
          'users'         => $users,
          'locations'     => $locations,
          'service_types' => $service_types
        );

        // Load the view
        $this->load->view('templates/template', $data);
      }

      // Load data into modal
      public function equipment_details() {
        $equipment_data = $this->input->post('equipData');

        if(isset($equipment_data) and !empty($equipment_data)) {
          // Set session variable to use for adding maintenance
          $_SESSION['equip_id'] = $equipment_data;
          // Get maintenance records
          $records = $this->Equipment_model->get_maint_history($equipment_data);
          // Get extra equipment information
          $extra_deets = $this->Equipment_model->get_equipment_details_by_id($equipment_data);
          // Init an output variable
          $output = '';

          foreach($extra_deets as $row) {
            // Checking if data and price exist
            $date = $row['purchase_date'] == '' ? "N/A" : $row['purchase_date'];
            $price = $row['price'] == '' ? "N/A" : $row['price'];

            // Displaying date and price
            $output .= "<p><strong>Purchase Date: </strong>$date</p>";
            $output .= "<p><strong>Purchase Price: </strong>$price</p>";
          }

          // Output the extra deets
          echo $output;

          // Output maintenance history if there is any
          if($records == 0) {
            echo "No maintenance history for this equipment.";
          } else {

            $template = array('table_open' => '<table id="equip-hist-table" class="table table-hover">');
            $this->table->set_template($template);

            $this->table->set_heading(array('Start Date', 'Description'));

            foreach($records as $row) {
              $this->table->add_row(array(change_default_zero_date($row['start_date']), $row['description']));
            }
            echo $this->table->generate();
          }

        } else {
          echo '<p>There is no maintenance history for this equipment.</p>';
        }
      }

      // Add equipment
      public function add_equipment() {
        // If the add-equipment has been submitted
        if(isset($_POST['add-equipment'])) {
          // Create array of data to pass to model
          $form_data = array(
            'pm_num'          => $_POST['add_pm_num'],
            'description'     => $_POST['add_description'],
            'purchase_date'   => $_POST['add_purchase_date'],
            'price'           => $_POST['add_price'],
            'model_num'       => $_POST['add_model_num'],
            'serial_num'      => $_POST['add_serial_num'],
            'asset_num'       => $_POST['add_asset_num']
          );

          // Add data verification function here later

          $this->Equipment_model->add_equipment($form_data);
          $this->session->set_flashdata("success", "New equipment added.");
          redirect('equipment/management');
        }
      }

    }

?>
