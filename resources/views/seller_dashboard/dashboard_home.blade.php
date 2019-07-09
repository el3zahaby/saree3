@extends('seller_dashboard.master')

@push('css')
    <link rel="stylesheet" href="{{asset('website/css/vendor/magnific-popup.css')}}">
    <link href="https://transloadit.edgly.net/releases/uppy/v0.29.1/dist/uppy.min.css" rel="stylesheet">

@endpush

@section('content')

    <!-- DASHBOARD CONTENT -->
    <div class="dashboard-content">

        <!-- SALE DATA -->
        <div class="sale-data">
            <!-- SALE DATA ITEM -->
            <div class="sale-data-item">
                <span class="sl-icon icon-present"></span>
                <p class="text-header big">8.530</p>
                <div class="sale-data-item-info">
                    <p class="text-header">Products Sold</p>
                    <p>In all Time</p>
                </div>
            </div>
            <!-- /SALE DATA ITEM-->

            <!-- SALE DATA ITEM -->
            <div class="sale-data-item">
                <span class="sl-icon icon-present"></span>
                <p class="text-header big">234</p>
                <div class="sale-data-item-info">
                    <p class="text-header">Products Sold</p>
                    <p>In this Month</p>
                </div>
            </div>
            <!-- /SALE DATA ITEM-->

            <!-- SALE DATA ITEM -->
            <div class="sale-data-item">
                <span class="sl-icon icon-tag"></span>
                <p class="price big"><span>$</span>12.450</p>
                <div class="sale-data-item-info">
                    <p class="text-header">Total Sales</p>
                    <p>In all Time</p>
                </div>
            </div>
            <!-- /SALE DATA ITEM-->

            <!-- SALE DATA ITEM -->
            <div class="sale-data-item">
                <span class="sl-icon icon-wallet"></span>
                <p class="price big"><span>$</span>10.630</p>
                <div class="sale-data-item-info">
                    <p class="text-header">Total Earnings</p>
                    <p>In all Time</p>
                </div>
            </div>
            <!-- /SALE DATA ITEM-->
        </div>
        <!-- /SALE DATA -->

    </div>



    @endsection



@push('js')
    <!-- Magnific Popup -->
    <script src="{{asset('website/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <!-- imgLiquid -->
    <script src="{{asset('website/js/vendor/imgLiquid-min.js')}}"></script>
    <!-- Liquid -->
    <script src="{{asset('website/js/liquid.js')}}"></script>
    <!-- Dashboard Purchases -->
    <script src="{{asset('website/js/dashboard-purchases.js')}}"></script>


@endpush