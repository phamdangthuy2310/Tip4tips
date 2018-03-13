$(document).ready(function () {
  ajaxAddStatus();
  updatePointAjax();
  changeButtonPlusPoint();
});

function ajaxAddStatus(){
  $(document).on('click', '#statusChange', function () {
    var form = $('#statusGroup');
    var data = {};
    data.lead = form.find('[name=lead]').val();
    data.status = form.find('[name=status]').val();
    data.tipster_id = form.find('[name=tipster_id]').val();
    data.product_id = form.find('[name=product_id]').val();
    FormLogActivities.serializeDataUserHistory(data,form);
    /*Display icon waiting*/
    $('#updateStatus').find('.waiting').addClass('processing');

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
        if(data.status == 0){
          $('#statusAlert').removeClass('label-danger').addClass('label-success').text(data.message);
          if(data.status_view == 3){
            $("#plusPoint").removeClass("hidden");
          }else{
            $("#plusPoint").addClass("hidden");
          }

          var $contentHistory = $("#contentHistory");
          //load history view
          var li = '<li class="'+ data.newHistoryProcess.classStatus + '">' +
          '                         <span class="history__time">'+ data.newHistoryProcess.created_format + '</span>' +
          '                         <span class="history__info">'+ data.newHistoryProcess.nameStatus +'</span>' +
          '                   </li>';
          $contentHistory.prepend(li);
        }else if(data.status == -1){
          $('#statusAlert').removeClass('label-success').addClass('label-danger').text(data.error);
        }else if(data.status == -2){
          alert(data.error);
        }

        /*Hide icon waiting*/
        $('#updateStatus').find('.waiting').removeClass('processing');
      }
    });
  })
}

function updatePointAjax() {
  $(document).on('click', '#plusPointButton', function () {
    var form = $('#updatePointForm');
    var input_lead = form.find('[name=lead]');
    var input_tipster = form.find('[name=tipster]');
    var input_point = form.find('[name=point]');
    var button_plus = form.find('button');
    var data = {};
    $('#plusPoint').find('.waiting').addClass('processing');
    data.lead = input_lead.val();
    data.tipster = input_tipster.val();
    data.point = input_point.val();
    FormLogActivities.serializeDataUserHistory(data,form);
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
        if(data.status == 0){
          $('#pointAlert').removeClass('label-info').addClass('label-success').text(data.success);
          input_point.attr('readonly','true');
          button_plus.attr('id','editPointButton').text('Edit');
        }else if(data.status == -1){
          $('#pointAlert').removeClass('label-success').addClass('label-info').text(data.warning);
          input_point.attr('readonly','true');
          button_plus.attr('id','editPointButton').text('Edit');
        }else{
          alert(data.message);
        }
        $('#plusPoint').find('.waiting').removeClass('processing');
      }
    });
  })
}

function changeButtonPlusPoint() {

  $(document).on('click', '#editPointButton', function () {
    var form = $(this).parents('form');
    var input = form.find('input[name=point]');
    $(this).attr('id', 'plusPointButton').text('Update');
    input.removeAttr('readonly');
  })
}