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
        if(data.status == 5){
          $('#pointArea').append('<p>Point for tipster</p>' +
            '<div id="updatePoint" class="form-inline-simple">' +
            '<input class="form-control" name="point" type="number" placeholder="0">' +
            '<button class="btn btn-primary" type="button" title="Plus Point"><i class="fa fa-plus"></i></button>' +
            '</div>');
        }
      }
    });
  })
}
$(document).ready(function () {
  ajaxAddStatus();
});