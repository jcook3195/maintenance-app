// General scritps
$(document).ready(function() {
  // Turn equipment table into data table
  $('#all-equip-table').DataTable();

  // Equipment Modal
  $('#all-equip-table').on('click', '.equip-info', function() {
    // Set equipData var for multi-use
    var equipData = $(this).attr('id');
    $.ajax({
      url: "equipment_details",
      method: "POST",
      data: {equipData:equipData},
      success: function(data) {
        $('#equipment-details-modal-list').html(data);
      }
    })
  });
});
