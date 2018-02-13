$(document).ready(function(){
  ajaxCategory();
});
function ajaxCategory() {
  $(document).on('click', '#catAdd', function () {
    var form = $('#categoryForm');
    var data = {};
    var url = form.attr('data-url');
    data.name = form.find('[name=categoryName]').val();
    console.log(data);
    if(data.name){
      $.ajax({
        dataType: 'json',
        data: data,
        type: "post",
        url: url,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data){
          $('#catAlert').removeClass('label-danger').addClass('label-success').text('Added successfully.');
          form.find('[name=categoryName]').val('');
        },
        error: function(xhr, status, error) {
          // check status && error
          $('#catAlert').removeClass('label-success').addClass('label-danger').text('Category name existed.');
        }
      })
    }else{
      $('#catAlert').removeClass('label-success').addClass('label-danger').text('Please insert category name.');
    }

  })
}