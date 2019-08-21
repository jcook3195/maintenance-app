<div class="row justify-content-md-center">
  <div class="col col-lg-12">
    <h1>Equipment Management</h1>
    <?php if(isset($_SESSION['success'])) { ?>
			<div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
		<?php } ?>
    <?php if(isset($_SESSION['error'])) { ?>
			<div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
		<?php } ?>
  </div>
</div>

<div class="row">
  <div class="col col-lg-12">
    <div class="card border-secondary mb-3">
      <div class="card-header text-white bg-danger">Add Equipment</div>
      <div class="card-body">
        <h4 class="card-title">Use this form to add a piece of equipment.</h4>
        <?php // Set form params
          $form_params = array(
            'class'             => 'form-horizontal'
          );
        ?>
        <?php echo form_open('equipment/add_equipment', $form_params); ?>
        <div class="form-group">
          <div class="row justify-content-md-center">
            <div class="col col-lg-6">
              <?php // PM # Input
                $params = array(
                  'id'            => 'add_pm_num',
                  'class'         => 'form-control form-control-lg',
                  'name'          => 'add_pm_num',
                  'placeholder'   => 'PM #',
                  'required'      => 'required'
                );
              ?>
              <?php echo form_input($params); ?>
            </div>
            <div class="col col-lg-6">
              <?php // Description Input
                $params = array(
                  'id'            => 'add_description',
                  'class'         => 'form-control form-control-lg',
                  'name'          => 'add_description',
                  'placeholder'   => 'Description'
                );
              ?>
              <?php echo form_input($params); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row justify-content-md-center">
            <div class="col col-lg-6">
              <?php // Purchase date Input
                $params = array(
                  'id'            => 'add_purchase_date',
                  'class'         => 'form-control form-control-lg',
                  'name'          => 'add_purchase_date',
                  'placeholder'   => 'Purchase Date',
                  'type'          => 'date'
                );
              ?>
              <?php echo form_input($params); ?>
            </div>
            <div class="col col-lg-6">
              <?php // Price Input
                $params = array(
                  'id'            => 'add_price',
                  'class'         => 'form-control form-control-lg',
                  'name'          => 'add_price',
                  'placeholder'   => 'Purchase Price - format $12.34'
                );
              ?>
              <?php echo form_input($params); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row justify-content-md-center">
            <div class="col col-lg-6">
              <?php // Model # Input
                $params = array(
                  'id'            => 'add_model_num',
                  'class'         => 'form-control form-control-lg',
                  'name'          => 'add_model_num',
                  'placeholder'   => 'Model #'
                );
              ?>
              <?php echo form_input($params); ?>
            </div>
            <div class="col col-lg-6">
              <?php // Serial # Input
                $params = array(
                  'id'            => 'add_serial_num',
                  'class'         => 'form-control form-control-lg',
                  'name'          => 'add_serial_num',
                  'placeholder'   => 'Serial #'
                );
              ?>
              <?php echo form_input($params); ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row justify-content-md-center">
            <div class="col col-lg-6">
              <?php // Asset # Input
                $params = array(
                  'id'            => 'add_asset_num',
                  'class'         => 'form-control form-control-lg',
                  'name'          => 'add_asset_num',
                  'placeholder'   => 'Asset #'
                );
              ?>
              <?php echo form_input($params); ?>
            </div>
            <div class="col col-lg-6">
              <?php // Submit input params
                $params = array(
                  'id'            => 'add-equipment',
                  'name'          => 'add-equipment',
                  'class'         => 'btn waves-effect waves-light',
                  'value'         => 'Add Equipment'
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

<!-- Modal -->
<div class="modal fade" id="equip-details-modal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Equipment Detials</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="equipment-details-modal-list">
        </div>
        <hr>
        <div class="add-maintenance">
          <h2>Add maintenance</h2>
          <?php $this->load->view('maintenance/add_form'); ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col col-lg-12">
    <?php

      $template = array('table_open' => '<table id="all-equip-table" class="table table-hover">');
      $this->table->set_template($template);

      $this->table->set_heading(array('PM#', 'Description', 'Model #', 'Serial #', 'Asset #', 'More Info'));

      foreach($equipment as $column) {
      $this->table->add_row(array($column['pm_num'], $column['description'], $column['model_num'], $column['serial_num'], $column['asset_num'], '<button id="'.$column['id'].'" class="btn btn-primary equip-info" data-toggle="modal" data-target="#equip-details-modal">Details</button>'));
      }

      echo $this->table->generate();

    ?>
  </div>
</div>
