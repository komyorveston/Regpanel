<!DOCTYPE html>
<html>
<!--start Head-->
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="#" type="image/png" />

    <title></title>
	<!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap -->
    <link href="{{asset('gentella/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('gentella/vendors/select2/dist/css/select2.css')}}">
    <!-- Font Awesome -->
    <link href="{{asset('gentella/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('gentella/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('gentella/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{asset('gentella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('gentella/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('gentella/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <!-- Organization Structure Style -->
    <link href="{{asset('gentella/vendors/bootstrap-daterangepicker/org-structure.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{asset('gentella/build/css/custom.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/my.css')}}">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<style>
    .wrapper{
        overflow:hidden;
    }
</style>

</head>
<!--end Head-->

<!--Start Body-->
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-desktop"></i> <span>{!!MetaTag::tag('title')!!}</span></a>
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('images\picture.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Добро пожаловать,</span>
                <h2>User Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="#"><i class="fa fa-bar-chart"></i>Главная <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Статистика</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-building"></i> Организации <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('regpanel.panel.organizations.index')}}">Список огранизаций</a></li>
                      <li><a href="{{route('regpanel.panel.organizations.create')}}">Создать организацию</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Отделы <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('regpanel.panel.departments.index')}}"> Список отделов </a></li>
                      <li><a href="{{route('regpanel.panel.departments.create')}}"> Создать отдел </a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-slack"></i> Позиции <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('regpanel.panel.positions.index')}}">Список должностей</a></li>
                      <li><a href="{{route('regpanel.panel.positions.create')}}">Создать должность</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-male"></i> Сотрудники <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('regpanel.panel.stuffs.index')}}">Список сотрудников</a></li>
                      <li><a href="{{route('regpanel.panel.stuffs.create')}}">Создать сотрудника</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-male"></i> Пользователи <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('regpanel.panel.users.index')}}">Список пользователей</a></li>
                      <li><a href="{{route('regpanel.panel.users.create')}}">Создать пользователя</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
             <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">{{ucfirst (Auth::user()->name) }}
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="{{route('regpanel.panel.users.edit', Auth::user()->id)}}"> Профиль</a>
                    <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Выход</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                    </form>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
                @include('regpanel.panel.components.result_messages')
                @yield('content')
          </div>
        </div>
       </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            All rights reserved SifatInnoTech
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

<!-- ./wrapper -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">
    var route = "{{url('/admin/autocomplete')}}";
    $('#search').typeahead({
        source: function (term, process) {
            return $.get(route, {term:term}, function (data) {
                return process(data);
            });
        }
    });
</script>
<script>
    var pathd = '{{PATH}}';
</script>

<!--AjaxUpload-->
<script src="{{asset('js/ajaxupload.js')}}"></script>

<!-- Validator -->
<script src="{{asset('js/validator.js')}}"></script>
<!-- Search -->
<!--Gentella scripts-->
    <!-- jQuery -->
    <script src="{{asset('gentella/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('gentella/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('gentella/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('gentella/vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{asset('gentella/vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{asset('gentella/vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('gentella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('gentella/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{asset('gentella/vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{asset('gentella/vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('gentella/vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('gentella/vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('gentella/vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('gentella/vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{asset('gentella/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{asset('gentella/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{asset('gentella/vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{asset('gentella/vendors/DateJS/build/date.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('gentella/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{asset('gentella/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('gentella/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('gentella/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('gentella/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('gentella/build/js/custom.min.js')}}"></script>

    <!--Gentella Scripts-->

<!--для поля ввода с редактором текста в добавить новый товар-->
<script src="{{asset('gentella/vendors/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('gentella/vendors/ckeditor/adapters/jquery.js')}}"></script>
<!--Для select связанные товары в админке добавить товар-->
<script src="{{asset('js/my.js')}}"></script>
<!-- === = ===  -->
@include('regpanel.panel.stuff.include.script_img')
@include('regpanel.panel.organization.include.script_img')

</body>
</html>
