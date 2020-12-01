@extends('admin.layouts.app')

@section('content_header')
    <div class="row mb-2">
      <div class="col-sm-6">
          <h1 class="m-0 text-dark">Category</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('category.index') }}">Category</a></li>
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
            Category List
          </h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="btn btn-success btn-sm" id="add-category" data-toggle="modal" data-target="#AddCategory">Add</a>
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
                    <th>Category Name</th>
                    <th>Logo</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1;?>
                    @foreach($category as $key => $value)
                    <tr>
                      <td >{{$no++}}</td>
                      <td >{{$value->name}}</td>
                      <td style="text-align: center;"><img src="{{asset("images/$value->logo")}}" class="img-responsive" alt="" style="height: 50px; width: 50px;"></td>
                      <td style="text-align: center;">
                        {{Form::open(['route' => 'status' , 'method' => 'POST', 'enctype'=>'multipart/form-data'])}}
                          <input type="hidden" id="category3_id" name="category_id" value="{{$value->id}}"/>                          
                          <input type="hidden" id="status" name="status" value="{{ ($value->status ? '0' : '1') }}"/>

                          <input type="submit" class="btn btn-sm {{ ($value->status ? 'btn-danger' : 'btn-success') }}" style="font-size: 10px" value="{{ ($value->status ? 'Disable' : 'Enable') }}"></button>
                        {{ Form::close() }}
                      </td>
                      <td style="text-align: center;">
                        <a class="btn btn-info btn-sm" href="javascript:void(0)" id="view-category" data-id="{{$value->id}}" style="font-size: 10px">View</a>
                        @role('admin')
                        

                        <a class="btn btn-warning btn-sm" href="javascript:void(0)" id="edit-category" data-id="{{$value->id}}"  style="font-size: 10px">Edit</a>
                        <a class="btn btn-danger btn-sm" href="javascript:void(0)" id="delete-category" data-id="{{$value->id}}"  style="font-size: 10px">Delete</a>
                        @endrole
                      </td>
                    </tr>
                    @endforeach 
                </tbody>
              </table>
              
            </div>
            
            <!-- /.Main card-content.. -->

            <!-- /Add Category Area -->
            <div class="modal fade" id="AddCategory" aria-hidden="true">
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
                    
                    {{Form::open(['route' => 'category.store', 'method' => 'POST', 'class' => 'AddForm', 'enctype'=>'multipart/form-data'])}}
                      @include('admin.category.category_master')
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
            <!-- /.Add Category Area End -->

              <!-- /Edit Category Area -->
            <div class="modal fade" id="EditCategory" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- /Edit Form Content -->
                    
                    {{ Form::model($category, ['route'=>['category.update', '1'],'method'=>'PATCH' , 'class' => 'EditForm', 'enctype'=>'multipart/form-data']) }}
                      <input type="hidden" id="category_id" name="category_id" value=""/>
                      @include('admin.category.category_master')
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
            <!-- /.Edit Category Area End -->

              <!-- /Category Detail Area -->
            <div class="modal fade" id="DetailCategory" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Category Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    
                      <div class="form-group">
                          <strong>Category Name: </strong>
                          <p id="d_category_name"></p>
                      </div>
                      
                      <div class="form-group">
                        <p>
                          <img src="" id="d_logo" class="img-responsive" alt="" style="height: 150px; width: 150px;">
                        </p>
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
            <!-- /.Category Details Area End -->

            <!-- /Delete Category Area -->
            <div class="modal fade" id="DeleteCategory" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Delete Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- /Delete Form Content -->
                    
                    <p>Are you sure you want to delete this category?</p>

                    <!-- /.Delete Form Content -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    {{ Form::open(['method' => 'DELETE','route' => ['category.destroy', '1']]) }}
                      <input type="hidden" id="category2_id" name="category_id" value=""/>
                      <button type="submit" class="btn btn-danger">Delete</button>
                    {{ Form::close() }}
                    
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.Delete Category Area End -->


  
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

        $('body').on('click', '#add-category', function () {
          $('.AddForm').trigger("reset");
          $('#modal_title').html('Add Category');
          $('#AddCategory').modal('show');              
        });

        /* When click edit user */
        $('body').on('click', '#edit-category', function () {
          var r_id = $(this).data('id');
          $('#category_id').val(r_id);
          $.get("{{asset("category")}}/" + r_id + '/edit', function (data) {
              $('#EditCategory').modal('show');
              $('.EditForm #name').val(data.name);
          });
        });

        $('body').on('click', '#delete-category', function () {
          var r_id = $(this).data('id');
          $('#category2_id').val(r_id);
          $('#DeleteCategory').modal('show');
        });

        // $('body').on('click', '#endn-category', function () {
        //   var r_id = $(this).data('id');
        //   $('#category3_id').val(r_id);
        //   $('#EnDnCategory').modal('show');
        // });

        
        
        $('body').on('click', '#view-category', function () {
          var r_id = $(this).data('id');
          $.get("{{asset("category")}}/" + r_id, function (data) {
            $('#DetailCategory').modal('show');
              $('#d_category_name').html(data.name);
              $('#d_logo').attr("src","{{asset("images")}}/"+data.logo);
          });
        });
        
      });
    </script>
@endsection('new_script')