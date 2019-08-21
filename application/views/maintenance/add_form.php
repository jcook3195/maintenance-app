<?php // Set form params
  $form_params = array(
    'class'             => 'form-horizontal'
  );
?>
<?php echo form_open('maintenance/add_maintenance', $form_params); ?>
<div class="form-separator border border-warning rounded" style="padding: 12px 4px; margin-bottom: 12px;">
  <div class="form-group">
    <div cass="row justify-content-md-center">
      <p><small><em>* Only edit these fields if maintenance is complete.</em></small></p>
    </div>
    <div class="row justify-content-md-center">
      <div class="col col-lg-6">
        <?php // Complete or incomplete

          $options = array(
            0               => 'Incomplete',
            1               => 'Complete'
          );

          $params = array(
            'id'            => 'status',
            'class'         => 'form-control form-control-lg',
            'options'       => $options,
            'name'          => 'status',
            'placeholder'   => 'Completion Status'
          );
        ?>
        <?php echo form_dropdown($params); ?>
      </div>
      <div class="col col-lg-6">
        <?php // Comp by input

          $options = array(
            ''  => 'Completed By'
          );

          // Get users
          foreach($users as $opt) {
            if($opt['p_lvl'] != 3) {
              $options[$opt['id']] = $opt['fname'] . ' ' . $opt['lname'];
            }
          }

          $params = array(
            'id'            => 'comp_by',
            'class'         => 'form-control form-control-lg',
            'options'       => $options,
            'name'          => 'comp_by',
            'placeholder'   => 'Completed By'
          );
        ?>
        <?php echo form_dropdown($params); ?>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="row justify-content-md-center">
      <div class="col col-lg-12">
        <?php echo form_label('Completed Date', 'comp_date'); ?>
        <?php // Comp Date Input
          $params = array(
            'id'            => 'comp_date',
            'class'         => 'form-control form-control-lg',
            'name'          => 'comp_date',
            'placeholder'   => 'Completed Date',
            'type'          => 'date'
          );
        ?>
        <?php echo form_input($params); ?>
      </div>
    </div>
  </div>
</div>
<div class="form-separator border border-success rounded" style="padding: 12px 4px; margin-bottom: 12px;">
  <div class="form-group">
    <div class="row justify-content-md-center">
      <p><small><em>Fill these out always.</em></small></p>
    </div>
    <div class="row justify-content-md-center">
      <div class="col col-lg-12">
        <?php // Description Input
          $params = array(
            'id'            => 'add_maint_description',
            'class'         => 'form-control form-control-lg',
            'name'          => 'add_maint_description',
            'placeholder'   => 'Description',
            'required'      => 'required'
          );
        ?>
        <?php echo form_input($params); ?>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="row justify-content-md-center">
      <div class="col col-lg-12">
        <?php echo form_label('Start Date', 'start_date'); ?>
        <?php // Start Date Input
          $params = array(
            'id'            => 'start_date',
            'class'         => 'form-control form-control-lg',
            'name'          => 'start_date',
            'placeholder'   => 'Start Date',
            'type'          => 'date'
          );
        ?>
        <?php echo form_input($params); ?>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="row justify-content-md-center">
      <div class="col col-lg-12">
        <?php // Location input

          $options = array(
            ''  => 'Location'
          );

          // Get users
          foreach($locations as $opt) {
            $options[$opt['id']] = $opt['location'];
          }

          $params = array(
            'id'            => 'location',
            'class'         => 'form-control form-control-lg',
            'options'       => $options,
            'name'          => 'location',
            'placeholder'   => 'Location',
            'required'      => 'required'
          );
        ?>
        <?php echo form_dropdown($params); ?>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="row justify-content-md-center">
      <div class="col col-lg-12">
        <?php // Service type input

          $options = array(
            ''  => 'Service Type'
          );

          // Get users
          foreach($service_types as $opt) {
            $options[$opt['id']] = $opt['service_type'];
          }

          $params = array(
            'id'            => 'service_type',
            'class'         => 'form-control form-control-lg',
            'options'       => $options,
            'name'          => 'service_type',
            'placeholder'   => 'Service Type',
            'required'      => 'required'
          );
        ?>
        <?php echo form_dropdown($params); ?>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="row">
      <div class="col col-lg-12">
        <?php // Submit input params
          $params = array(
            'id'            => 'add-maintenance',
            'name'          => 'add-maintenance',
            'class'         => 'btn btn-primary',
            'value'         => 'Add Maintenance'
          );
        ?>
        <?php echo form_submit($params); ?>
      </div>
    </div>
  </div>
</div>
<?php echo form_close(); ?>
