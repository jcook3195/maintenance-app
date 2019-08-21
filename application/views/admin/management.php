<div class="row justify-content-md-center">
  <div class="col col-lg-8">
    <h1>User management</h1>
    <?php if(isset($_SESSION['success'])) { ?>
			<div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
		<?php } ?>
    <?php if(isset($_SESSION['error'])) { ?>
			<div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
		<?php } ?>
  </div>
</div>
<div class="row justify-content-md-center">
  <div class="col col-lg-10">
    <div class="card text-white bg-primary mb-3">
      <div class="card-header">Add User</div>
      <div class="card-body">
        <h4 class="card-title">Use this form to add a user.</h4>
        <?php // Set form params
          $form_params = array(
            'class'             => 'form-horizontal'
          );
        ?>
        <?php echo form_open('admin/add_user', $form_params); ?>
          <div class="form-group">
            <div class="row justify-content-md-center">
              <div class="col col-lg-6">
                <?php // First name input
                  $params = array(
                    'id'            => 'add_fname',
                    'class'         => 'form-control form-control-lg',
                    'name'          => 'add_fname',
                    'placeholder'   => 'First Name',
                    'required'      => 'required'
                  );
                ?>
                <?php echo form_input($params); ?>
              </div>
              <div class="col col-lg-6">
                <?php // Last name input
                  $params = array(
                    'id'            => 'add_lname',
                    'class'         => 'form-control form-control-lg',
                    'name'          => 'add_lname',
                    'placeholder'   => 'Last Name',
                    'required'      => 'required'
                  );
                ?>
                <?php echo form_input($params); ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row justify-content-md-center">
              <div class="col col-lg-6">
                <?php // Username input
                  $params = array(
                    'id'            => 'add_username',
                    'class'         => 'form-control form-control-lg',
                    'name'          => 'add_username',
                    'placeholder'   => 'Username',
                    'required'      => 'required'
                  );
                ?>
                <?php echo form_input($params); ?>
              </div>
              <div class="col col-lg-6">
                <?php // Email input
                  $params = array(
                    'id'            => 'add_email',
                    'class'         => 'form-control form-control-lg',
                    'name'          => 'add_email',
                    'placeholder'   => 'Email'
                  );
                ?>
                <?php echo form_input($params); ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row justify-content-md-center">
              <div class="col col-lg-6">
                <?php // Password input
                  $params = array(
                    'id'            => 'add_password',
                    'class'         => 'form-control form-control-lg',
                    'name'          => 'add_password',
                    'placeholder'   => 'Password',
                    'required'      => 'required',
                    'type'          => 'password'
                  );
                ?>
                <?php echo form_input($params); ?>
              </div>
              <div class="col col-lg-6">
                <?php // Confirm Password input
                  $params = array(
                    'id'            => 'confirm_password',
                    'class'         => 'form-control form-control-lg',
                    'name'          => 'confirm_password',
                    'placeholder'   => 'Confirm Password',
                    'required'      => 'required',
                    'type'          => 'password'
                  );
                ?>
                <?php echo form_input($params); ?>
                  </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row justify-content-md-center">
              <div class="col col-lg-6">
                <?php // Select input

                  // Initialize options array
                  $options = array();

                  // Use the foreach loop to set the permission levels
                  // gathered in the Admin_model to options in the form
                  foreach($p_lvls as $opt) {
                    $options[$opt['lvl']] = $opt['title'];
                  }

                  $params = array(
                    'id'            => 'permission_lvl',
                    'name'          => 'permission_lvl',
                    'options'       => $options,
                    'class'         => 'form-control form-control-lg',
                    'placeholder'   => 'User Level',
                    'required'      => 'required'
                  );
                ?>
                <?php echo form_dropdown($params); ?>
              </div>
              <div class="col col-lg-6">
                <?php // Submit input params
                  $params = array(
                    'id'            => 'add-user',
                    'name'          => 'add-user',
                    'class'         => 'btn btn-success',
                    'value'         => 'Add User'
                  );
                ?>
                <?php echo form_submit($params); ?>
              </div>
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
