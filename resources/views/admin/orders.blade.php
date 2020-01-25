<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Заказы</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{ asset('public/img/favicon.png') }} " type="image/png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/dashboard/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <!-- <link rel="stylesheet" href="{{asset('public/dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">  -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/dashboard/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css" media="screen">
    .selected {
      background: #B0BED9 !important;
    }

    tbody tr:not(.selected):hover {
      cursor: pointer !important;
    }
    .flex-wrap {
      margin-bottom: 20px;
    }
  </style>
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
            <a href="{{ url('/admin/') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Главная
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ url('/admin/orders') }}" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Заказы
                <i class="fas fa-angle-left right"></i>
              </p>
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
            <h1>Таблица заказов</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                  <table id="orders" class="table table-bordered table-hover " style="width: 100%" >
                    <thead>
                    <tr>
                      <th data-priority="1">№ Заказа</th>
                      <th>№ Формы</th>
                      <th data-priority="2">Имя</th>
                      <th data-priority="3">Телефон</th>
                      <th data-priority="4">Дата/Время</th>
                      <th>IP-адресс</th>
                      <th>Город</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                      <th>№ Заказа</th>
                      <th>№ Формы</th>
                      <th>Имя</th>
                      <th>Телефон</th>
                      <th>Дата/Время</th>
                      <th>IP-адресс</th>
                      <th>Город</th>
                    </tr>
                    </tfoot>
                  </table>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
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
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
{{-- sweetalert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/dashboard/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/dashboard/dist/js/demo.js')}}"></script>
<!-- page script -->
<script>
  const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: false
  })
  let table = $('#orders').DataTable({
      "select": {
            style: 'single'
        },
      "dom": 'Bfrtip',
      "buttons": [
            {
                text: 'Подтверждение',
                className: 'btn btn-success',
                action: function ( e, dt, node, config ) {
                    if (table.rows( { selected: true } ).data()[0] !== undefined) {
                      setOrderState(table.rows( { selected: true } ).data()[0].id, 'successed')
                    } else {
                      Toast.fire({
                        icon: 'warning',
                        title: 'Выберите строку в таблице'
                      })
                    }
                }
            },
            {
                text: 'По умолчанию',
                className: 'btn btn-secondary',
                action: function ( e, dt, node, config ) {
                    if (table.rows( { selected: true } ).data()[0] !== undefined) {
                      setOrderState(table.rows( { selected: true } ).data()[0].id, 'discard')
                    } else {
                      Toast.fire({
                        icon: 'warning',
                        title: 'Выберите строку в таблице'
                      })
                    }
                }
            },
            {
                text: 'Отказ',
                className: 'btn btn-danger',
                action: function ( e, dt, node, config ) {
                  if (table.rows( { selected: true } ).data()[0] !== undefined) {
                      setOrderState(table.rows( { selected: true } ).data()[0].id, 'canceled')
                    } else {
                      Toast.fire({
                        icon: 'warning',
                        title: 'Выберите строку в таблице'
                      })
                    }
                }
            }
        ],
      "language": {
          "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Russian.json"
        },
        "responsive": true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "ajax": {
          "url": "/admin/api/getOrders",
          "dataSrc": ""
         },
        "columns": [
          {
            "data": "id",
            "width": "5%"
          },
          {
            "data": "form",
            "width": "5%"
          },
          {
            "data": "name",
            "width": "10%"
          },
          {
            "data": "phone",
            "width": "20%"
          },
          {
            "data": "timestamp",
            "width": "15%"
          },
          {
            "data": "ip",
            "width": "15%"
          },
          {
            "data": "location",
            "width": "30%"
          }
      ],
      "createdRow": function( row, data, dataIndex){
        if (data.state == 1) {
            $('td', row).addClass('table-success');
          } else if (data.state == -1) {
            $('td', row).addClass('table-danger');
          }
    }
    });

  function setOrderState(id, action) {
    let query = $.ajax({
      url: '/admin/api/setOrderState',
      type: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      dataType: 'json',
      data: {id, action}
    })
    .done(function(r) {
      if (r.response) {
        if (action == 'successed') {
          table.ajax.reload();
          Toast.fire({
            icon: 'success',
            title: 'Заказ подтверждён'
          })
        } else if (action == 'canceled') {
          table.ajax.reload();
          Toast.fire({
            icon: 'error',
            title: 'Заказ отменен'
          })
        } else if(action == 'discard') {
          table.ajax.reload();
          Toast.fire({
            icon: 'success',
            title: 'Статус заказа: По умолчанию'
          })
        }
      } else {
        Toast.fire({
        icon: 'warning',
        title: 'При сохранении статуса заявка произошла ошибка'
      })
      }
    })
    .fail(function() {
      Toast.fire({
        icon: 'warning',
        title: 'При отправке запроса на сервер произошла ошибка'
      })
    })
  }
</script>
</body>
</html>