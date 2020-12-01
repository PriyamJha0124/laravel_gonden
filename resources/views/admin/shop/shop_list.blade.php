@extends('admin.layouts.app')

@section('content_header')
    <div class="row mb-2">
      <div class="col-sm-6">
          <h1 class="m-0 text-dark">Shop</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('shop.index') }}">Shop</a></li>
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

    <div class="row">
      <section class="col-md-12">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">
            <strong>Shop List</strong>
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a class="btn btn-success btn-sm" id="add-shop" data-toggle="modal" data-target="#AddShop">Add</a>
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
                      <th>Shop Name</th>
                      <th>Description</th>
                      <th>Rating</th>
                      <th>City</th>
                      <th>Location</th>
                      <th>Contact</th>
                      <th>Actions</th>
                    </tr>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;?>
                    @foreach($shop as $key => $value)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$value->category->name}}</td>
                      <td>{{$value->name}}</td>
                      <td>{{substr($value->description,0,15)}}</td>
                      <td>{{$value->rating }}</td>
                      <td>{{$value->city->name }}</td>
                      <td>{{$value->location }}</td>
                      <td>{{$value->contact }}</td>
                      
                      <td style="text-align: center;">
                        <a class="btn btn-info btn-sm" href="javascript:void(0)" id="view-shop" data-id="{{$value->id}}" style="font-size: 10px">View</a>
                        @role('admin')
                        <a class="btn btn-success btn-sm" href='{{asset("detail")}}?shop_id={{$value->id}}' style="font-size: 10px">Detials</a>

                        <a class="btn btn-warning btn-sm" href="javascript:void(0)" id="edit-shop" data-id="{{$value->id}}"  style="font-size: 10px">Edit</a>
                        <a class="btn btn-danger btn-sm" href="javascript:void(0)" id="delete-shop" data-id="{{$value->id}}"  style="font-size: 10px">Delete</a>
                        @endrole
                      </td>
                    </tr>
                    @endforeach 
                  </tbody>
                </table>
              
              </div>
              
              <!-- /.Main card-content.. -->

              <!-- /Add shop Area -->
              <div class="modal fade" id="AddShop" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Add Shop</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- /Add Form Content -->
                      
                      {{Form::open(['route' => 'shop.store', 'method' => 'POST', 'class' => 'AddForm', 'enctype'=>'multipart/form-data'])}}
                        @include('admin.shop.shop_master')
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
              <!-- /.Add shop Area End -->

                <!-- /Edit shop Area -->
              <div class="modal fade" id="EditShop" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Shop</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- /Edit Form Content -->
                      
                      {{ Form::model($shop, ['route'=>['shop.update', '1'],'method'=>'PATCH' , 'class' => 'EditForm', 'enctype'=>'multipart/form-data']) }}
                        <input type="hidden" id="shop_id" name="shop_id" value=""/>
                        @include('admin.shop.shop_master')
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
              <!-- /.Edit shop Area End -->

                <!-- /shop Detail Area -->
              <div class="modal fade" id="DetailShop" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Shop Details</h4>
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
                        <strong>Shop Name: </strong>
                        <p id="d_name"></p>
                    </div>                
                      <div class="form-group">
                          <strong>Description: </strong>
                          <p id="d_description"></p>
                      </div>
                      <div class="form-group">
                          <strong>Rating: </strong>
                          <p id="d_rating"></p>
                      </div>
                      <div class="form-group">
                        <strong>Price: </strong>
                        <p id="d_price"></p>
                      </div>
                      <div class="form-group">
                        <strong>Discount: </strong>
                        <p id="d_discount"></p>
                      </div>
                      <div class="form-group">
                        <strong>City: </strong>
                        <p id="d_city"></p>
                      </div>
                      <div class="form-group">
                        <strong>Latitude: </strong>
                        <p id="d_latitude"></p>
                      </div>
                      <div class="form-group">
                        <strong>Longitude: </strong>
                        <p id="d_longitude"></p>
                      </div>
                      <div class="form-group">
                        <strong>Location: </strong>
                        <p id="d_location"></p>
                      </div>
                      <div class="form-group">
                        <strong>Contact: </strong>
                        <p id="d_contact"></p>
                      </div>
                      
                      <div class="form-group">
                        <p>
                          <img src="" id="d_picture" class="img-responsive" alt="" style="height: 200px; width: 300px;">
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
              <!-- /.Shop Details Area End -->

                <!-- /Delete Shop Area -->
              <div class="modal fade" id="DeleteShop" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Delete Shop</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- /Delete Form Content -->
                      
                      <p>Are you sure you want to delete this shop?</p>

                      <!-- /.Delete Form Content -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      {{ Form::open(['method' => 'DELETE','route' => ['shop.destroy', '1']]) }}
                        <input type="hidden" id="shop2_id" name="shop_id" value=""/>
                        <button type="submit" class="btn btn-danger">Delete</button>
                      {{ Form::close() }}
                      
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.Delete Shop Area End -->


    
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

        $('body').on('click', '#add-shop', function () {
          $('.AddForm').trigger("reset");
          $('#AddShop').modal('show');              
        });

        $('body').on('click', '#feature-shop', function () {
          $('#AddItems').modal('show');              
        });

        /* When click edit user */
        $('body').on('click', '#edit-shop', function () {
          var r_id = $(this).data('id');
          $('#shop_id').val(r_id);
          $.get("{{asset("shop")}}/" + r_id + '/edit', function (data) {
              $('#EditShop').modal('show');
              $('.EditForm #category_id').val(data.category_id);
              $('.EditForm #name').val(data.name);
              $('.EditForm #description').val(data.description);
              $('.EditForm #rating').val(data.rating);
              $('.EditForm #price').val(data.price);
              $('.EditForm #discount').val(data.discount);
              $('.EditForm #location').val(data.location);
              $('.EditForm #city_id').val(data.city_id);
              $('.EditForm #latitude').val(data.latitude);
              $('.EditForm #longitude').val(data.longitude);
              $('.EditForm #contact').val(data.contact);
              $('.EditForm #time_from').val(data.time_from);
              $('.EditForm #time_to').val(data.time_to);
          });
        });

        $('body').on('click', '#delete-shop', function () {
          var r_id = $(this).data('id');
          $('#shop2_id').val(r_id);
          $('#DeleteShop').modal('show');
        });
        
        $('body').on('click', '#view-shop', function () {
          var r_id = $(this).data('id');
          $.get("{{asset("shop")}}/" + r_id, function (data) {
            $('#DetailShop').modal('show');
              $('#d_category_name').html(data[0].category.name);
              $('#d_name').html(data[0].name);
              $('#d_description').html(data[0].description);
              $('#d_price').html(data[0].price);
              $('#d_rating').html(data[0].rating);
              $('#d_discount').html(data[0].discount);
              $('#d_city').html(data[0].city.name);
              $('#d_location').html(data[0].location);
              $('#d_contact').html(data[0].contact);
              $('#d_latitude').html(data[0].latitude);
              $('#d_longitude').html(data[0].longitude);
              $('#d_picture').attr("src","{{asset("images")}}/"+data[0].picture);
              
          });
        });

      });
    </script>

@endsection('new_script')