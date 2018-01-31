$(document).ready(function () {
  ajaxAddStatus();
});

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
        if(data.status == 0){
          $('#statusAlert').addClass('label-success').text(data.message);
          if(data.status_view == 3){
            $("#plusPoint").removeClass("hidden");
          }else{
            $("#plusPoint").addClass("hidden");
          }

          var $contentHistory = $("#contentHistory");
          $contentHistory.html("");
          //load history view
          for (var index in data.listHistoryProcess) {
      //      var li = "<li class='"+data.listHistoryProcess[index].status_id+"'>";
      //      li+= ""
      //      <span class="history__time">{{\Carbon\Carbon::parse($status->created_at)->addHours(7)->format('d-M-Y H:i')}}</span>
      //  <span class="history__info">{{\App\Model\Lead::showNameStatus($status->status_id)}}</span>
      //</li>
            var div = "<div> " + data.listHistoryProcess[index].status_id + "_" + data.listHistoryProcess[index].created_format + " </div>";
            $contentHistory.append(div);
          }
        }else if(data.status == -1){
          $('#statusAlert').addClass('label-danger').text(data.error);
        }else if(data.status == -2){
          alert(data.error);
        }
      }
    });
  })
}