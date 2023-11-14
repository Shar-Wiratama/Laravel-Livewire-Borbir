<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Borbir</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
          {{ auth()->user()->name}}
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link {{request()->is('admin/dashboard')?'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Admin Dashboard
              </p>
            </a>
          </li>

          {{-- <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                   <li class="nav-item">
                <a href="{{route('anggotaDashboard')}}" class="nav-link {{request()->is('anggotaDashboard')?'active' : ''}}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Anggota Dashboard
                  </p>
                </a>
              </li> --}}

           <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="{{route('anggota.pencatatan.create')}}" class="nav-link {{request()->is('anggota/pencatatan/create')?'active' : ''}}">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Buat Pencatatan
              </p>
            </a>
          </li>

          <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="{{route('admin.pencatatan')}}" class="nav-link {{request()->is('admin/pencatatan')?'active' : ''}}">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Pilih Pencatatan
              </p>
            </a>
          </li>

          <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="{{route('admin.pengumuman')}}" class="nav-link {{request()->is('admin/pengumuman')?'active' : ''}}">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Pengumuman
              </p>
            </a>
          </li>

          <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="{{route('anggota.pengumuman.view')}}" class="nav-link {{request()->is('anggota/pengumuman/view')?'active' : ''}}">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                List Pengumuman
              </p>
            </a>
          </li>

          <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="{{route('admin.users')}}" class="nav-link {{request()->is('admin/users')?'active' : ''}}">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                User
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Pengaturan
              </p>
            </a>
          </li>

          <li class="nav-item">
            <form method="POST" action="{{route('logout')}}">
            @csrf
              <a href="{{ route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>