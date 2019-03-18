<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{asset('bower_components/AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <!-- Status -->
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu">
    <li class="header">Menu Utama</li>
    <!-- Optionally, you can add icons to the links -->
    <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <li><a href="{{url('admin/formulir_btl')}}"><i class="fa fa-hand-pointer-o"></i> <span>Formulir</span></a></li>
    <li class="treeview">
      <a href="#"><i class="fa fa-book"></i> <span>Report</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url('admin/report/desa')}}">Desa yang belum</a></li>
        <li><a href="{{url('admin/page/3/edit')}}">All</a></li>
        <li><a href="{{url('admin/page')}}">Tahunan</a></li>
        <li><a href="{{url('admin/users')}}">User</a></li>
        <li><a href="{{url('admin/role')}}">Role</a></li>
      </ul>
    </li>

    <!-- khusus untuk admin -->
    @if(Auth::user()->role_id == 1)
   <!--  <li><a href="{{url('admin/kategory')}}"><i class="fa fa-archive"></i> <span>Data Menu</span></a></li>
    <li><a href="{{url('admin/peraturan_daerah')}}"><i class="fa fa-archive"></i> <span>Peraturan Daerah</span></a></li>
    <li><a href="{{url('admin/apbd')}}"><i class="fa fa-archive"></i> <span>APBD</span></a></li> -->
    <li class="treeview">
      <a href="#"><i class="fa fa-link"></i> <span>Setting</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url('admin/menu')}}">Menu</a></li>
        <li><a href="{{url('admin/page/3/edit')}}">Halaman Awal</a></li>
        <li><a href="{{url('admin/page')}}">Halaman</a></li>
        <li><a href="{{url('admin/users')}}">User</a></li>
        <li><a href="{{url('admin/role')}}">Role</a></li>
      </ul>
    </li>
    @endif
    <li><a href="{{ url('logout') }}">
      <i class="fa fa-lock"></i> Logout
    </a>
  </li>
</ul>
<!-- /.sidebar-menu -->
</section>
