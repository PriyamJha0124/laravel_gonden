@extends('admin.layouts.app')

@section('content_header')
    <div class="row mb-2">
      <div class="col-sm-6">
          <h1 class="m-0 text-dark">Used Promo</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('used-promo.index') }}">Used Promo</a></li>
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
                  Used Promo List
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
                          <th>Username</th>
                          <th>Shop Name</th>
                          <th>Promo Used</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1;?>
                          @foreach($promos as $key => $value)
                          <tr>
                            <td >{{$no++}}</td>
                            <td >{{$value->user_name}}</td>
                            <td >{{$value->shop->name }}</td>
                            <td >{{$value->promo_code }}</td>
                          </tr>
                          @endforeach 
                      </tbody>
                    </table>
                    
                  </div>

                  <!-- /.Main card-content.. -->
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

      });
    </script>
    
@endsection('new_script')