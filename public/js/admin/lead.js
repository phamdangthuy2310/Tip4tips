function ajaxAddStatus(){
  $(document).on('click', '#statusChange', function () {
    var form = $('#statusGroup');
    var data = {};
    data.lead = form.find('[name=lead]').val();
    data.status = form.find('[name=status]').val();
    var url = form.attr('action');
    $.ajax({
      dataType: 'json',
      data: data,
      type: "post",
      url: url,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data){
        $('#statusAlert').text('Changed successfully.');
      }
    });
  })
}
$(document).ready(function () {
  ajaxAddStatus();
});