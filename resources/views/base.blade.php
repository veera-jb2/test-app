<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test App</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('public/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href=".{{ asset('public/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/demo/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.png') }}" />
  </head>
  <body>
  <script src="{{ asset('public/assets/js/preloader.js') }}"></script>
    <div class="body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
        <div class="mdc-drawer__header">
          <a href="#" class="brand-logo" style="font-size: 32px;color: white;">
            Test App
          </a>
        </div>
        <div class="mdc-drawer__content">
          <div class="mdc-list-group">
            <nav class="mdc-list mdc-drawer-menu">
              <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link {{ str_contains(url()->current(), '/dashboard') ? 'hello' : '' }}" href="{{ route('dashboard') }}">
                  <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">home</i>
                  Dashboard
                </a>
              </div>
              <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="{{ route('project.index') }}">
                  <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">track_changes</i>
                  Projects
                </a>
              </div>
            </nav>
          </div>
      </aside>
      <!-- partial -->
      <div class="main-wrapper mdc-drawer-app-content">
        <!-- partial:../../partials/_navbar.html -->
        <header class="mdc-top-app-bar">
          <div class="mdc-top-app-bar__row">
            <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
              <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>
              <span class="mdc-top-app-bar__title">Greetings {{ !empty(auth()->user()) ? auth()->user()->first_name.' '.auth()->user()->last_name : '' }}!</span>
            </div>
            <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
              <div class="menu-button-container menu-profile d-none d-md-block">
                <button class="mdc-button mdc-menu-button">
                  <span class="d-flex align-items-center">
                    <span class="user-name" style="color:blue;">{{ !empty(auth()->user()) ? auth()->user()->first_name.' '.auth()->user()->last_name : '' }}</span>
                  </span>
                </button>
                <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                  <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                    <li class="mdc-list-item" role="menuitem">
                      <div class="item-thumbnail item-thumbnail-icon-only">
                        <i class="mdi mdi-settings-outline text-primary"></i>                      
                      </div>
                      <div class="item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="item-subject font-weight-normal"><a href="javascript:void(0);" onclick="logout();">Logout</a></h6>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="divider d-none d-md-block"></div>
              <div class="menu-button-container">
                <button class="mdc-button mdc-menu-button">
                  <i class="mdi mdi-bell"></i>
                </button>
                <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                  <h6 class="title"> <i class="mdi mdi-bell-outline mr-2 tx-16"></i> Notifications</h6>
                  <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" id="notification_alert">
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </header>
        <!-- partial -->
        <div class="page-wrapper mdc-toolbar-fixed-adjust">
          <main class="content-wrapper">
          @yield('content')
          </main>
          <!-- partial:../../partials/_footer.html -->
          <footer>
            <div class="mdc-layout-grid">
              <div class="mdc-layout-grid__inner">
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <script src="{{ asset('public/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('public/assets/js/material.js')}}"></script>
    <script src="{{ asset('public/assets/js/misc.js') }}"></script>
    <script src="{{ asset('resources/views/auth/js/logout.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript"></script>
    <script>
      var apiBaseURL = "<?php echo url('/');  ?>";
    </script>
    @yield('script')
    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
    <script type="text/javascript">
      var pusher = new Pusher('b2ca0709596ec6c603f8', {
        cluster: 'ap2',
        encrypted: true
      });

      // Subscribe to the channel we specified in our Laravel Event
      var channel = pusher.subscribe('notification-show');

      // Bind a function to a Event (the full Laravel class)
      channel.bind('App\\Events\\NotificationShow', function(data) {
        console.log("hello :",data.message);
        var html = '<li class="mdc-list-item" role="menuitem"><div class="item-thumbnail item-thumbnail-icon"><i class="mdi mdi-email-outline"></i></div><div class="item-content d-flex align-items-start flex-column justify-content-center"><h6 class="item-subject font-weight-normal">'+data.message+'</h6></div></li>';
        $('#notification_alert').append(html);   
      });
    </script>
  </body>
  </html>