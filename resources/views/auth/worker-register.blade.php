<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Health Worker Registration</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

   
</head>
<body>
<div id="app">

   <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create Account</h5>
                    
                  </div>

                  <form class="row g-3 needs-validation" method="POST" action="{{ route('worker.login.submit') }}" >
                    @csrf

                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Names</label>
                      <input type="text" name="names" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your names!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Phone Number</label>
                      <input type="text" name="phone" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your Phone Number!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourphone" class="form-label">Your National ID Number</label>
                      <input type="text" name="national_ID" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your National ID Number!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="worker-login">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

              

            </div>
          </div>
        </div>

      </section>

 
</div>
</div>

</body>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</html>

