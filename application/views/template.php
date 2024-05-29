<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My POS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url('assets') ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini <?= $this->uri->segment(1) == 'sale' ? 'sidebar-collapse' : null ?>">

  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?= base_url('dashboard'); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">m<b>P</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">my<b>POS</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url('assets') ?>/dist/img/user.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= $this->fungsi->user_login()->username; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?= base_url('assets') ?>/dist/img/user.jpg" class="img-circle" alt="User Image">

                  <p>
                  <?= $this->fungsi->user_login()->name; ?>
                    <small><?= $this->fungsi->user_login()->address; ?>, Indonesia</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                  <!-- <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div> -->
                  <div class="">
                    <a href="<?= site_url('auth/logout'); ?>" onclick="return confirm('Anda akan logout..')"  class="btn btn-danger btn-block">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?= base_url('assets') ?>/dist/img/user.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?= ucfirst($this->fungsi->user_login()->username); ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </form> -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li class="<?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'active' : ''; ?>"><a href="<?= site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
          <li class="<?= $this->uri->segment(1) == 'supplier' ? 'active' : ''; ?>"><a href="<?= site_url('supplier'); ?>"><i class="fa fa-truck"></i> <span>Supplier</span></a></li>
          <li class="<?= $this->uri->segment(1) == 'customer' ? 'active' : ''; ?>"><a href="<?= site_url('customer'); ?>"><i class="fa fa-users"></i> <span>Customers</span></a></li>
          
          <li class="treeview <?= $this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'unit' || $this->uri->segment(1) == 'item' ? 'active' : ''; ?>">
            <a href="#">
              <i class="fa fa-archive"></i>
              <span>Products</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?= $this->uri->segment(1) == 'category' ? 'active' : ''; ?>"><a href="<?= site_url('category'); ?>"><i class="fa fa-circle-o"></i> Categories</a></li>
              <li class="<?= $this->uri->segment(1) == 'unit' ? 'active' : ''; ?>"><a href="<?= site_url('unit'); ?>"><i class="fa fa-circle-o"></i> Units</a></li>
              <li class="<?= $this->uri->segment(1) == 'item' ? 'active' : ''; ?>"><a href="<?= site_url('item'); ?>"><i class="fa fa-circle-o"></i> Items</a></li>
            </ul>
          </li>
          <li class="treeview <?= $this->uri->segment(1) == 'stock' || $this->uri->segment(1) == 'sale' ? 'active' : '' ?>">
            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span>Transaction</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li <?= $this->uri->segment(1) == 'sale' ? 'class="active"' : '' ?>>
                <a href="<?= site_url('sale'); ?>"><i class="fa fa-circle-o"></i> Sales</a>
              </li>
              <li <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'in' ? 'class="active"' : '' ?>>
                <a href="<?= site_url('stock/in'); ?>"><i class="fa fa-circle-o"></i> Stock In</a>
              </li>
              <li <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'out' ? 'class="active"' : '' ?>>
                <a href="<?= site_url('stock/out'); ?>"><i class="fa fa-circle-o"></i> Stock Out</a>
              </li>
            </ul>
          </li>

          <!-- <li class="treeview <?= $this->uri->segment(1) == 'report' ? 'active' : '' ?>">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Reports</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li <?= $this->uri->segment(1) == 'report' && $this->uri->segment(2) == 'sale' ? 'class="active"' : '' ?>>
                <a href="<?= site_url('report/sale'); ?>"><i class="fa fa-circle-o"></i> Sales</a>
              </li>
              <li <?= $this->uri->segment(1) == 'report' && $this->uri->segment(2) == 'stock' ? 'class="active"' : '' ?>>
                <a href="<?= site_url('report/stock'); ?>"><i class="fa fa-circle-o"></i> Stocks</a>
              </li>
            </ul>
          </li> -->
          
          <li class="<?= $this->uri->segment(1) == 'invoice' ? 'active' : ''; ?>">
            <a href="<?= site_url('invoice'); ?>"><i class="fa fa-file-text"></i> <span>Invoice(s)</span></a>
          </li>

          <li class="<?= $this->uri->segment(1) == 'reports' ? 'active' : ''; ?>">
            <a href="<?= site_url('reports'); ?>"><i class="fa fa-file"></i> <span>Reports</span></a>
          </li>
          <?php if($this->fungsi->user_login()->level == 1){ ?>
          <li class="header">SETTING</li>
          <li><a href="<?= site_url('user'); ?>"><i class="fa fa-users"></i> <span>Users</span></a></li>
          <?php } ?>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- jQuery 3 -->
    <script src="<?= base_url('assets') ?>/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?= $contents; ?>
    
    </div>

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
      reserved.
    </footer>

  </div>
  <!-- ./wrapper -->

  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url('assets') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url('assets') ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url('assets') ?>/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('assets') ?>/dist/js/demo.js"></script>
  <script>
    $(document).ready(function () {
      $('.sidebar-menu').tree()
    })
  </script>

  <script src="<?= base_url('assets') ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function(){
      $('#table1').DataTable();
    })
  </script>
</body>
</html>
