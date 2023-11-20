<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html  lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('admin/assets/') }}" data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta   name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" >
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @livewireStyles


    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('admin/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('admin/assets/js/config.js') }}"></script>
    @stack('styles')
  </head>

<body>
    <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="{{ asset('/') }}" class="app-brand-link">       
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Gear i</span>
          </a>
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>
        <div class="menu-inner-shadow">
        </div>
          <ul class="menu-inner py-1 ps ps--active-y">
            <!-- Dashboard -->
            <li class="menu-item  mb-4 active">
              <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            <li class="menu-item mb-4">
                <a class=" menu-link"  href="{{ route('admin.categories') }}"
                title="Categories">
                    <div data-i18n="Categories">Categories</div>
                </a>
             </li>
            <li class="menu-item  mb-4">
                <a class=" menu-link" href="{{ route('admin.products') }}"
                title="Products">
                  <div data-i18n="Products">Products</div>
                </a>
            </li>
            <li class="menu-item  mb-4">
              <a class=" menu-link" href="{{ route('admin.homeslider') }}"
                title="Manage Home Slider">
                <div data-i18n="ProduManage Home Slidercts">Manage Home Slider</div></a>
            </li>
            <li class="menu-item  mb-4">
              <a class=" menu-link" href="{{ route('admin.homecategories') }}"
                title="Manage Home Categories">
                   <div data-i18n="Manage Home Categories">Manage Home Categories</div></a>
            </li>
            <li class="menu-item  mb-4">
                <a class=" menu-link" href="{{ route('admin.sale') }}"
                    title="Sale Setting">
                      <div data-i18n="Sale Setting">Sale Setting</div></a>
            </li>         
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Star
                  </a>
                </li>

                  <!-- User -->
                  @if (Route::has('login'))
                   @auth
                   @if (Auth::user()->utype === 'ADM')
                   <li class="nav-item navbar-dropdown dropdown-user dropdown">
                      <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                         <img src="{{ asset('admin/assets/img/avatars/') }}/{{ Auth::user()->profile_photo_path }}" alt class="w-px-40 h-auto rounded-circle" />
                        </div>
                      </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                          <li>
                            <a class="dropdown-item" href="#">
                              <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                  <div class="avatar avatar-online">
                                      <img src="{{ asset('admin/assets/img/avatars/') }}/{{ Auth::user()->profile_photo_path }}" alt class="w-px-40 h-auto rounded-circle" />
                                  </div>
                                </div>
                                <div class="flex-grow-1">
                                  <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                  <small class="text-muted">Admin</small>
                                </div>
                              </div>
                            </a>
                          </li>
                          <li>
                            <div class="dropdown-divider"></div>
                          </li>      

                          <li>
                            <div class="dropdown-divider"></div>
                          </li>
                          <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                              <i class="bx bx-power-off me-2"></i>
                              <span class="align-middle">Log Out</span>
                            </a>
                          </li>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                              @csrf
                            </form>
                        </ul>
                    </li>
                    @endif
                    @endif
                    @endif
                    <!--/ User -->
              </ul>
            </div>
          </nav>
          <!-- Content -->
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
            {{ $slot }}
          </div>
        </div>
      <!-- / Content -->
        <!-- Footer -->
  <footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
      <div class="mb-2 mb-md-0">©
        <script>
          document.write(new Date().getFullYear());
        </script>
        , made with ❤️ by<b>Nguyễn Văn Thiện</b>
      </div>
    </div>
  </footer>
  <!-- / Footer -->
  <div class="content-backdrop fade"></div>
  </div>
  <!-- Content wrapper -->
 
    <!-- / Layout page -->
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


  <!-- Core JS -->
   <!-- build:js assets/vendor/js/core.js -->
   <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
   <script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
   <script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
   <script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

   <script src="{{ asset('admin/assets/vendor/js/menu.js') }}"></script>
   <!-- endbuild -->

   <!-- Vendors JS -->
   <script src="{{ asset('admin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

   <!-- Main JS -->
   <script src="{{ asset('admin/assets/js/main.js') }}"></script>

   <!-- Page JS -->
   <script src="{{ asset('admin/assets/js/dashboards-analytics.js') }}"></script>

   <!-- Place this tag in your head or just before your close body tag. -->
   <script async defer src="https://buttons.github.io/buttons.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
       integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
       crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"
       integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg=="
       crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  @livewireScripts
  @stack('scripts')
  

  </body>
</html>