
  <!-- Main Sidebar Container -->

  <?php 
  use App\Model\Message;
  ?>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light"><b>Admin Portal</b></span>
    </a>

    <?php
    // $user_detail = "user/".Auth::user()->id;
    ?>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="" class="d-block">
            <i class="nav-icon fas fa-user-tie"></i> &nbsp;
              {{Auth::user()->name}}

          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @role('admin')
          
          <li class="nav-item">
            <a href="{{ asset('category') }}" class="nav-link">
              <i class="fas fa-th"></i>
              <p style="margin-left: 15px;">
                Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ asset('shop') }}" class="nav-link">
              <i class="fas fa-store"></i>
              <p style="margin-left: 15px;">
                Shop
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ asset('used-promo') }}" class="nav-link">
              <i class="fas fa-bullhorn"></i>
              <p style="margin-left: 15px;">
                Used Promo
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ asset('message') }}" class="nav-link">
              <i class="fas fa-comments"></i>
              <p style="margin-left: 15px;">
                Support Chat 
                @if(Message::where('is_read', 0)->count() > 0)
                  <span class="badge badge-danger right"> {{Message::where('is_read', 0)->count()}} </span>
                @endif
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ asset('setting') }}" class="nav-link">
              <i class="fas fa-cog"></i>
              <p style="margin-left: 15px;">
                App Setting
              </p>
            </a>
          </li>
         
          <li class="nav-item has-treeview">
            <!-- add class active for highlight -->
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!-- add class active to highlight -->
                <a href="{{ asset('user') }}" class="nav-link ">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <!-- add class active to highlight -->
                <a href="{{ asset('role') }}" class="nav-link ">
                  <i class="far fa-id-card nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li> --}}
            </ul>
          </li>
          @endrole

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

