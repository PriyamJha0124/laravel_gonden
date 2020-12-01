@extends('admin.layouts.app')

@section('content_header')
    <div class="row mb-2">
      <div class="col-sm-6">
          <h1 class="m-0 text-dark">User</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
@endsection('content_header')

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
    
    <div class="row">
      <section class="col-md-12">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card card-dark">
              <div class="card-header">
                <h4 class="card-title">
                  <i class="fas mr-1"></i>
                  User List
                </h4>
                
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="tab-content p-0">
                  
                  <!-- Main card content.. -->
                  <div class="container col-md-12">
                    <table id="datatable" class="table table-bordered table-responsive-lg table-hover">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Role Name</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1;?>
                          @foreach($user as $key => $value)
                          <tr>
                            <td >{{$no++}}</td>
                            <td >{{$value->name}}</td>
                            <td >{{$value->email }}</td>
                            <td >{{$value->role_name}}</td>
                            
                             <td style="text-align: center;">
                              <a class="btn btn-info btn-sm" href="javascript:void(0)" id="view-user" data-id="{{$value->id}}" style="font-size: 10px">View</a>
                              @role('admin')
                              <a class="btn btn-warning btn-sm" href="javascript:void(0)" id="edit-user" data-id="{{$value->id}}"  style="font-size: 10px">Edit</a>
                              <a class="btn btn-danger btn-sm" href="javascript:void(0)" id="delete-user" data-id="{{$value->id}}"  style="font-size: 10px">Delete</a>
                              @endrole
                            </td>
                          </tr>
                          @endforeach 
                      </tbody>
                    </table>
                    
                  </div>

                  <!-- /.Main card-content.. -->

                   <!-- /Edit User Area -->
                  <div class="modal fade" id="EditUser" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit User</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- /Edit Form Content -->
                          
                          {{ Form::model($user, ['route'=>['user.update','1'],'method'=>'PATCH' , 'class' => 'EditForm']) }}
                            <input type="hidden" id="user_id" name="user_id" value=""/>
                            @include('admin.user.user_master')
                          {{ Form::close() }}

                          <!-- /.Edit Form Content -->
                        </div>
                        <!-- <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> -->
                          <!-- <button type="submit" class="btn btn-dark">Save</button> -->
                          
                        <!-- </div> -->
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.Edit User Area End -->

                    <!-- /User Detail Area -->
                  <div class="modal fade" id="DetailUser" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">User Details</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          
                            <div class="form-group">
                                <strong>Role ID: </strong>
                                <p id="d_role_id"></p>
                            </div>                
                            <div class="form-group">
                                <strong>Name: </strong>
                                <p id="d_name"></p>
                            </div>
                            <div class="form-group">
                                <strong>Email: </strong>
                                <p id="d_email"></p>
                            </div>

                        </div>
                        <!-- <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>                          
                        </div> -->
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.User Details Area End -->

                   <!-- /Delete User Area -->
                  <div class="modal fade" id="DeleteUser" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Delete User</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!-- /Delete Form Content -->
                          
                          <p>Are you sure you want to delete this user?</p>

                          <!-- /.Delete Form Content -->
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          {{ Form::open(['method' => 'DELETE','route' => ['user.destroy', '1']]) }}
                            <input type="hidden" id="user2_id" name="user_id" value=""/>
                            <button type="submit" class="btn btn-danger">Delete</button>
                          {{ Form::close() }}
                          
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.Delete Warehouse Area End -->
       

       
                </div>
              </div><!-- /.card-body -->

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

        /* When click edit user */
        $('body').on('click', '#edit-user', function () {
          var u_id = $(this).data('id');
          $('#user_id').val(u_id);
          $.get("{{asset("user")}}/" + u_id + '/edit', function (data) {
              $('#EditUser').modal('show');
              $('.EditForm #role_id').val(data.role_id);
              $('.EditForm #name').val(data.name);
              $('.EditForm #email').val(data.email);
          });
        });

        $('body').on('click', '#delete-user', function () {
          var u_id = $(this).data('id');
          $('#user2_id').val(u_id);
          $('#DeleteUser').modal('show');
        });
        
        $('body').on('click', '#view-user', function () {
          var u_id = $(this).data('id');
          $.get("{{asset("user")}}/" + u_id, function (data) {
            $('#DetailUser').modal('show');
              $('#d_role_id').html(data.role_id);
              $('#d_name').html(data.name);
              $('#d_email').html(data.email);
          });
        });
      });
    </script>
    
@endsection('new_script')