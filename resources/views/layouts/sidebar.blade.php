<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('adminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- Form produk -->
        <li class="treeview active menu-open">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ route('admin.products.index') }}" active><i class="fa fa-circle-o"></i> Produk</a></li>
            <li><a href="{{ route('admin.orders.index') }}"><i class="fa fa-circle-o"></i> Order</a></li>
          </ul>
        </li>
        <!-- end Form Produk -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- /.control-sidebar -->
 
