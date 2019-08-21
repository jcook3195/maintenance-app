<div class="row justify-content-md-center">
  <div class="col col-lg-8">
    <h1>Manage User Profile</h1>
  </div>
</div>
<div class="row justify-content-md-center">
  <div class="col col-lg-8">
    <div class="card text-white bg-primary mb-3">
      <div class="card-header">Profile Data</div>
      <div class="card-body">
        <h4 class="card-title">Update Profile Information</h4>
        <p class="card-text">Use this form to update your profile.</p>
        <?php // set form params
          $form_params = array(
            'class'             => 'form-horizonal'
          );
        ?>
        <?php echo form_open('profile/update_information', $form_params); ?>
          <div class="form-group">
            <div class="col col-lg-6">
            </div>
            <div class="col col-lg-6">
           </div>
          </div>
          <div class="form-group">
            <div class="col col-lg-6">
            </div>
            <div class="col col-lg-6">
           </div>
          </div>
          <div class="form-group">
            <div class="col col-lg-6">
            </div>
            <div class="col col-lg-6">
           </div>
          </div>
          <div class="form-group">
            <div class="col col-lg-6">
              <?php // submit input params
                $params = array(
                  'id'            => 'update-profile',
                  'name'          => 'update-profile',
                  'class'         => 'btn btn-warning',
                  'value'         => 'Update Profile'
                );
              ?>
              <?php echo form_submit($params); ?>
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
