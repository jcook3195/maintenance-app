<?php

  /**
    * Admin model to handle db functions by superusers.
    *
    * Version 1.0
    */

    class Admin_model extends CI_Model {

      // Constructor
      public function __construct() {
        parent:: __construct();
        // Load form helper to be used in all functions
        $this->load->helper('custom_form_helper');
      }

      // Verify add new user form
      public function verify_add_user($data) {
        $config = array(
          array(
            'field'           => $data['fname'],
            'label'           => 'First Name',
            'rules'           => 'required'
          ),
          array(
            'field'           => $data['lname'],
            'label'           => 'Last Name',
            'rules'           => 'required'
          ),
          array(
            'field'           => $data['uname'],
            'label'           => 'Username',
            'rules'           => 'required'
          ),
          array(
            'field'           => $data['email'],
            'label'           => 'Email',
            'rules'           => array(
              'trim',
              'valid_email'
            )
          ),
          array(
            'field'           => $data['pass'],
            'label'           => 'Password',
            'rules'           => array(
              'required',
              'min_length[6]'
            )
          ),
          array(
            'field'           => $data['cpass'],
            'label'           => 'Confirm Password',
            'rules'           => array(
              'required',
              'matches[add_password]'
            )
          )
        );
        return $this->form_validation->set_rules($config);
      }

      // Add new user
      public function add_user($data) {
        echo "<script>alert('".$data['pass']."')</script>";
        // Prepare data to insert
        $data_prepped = array(
          'first_name'          => trim($data['fname']),
          'last_name'           => trim($data['lname']),
          'username'            => trim($data['uname']),
          'email'               => trim($data['email']),
          'pass'                => blowfish_hash($data['pass']),
          'permission_lvl'      => $data['plvl']
        );

        // Run insert query
        $this->db->insert('users', $data_prepped);
      }

      // Get Permissions
      public function get_permissions() {
        $this->db->select('permission_title, permission_lvl');
        $this->db->from('permissions');
        $results = $this->db->get();

        if($results->num_rows() > 0) {
          foreach($results->result_array() as $row) {
            $permissions[] = array(
              'lvl'                 => $row['permission_lvl'],
              'title'               => $row['permission_title']
            );
          }
        }

        return $permissions;
      }

      // Get Users that are not super users
      public function get_users() {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by('permission_lvl');
        $this->db->order_by('last_name');
        $results = $this->db->get();

        if($results->num_rows() > 0) {
          foreach($results->result_array() as $row) {
            $users[] = array(
              'id'                      => $row['id'],
              'fname'                   => $row['first_name'],
              'lname'                   => $row['last_name'],
              'uname'                   => $row['username'],
              'email'                   => $row['email'],
              'p_lvl'                   => $row['permission_lvl']
            );
          }
        }



        return $users;
      }
    }
?>
