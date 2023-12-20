<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   <!-- <a href="index3.html" class="brand-link">
      <img src="logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="border-radius: 0px;border: none;box-shadow:none">
      <span> &nbsp;</span> 
    </a>
-->
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/alias.jfif" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info light" style='color:white'>
          <!-- @auth
            <h4>  {{ auth()->user()->name }} </h4>
          @endauth -->
          <h4>{{$auth->name}}</h4>
        </div>
      </div>

     
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('user/home') }}" class="nav-link {{ $page == 'Home' ? 'active' : 'inactive' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
            
          </li>
              
          <li class="nav-item">
            <a href="{{ url('user/view/helper') }}" class="nav-link {{ $page == 'View Helper' ? 'active' : 'inactive' }}">
                <i class="nav-icon fa fa-table"></i>
                <p>
                  Helper
                </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="{{ url('user/request/status') }}" class="nav-link {{ $page == 'View Status' ? 'active' : 'inactive' }}">
                <i class="nav-icon fa fa-bullseye"></i>
                <p>
                  Request Status
                </p>
            </a>
           
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>