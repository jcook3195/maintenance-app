<div class="row justify-content-md-center">
  <div class="col col-lg-8">
    <h1>Maintenance Webapp</h1>
    <?php if(isset($_SESSION['success'])) { ?>
			<div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
		<?php } ?>
    <?php if(isset($_SESSION['error'])) { ?>
			<div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
		<?php } ?>
  </div>
</div>
<div class="row justify-content-md-center">
  <div class="col col-lg-8">
    <div class="card text-white bg-primary mb-3">
      <div class="card-header">Login</div>
      <div class="card-body">
        <h4 class="card-title">Clean Control Employees</h4>
        <p class="card-text">Use this login form to access the full Application.</p>
        <?php // Set form params
          $form_params = array(
            'class'             => 'form-horizonal'
          );
        ?>
        <?php echo form_open('profile/login', $form_params); ?>
          <div class="form-group">
            <?php // Username input params
              $params = array(
                'id'          => 'uname',
                'class'       => 'form-control form-control-lg',
                'name'        => 'uname',
                'placeholder' => 'Username',
                'required'    => 'required'
              );
            ?>
            <?php echo form_input($params); ?>
          </div>
          <div class="form-group">
            <?php // Password input params
              $params = array(
                'id'          => 'pass',
                'class'       => 'form-control form-control-lg',
                'name'        => 'pass',
                'placeholder' => 'Password',
                'type'        => 'password',
                'required'    => 'required'
              );
            ?>
            <?php echo form_input($params); ?>
          </div>
          <div class="form-group">
            <?php // Submit input params
              $params = array(
                'id'        => 'login',
                'name'      => 'login',
                'class'     => 'btn btn-success',
                'value'     => 'Login'
              );
            ?>
            <?php echo form_submit($params); ?>
          </div>
        <?php echo form_close(); ?>
      </div><!-- close .card-body -->
    </div><!-- close .card -->
  </div>
</div>
