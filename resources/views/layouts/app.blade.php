<!DOCTYPE html>
<html lang="en">
    <head>
        

        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


        <!-- Meta -->
        <meta name="description" content="Responsive Bootstrap 5 Dashboard Template" />
        <meta name="author" content="BootstrapDash" />

        <title>Scale</title>

        <!-- vendor css -->
        <link href="/lib/fontawesome-free/css/all.min.css" rel="stylesheet" />
        <link href="/lib/ionicons/css/ionicons.min.css" rel="stylesheet" />
        <link href="/lib/typicons.font/typicons.css" rel="stylesheet" />
        <link href="/lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet" />

        <!-- azia CSS -->
        <link rel="stylesheet" href="/css/azia.css" />
        <link rel="stylesheet" href="/css/override.css" />
        @livewireStyles
        @yield('links')
    </head>
    <body>
        <div class="az-header">
            <div class="container">
              <div class="az-header-left">
                <a href="{{route('portal.dashboard')}}" class="az-logo">
                    <img src="/images/logo.png" class="logo">
                </a>
                <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
              </div>
              <div class="az-header-menu">
                <div class="az-header-menu-header">
                    <a href="{{route('portal.dashboard')}}" class="az-logo">
                        <img src="/images/logo.png" class="logo">
                    </a>
                  <a href="" class="close">×</a>
                </div>
                @auth
                <ul class="nav">
                  <li class="nav-item">
                    <a href="{{route('portal.dashboard')}}" class="nav-link">
                      <i class="typcn typcn-chart-area-outline"></i> Dashboard
                    </a>
                  </li>
        
                    
                    <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="typcn typcn-cog"></i> Settings
                    </a>
                    </li>
                    
                </ul>
                @endauth
              </div>
              @auth
              <div class="az-header-right">
                <div class="dropdown az-profile-menu">
                  <a href="" class="az-img-user"><img src="https://placehold.co/400" alt="Logged in user's avatar"></a>
                  <div class="dropdown-menu">
                    <div class="az-dropdown-header d-sm-none">
                      <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                    </div>
                    <div class="az-header-profile">
                      <div class="az-img-user">
                          
                        <img src="https://placehold.co/400" alt="Logged in user's avatar">
                      </div>
                      <h6>{{auth()->user()->name}}</h6>
                      <span>superadmin</span>
                    </div>
        
                    
                    
                    
                    
                    <a href="{{route('logout')}}" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Sign Out</a>
                  </div>
                </div>
              </div>
              @endauth
            </div>
          </div>

        <div class="az-content az-content-dashboard">
            <div class="container">
                @yield('content')
                <!-- az-content-body -->
            </div>
        </div>
        <!-- az-content -->

        {{-- <div class="az-footer ht-40">
            <div class="container ht-100p pd-t-0-f">
                <span>&copy; 2024 Scale Portal</span>
            </div>
        </div> --}}

        <script src="/lib/jquery/jquery.min.js"></script>
        <script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/lib/ionicons/ionicons.js"></script>
        <script src="/lib/jquery.flot/jquery.flot.js"></script>
        <script src="/lib/jquery.flot/jquery.flot.resize.js"></script>
        <script src="/lib/chart.js/Chart.bundle.min.js"></script>
        <script src="/lib/peity/jquery.peity.min.js"></script>

        <script src="/js/jquery.cookie.js" type="text/javascript"></script>
        <script src="/js/azia.js"></script>
        <script src="/js/chart.flot.sampledata.js"></script>
        <script src="/js/dashboard.sampledata.js"></script>
        @livewireScripts
        @yield('scripts')
    </body>
</html>
