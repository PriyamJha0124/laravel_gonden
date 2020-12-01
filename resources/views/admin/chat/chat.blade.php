@extends('admin.layouts.app')

@section('content_header')
    <div class="row mb-2">
      <div class="col-sm-6">
          <h1 class="m-0 text-dark">Support Chat</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ asset('message') }}">Chat</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
@endsection('content_header')

@section('content_body')

@section('content_body')
  @if(session()->has('success'))
    <div id="toast-container" class="toast-top-right">
      <div class="toast toast-success" aria-live="polite" style="">
        <div class="toast-message">{{session()->get('success')}}</div>
      </div>
    </div>
  @endif

  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <?php 
  use App\Model\Message;
  ?>

    <div class="row">
      <section class="col-md-12">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">
            <strong>Messages</strong>
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                </li>
              </ul>
            </div>
          </div><!-- /.card-header -->

          <div class="card-body">
            <div class="tab-content p-0">
              
              <!-- Main card content.. -->
              <div class="container col-md-12">

              <table id="datatable" class="table table-bordered table-responsive-lg table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Username</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;?>
                    @foreach($message as $key => $value)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$value->user_name}}</td>
                      @if($value->is_read != 0)
                        <td style="color: green;"> <b> Read </b></td>
                      @else
                        <td style="color: red;"> <b> Unread </b></td>
                      @endif
                      <td style="text-align: center;">
                        @role('admin')
                        <a class="btn btn-info btn-sm" href="javascript:void(0)" id="view-message" data-id="{{$value->user_id}}" style="font-size: 10px">View</a>
                        <a class="btn btn-danger btn-sm" href="javascript:void(0)" id="delete-message" data-id="{{$value->user_id}}"  style="font-size: 10px">Delete</a>
                        @endrole
                      </td>
                    </tr>
                    @endforeach 
                  </tbody>
                </table>
                
              
              </div>
              
              <!-- /.Main card-content.. -->

    
            </div>
          </div><!-- /.card-body -->

          <!-- /Edit Area -->
          <div class="modal fade" id="EditMessage" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="display: none;">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <h4 class="modal-title">Support Chat</h4>
                  <button type="reset" class="close" id="close-message" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">

                  <!-- ///////////////// TESTING ///////////////////////////////////////////////////////// -->

                  <!-- DIRECT CHAT PRIMARY -->
                  <div class="card card-prirary cardutline direct-chat direct-chat-primary">          

                    <div class="card-body" style="display: block;">

                      <!-- Conversations are loaded here -->
                      <div class="direct-chat-messages">

                      </div>
                      <!--/.direct-chat-messages-->
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer" style="display: block;">
                      {{Form::open(['route' => 'message.store', 'method' => 'POST', 'class' => 'EditForm'])}}
                        <div class="input-group">
                          <input type="hidden" id="user_id" name="user_id" value=""/>
                          <input type="hidden" id="user_name" name="user_name" value=""/>
                          <input type="hidden" id="user_type" name="user_type" value="ADMIN"/>
                          <input type="text" id="users_message" name="users_message" placeholder="Type Message" required class="form-control">
                          <span class="input-group-append">
                            <button type="submit" class="btn btn-dark">Send</button>
                          </span>
                        </div>
                      {{ Form::close() }}
                    </div>
                    <!-- /.card-footer-->
                  </div>
                  <!--/.direct-chat -->

                </div>
                <!-- </div> -->
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.Edit Area End -->

          <!-- /Delete Area -->
          <div class="modal fade" id="DeleteMessage" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Delete Message</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- /Delete Form Content -->
                  
                  <p>Are you sure you want to delete all the messages in this chat?</p>
                  <p>This action can't be undone.</p>

                  <!-- /.Delete Form Content -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  {{ Form::open(['method' => 'DELETE','route' => ['message.destroy', '1']]) }}
                    <input type="hidden" id="chat_id" name="user_id" value=""/>
                    <button type="submit" class="btn btn-danger">Delete</button>
                  {{ Form::close() }}
                  
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.Delete Area End -->

        </div>
        <!-- /.card -->
      </section>
    </div>
    

@endsection('content_body')

@section('new_script')
    <script type="text/javascript">
      $(document).ready(function (){

        var table = $('#datatable').DataTable();

        $('#toast-container').fadeOut(5000);

        /* When click edit */
        $('body').on('click', '#view-message', function () {
          var r_id = $(this).data('id');
          $('#user_id').val(r_id);
          $.get("{{asset("message")}}/" + r_id, function (data) {
              $('#EditMessage').modal('show');
              $('#user_name').val(data[0].user.name);
              $('.direct-chat-messages').html('');
              for(var i=0; i<data.length; i++){
                if(data[i].user_type == "CUSTOMER"){
                  $('.direct-chat-messages').append(
                    '<div class="direct-chat-msg"> <div class="direct-chat-infos clearfix"> <span class="direct-chat-name float-left">' +
                    data[i].user_name + '</span> </div> <img class="direct-chat-img" src="{{ asset("dist/img/boxed-bg.jpg")}}" alt="Message User Image"> ' +
                    '<div class="direct-chat-text">' + data[i].users_message + '</div> </div>'
                    );
                }
                else if(data[i].user_type == "ADMIN"){
                  $('.direct-chat-messages').append(
                    '<div class="direct-chat-msg right"> <div class="direct-chat-infos clearfix"> <span class="direct-chat-name float-right">' +
                    'Admin </span> </div> <img class="direct-chat-img" src="{{ asset("dist/img/AdminLTELogo.png")}}" alt="Message Admin Image"> ' +
                    '<div class="direct-chat-text">' + data[i].users_message + '</div> </div>'
                    );
                }
              }
          });
        });

        $('body').on('click', '#delete-message', function () {
          var r_id = $(this).data('id');
          $('#chat_id').val(r_id);
          $('#DeleteMessage').modal('show');
        });
 
      });
    </script>

@endsection('new_script')

