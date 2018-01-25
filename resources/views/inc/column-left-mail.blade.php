<div class="col-md-3">
    <a href="{{route('messages.create')}}" class="btn btn-primary btn-block margin-bottom">Compose</a>

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Folders</h3>

            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="{{route('messages.index')}}"><i class="fa fa-inbox"></i> Inbox
                        <span class="label label-primary pull-right">{{count(\App\Model\Message::getMessageOfUser(Auth::user()->id))}}</span></a></li>
                <li><a href="{{route('messages.sent')}}"><i class="fa fa-envelope-o"></i> Sent
                    <span class="label label-default pull-right">{{count(\App\Model\Message::getMessageSent(Auth::user()->id))}}</span></a></li>
                <li><a href="{{action('MessagesController@trash')}}"><i class="fa fa-trash-o"></i> Trash <span class="label label-danger pull-right">{{ count(\App\Model\Message::getAllMessageDeleted(Auth::user()->id))}}</span></a></li>
            </ul>
        </div>
        <!-- /.box-body -->
    </div>

</div>
<!-- /.col -->
<div class="col-md-9">
    <div class="box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">Inbox</h3>

        <div class="box-tools pull-right">
            <div class="has-feedback">
                <input type="text" class="form-control input-sm" placeholder="Search Mail">
                <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->