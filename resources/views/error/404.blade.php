
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Test App</title>
  <link rel="stylesheet" href="{{ asset('public/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href=".{{ asset('public/assets/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/css/demo/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.png') }}" />
</head>
<body>
<script src="{{ asset('public/assets/js/preloader.js') }}"></script>
  <div class="body-wrapper">
    <div class="main-wrapper">
      <div class="page-wrapper full-page-wrapper">
        <main class="content-wrapper">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card p-0">
                  <section class="error-header">
                    <h1 class="mdc-typography--display2 mb-0">404 !</h1>
                  </section>
                  <section class="error-info">
                    <p>Page not found</p>
                    <p class="mb-2">The requested URL /some_url was not found on this server.</p>
                    <a href="{{ route('login) }}">Go back to Home</a>
                  </section>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
  <script src="{{ asset('public/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('public/assets/js/material.js')}}"></script>
    <script src="{{ asset('public/assets/js/misc.js') }}"></script>
</body>
</html>