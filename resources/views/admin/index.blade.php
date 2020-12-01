@extends('admin.layouts.app')

@section('content_header')
    <div class="row mb-2">
      <div class="col-sm-6">
          <h1 class="m-0 text-dark">Admin Dashboard</h1>
      </div>
    </div>
@endsection('content_header')

<?php 
  use App\Model\Category;
  use App\Model\Shop;
  use App\Model\AppUser;
  use App\Model\Message;
?>

@section('content_body')
<div class="row">

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{Category::count()}}</h3>
        <strong>Category</strong>
      </div>
      <div class="icon">
        <i class="fas fa-th"></i>
      </div>
    <a href="{{ route('category.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{Shop::count()}}</h3>
        <strong>Shop</strong>
      </div>
      <div class="icon">
        <i class="fas fa-store"></i>
      </div>
    <a href="{{ route('shop.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{AppUser::count()}}</h3>
        <strong>User</strong>
      </div>
      <div class="icon">
        <i class="fas fa-user"></i>
      </div>
    <a href="{{ route('user.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{Message::with(['user'])->orderBy('is_read')->get()->unique('user_id')->count()}}</h3>
        <strong>Support Chat</strong>
      </div>
      <div class="icon">
        <i class="fas fa-comments"></i>
      </div>
    <a href="{{ route('message.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

</div>

@endsection('content_body')
