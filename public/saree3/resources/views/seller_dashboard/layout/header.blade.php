<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="{{asset('website/css/vendor/simple-line-icons.css')}}">
    @stack('css')
    <link rel="stylesheet" href="{{asset('website/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('website/docsupport/prism.css')}}">
    <link rel="stylesheet" href="{{asset('website/chosen.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/app.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- favicon -->
    <link rel="icon" href="favicon.ico">
    <title>منصة سريع | لوحة التحكم</title>

    <style>
        .btn-dowload {
            background-color: #d6a32e !important;
        }

        .errors {
            color: #ff504e;
            font-size: 10px;
            font-family: Cairo,sans-serif;
        }
    </style>
</head>
<body>
<!-- DASHBOARD BODY -->
<div class="dashboard-body">
    <!-- DASHBOARD HEADER -->
    <div class="dashboard-header retracted">
        <!-- DB CLOSE BUTTON -->
        <a href="index.html" class="db-close-button">
            <img src="{{url('website/')}}/images/dashboard/back-icon.png" alt="back-icon">
        </a>
        <!-- DB CLOSE BUTTON -->

        <!-- DB OPTIONS BUTTON -->
        <div class="db-options-button">
            <img src="{{url('website/')}}/images/dashboard/db-list-right.png" alt="db-list-right">
            <img src="{{url('website/')}}/images/dashboard/close-icon.png" alt="close-icon">
        </div>
        <!-- DB OPTIONS BUTTON -->

        <!-- DASHBOARD HEADER ITEM -->
        <div class="dashboard-header-item title">
            <!-- DB SIDE MENU HANDLER -->
            <div class="db-side-menu-handler">
                <img src="{{url('website/')}}/images/dashboard/db-list-left.png" alt="db-list-left">
            </div>
            <!-- /DB SIDE MENU HANDLER -->
            <h6>لوحة التحكم </h6>
        </div>
        <!-- /DASHBOARD HEADER ITEM -->

        <!-- DASHBOARD HEADER ITEM -->
        <div class="dashboard-header-item form">
            <form class="dashboard-search">
                <input type="text" name="search" id="search_dashboard" placeholder="إبحت داخل الوحة..." style="border:none !important">
                <input type="image" src="{{url('website/')}}/images/dashboard/search-icon.png" alt="search-icon">
            </form>
        </div>
        <!-- /DASHBOARD HEADER ITEM -->

        <!-- DASHBOARD HEADER ITEM -->
        <div class="dashboard-header-item stats">
            <!-- STATS META -->
            <div class="stats-meta">
                <div class="pie-chart pie-chart1">
                    <!-- SVG PLUS -->
                    <svg class="svg-plus primary">
                        <use xlink:href="#svg-plus"></use>
                    </svg>
                    <!-- /SVG PLUS -->
                </div>
                <h6>64.579</h6>
                <p>New Original Visits</p>
            </div>
            <!-- /STATS META -->
        </div>
        <!-- /DASHBOARD HEADER ITEM -->

        <!-- DASHBOARD HEADER ITEM -->
        <div class="dashboard-header-item stats">
            <!-- STATS META -->
            <div class="stats-meta">
                <div class="pie-chart pie-chart2">
                    <!-- SVG PLUS -->
                    <svg class="svg-minus tertiary">
                        <use xlink:href="#svg-minus"></use>
                    </svg>
                    <!-- /SVG PLUS -->
                </div>
                <h6>20.8</h6>
                <p>Less Sales Than Last Month</p>
            </div>
            <!-- /STATS META -->
        </div>
        <!-- /DASHBOARD HEADER ITEM -->

        <!-- DASHBOARD HEADER ITEM -->
        <div class="dashboard-header-item stats">
            <!-- STATS META -->
            <div class="stats-meta">
                <div class="pie-chart pie-chart3">
                    <!-- SVG PLUS -->
                    <svg class="svg-plus primary">
                        <use xlink:href="#svg-plus"></use>
                    </svg>
                    <!-- /SVG PLUS -->
                </div>
                <h6>322k</h6>
                <p>Total Visits This Month</p>
            </div>
            <!-- /STATS META -->
        </div>
        <!-- /DASHBOARD HEADER ITEM -->

        <!-- DASHBOARD HEADER ITEM -->
        <div class="dashboard-header-item back-button">
            <a href="index.html" class="button mid dark-light">Back to Homepage</a>
        </div>
        <!-- /DASHBOARD HEADER ITEM -->
    </div>
    <!-- DASHBOARD HEADER -->