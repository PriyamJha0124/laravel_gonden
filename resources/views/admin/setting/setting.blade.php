@extends('admin.layouts.app')

@section('content_header')
    <div class="row mb-2">
      <div class="col-sm-6">
          <h1 class="m-0 text-dark">Setting</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('setting.index') }}">Setting</a></li>
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

<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">App Setting</h3>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    {{ Form::model($setting, ['route'=>['setting.update' , $setting[0]->id ], 'method'=>'PATCH' , 'class' => 'EditForm', 'enctype'=>'multipart/form-data']) }}
            
    <div class="card-body">
        <div class="form-group">
            <label for="app_name">Application Name</label>
            <input type="text" class="form-control" id="app_name" name="app_name" placeholder="Enter Application Name" value="{{ $setting[0]->app_name }}" required>
        </div>
        <div class="form-group">
            <label for="about">About</label>
            {{Form::textarea('about', $setting[0]->about,['class' => 'form-control','id' => 'about','placeholder' => 'Enter About Application','rows' => '3', 'required'])}}
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Main Picture</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="picture" name="picture">
                    <label class="custom-file-label" for="picture">Choose file</label>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-dark">Submit</button>
    </div>

    {{ Form::close() }}
</div>

    
    

@endsection('content_body')

@section('new_script')
    <script type="text/javascript">
      $(document).ready(function (){
          $('#toast-container').fadeOut(5000);

          
      });
    </script>

@endsection('new_script')