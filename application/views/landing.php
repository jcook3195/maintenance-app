
<div class="row justify-content-md-center">
  <div class="col col-lg-12">
    <h1>Maintenance Webapp Landing</h1>
    <?php if(isset($_SESSION['success'])) { ?>
			<div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
		<?php } ?>
    <?php if(isset($_SESSION['error'])) { ?>
			<div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
		<?php } ?>
  </div>
</div>
<div class="row justify-content-md-center">
  <div class="col col-lg-4">
    <div class="card border-secondary mb-3">
      <div class="card-header text-white bg-primary">Equipment</div>
      <div class="card-body">
        <h4 class="card-title">View, Add, and Edit Equipment</h4>
        <a class="btn btn-primary text-white" href="<?php echo base_url(); ?>equipment/management">Manage Equipment</a>
      </div>
    </div>
  </div>
  <div class="col col-lg-4">
    <div class="card border-secondary mb-3">
      <div class="card-header text-white bg-warning">Maintenance</div>
      <div class="card-body">
        <h4 class="card-title">View, Add, and Edit Maintenance</h4>
        <a class="btn btn-warning text-white" href="#">Manage Maintenance</a>
      </div>
    </div>
  </div>
  <div class="col col-lg-4">
    <div class="card border-secondary mb-3">
      <div class="card-header text-white bg-danger">Calendar <span class="badge badge-info">Coming Soon!</span></div>
      <div class="card-body">
        <h4 class="card-title">View Maintenance on the Calendar</h4>
        <a class="btn btn-danger text-white" href="#">View Calendar</a>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col col-lg-6">
    <div class="card border-secondary mb-3">
      <div class="card-header text-white bg-dark">Work Orders</div>
      <div class="card-body">
        <h4 class="card-title">Create Work Orders</h4>
        <a class="btn btn-dark text-white" href="#">Create</a>
      </div>
    </div>
  </div>
  <div class="col col-lg-6">
    <div class="card border-secondary mb-3">
      <div class="card-header text-white bg-success">Guest Requests</div>
      <div class="card-body">
        <h4 class="card-title">Manage Guest Maintenance Requests</h4>
        <a class="btn btn-success text-white" href="#">Guest Requests</a>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col col-lg-12">
    <div class="card border-secondary mb-3">
      <div class="card-header text-white bg-info">Recent Activity</div>
      <div class="card-body">

      </div>
    </div>
  </div>
</div>
