<!DOCTYPE html>
<html lang="en">

{{-- head css --}}
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title',config('app.name'))</title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('adminassets/plugins/fontawesome-free/css/all.min.css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminassets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminassets/dist/css/adminlte.min.css') }}">
  @yield('styles')
{{-- عندما تكون الصفحة عربي غير اتجاه من خلال diration :rtl --}}
@if (app()->currentLocale() == 'ar')
{{-- style admin lte arabic --}}
<style>
  .table{
      direction: rtl;

  }
          body {
              direction: rtl;
              text-align: right
          }
          @media (min-width: 768px) {
              body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
              margin-right: 250px;
              margin-left: 0;
              direction: ltr;
             }
          }
          ul {
            padding: 0
          }
            .nav-sidebar .nav-link>.right, .nav-sidebar .nav-link>p>.right {
            right: unset;
            left: 1rem;
          }

           .brand-link .brand-image {
            float: right;
            line-height: -4.2;
            margin-left: 0.8rem;
            margin-right: 0.5rem;
            margin-top: -3px;
             max-height: 33px;
            width: auto;
          }

          .user-panel {
           position: relative;
           margin: 9px;
          }
          .content-header h1 {
                  display: flex;
                  font-size: 1.8rem;
                  margin: 0;
              }
              .nav-link{
                direction: 	ltr;
              }
</style>

@endif
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"> Welcome,{{ Auth::user()->name }}</span>
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Home
            </a>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf

            </form>
        </div>
    </li>
    </ul>

    <ul class="navbar-nav ml-auto ">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 ">Languages ({{ app()->currentLocale() }})
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    <img width="20"
                    src="{{ asset('adminassets/img/'. $properties['native']) }}" alt="">
                        {{ $properties['native'] }}
                    </a>
            @endforeach

            </div>
        </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"></span>
        </a>

      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link">
        <img src="{{ asset('adminassets/img/img.jpeg') }}" class="rounded-circle" style="width: 45px;"
        alt="Avatar" />      <span class="brand-text font-weight-light">@if (app()->currentLocale() == 'ar')
        {{ env('APP_NAME_AR') }}
        @else
        {{ config('app.name') }}
      @endif</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                </div>
        <div class="info">
          <a href="{{ route('admin.index') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            {{-- Dashbord --}}
            <li class="nav-item">
                <a href="../widgets.html" class="nav-link">
                    <i class="fas fa-columns"></i>
                  <p>
                  {{ __('site.Dashboard') }}
                  </p>
                </a>
            </li>
            <br>

            {{-- Service --}}
            <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users-cog"></i>
                    <p>
                        {{ __('site.Service') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../../index.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.All Service') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../index2.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.Add Service') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../index3.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.Trash') }}</p>
                        </a>
                    </li>
                    </ul>
            </li>
            <br>
            {{-- Experience --}}
            <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-briefcase"></i>
                    <p>
                        {{ __('site.Experience') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../../index.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.All Experience') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../index2.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.Add Experience') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../index3.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.Trash') }}</p>
                        </a>
                    </li>
                    </ul>
            </li>
            <br>

            {{-- Skill --}}
            <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-grin-wink"></i>
                    <p>
                        {{ __('site.Skills') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../../index.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.All Skills') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../index2.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.Add Skills') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../index3.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('site.Trash') }}</p>
                        </a>
                    </li>
                    </ul>
            </li>
            <br>

            {{-- Interst --}}
            <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-skiing-nordic"></i>
                            <p>
                                {{ __('site.Interst') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="../../index.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('site.All Interst') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../../index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('site.Add Interst') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../../index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('site.Trash') }}</p>
                                </a>
                            </li>
                            </ul>
            </li>
            <br>

            {{-- Portfolio --}}
            <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-hand-holding"></i>
                            <p>
                                {{ __('site.Portfolio') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="../../index.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('site.All Portfolio') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../../index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('site.Add Portfolio') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../../index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('site.Trash') }}</p>
                                </a>
                            </li>
                            </ul>
            </li>
`           <br>

            {{-- Review --}}
            <li class="nav-item">
                <a href="../widgets.html" class="nav-link">
                    <i class="fas fa-chart-line"></i>
                  <p>
                    {{ __('site.Review') }}
                  </p>
                </a>
            </li>


      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019-2023 <a href="#">{{ __('site.Hashem Mushtaha') }}</a>.</strong> All rights reserved.
  </footer>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('adminassets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminassets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminassets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminassets/dist/js/demo.js') }}"></script>
@yield('scripts')
</body>
</html>
