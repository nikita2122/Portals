<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">

    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme.css" />
    <link rel="stylesheet" href="assets/stylesheets/theme-admin-extension.css" />
    <!-- Skin CSS -->
    <link rel="stylesheet" href="assets/stylesheets/skins/default.css" />
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme-custom.css">
    <!-- Head Libs -->
    <script src="assets/vendor/modernizr/modernizr.js"></script>
    <style>
        body {
            background: url("/assets/images/landing.jpg");
        }
        .command-btn {
            width:60%;
            margin-left:20%;
            margin-right: 20%;
        }
    </style>
</head>
<body class="text-black">
<section  class="body-sign">
    <div class="center-sign">
        <div class="panel" style="padding-left: 20px; padding-right: 20px;">
            <div class="panel-body" style="padding: 30px;">
                <div class="text-center">
                    <img src="/assets/images/logo.png" width="200px"/>
                </div>
                <div class="form-group text-center mb-md">
                    <h4>
                        JGIYC 2023 Registration Page
                    </h4>
                </div>
                <br/>
                <div class="div-command">
                    <div class="mb-md">
                        <a class="btn btn-custom command-btn" href="/register">
                            Begin New Registration
                        </a>
                    </div>

                    <div>
                        <a class="btn btn-custom command-btn" href="/verify">
                            Verify My Registration
                        </a>
                    </div>
                </div>
                <br/>
            </div>
        </div>

        <p class="text-center text-muted mt-md mb-md">&copy; Created 2023..</p>
    </div>

</section>

<!-- end: page -->

<!-- Vendor -->
<script src="assets/vendor/jquery/jquery.js"></script>


<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="assets/vendor/jquery-placeholder/jquery-placeholder.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Theme Base, Components and Settings -->
<script src="assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="assets/javascripts/theme.init.js"></script>
@if(Session::has('message'))
    <script>
        $(function(){
            toastr.warning("{{ Session::get('message') }}");
        }
    </script>
@endif
</body>
</html>
