
@extends('website.layout')

@push('links')
     <!-- css file -->
     <link rel="stylesheet" href="{{url('website/owl/')}}/vandors/owlcarousel/assets/owl.carousel.min.css">
     <link rel="stylesheet" href="{{url('website/owl/')}}/vandors/owlcarousel/assets/owl.theme.default.min.css">
     <link rel="stylesheet" type="text/css" href="{{url('website/owl/')}}/dist/css/home-sliderv1.css" />
     <link rel="stylesheet" type="text/css" href="{{url('website/owl/')}}/dist/css/hero-slider.css" />
     <style>
         #pl-1 .owl-item , #pl-2 .owl-item , #pl-3 .owl-item ,  #pl-4 .owl-item {
             width: 262px !important;
             overflow: hidden;
             margin-right: 65px;
             margin-right: -28px;
             padding-right: 32px;
         }
         #pl-1 .product-list.grid .product-item .product-preview-actions , #pl-2 .product-list.grid .product-item .product-preview-actions , #pl-3 .product-list.grid .product-item .product-preview-actions , #pl-4 .product-list.grid .product-item .product-preview-actions{
             width: 248px;
         }
         #pl-1 .product-preview-image,  #pl-2 .product-preview-image ,#pl-3 .product-preview-image , #pl-4 .product-preview-image {
             width:100%;
         }
         #pl-1.column4-wrap .column , #pl-2.column4-wrap .column , #pl-3.column4-wrap .column, #pl-4.column4-wrap .column {
             width: 227px !important;
             overflow: hidden;
             height: 311px;
         }
         #pl-1  .product-preview-actions ,    #pl-2  .product-preview-actions , #pl-3  .product-preview-actions ,  #pl-4  .product-preview-actions {
             width: 216px !important;
         }
         #pl-1.column4-wrap .column ,  #pl-2.column4-wrap .column ,  #pl-3.column4-wrap .column , #pl-4.column4-wrap .column {
             width: 227px !important;
             overflow: hidden;
             height: 311px;
         }
         #pl-1 .product-item , #pl-2 .product-item , #pl-3 .product-item , #pl-4 .product-item {
             padding: 174px 20px 8px !important;
         }
     </style>
@endpush

@section('content')


<!-- SECTION HEADLINE -->
<div class="section-headline-wrap">
    <div class="section-headline">
        <h2> {!! json_decode($page->title)->ar !!}</h2>
        <p>الرئيسيه<span class="separator">/</span>الصفحات<span class="separator">/</span><span class="current-section">{!! json_decode($page->title)->ar !!}</span></p>
    </div>
</div>
<!-- /SECTION HEADLINE -->

<!-- SECTION -->
<div class="section-wrap">
    <div class="section">
        {!! json_decode($page->body )->ar!!}
    </div>
</div>
<!-- /SECTION -->


@include('website.services')



@endsection

@push('scripts')
<script src="{{url('website/owl')}}/vandors/owlcarousel/owl.carousel.min.js"></script>
<script src="{{url('website/owl')}}/dist/js/home-sliderv1.js"></script>
<script src="{{url('website/owl')}}/dist/js/hero-slider.js"></script>
<!-- Alerts Demo -->
<script src="{{asset('website/js/alerts-demo.js')}}"></script>
<!-- Magnific Popup -->
<script src="{{asset('website/js/vendor/jquery.magnific-popup.min.js')}}"></script>


<!-- home -->
<script src="{{ url('website/js/home.js') }}"></script>
@endpush
