<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Administrador</title>
    <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/wizard/bs-stepper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/dark-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/bordered-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/semi-dark-layout.min.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-wizard.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/modal-create-app.min.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <!-- END: Custom CSS-->

    <!-- Js Vue -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fin Vue -->
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
      <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
          <ul class="nav navbar-nav d-xl-none">
            <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
          </ul>


        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
          <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"  href="{{route('logout')}}">
              <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">{{Auth::user()->name}}</span><span class="user-status">{{Auth::user()->user}}</span></div><span class=""> <i class="fas fa-sign-out-alt text-primary" style="font-size: 40px"></i> <span class="avatar-status-online"></span></span></a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item me-auto"><a class="navbar-brand" href="html/ltr/vertical-menu-template/index.html"><span class="brand-logo">
                <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                  <defs>
                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                      <stop stop-color="#000000" offset="0%"></stop>
                      <stop stop-color="#FFFFFF" offset="100%"></stop>
                    </lineargradient>
                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                      <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                      <stop stop-color="#FFFFFF" offset="100%"></stop>
                    </lineargradient>
                  </defs>
                  <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                      <g id="Group" transform="translate(400.000000, 178.000000)">
                        <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                        <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                        <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                        <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                        <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                      </g>
                    </g>
                  </g>
                </svg></span>
              <h2 class="brand-text">Administrador</h2></a></li>
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{route('home')}}">
                    <i data-feather="home"></i><span class="menu-title text-truncate" >Inicio</span>
                </a>
            </li>
            @if(Auth::user()->type_user == 1 OR Auth::user()->type_user == 3)
          <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Invoice">Configuraciones</span></a>
            <ul class="menu-content">
              <li>
                    <a class="d-flex align-items-center" href="{{route('usuarios')}}">
                      <i data-feather="circle"></i><span class="menu-item text-truncate">Usuarios</span>
                    </a>
                    <a class="d-flex align-items-center" href="{{route('plan_cuentas')}}">
                      <i data-feather="circle"></i><span class="menu-item text-truncate">Plan de Cuentas</span>
                    </a>
                    <a class="d-flex align-items-center" href="{{route('bancos')}}">
                        <i data-feather="circle"></i><span class="menu-item text-truncate">Bancos</span>
                      </a>
              </li>
            </ul>
          </li>
          @endif

          @if(Auth::user()->type_user == 1 OR Auth::user()->type_user == 3)
          <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="database"></i><span class="menu-title text-truncate" data-i18n="Invoice">Parametros</span></a>
            <ul class="menu-content">
              <li>
                    <a class="d-flex align-items-center" href="{{route('aportes')}}">
                      <i data-feather="circle"></i><span class="menu-item text-truncate">Aportes</span>
                    </a>
                    <a class="d-flex align-items-center" href="{{route('encargados')}}">
                      <i data-feather="circle"></i><span class="menu-item text-truncate">Encargados</span>
                    </a>
              </li>
            </ul>
          </li>
          @endif
          @if(Auth::user()->type_user == 1 OR Auth::user()->type_user == 3)
          <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="trello"></i><span class="menu-title text-truncate" data-i18n="Invoice">Presupuestos</span></a>
            <ul class="menu-content">
              <li>
                    <a class="d-flex align-items-center" href="{{route('presupuesto-anual')}}">
                      <i data-feather="circle"></i><span class="menu-item text-truncate">Presupuesto Anual</span>
                    </a>
              </li>
            </ul>
          </li>
          @endif
          @if(Auth::user()->type_user == 1 OR Auth::user()->type_user == 3)
          <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="shopping-cart"></i><span class="menu-title text-truncate" data-i18n="Invoice">Compras</span></a>
            <ul class="menu-content">
              <li>
                    <a class="d-flex align-items-center" href="{{route('proveedores')}}">
                      <i data-feather="circle"></i><span class="menu-item text-truncate">Proveedores</span>
                    </a>
              </li>

              <li>
                <a class="d-flex align-items-center" href="{{route('ordenes-compra')}}">
                  <i data-feather="circle"></i><span class="menu-item text-truncate">Ordenes de Compra</span>
                </a>
          </li>
            </ul>
          </li>
          @endif
          @if(Auth::user()->type_user == 1 OR Auth::user()->type_user == 2 OR Auth::user()->type_user == 3 OR Auth::user()->type_user == 4)
          <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Invoice">Socios</span></a>
            <ul class="menu-content">
              <li>
                    <a class="d-flex align-items-center" href="{{route('socios_tipo', 1)}}">
                      <i data-feather="circle"></i><span class="menu-item text-truncate">Por Convenio</span>
                    </a>
                    <a class="d-flex align-items-center" href="{{route('socios_tipo', 2)}}">
                      <i data-feather="circle"></i><span class="menu-item text-truncate">Otros Bancos</span>
                    </a>
                    <a class="d-flex align-items-center" href="{{route('socios_tipo', 3)}}">
                      <i data-feather="circle"></i><span class="menu-item text-truncate">Inactivos</span>
                    </a>
                    <a class="d-flex align-items-center" href="{{route('socios_tipo', 4)}}">
                      <i data-feather="circle"></i><span class="menu-item text-truncate">Suspendidos</span>
                    </a>
                    <a class="d-flex align-items-center" href="{{route('procesos')}}">
                        <i data-feather="circle"></i><span class="menu-item text-truncate">Procesos</span>
                    </a>
                    <a class="d-flex align-items-center" href="{{route('aportes_socios')}}">
                        <i data-feather="circle"></i><span class="menu-item text-truncate">Aportes</span>
                    </a>
              </li>
            </ul>
          </li>
          @endif

        </ul>
      </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content " id="app">
        <input type="hidden" id="usuario_id" value="{{Auth::user()->id}}">
        <input type="hidden" id="type_user" value="{{Auth::user()->type_user}}">
        <input type="hidden" id="tipo_socios" value="{{Auth::user()->tipo_socios}}">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper container-xxl p-0">

        <div class="content-body" >
            @yield('contenido')
        </div>
      </div>
    </div>
    <!-- END: Content-->



    </div>
    <!-- End: Customizer-->


    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>




    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/cleave/cleave.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('app-assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{asset('app-assets/js/core/app.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/customizer.min.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/js/scripts/pages/modal-add-new-cc.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/pages/page-pricing.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/pages/modal-add-new-address.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/pages/modal-create-app.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/pages/modal-two-factor-auth.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/pages/modal-edit-user.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/pages/modal-share-project.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('app-assets/js/scripts/forms/form-wizard.min.js')}}"></script>
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <!-- END: Page JS-->

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      });

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
  </body>
  <!-- END: Body-->
</html>
