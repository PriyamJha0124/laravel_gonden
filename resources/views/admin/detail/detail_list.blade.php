@extends('admin.layouts.app')

@section('content_header')
    <div class="row mb-2">
      <div class="col-sm-6">
          <h1 class="m-0 text-dark">Shop Details</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('shop.index') }}">Shop</a></li>
            <li class="breadcrumb-item active"><a href="#">Details</a></li>
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

        <!-- Detail Tab-->
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">
            <strong>Shop Details</strong>
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
                @foreach ($shop as $key => $value)
                  <p> <strong>Category Name: </strong> {{$value->category->name}}</p>
                  <p> <strong>Description: </strong> {{$value->description}}</p>
                  <p> <strong>Rating: </strong> {{$value->rating}}</p>
                  <p> <strong>Price: </strong> {{$value->price}}</p>
                  <p> <strong>Discount: </strong> {{$value->discount}}</p>
                  <p> <strong>Open From: </strong> {{$value->time_from}} <strong> To: </strong> {{$value->time_to}} </p>
                  <p> <strong>Location: </strong> {{$value->location}}</p>
                  <p> <strong>City: </strong> {{$value->city->name}}</p>
                  <p> <strong>Latitude: </strong> {{$value->latitude}} - <strong> Longitude: </strong> {{$value->longitude}} </p>
                  <p> <strong>Contact: </strong> {{$value->contact}}</p>
                @endforeach
              </div>
              
              <!-- /.Main card-content.. -->
            </div>
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->


        <!-- Features Tab -->
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">
            <strong>Shop Features</strong>
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a class="btn btn-success btn-sm" id="add-shop" data-toggle="modal" data-target="#AddFeature">Add</a>
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
                      <th>Feature Name</th>
                      <th>Logo</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;?>
                    @foreach($feature as $key => $value)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$value->name}}</td>
                      <td style="text-align: center;"><img src="{{asset("images/$value->logo")}}" class="img-responsive" alt="" style="height: 50px; width: 50px;"></td>

                      <td style="text-align: center;">
                        <a class="btn btn-info btn-sm" href="javascript:void(0)" id="view-feature" data-id="{{$value->id}}" style="font-size: 10px">View</a>
                        @role('admin')
                        <a class="btn btn-warning btn-sm" href="javascript:void(0)" id="edit-feature" data-id="{{$value->id}}"  style="font-size: 10px">Edit</a>
                        <a class="btn btn-danger btn-sm" href="javascript:void(0)" id="delete-feature" data-id="{{$value->id}}"  style="font-size: 10px">Delete</a>
                        @endrole
                      </td>
                    </tr>
                    @endforeach 
                  </tbody>
                </table>
              
              </div>
              
              <!-- /.Main card-content.. -->

              <!-- /Add feature Area -->
              <div class="modal fade" id="AddFeature" aria-hidden="true">
                <div class="modal-dialog ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Add Feature</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- /Add Form Content -->
                      {{Form::open(['route' => 'feature.store', 'method' => 'POST', 'class' => 'AddForm', 'enctype'=>'multipart/form-data'])}}
                        <input type="hidden" id="shop_id" name="shop_id" value="{{ Request::get('shop_id') }}"/>                      
                        @include('admin.detail.feature_master')
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
              <!-- /.Add feature Area End -->

                <!-- /Edit feature Area -->
              <div class="modal fade" id="EditFeature" aria-hidden="true" style="display: none;">
                <div class="modal-dialog ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Feature</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- /Edit Form Content -->
                      
                      {{ Form::model($shop, ['route'=>['feature.update', '1'],'method'=>'PATCH' , 'class' => 'EditForm', 'enctype'=>'multipart/form-data']) }}
                        <input type="hidden" id="feature_id" name="feature_id" value=""/>
                        @include('admin.detail.feature_master')
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
              <!-- /.Edit feature Area End -->

                <!-- /feature Detail Area -->
              <div class="modal fade" id="DetailFeature" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Feature Details</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                          <strong>Feature Name: </strong>
                          <p id="d_feature_name"></p>
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
              <!-- /.feature Details Area End -->

                <!-- /Delete feature Area -->
              <div class="modal fade" id="DeleteFeature" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Delete Feature</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- /Delete Form Content -->
                      
                      <p>Are you sure you want to delete this feature?</p>

                      <!-- /.Delete Form Content -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      {{ Form::open(['method' => 'DELETE','route' => ['feature.destroy', '1']]) }}
                        <input type="hidden" id="feature2_id" name="feature_id" value=""/>
                        <button type="submit" class="btn btn-danger">Delete</button>
                      {{ Form::close() }}
                      
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.Delete feature Area End -->


    
            </div>
          </div><!-- /.card-body -->

        </div>
        <!-- /.card -->


        <!-- Benefits Tab -->
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">
            <strong>Shop Benefits</strong>
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a class="btn btn-success btn-sm" id="add-benefit" data-toggle="modal" data-target="#AddBenefit">Add</a>
                </li>
              </ul>
            </div>
          </div><!-- /.card-header -->

          <div class="card-body">
            <div class="tab-content p-0">
              
              <!-- Main card content.. -->
              <div class="container col-md-12">
                <table id="datatable2" class="table table-bordered table-responsive-lg table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Benefit Name</th>
                      <th>Description</th>
                      <th>Logo</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;?>
                    @foreach($benefit as $key => $value)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$value->name}}</td>
                      <td>{{substr($value->description,0,15)}}</td>
                      <td style="text-align: center;"><img src="{{asset("images/$value->logo")}}" class="img-responsive" alt="" style="height: 50px; width: 50px;"></td>
                      
                      <td style="text-align: center;">
                        <a class="btn btn-info btn-sm" href="javascript:void(0)" id="view-benefit" data-id="{{$value->id}}" style="font-size: 10px">View</a>
                        @role('admin')
                        <a class="btn btn-warning btn-sm" href="javascript:void(0)" id="edit-benefit" data-id="{{$value->id}}"  style="font-size: 10px">Edit</a>
                        <a class="btn btn-danger btn-sm" href="javascript:void(0)" id="delete-benefit" data-id="{{$value->id}}"  style="font-size: 10px">Delete</a>
                        @endrole
                      </td>
                    </tr>
                    @endforeach 
                  </tbody>
                </table>
              
              </div>
              
              <!-- /.Main card-content.. -->

              <!-- /Add benefit Area -->
              <div class="modal fade" id="AddBenefit" aria-hidden="true">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Add Benefit</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- /Add Form Content -->
                      {{Form::open(['route' => 'benefit.store', 'method' => 'POST', 'class' => 'AddForm', 'enctype'=>'multipart/form-data'])}}
                        <input type="hidden" id="shop_id" name="shop_id" value="{{ Request::get('shop_id') }}"/>                      
                        @include('admin.detail.benefit_master')
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
              <!-- /.Add benefit Area End -->

                <!-- /Edit benefit Area -->
              <div class="modal fade" id="EditBenefit" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Benefit</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- /Edit Form Content -->
                      
                      {{ Form::model($shop, ['route'=>['benefit.update', '1'],'method'=>'PATCH' , 'class' => 'EditForm', 'enctype'=>'multipart/form-data']) }}
                        <input type="hidden" id="benefit_id" name="benefit_id" value=""/>
                        @include('admin.detail.benefit_master')
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
              <!-- /.Edit benefit Area End -->

              <!-- /benefit Detail Area -->
              <div class="modal fade" id="DetailBenefit" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Benefit Details</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                          <strong>Benefit Name: </strong>
                          <p id="d_benefit_name"></p>
                      </div>
                      
                      <div class="form-group">
                        <strong>Description: </strong>
                        <p id="d_description"></p>
                      </div>

                      <div class="form-group">
                        <p>
                          <img src="" id="d_b_logo" class="img-responsive" alt="" style="height: 150px; width: 150px;">
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
              <!-- /.benefit Details Area End -->

              <!-- /Delete benefit Area -->
              <div class="modal fade" id="DeleteBenefit" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Delete Benefit</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- /Delete Form Content -->
                      
                      <p>Are you sure you want to delete this benefit?</p>

                      <!-- /.Delete Form Content -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      {{ Form::open(['method' => 'DELETE','route' => ['benefit.destroy', '1']]) }}
                        <input type="hidden" id="benefit2_id" name="benefit_id" value=""/>
                        <button type="submit" class="btn btn-danger">Delete</button>
                      {{ Form::close() }}
                      
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.Delete benefit Area End -->


    
            </div>
          </div><!-- /.card-body -->

        </div>
        <!-- /.card -->


        <!-- Promo Tab -->
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">
            <strong>Shop Promos</strong>
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a class="btn btn-success btn-sm" id="add-promo" data-toggle="modal" data-target="#AddPromo">Add</a>
                </li>
              </ul>
            </div>
          </div><!-- /.card-header -->

          <div class="card-body">
            <div class="tab-content p-0">
              
              <!-- Main card content.. -->
              <div class="container col-md-12">
                <table id="datatable4" class="table table-bordered table-responsive-lg table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Promo Name</th>
                      <th>Promo Code</th>
                      <th>Qrcode</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;?>
                    @foreach($promo as $key => $value)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$value->name}}</td>
                      <td>{{$value->code}}</td>
                      <td style="text-align: center;"> <a href="{{asset("images/$value->qrcode")}}" download> <img src="{{asset("images/$value->qrcode")}}" class="img-responsive" alt="" style="height: 80px; width: 80px;"></a></td>

                      
                      <td style="text-align: center;">
                        <a class="btn btn-info btn-sm" href="javascript:void(0)" id="view-promo" data-id="{{$value->id}}" style="font-size: 10px">View</a>
                        @role('admin')
                        <a class="btn btn-warning btn-sm" href="javascript:void(0)" id="edit-promo" data-id="{{$value->id}}"  style="font-size: 10px">Edit</a>
                        <a class="btn btn-danger btn-sm" href="javascript:void(0)" id="delete-promo" data-id="{{$value->id}}"  style="font-size: 10px">Delete</a>
                        @endrole
                      </td>
                    </tr>
                    @endforeach 
                  </tbody>
                </table>
              
              </div>
              
              <!-- /.Main card-content.. -->

              <!-- /Add Promo Area -->
              <div class="modal fade" id="AddPromo" aria-hidden="true">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Add Promo</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- /Add Form Content -->
                      {{Form::open(['route' => 'promo.store', 'method' => 'POST', 'class' => 'AddForm', 'enctype'=>'multipart/form-data'])}}
                        <input type="hidden" id="shop_id" name="shop_id" value="{{ Request::get('shop_id') }}"/>                      
                        @include('admin.detail.promo_master')
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
              <!-- /.Add Promo Area End -->

                <!-- /Edit Promo Area -->
              <div class="modal fade" id="EditPromo" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Promo</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- /Edit Form Content -->
                      
                      {{ Form::model($shop, ['route'=>['promo.update', '1'],'method'=>'PATCH' , 'class' => 'EditForm', 'enctype'=>'multipart/form-data']) }}
                        <input type="hidden" id="promo_id" name="promo_id" value=""/>
                        @include('admin.detail.promo_master')
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
              <!-- /.Edit Promo Area End -->

              <!-- /Promo Detail Area -->
              <div class="modal fade" id="DetailPromo" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Promo Details</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                          <strong>Promo Name: </strong>
                          <p id="d_promo_name"></p>
                      </div>
                      
                      <div class="form-group">
                        <strong>Promo Code: </strong>
                        <p id="d_code"></p>
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
              <!-- /.promo Details Area End -->

              <!-- /Delete promo Area -->
              <div class="modal fade" id="DeletePromo" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Delete Promo</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- /Delete Form Content -->
                      
                      <p>Are you sure you want to delete this promo?</p>

                      <!-- /.Delete Form Content -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      {{ Form::open(['method' => 'DELETE','route' => ['promo.destroy', '1']]) }}
                        <input type="hidden" id="promo2_id" name="promo_id" value=""/>
                        <button type="submit" class="btn btn-danger">Delete</button>
                      {{ Form::close() }}
                      
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.Delete promo Area End -->

    
            </div>
          </div><!-- /.card-body -->

        </div>
        <!-- /.card -->


        <!-- Offers Tab -->
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">
            <strong>Special Offers</strong>
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a class="btn btn-success btn-sm" id="add-offer" data-toggle="modal" data-target="#AddOffer">Add</a>
                </li>
              </ul>
            </div>
          </div><!-- /.card-header -->

          <div class="card-body">
            <div class="tab-content p-0">
              
              <!-- Main card content.. -->
              <div class="container col-md-12">
                <table id="datatable5" class="table table-bordered table-responsive-lg table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Offer Name</th>
                      <th>Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;?>
                    @foreach($offer as $key => $value)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$value->name}}</td>
                      <td>{{substr($value->description,0,15)}}</td>                
                      <td style="text-align: center;">
                        <a class="btn btn-info btn-sm" href="javascript:void(0)" id="view-offer" data-id="{{$value->id}}" style="font-size: 10px">View</a>
                        @role('admin')
                        <a class="btn btn-warning btn-sm" href="javascript:void(0)" id="edit-offer" data-id="{{$value->id}}"  style="font-size: 10px">Edit</a>
                        <a class="btn btn-danger btn-sm" href="javascript:void(0)" id="delete-offer" data-id="{{$value->id}}"  style="font-size: 10px">Delete</a>
                        @endrole
                      </td>
                    </tr>
                    @endforeach 
                  </tbody>
                </table>
              
              </div>
              
              <!-- /.Main card-content.. -->

              <!-- /Add offer Area -->
              <div class="modal fade" id="AddOffer" aria-hidden="true">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Add Offer</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- /Add Form Content -->
                      {{Form::open(['route' => 'offer.store', 'method' => 'POST', 'class' => 'AddForm', 'enctype'=>'multipart/form-data'])}}
                        <input type="hidden" id="shop_id" name="shop_id" value="{{ Request::get('shop_id') }}"/>                      
                        @include('admin.detail.offer_master')
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
              <!-- /.Add offer Area End -->

                <!-- /Edit offer Area -->
              <div class="modal fade" id="EditOffer" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Offer</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- /Edit Form Content -->
                      
                      {{ Form::model($shop, ['route'=>['offer.update', '1'],'method'=>'PATCH' , 'class' => 'EditForm', 'enctype'=>'multipart/form-data']) }}
                        <input type="hidden" id="offer_id" name="offer_id" value=""/>
                        @include('admin.detail.offer_master')
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
              <!-- /.Edit offer Area End -->

              <!-- /offer Detail Area -->
              <div class="modal fade" id="DetailOffer" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Offer Details</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                          <strong>Offer Name: </strong>
                          <p id="d_offer_name"></p>
                      </div>
                      
                      <div class="form-group">
                        <strong>Description: </strong>
                        <p id="d_description"></p>
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
              <!-- /.offer Details Area End -->

              <!-- /Delete offer Area -->
              <div class="modal fade" id="DeleteOffer" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Delete Offer</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- /Delete Form Content -->
                      
                      <p>Are you sure you want to delete this offer?</p>

                      <!-- /.Delete Form Content -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      {{ Form::open(['method' => 'DELETE','route' => ['offer.destroy', '1']]) }}
                        <input type="hidden" id="offer2_id" name="offer_id" value=""/>
                        <button type="submit" class="btn btn-danger">Delete</button>
                      {{ Form::close() }}
                      
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.Delete offer Area End -->

            </div>
          </div><!-- /.card-body -->

        </div>
        <!-- /.card -->


        <!-- Gallary Tab -->
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">
            <strong>Shop Gallary</strong>
            </h3>
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a class="btn btn-success btn-sm" id="add-picture" data-toggle="modal" data-target="#AddPicture">Add</a>
                </li>
              </ul>
            </div>
          </div><!-- /.card-header -->

          <div class="card-body">
            <div class="tab-content p-0">
              
              <!-- Main card content.. -->
              <div class="container col-md-12">
              
                <table id="datatable3" class="table table-bordered table-responsive-lg table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Picture</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;?>
                    @foreach($picture as $key => $value)
                    <tr>
                      <td>{{$no++}}</td>
                      <td style="text-align: center;"><img src="{{asset("images/$value->picture")}}" class="img-responsive" alt="" style="height: 200px; width: 360px;"></td>
                      
                      <td style="text-align: center;">
                        <a class="btn btn-info btn-sm" href="javascript:void(0)" id="view-picture" data-id="{{$value->id}}" style="font-size: 10px">View</a>
                        @role('admin')
                        <a class="btn btn-danger btn-sm" href="javascript:void(0)" id="delete-picture" data-id="{{$value->id}}"  style="font-size: 10px">Delete</a>
                        @endrole
                      </td>
                    </tr>
                    @endforeach 
                  </tbody>
                </table>
              
              </div>
              
              <!-- /.Main card-content.. -->

              <!-- /Add Picture Area -->
              <div class="modal fade" id="AddPicture" data-backdrop="static" data-keyboard="false" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Add Pictures</h4>
                      <button type="button" class="close" id="close-picture" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- /Add Form Content -->
                      {{Form::open(['route' => 'picture.store', 'method' => 'POST', 'class' => 'dropzone', 'id' => 'dropzone', 'enctype'=>'multipart/form-data'])}}
                        <input type="hidden" id="shop_id" name="shop_id" value="{{ Request::get('shop_id') }}"/>                      
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
              <!-- /.Add Picture Area End -->

              <!-- /Picture Detail Area -->
              <div class="modal fade" id="DetailPicture" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Picture Details</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <p style="text-align: center;">
                          <img src="" id="d_picture" class="img-responsive" alt="" style="height: 400px; width: 600px;">
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
              <!-- /.Picture Details Area End -->

              <!-- /Delete Picture Area -->
              <div class="modal fade" id="DeletePicture" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Delete Picture</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- /Delete Form Content -->
                      
                      <p>Are you sure you want to delete this picture?</p>

                      <!-- /.Delete Form Content -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      {{ Form::open(['method' => 'DELETE','route' => ['picture.destroy', '1']]) }}
                        <input type="hidden" id="picture_id" name="picture_id" value=""/>
                        <button type="submit" class="btn btn-danger">Delete</button>
                      {{ Form::close() }}
                      
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.Delete Picture Area End -->

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

        $('body').on('click', '#close-picture', function () {
          location.reload();           
        });

        var table = $('#datatable').DataTable();
        var table2 = $('#datatable2').DataTable();
        var table3 = $('#datatable3').DataTable();
        var table4 = $('#datatable4').DataTable();
        var table4 = $('#datatable5').DataTable();

        $('#toast-container').fadeOut(5000);

        /* 
          
          Feature Modal Script!! 
          
        */

        $('body').on('click', '#add-feature', function () {
          $('.AddForm').trigger("reset");
          $('#AddFeature').modal('show');              
        });

        /* When click edit user */
        $('body').on('click', '#edit-feature', function () {
          var r_id = $(this).data('id');
          $('#feature_id').val(r_id);
          $.get("{{asset("feature")}}/" + r_id + '/edit', function (data) {
              $('#EditFeature').modal('show');
              $('.EditForm #name').val(data.name);
          });
        });

        $('body').on('click', '#delete-feature', function () {
          var r_id = $(this).data('id');
          $('#feature2_id').val(r_id);
          $('#DeleteFeature').modal('show');
        });
        
        $('body').on('click', '#view-feature', function () {
          var r_id = $(this).data('id');
          $.get("{{asset("feature")}}/" + r_id, function (data) {
            $('#DetailFeature').modal('show');
              $('#d_feature_name').html(data.name);
              $('#d_logo').attr("src","{{asset("images")}}/"+data.logo);
          });
        });

        /* 
          
          Benefit Modal Script!! 
          
        */

        $('body').on('click', '#add-benefit', function () {
          $('.AddForm').trigger("reset");
          $('#AddBenefit').modal('show');              
        });

        /* When click edit user */
        $('body').on('click', '#edit-benefit', function () {
          var r_id = $(this).data('id');
          $('#benefit_id').val(r_id);
          $.get("{{asset("benefit")}}/" + r_id + '/edit', function (data) {
              $('#EditBenefit').modal('show');
              $('.EditForm #name').val(data.name);
              $('.EditForm #description').val(data.description);
          });
        });

        $('body').on('click', '#delete-benefit', function () {
          var r_id = $(this).data('id');
          $('#benefit2_id').val(r_id);
          $('#DeleteBenefit').modal('show');
        });
        
        $('body').on('click', '#view-benefit', function () {
          var r_id = $(this).data('id');
          $.get("{{asset("benefit")}}/" + r_id, function (data) {
            $('#DetailBenefit').modal('show');
              $('#d_benefit_name').html(data.name);
              $('#d_description').html(data.description);
              $('#d_b_logo').attr("src","{{asset("images")}}/"+data.logo);
          });
        });

        /* 
          
          Promo Modal Script!! 
          
        */

        $('body').on('click', '#add-promo', function () {
          $('.AddForm').trigger("reset");
          $('#AddPromo').modal('show');              
        });

        /* When click edit user */
        $('body').on('click', '#edit-promo', function () {
          var r_id = $(this).data('id');
          $('#promo_id').val(r_id);
          $.get("{{asset("promo")}}/" + r_id + '/edit', function (data) {
              $('#EditPromo').modal('show');
              $('.EditForm #name').attr("readonly", "readonly");
              $('.EditForm #name').val(data.name);
              $('.EditForm #code').val(data.code);
          });
        });

        $('body').on('click', '#delete-promo', function () {
          var r_id = $(this).data('id');
          $('#promo2_id').val(r_id);
          $('#DeletePromo').modal('show');
        });
        
        $('body').on('click', '#view-promo', function () {
          var r_id = $(this).data('id');
          $.get("{{asset("promo")}}/" + r_id, function (data) {
            $('#DetailPromo').modal('show');
              $('#d_promo_name').html(data.name);
              $('#d_code').html(data.code);
          });
        });


        /* 
          
          Offer Modal Script!! 
          
        */
        $('body').on('click', '#add-offer', function () {
          $('.AddForm').trigger("reset");
          $('#AddOffer').modal('show');              
        });

        /* When click edit user */
        $('body').on('click', '#edit-offer', function () {
          var r_id = $(this).data('id');
          $('#offer_id').val(r_id);
          $.get("{{asset("offer")}}/" + r_id + '/edit', function (data) {
              $('#EditOffer').modal('show');
              $('.EditForm #name').val(data.name);
              $('.EditForm #description').val(data.description);
          });
        });

        $('body').on('click', '#delete-offer', function () {
          var r_id = $(this).data('id');
          $('#offer2_id').val(r_id);
          $('#DeleteOffer').modal('show');
        });
        
        $('body').on('click', '#view-offer', function () {
          var r_id = $(this).data('id');
          $.get("{{asset("offer")}}/" + r_id, function (data) {
            $('#DetailOffer').modal('show');
              $('#d_offer_name').html(data.name);
              $('#d_description').html(data.description);
          });
        });


        /* 
          
          Picture Modal Script!! 
          
        */

        $('body').on('click', '#add-picture', function () {
          $('.AddForm').trigger("reset");
          $('#AddPicture').modal('show');
        });

        $('body').on('click', '#delete-picture', function () {
          var r_id = $(this).data('id');
          $('#picture_id').val(r_id);
          $('#DeletePicture').modal('show');
        });
        
        $('body').on('click', '#view-picture', function () {
          var r_id = $(this).data('id');
          $.get("{{asset("picture")}}/" + r_id, function (data) {
            $('#DetailPicture').modal('show');
              $('#d_picture').attr("src","{{asset("images")}}/"+data.picture);
          });
        });

      });
    </script>

@endsection('new_script')