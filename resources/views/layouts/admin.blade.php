<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title') — KulonShop</title>
    <link
      rel="shortcut icon"
      href="{{ asset('public/img/favicon.png') }} "
      type="image/png"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link
      rel="stylesheet"
      href="{{asset('public/dashboard/plugins/fontawesome-free/css/all.min.css')}}"
    />
    <link
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
    <link
      rel="stylesheet"
      href="{{asset('public/dashboard/dist/css/adminlte.min.css')}}"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"
      rel="stylesheet"
    />
    @yield('styles')
  </head>
  <body class="hold-transition sidebar-mini sidebar-collapse">
    <div class="wrapper">
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"
              ><i class="fas fa-bars"></i
            ></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('/') }}" target="_blank" class="nav-link"
              >Главная страница магазина</a
            >
          </li>
        </ul>
      </nav>
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ url('/admin') }}" class="brand-link">
          <img
            src="{{asset('public/dashboard/dist/img/AdminLTELogo.png')}}"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: .8"
          />
          <span class="brand-text font-weight-light">Universal2020</span>
        </a>
        <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img
                src="{{asset('public/dashboard/dist/img/admin.jpg')}}"
                class="img-circle elevation-2"
                alt="User Image"
              />
            </div>
            <div class="info">
              <a href="{{ url('/admin/profile') }}" class="d-block"
                >Администратор</a
              >
            </div>
          </div>
          <nav class="mt-2">
            <ul
              class="nav nav-pills nav-sidebar flex-column"
              data-widget="treeview"
              role="menu"
              data-accordion="false"
            >
              <li class="nav-item has-treeview">
                <a
                  href="{{ url('/admin/') }}"
                  class="nav-link {{ Request::is('admin') ? 'active' : '' }}"
                >
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Главная
                  {!! Request::is('admin') ? '<i class="fas fa-angle-left right"></i>' : '' !!}
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a
                  href="{{ url('/admin/orders') }}"
                  class="nav-link {{ Request::is('admin/orders') ? 'active' : '' }}"
                >
                  <i class="nav-icon fas fa-table"></i>
                  <p>Заказы
                  {!! Request::is('admin/orders') ? '<i class="fas fa-angle-left right"></i>' : '' !!}
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a
                  href="{{ url('/admin/options') }}"
                  class="nav-link {{ Request::is('admin/options') ? 'active' : '' }}"
                >
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Параметры
                  {!! Request::is('admin/options') ? '<i class="fas fa-angle-left right"></i>' : '' !!}
                  </p>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </aside>
      <div class="content-wrapper">
        @yield('content')
      </div>
      <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
          <b>Version:</b> {{ env('APP_VERSION') }} | 
          <b>Time:</b> {{ date('h:i:s') }} {{ date('d.m.Y') }}
        </div>
        <strong
          >Copyright &copy; {{ date('Y') }}
          <a href="{{ url('/') }}" target="_black">{{ url('/') }}</a></strong
        >
      </footer>
    </div>
    <script src="{{asset('public/dashboard/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/dashboard/dist/js/adminlte.min.js')}}"></script>
    <script src="{{asset('public/dashboard/dist/js/demo.js')}}"></script>
    @yield('scripts')
  </body>
</html>
