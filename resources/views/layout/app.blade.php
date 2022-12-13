<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>KbFirm | @yield('siteTitle' ,'KbFirm')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="#"><img src="{{ asset('public/assets/images/logo.svg') }}" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="#"><img src="{{ asset('public/assets/images/logo-mini.svg') }}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-xl-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search products">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="{{ asset('public/assets/images/faces/face28.png') }}" alt="image">
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">Shahidul Islam</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                <div class="p-3 text-center bg-primary">
                  <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset('public/assets/images/faces/face28.png') }}" alt="">
                </div>
                <div class="p-2">
                  <h5 class="dropdown-header text-uppercase pl-2 text-dark">User Options</h5>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                    <span>Inbox</span>
                    <span class="p-0">
                      <span class="badge badge-primary">3</span>
                      <i class="mdi mdi-email-open-outline ml-1"></i>
                    </span>
                  </a>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                    <span>Profile</span>
                    <span class="p-0">
                      <span class="badge badge-success">1</span>
                      <i class="mdi mdi-account-outline ml-1"></i>
                    </span>
                  </a>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="javascript:void(0)">
                    <span>Settings</span>
                    <i class="mdi mdi-settings"></i>
                  </a>
                  <div role="separator" class="dropdown-divider"></div>
                  <h5 class="dropdown-header text-uppercase  pl-2 text-dark mt-2">Actions</h5>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                    <span>{{__('Lock Account') }}</span>
                    <i class="mdi mdi-lock ml-1"></i>
                  </a>
                  <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="#">
                    <span>{{__('Log Out') }}</span>
                    <i class="mdi mdi-logout ml-1"></i>
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <!-- *** WORKING *** -->
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                <span class="menu-title">{{__('Dashboard') }}</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-bas" aria-expanded="false" aria-controls="ui-bas">
                <span class="icon-bg"><i class="mdi mdi-message-text"></i></span>
                <span class="menu-title">Message</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-bas">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="#">Create SMS</a>
                  <li class="nav-item"><a class="nav-link" href="#">SMS List</a>
                  <li class="nav-item"><a class="nav-link" href="#">Create Email</a>
                  <li class="nav-item"><a class="nav-link" href="#">Email List</a>
                </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#investor" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-human-male"></i></span>
                <span class="menu-title">Investor</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="investor">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ route('investor.index')}}">Investor Information</a>
                  <li class="nav-item"><a class="nav-link" href="{{ route('feeCategory.index')}}">Fee Category</a>
                  <li class="nav-item"><a class="nav-link" href="{{ route('monthlyFees.index')}}">Monthly Fees</a>
                  <li class="nav-item"><a class="nav-link" href="{{ route('investorPayment.index')}}">Investor Payment</a>
                </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#invested" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-human-male"></i></span>
                <span class="menu-title">Project</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="invested">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ route('clientInfo.index')}}">Client Info</a>
                  <li class="nav-item"><a class="nav-link" href="{{ route('projectInfo.index')}}">Project Info</a>
                  <li class="nav-item"><a class="nav-link" href="{{ route('clientPayment.index')}}">Client Payment</a>
                </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#accounts" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-chart-line"></i></span>
                <span class="menu-title">Accounts</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="accounts">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ route('masterAccount.index')}}">Master Acoount</a>
                  <li class="nav-item"><a class="nav-link" href="{{ route('subHead.index')}}">Sub head</a>
                  <li class="nav-item"><a class="nav-link" href="{{ route('childOne.index')}}">Child One head</a>
                  <li class="nav-item"><a class="nav-link" href="{{ route('childTwo.index')}}">Child Two head</a>
                  <li class="nav-item"><a class="nav-link" href="{{ route('accountheadview')}}">Navigation Head View</a>
                </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#voucher" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-chart-line"></i></span>
                <span class="menu-title">Voucher</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="voucher">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ route('drvoucher.index') }}">Debit Vaucher</a>
                  <li class="nav-item"><a class="nav-link" href="{{ route('creditVoucher.index') }}">Credit Vaucher</a>
                  <li class="nav-item"><a class="nav-link" href="{{ route('journalVoucher.index') }}">Journal Vaucher</a>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#Reports" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-chart-line"></i></span>
                <span class="menu-title">Reports</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="Reports">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ route('incomeStatement.index')}}">Income Statement</a>
                  <li class="nav-item"><a class="nav-link" href="{{ route('profitPortfolio.index')}}">Profit Portfolio</a>
                  <li class="nav-item"><a class="nav-link" href="{{ route('balanceSheet.index')}}">Balance Sheet</a>
                  <li class="nav-item"><a class="nav-link" href="{{ route('trialBalance.index')}}">Trial Balance</a>
                  <li class="nav-item"><a class="nav-link" href="{{ route('accountHeadReport.index')}}">Account Head Report</a>
                  <li class="nav-item"><a class="nav-link" href="{{ route('receptPaymentAccount.index')}}">Recept and Payment</a>
                </ul>
              </div>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#document" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-attachment"></i></span>
                <span class="menu-title">Document</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="document">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ route('document.index')}}">Document</a>
                  <li class="nav-item"><a class="nav-link" href="{{ route('regulation.index')}}">Regulation</a>
                </li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="icon-bg"><i class="mdi mdi-power-settings"></i></span>
                <span class="menu-title">User Management</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="#"> Add User </a></li>
                  <li class="nav-item"> <a class="nav-link" href="#"> User List </a></li>
                  <li class="nav-item"> <a class="nav-link" href="#"> User Role </a></li>
                </ul>
              </div>
            </li>

          </ul>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper">

@yield('content')
          <footer class="footer">
            <div class="footer-inner-wraper">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © The Kanchana Business Firm</span>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- plugins:js -->
    <script src="{{ asset('public/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('public/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/jquery-circle-progress/js/circle-progress.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('public/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('public/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('public/assets/js/misc.js') }}"></script>
    <!-- endinject -->
    @stack('scripts')
  </body>
</html>