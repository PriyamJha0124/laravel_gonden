@extends('admin.layouts.app')

@section('content_header')
    <div class="row mb-2">
      <div class="col-sm-6">
          <h1 class="m-0 text-dark">Role</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('role.index') }}">Role</a></li>
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
          <h3 class="card-title">
            <i class="fas mr-1"></i>
            Role List
          </h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="btn btn-success btn-sm" id="add-role" data-toggle="modal" data-target="#AddRole">Add</a>
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
                    <th>Role Name</th>
                    <th>Actions</th>
                  </tr>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1;?>
                    @foreach($role as $key => $value)
                    <tr>
                      <td >{{$no++}}</td>
                      <td >{{$value->name}}</td>
                      
                      <td style="text-align: center;">
                        <a class="btn btn-info btn-sm" href="javascript:void(0)" id="view-role" data-id="{{$value->id}}" style="font-size: 10px">View</a>
                        @role('admin')
                        <a class="btn btn-warning btn-sm" href="javascript:void(0)" id="edit-role" data-id="{{$value->id}}"  style="font-size: 10px">Edit</a>
                        <a class="btn btn-danger btn-sm" href="javascript:void(0)" id="delete-role" data-id="{{$value->id}}"  style="font-size: 10px">Delete</a>
                        @endrole
                      </td>
                    </tr>
                    @endforeach 
                </tbody>
              </table>
              
            </div>
            
            <!-- /.Main card-content.. -->

            <!-- /Add Role Area -->
            <div class="modal fade" id="AddRole" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="modal_title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- /Add Form Content -->
                    
                    {{Form::open(['route' => 'role.store', 'method' => 'POST', 'class' => 'AddForm'])}}
                      @include('admin.role.role_master')
                    {{ Form::close() }}

                    <!-- /.Add Form Content -->
                  </div>
                  <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>                          
                  </div> -->
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.Add Role Area End -->

              <!-- /Edit Role Area -->
            <div class="modal fade" id="EditRole" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- /Edit Form Content -->
                    
                    {{ Form::model($role, ['route'=>['role.update', '1'],'method'=>'PATCH' , 'class' => 'EditForm']) }}
                      <input type="hidden" id="role_id" name="role_id" value=""/>
                      @include('admin.role.role_master')
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
            <!-- /.Edit Role Area End -->

              <!-- /Role Detail Area -->
            <div class="modal fade" id="DetailRole" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Role Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                      <div class="form-group">
                          <strong>Role Name: </strong>
                          <p id="d_role_name"></p>
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
            <!-- /.Role Details Area End -->

              <!-- /Delete Role Area -->
            <div class="modal fade" id="DeleteRole" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Delete Role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- /Delete Form Content -->
                    
                    <p>Are you sure you want to delete this role?</p>

                    <!-- /.Delete Form Content -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    {{ Form::open(['method' => 'DELETE','route' => ['role.destroy', '1']]) }}
                      <input type="hidden" id="role2_id" name="role_id" value=""/>
                      <button type="submit" class="btn btn-danger">Delete</button>
                    {{ Form::close() }}
                    
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.Delete Role Area End -->

  
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

        $('body').on('click', '#add-role', function () {
          $('.AddForm').trigger("reset");
          $('#modal_title').html('Add Role');
          $('#AddRole').modal('show');              
        });

        /* When click edit user */
        $('body').on('click', '#edit-role', function () {
          var r_id = $(this).data('id');
          $('#role_id').val(r_id);
          $.get("{{asset("role")}}/" + r_id + '/edit', function (data) {
              $('#EditRole').modal('show');
              $('.EditForm #name').val(data.name);
          });
        });

        $('body').on('click', '#delete-role', function () {
          var r_id = $(this).data('id');
          $('#role2_id').val(r_id);
          $('#DeleteRole').modal('show');
        });
        
        $('body').on('click', '#view-role', function () {
          var r_id = $(this).data('id');
          $.get("{{asset("role")}}/" + r_id, function (data) {
            $('#DetailRole').modal('show');
              $('#d_role_name').html(data.name);
          });
        });
        
      });
    </script>
@endsection('new_script')