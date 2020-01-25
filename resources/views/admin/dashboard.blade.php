<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Панель администратора</title>
  <link rel="shortcut icon" href="{{ asset('public/img/favicon.png') }} " type="image/png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/dashboard/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('public/dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}"> 
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/dashboard/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/') }}" target="_blank" class="nav-link">Главная страница магазина</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin') }}" class="brand-link">
      <img src="{{asset('public/dashboard/dist/img/AdminLTELogo.png')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Universal2020</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('public/dashboard/dist/img/admin.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('/admin/profile') }}" class="d-block">Администратор</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{ url('/admin/') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Главная
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ url('/admin/orders') }}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Заказы</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ url('/admin/options') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>Параметры</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Панель администратора</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-6 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3 class="numberSuccessedOrders">0</h3>

              <p>Заказов</p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="{{ url('/admin/orders') }}" class="small-box-footer">
              Подробнее <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3 class="numberAbortedOrders">0</h3>

              <p>Количество отказов</p>
            </div>
            <div class="icon">
              <i class="fas fa-chart-pie"></i>
            </div>
            <a href="{{ url('/admin/orders') }}" class="small-box-footer">
              Подробнее <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0">Таблица заказов</h5>
            </div>
            <div class="card-body">
              <h6 class="card-title">Сводка заказов</h6>
              <p class="card-text">Просмотр подробностей всех заказов (данных о клиентах, предположительное местоположение доставки).</p>
              <a href="{{ url('/admin/orders') }}" class="btn btn-primary">Перейти</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0">Параметры главной страницы</h5>
            </div>
            <div class="card-body">
              <h6 class="card-title">Главная страница</h6>
              <p class="card-text">Редактирование основных параметров (заголовок, цена, скидка и т.д.) которые выводятся на главную страницу сайта</p>
              <a href="{{ url('/admin/options') }}" class="btn btn-primary">Перейти</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2020 <a href="{{ url('/') }}" target="_black">{{ url('/') }}</a></strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('public/dashboard/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('public/dashboard/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('public/dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/dashboard/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/dashboard/dist/js/demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- page script -->
<script>
  jQuery(document).ready(function($) {
    $.ajax({
      url: 'admin/api/getOrders',
      type: 'GET',
      dataType: 'json'
    })
    .done(function(data) {
      $('.numberSuccessedOrders').html(data.length);
      $('.numberAbortedOrders').html(data.filter((obj) => obj.state < 0).length);
    });
    
  });
</script>
</body>
</html>