<?php use App\Common\Common; ?>
@extends('layouts.master')
@section('title', 'Dashboard')
@section('javascript')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
<script>
  var ctx = document.getElementById("pieChartLeads").getContext('2d');
  var pieChartLeads = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["Win", "Call", "Quote", "Win", "Lost"],
      datasets: [{
        label: '# of Votes',
        data: [{{$new}}, {{$call}}, {{$quote}}, {{$win}}, {{$lost}}],
        backgroundColor: [
          '{{Common::colorStatus(0)}}',
          '{{Common::colorStatus(1)}}',
          '{{Common::colorStatus(2)}}',
          '{{Common::colorStatus(3)}}',
          '{{Common::colorStatus(4)}}'
        ],
        borderColor: [
          '{{Common::colorStatus(0)}}',
          '{{Common::colorStatus(1)}}',
          '{{Common::colorStatus(2)}}',
          '{{Common::colorStatus(3)}}',
          '{{Common::colorStatus(4)}}'
        ],
        borderWidth: 1
      }]
    },
    options: {
      cutoutPercentage: 80,
      responsive: true,
      legend: false,
      legendCallback: function(chart) {
        var legendHtml = [];
        legendHtml.push('<ul class="chart-legend clearfix">');
        var item = chart.data.datasets[0];
        for (var i=0; i < item.data.length; i++) {
          legendHtml.push('<li>');
          legendHtml.push('<span class="chart-legend-icon" style="color:'+ item.backgroundColor[i] +'"><i class="fa fa-circle-o"></i></span>');
          legendHtml.push('<span class="chart-legend-label-text"> '+chart.data.labels[i]+'</span>');
          legendHtml.push('</li>');
        }

        legendHtml.push('</ul>');
        return legendHtml.join("");
      },
      title: {
        display: true,
        text: ''
      },
      animation: {
        animateScale: true,
        animateRotate: true
      }
    }
  });
  $('#pieChart-legend-con').html(pieChartLeads.generateLegend());
</script>
@stop
@section('content')
    <!-- Main row -->
    <div class="row">
        <div class="col-md-6">
            <!-- LEADS LIST -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Recent Leads</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="chart-responsive">
                                <canvas id="pieChartLeads" height="200"></canvas>
                            </div>
                            <!-- ./chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                            <div id="pieChart-legend-con"></div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <div class="box-footer text-center">
                    <a href="{{route('leads.index')}}" class="uppercase">View All Leads</a>
                </div>
            </div>
            <!-- /.box -->
            <!--/.box -->
        </div>
        <div class="col-sm-6">
            <!-- Tipster LIST -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Most active Tipsters</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <ul class="users-list ul__users clearfix">
                        @foreach($highestPointTipsters as $recenttipster)
                        <li>
                            <span class="users-list-avatar"><img src="{{asset('images/user1-128x128.jpg') }}" alt="User Image"></span>
                            <span class="users-list-info">
                                <a class="users-list-name" href="#">{{$recenttipster->username}}</a>
                                <span class="users-list-date">{{$recenttipster->created_at}}</span>
                            </span>
                        </li>
                        @endforeach
                    </ul>
                    <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="{{route('tipsters.index')}}" class="uppercase">View All Tipster</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!--/.box -->
        </div>
        <div class="col-sm-12">
            <!-- CONSULTANT LIST -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Latest Activities</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="javascript:void(0)" class="uppercase">View All</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!--/.box -->
        </div>
    </div>
    <!-- /.row -->
@endsection