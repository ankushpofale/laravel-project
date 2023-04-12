<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Hyper | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="{{ asset('assets/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app-creative.min.css') }}" rel="stylesheet">

    <!-- third party css -->

    <!-- third party css end -->
</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid"
    data-rightbar-onstart="true">
    <div class="wrapper">
        @include('layout.navigation')
        <div class="content-page">
            @include('layout.topbar')
            <div class="content">

            </div>
        </div>
    </div>
    <div class="rightbar-overlay"></div>
    <script type="text/javascript" src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/app.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>

</body>

</html>
