
@extends('layouts.website')

@push('links')
<link rel="stylesheet" href="{{ url('website/css/flexslider.css') }}">
<link rel="stylesheet" href="{{ url('website/css/custom.css') }}">

    <!-- css file -->
    <link rel="stylesheet" href="{{url('website/owl/')}}/vandors/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('website/owl/')}}/vandors/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('website/owl/')}}/dist/css/app.css" />
    <link rel="stylesheet" type="text/css" href="{{url('website/owl/')}}/dist/css/service-slider.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <style>
        .final-price input::placeholder , .first-price input::placeholder {
            font-size: 12px;
            font-width: bold ;
        }
        .view-selector {
            transition: all .5s ease-in-out;
        }
        .view-selector:hover , .view-selector.active {
            background-color: #535d5f;
        }
        figure>img {
            width: 100%;
            height: 100%;
        }
        .product-preview-image {
            width: 222px;
            height: 100%;
        }
    </style>

@endpush

@section('content')

	<!-- SECTION HEADLINE -->
	<div class="section-headline-wrap">
            <div class="section-headline">
                <h2>المنتجات</h2>
                <p>الرئيسية<span class="separator">/</span><span class="current-section">المنتجات</span></p>
            </div>
        </div>
        <!-- /SECTION HEADLINE -->

        <!-- SECTION -->
        <div class="section-wrap">
            <div class="section" style="padding-bottom: 25px;">
                <!-- CONTENT -->
                <div class="content">
                    <div class="clearfix"></div>

                    <!-- Start Slider -->
                    <div class="owl-carousel slider-services">
                        @forelse ($slider1 as $item => $value)
                        <div class="item">
                            <div class="bg"><img src="{{url('uploads/sliders/'.$value->images)}}" alt=""></div>
                            <div class="overlay">
                                <h2>{!! $value->title !!}</h2>
                                <p>{!! $value->body !!}</p>
                            </div>
                        </div>
                        @empty
                            <p>no slider here</p>
                        @endempty
                    </div>
                    <!-- end Slider -->


                    <div class="clearfix"></div>
                    <div id="show_filter_price">

                    <!-- HEADLINE -->
                    <div class="headline secondary">
                        {{--<h4>{{$products->total}}  منتج </h4>--}}
                        <!-- SLIDE CONTROLS -->
                        <div class="slide-control-wrap" style="left: 25px;top: 18px;">
                            <a href="{!! $products->nextPageUrl() !!}">
                                <div class="slide-control left">
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </div>
                            </a>
                            <a href="{!! $products->previousPageUrl() !!}">
                                <div class="slide-control right">
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </div>
                            </a>
                        </div>
                        <!-- /SLIDE CONTROLS -->
                        <!-- VIEW SELECTORS -->
                        <div class="view-selectors"  style="margin-left: 112px;">
                            <a href="{{url('products')}}" class="view-selector grid active"></a>
                            <a href="{{url('products_list')}}" class="view-selector list"></a>
                        </div>
                        <!-- /VIEW SELECTORS -->
                        <form id="shop_filter_form" name="shop_filter_form">
                            <label for="price_filter" class="select-block" style="width: 162px;">
                                <select name="price_filter" id="price_filter">
                                   <option value="hight_low">السعر (الأعلى للأدنى)</option>
                                    <option value="low_hight">السعر (الأدنى للأعلى)</option>
                                </select>
                                <!-- SVG ARROW -->
                                <svg class="svg-arrow">
                                    <use xlink:href="#svg-arrow"></use>
                                </svg>
                                <!-- /SVG ARROW -->
                            </label>
                            <label for="itemspp_filter" class="select-block" style="width: 138px;">
                                <select name="itemspp_filter" id="itemspp_filter">
                                    <option value="0"> جميع المنتجات </option>
                                    <option value="1"> الأحدث</option>
                                    <option value="2">الأكتر مبيعا</option>
                                    <option value="3">المميز</option>
                                </select>
                                <!-- SVG ARROW -->
                                <svg class="svg-arrow">
                                    <use xlink:href="#svg-arrow"></use>
                                </svg>
                                <!-- /SVG ARROW -->
                            </label>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /HEADLINE -->
                   
                       <!-- PRODUCT SHOWCASE -->
                         <div class="product-showcase">
                            <!-- PRODUCT LIST -->
                            <div class="product-list grid column3-4-wrap column3-4-wrap">
                                <div id="show_filter">
                                @forelse($products as $key => $value)
                                <!-- PRODUCT ITEM -->
                                <div class="column product-item product-item column">
                                    <!-- PRODUCT PREVIEW ACTIONS -->
                                    <div class="product-preview-actions product-preview-actions">
                                        <!-- PRODUCT PREVIEW IMAGE -->
                                        <figure class="product-preview-image product-preview-image">
                                        <img src="{{url('uploads/products/'.get_img($value))}}" alt="product-image">
                                        </figure>
                                        <!-- /PRODUCT PREVIEW IMAGE -->
    
                                        <!-- PREVIEW ACTIONS -->
                                        <div class="preview-actions">
                                            <!-- PREVIEW ACTION -->
                                            <div class="preview-action preview-action">
                                                <a href="{{url('/products/'.$value->slug)}}">
                                                    <div class="circle tiny primary">
                                                        <span class="icon-tag"></span>
                                                    </div>
                                                </a>
                                                <a href="{{url('/products/'.$value->slug)}}">
                                                    <p>إذهب للمنتج</p>
                                                </a>
                                            </div>
                                            <!-- /PREVIEW ACTION -->
    
                                            <!-- PREVIEW ACTION -->
                                            <div class="preview-action preview-action">
                                                <a href="#">
                                                    <div class="circle tiny secondary">
                                                        <span class="icon-heart"></span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <p>إضافة للمفضلة</p>
                                                </a>
                                            </div>
                                            <!-- /PREVIEW ACTION -->
                                        </div>
                                        <!-- /PREVIEW ACTIONS -->
                                    </div>
                                    <!-- /PRODUCT PREVIEW ACTIONS -->
    
                                    <!-- PRODUCT INFO -->
                                    <div class="product-info">
                                        <a href="{{url('/products/'.$value->slug)}}">
                                            <p class="text-header">{!! $value->products_name !!}</p>
                                        </a>
                                        <p class="product-description">{!! substr($value->products_desc,0,30) !!} ...</p>
                                        <a href="services.html">
                                            <p class="category secondary">{!! json_decode($value->products_category)->ar !!}</p>
                                        </a>
                                        <p class="price"><span>$</span>{!! $value->products_price !!}</p>
                                    </div>
                                    <!-- /PRODUCT INFO -->
                                    <hr class="line-separator line">
    
                                    <!-- USER RATING -->
                                    <div class="user-rating">
                                        <a href="author-profile.html">
                                            <figure class="user-avatar small">
                                                <img src="{{url('images/avatars/'.$value->user_image)}}" alt="user-avatar">
                                            </figure>
                                        </a>
                                        <a href="author-profile.html">
                                            <p class="text-header tiny"> {!! $value->user_name !!}</p>
                                        </a>
                                        <ul class="rating tooltip" title="التقييمات">
                                            <li class="rating-item">
                                                <!-- SVG STAR -->
                                                <svg class="svg-star">
                                                    <use xlink:href="#svg-star"></use>
                                                </svg>
                                                <!-- /SVG STAR -->
                                            </li>
                                            <li class="rating-item">
                                                <!-- SVG STAR -->
                                                <svg class="svg-star">
                                                    <use xlink:href="#svg-star"></use>
                                                </svg>
                                                <!-- /SVG STAR -->
                                            </li>
                                            <li class="rating-item">
                                                <!-- SVG STAR -->
                                                <svg class="svg-star">
                                                    <use xlink:href="#svg-star"></use>
                                                </svg>
                                                <!-- /SVG STAR -->
                                            </li>
                                            <li class="rating-item">
                                                <!-- SVG STAR -->
                                                <svg class="svg-star">
                                                    <use xlink:href="#svg-star"></use>
                                                </svg>
                                                <!-- /SVG STAR -->
                                            </li>
                                            <li class="rating-item empty">
                                                <!-- SVG STAR -->
                                                <svg class="svg-star">
                                                    <use xlink:href="#svg-star"></use>
                                                </svg>
                                                <!-- /SVG STAR -->
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /USER RATING -->
                                </div>
                                <!-- /PRODUCT ITEM -->
                                @empty
    
                                    <p style="text-align: center;">لا توجد منتجات حاليا</p>
                                @endempty
                                </div>
                            </div>
                            <!-- /PRODUCT LIST -->
    
    
                        </div>
                        <!-- /PRODUCT SHOWCASE --> 
                     
                    </div>

                    <div class="clearfix"></div>

                    <!-- PAGER -->
                     {{$products->links()}}
                    <!-- /PAGER -->
               
                    <div class="clearfix"></div>
             
                    <!-- Start Slider -->
                    @if(count($slider_buttom) >0 )
                    <div class="owl-carousel slider-services-down plus" style="margin-top: 25px;height: 400px;">
                        @foreach ($slider_buttom  as $item => $value)

                            <div class="item">
                                <div class="bg"><img src="{{url('website/owl/')}}/dist/images/1.jpeg" alt=""></div>
                                <div class="overlay">
                                    <h2>{!! $value->title !!}</h2>
                                    <p>{!! $value->body !!}</p>
                                </div>
                            </div>

                        @endforeach
                    </div>
                    @endif
                    {{--<!-- end Slider -->--}}
                    {{--<div class="clearfix"></div>--}}

                    {{--<!-- PRODUCT SHOWCASE -->--}}
                    {{--<div class="product-showcase">--}}
                            {{--<!-- PRODUCT LIST -->--}}
                            {{--<div class="product-list grid column3-4-wrap edit-column-wrap ">--}}
                                {{--<!-- PRODUCT ITEM -->--}}
                                {{--<div class="product-item column edit-column" style="margin-left:10px;overflow: hidden;height: 340px;padding: 175px 20px 12px;">--}}
                                    {{--<!-- PRODUCT PREVIEW ACTIONS -->--}}
                                    {{--<div class="product-preview-actions" style="width: 296px;height: 175px;">--}}
                                        {{--<!-- PRODUCT PREVIEW IMAGE -->--}}
                                        {{--<figure class="product-preview-image" style="width: 100%;height: 100%; overflow: hidden;">--}}
                                            {{--<img src="{{url('website/')}}/images/items/logos_m.jpg" alt="product-image" style="height: 100%;">--}}
                                        {{--</figure>--}}
                                        {{--<!-- /PRODUCT PREVIEW IMAGE -->--}}

                                        {{--<!-- PREVIEW ACTIONS -->--}}
                                        {{--<div class="preview-actions" style="height: 176px;">--}}
                                            {{--<!-- PREVIEW ACTION -->--}}
                                            {{--<div class="preview-action" style="right: 57px;top: 54px;">--}}
                                                {{--<a href="service-page.html">--}}
                                                    {{--<div class="circle tiny primary">--}}
                                                        {{--<span class="icon-tag"></span>--}}
                                                    {{--</div>--}}
                                                {{--</a>--}}
                                                {{--<a href="service-page.html">--}}
                                                    {{--<p>الدهاب للمنتج</p>--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                            {{--<!-- /PREVIEW ACTION -->--}}

                                            {{--<!-- PREVIEW ACTION -->--}}
                                            {{--<div class="preview-action" style="left: 9px;top: 54px;">--}}
                                                {{--<a href="#">--}}
                                                    {{--<div class="circle tiny secondary">--}}
                                                        {{--<span class="icon-heart"></span>--}}
                                                    {{--</div>--}}
                                                {{--</a>--}}
                                                {{--<a href="#">--}}
                                                    {{--<p>المفضل +</p>--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                            {{--<!-- /PREVIEW ACTION -->--}}
                                        {{--</div>--}}
                                        {{--<!-- /PREVIEW ACTIONS -->--}}
                                    {{--</div>--}}
                                    {{--<!-- /PRODUCT PREVIEW ACTIONS -->--}}

                                    {{--<!-- PRODUCT INFO -->--}}
                                    {{--<div class="product-info" style="margin-top: 31px;">--}}
                                        {{--<a href="service-page.html">--}}
                                            {{--<p class="text-header">Professional Corporate Logos</p>--}}
                                        {{--</a>--}}
                                        {{--<p class="product-description">Lorem ipsum dolor sit urarde...</p>--}}
                                        {{--<a href="services.html">--}}
                                            {{--<p class="category secondary">Graphic Design</p>--}}
                                        {{--</a>--}}
                                        {{--<p class="price"><span>$</span>260</p>--}}
                                    {{--</div>--}}
                                    {{--<!-- /PRODUCT INFO -->--}}
                                    {{--<hr class="line-separator">--}}

                                    {{--<!-- USER RATING -->--}}
                                    {{--<div class="user-rating">--}}
                                        {{--<a href="author-profile.html">--}}
                                            {{--<figure class="user-avatar small">--}}
                                                {{--<img src="{{url('website/')}}/images/avatars/avatar_14.jpg" alt="user-avatar">--}}
                                            {{--</figure>--}}
                                        {{--</a>--}}
                                        {{--<a href="author-profile.html">--}}
                                            {{--<p class="text-header tiny">Jenny_Block</p>--}}
                                        {{--</a>--}}
                                        {{--<ul class="rating tooltip" title="Author's Reputation">--}}
                                            {{--<li class="rating-item">--}}
                                                {{--<!-- SVG STAR -->--}}
                                                {{--<svg class="svg-star">--}}
                                                    {{--<use xlink:href="#svg-star"></use>--}}
                                                {{--</svg>--}}
                                                {{--<!-- /SVG STAR -->--}}
                                            {{--</li>--}}
                                            {{--<li class="rating-item">--}}
                                                {{--<!-- SVG STAR -->--}}
                                                {{--<svg class="svg-star">--}}
                                                    {{--<use xlink:href="#svg-star"></use>--}}
                                                {{--</svg>--}}
                                                {{--<!-- /SVG STAR -->--}}
                                            {{--</li>--}}
                                            {{--<li class="rating-item">--}}
                                                {{--<!-- SVG STAR -->--}}
                                                {{--<svg class="svg-star">--}}
                                                    {{--<use xlink:href="#svg-star"></use>--}}
                                                {{--</svg>--}}
                                                {{--<!-- /SVG STAR -->--}}
                                            {{--</li>--}}
                                            {{--<li class="rating-item">--}}
                                                {{--<!-- SVG STAR -->--}}
                                                {{--<svg class="svg-star">--}}
                                                    {{--<use xlink:href="#svg-star"></use>--}}
                                                {{--</svg>--}}
                                                {{--<!-- /SVG STAR -->--}}
                                            {{--</li>--}}
                                            {{--<li class="rating-item empty">--}}
                                                {{--<!-- SVG STAR -->--}}
                                                {{--<svg class="svg-star">--}}
                                                    {{--<use xlink:href="#svg-star"></use>--}}
                                                {{--</svg>--}}
                                                {{--<!-- /SVG STAR -->--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--<!-- /USER RATING -->--}}
                                {{--</div>--}}
                                {{--<!-- /PRODUCT ITEM -->--}}

                                {{--<!-- PRODUCT ITEM -->--}}
                                {{--<div class="product-item column edit-column" style="margin-left:10px;overflow: hidden;height: 340px;padding: 175px 20px 12px;">--}}
                                        {{--<!-- PRODUCT PREVIEW ACTIONS -->--}}
                                        {{--<div class="product-preview-actions" style="width: 296px;height: 175px;">--}}
                                            {{--<!-- PRODUCT PREVIEW IMAGE -->--}}
                                            {{--<figure class="product-preview-image" style="width: 100%;height: 100%; overflow: hidden;">--}}
                                                {{--<img src="{{url('website/')}}/images/items/logos_m.jpg" alt="product-image" style="height: 100%;">--}}
                                            {{--</figure>--}}
                                            {{--<!-- /PRODUCT PREVIEW IMAGE -->--}}

                                            {{--<!-- PREVIEW ACTIONS -->--}}
                                            {{--<div class="preview-actions" style="height: 176px;">--}}
                                                {{--<!-- PREVIEW ACTION -->--}}
                                                {{--<div class="preview-action" style="right: 57px;top: 54px;">--}}
                                                    {{--<a href="service-page.html">--}}
                                                        {{--<div class="circle tiny primary">--}}
                                                            {{--<span class="icon-tag"></span>--}}
                                                        {{--</div>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="service-page.html">--}}
                                                        {{--<p>الدهاب للمنتج</p>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                                {{--<!-- /PREVIEW ACTION -->--}}

                                                {{--<!-- PREVIEW ACTION -->--}}
                                                {{--<div class="preview-action" style="left: 9px;top: 54px;">--}}
                                                    {{--<a href="#">--}}
                                                        {{--<div class="circle tiny secondary">--}}
                                                            {{--<span class="icon-heart"></span>--}}
                                                        {{--</div>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#">--}}
                                                        {{--<p>المفضل +</p>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                                {{--<!-- /PREVIEW ACTION -->--}}
                                            {{--</div>--}}
                                            {{--<!-- /PREVIEW ACTIONS -->--}}
                                        {{--</div>--}}
                                        {{--<!-- /PRODUCT PREVIEW ACTIONS -->--}}

                                        {{--<!-- PRODUCT INFO -->--}}
                                        {{--<div class="product-info" style="margin-top: 31px;">--}}
                                            {{--<a href="service-page.html">--}}
                                                {{--<p class="text-header">Professional Corporate Logos</p>--}}
                                            {{--</a>--}}
                                            {{--<p class="product-description">Lorem ipsum dolor sit urarde...</p>--}}
                                            {{--<a href="services.html">--}}
                                                {{--<p class="category secondary">Graphic Design</p>--}}
                                            {{--</a>--}}
                                            {{--<p class="price"><span>$</span>260</p>--}}
                                        {{--</div>--}}
                                        {{--<!-- /PRODUCT INFO -->--}}
                                        {{--<hr class="line-separator">--}}

                                        {{--<!-- USER RATING -->--}}
                                        {{--<div class="user-rating">--}}
                                            {{--<a href="author-profile.html">--}}
                                                {{--<figure class="user-avatar small">--}}
                                                    {{--<img src="{{url('website/')}}/images/avatars/avatar_14.jpg" alt="user-avatar">--}}
                                                {{--</figure>--}}
                                            {{--</a>--}}
                                            {{--<a href="author-profile.html">--}}
                                                {{--<p class="text-header tiny">Jenny_Block</p>--}}
                                            {{--</a>--}}
                                            {{--<ul class="rating tooltip" title="Author's Reputation">--}}
                                                {{--<li class="rating-item">--}}
                                                    {{--<!-- SVG STAR -->--}}
                                                    {{--<svg class="svg-star">--}}
                                                        {{--<use xlink:href="#svg-star"></use>--}}
                                                    {{--</svg>--}}
                                                    {{--<!-- /SVG STAR -->--}}
                                                {{--</li>--}}
                                                {{--<li class="rating-item">--}}
                                                    {{--<!-- SVG STAR -->--}}
                                                    {{--<svg class="svg-star">--}}
                                                        {{--<use xlink:href="#svg-star"></use>--}}
                                                    {{--</svg>--}}
                                                    {{--<!-- /SVG STAR -->--}}
                                                {{--</li>--}}
                                                {{--<li class="rating-item">--}}
                                                    {{--<!-- SVG STAR -->--}}
                                                    {{--<svg class="svg-star">--}}
                                                        {{--<use xlink:href="#svg-star"></use>--}}
                                                    {{--</svg>--}}
                                                    {{--<!-- /SVG STAR -->--}}
                                                {{--</li>--}}
                                                {{--<li class="rating-item">--}}
                                                    {{--<!-- SVG STAR -->--}}
                                                    {{--<svg class="svg-star">--}}
                                                        {{--<use xlink:href="#svg-star"></use>--}}
                                                    {{--</svg>--}}
                                                    {{--<!-- /SVG STAR -->--}}
                                                {{--</li>--}}
                                                {{--<li class="rating-item empty">--}}
                                                    {{--<!-- SVG STAR -->--}}
                                                    {{--<svg class="svg-star">--}}
                                                        {{--<use xlink:href="#svg-star"></use>--}}
                                                    {{--</svg>--}}
                                                    {{--<!-- /SVG STAR -->--}}
                                                {{--</li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<!-- /USER RATING -->--}}
                                    {{--</div>--}}
                                    {{--<!-- /PRODUCT ITEM -->--}}

                                {{--<!-- PRODUCT ITEM -->--}}
                                {{--<div class="product-item column edit-column" style="overflow: hidden;height: 340px;padding: 175px 20px 12px;">--}}
                                        {{--<!-- PRODUCT PREVIEW ACTIONS -->--}}
                                        {{--<div class="product-preview-actions" style="width: 296px;height: 175px;">--}}
                                            {{--<!-- PRODUCT PREVIEW IMAGE -->--}}
                                            {{--<figure class="product-preview-image" style="width: 100%;height: 100%; overflow: hidden;">--}}
                                                {{--<img src="{{url('website/')}}/images/items/logos_m.jpg" alt="product-image" style="height: 100%;">--}}
                                            {{--</figure>--}}
                                            {{--<!-- /PRODUCT PREVIEW IMAGE -->--}}

                                            {{--<!-- PREVIEW ACTIONS -->--}}
                                            {{--<div class="preview-actions" style="height: 176px;">--}}
                                                {{--<!-- PREVIEW ACTION -->--}}
                                                {{--<div class="preview-action" style="right: 57px;top: 54px;">--}}
                                                    {{--<a href="service-page.html">--}}
                                                        {{--<div class="circle tiny primary">--}}
                                                            {{--<span class="icon-tag"></span>--}}
                                                        {{--</div>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="service-page.html">--}}
                                                        {{--<p>الدهاب للمنتج</p>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                                {{--<!-- /PREVIEW ACTION -->--}}

                                                {{--<!-- PREVIEW ACTION -->--}}
                                                {{--<div class="preview-action" style="left: 9px;top: 54px;">--}}
                                                    {{--<a href="#">--}}
                                                        {{--<div class="circle tiny secondary">--}}
                                                            {{--<span class="icon-heart"></span>--}}
                                                        {{--</div>--}}
                                                    {{--</a>--}}
                                                    {{--<a href="#">--}}
                                                        {{--<p>المفضل +</p>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                                {{--<!-- /PREVIEW ACTION -->--}}
                                            {{--</div>--}}
                                            {{--<!-- /PREVIEW ACTIONS -->--}}
                                        {{--</div>--}}
                                        {{--<!-- /PRODUCT PREVIEW ACTIONS -->--}}

                                        {{--<!-- PRODUCT INFO -->--}}
                                        {{--<div class="product-info" style="margin-top: 31px;">--}}
                                            {{--<a href="service-page.html">--}}
                                                {{--<p class="text-header">Professional Corporate Logos</p>--}}
                                            {{--</a>--}}
                                            {{--<p class="product-description">Lorem ipsum dolor sit urarde...</p>--}}
                                            {{--<a href="services.html">--}}
                                                {{--<p class="category secondary">Graphic Design</p>--}}
                                            {{--</a>--}}
                                            {{--<p class="price"><span>$</span>260</p>--}}
                                        {{--</div>--}}
                                        {{--<!-- /PRODUCT INFO -->--}}
                                        {{--<hr class="line-separator">--}}

                                        {{--<!-- USER RATING -->--}}
                                        {{--<div class="user-rating">--}}
                                            {{--<a href="author-profile.html">--}}
                                                {{--<figure class="user-avatar small">--}}
                                                    {{--<img src="{{url('website/')}}/images/avatars/avatar_14.jpg" alt="user-avatar">--}}
                                                {{--</figure>--}}
                                            {{--</a>--}}
                                            {{--<a href="author-profile.html">--}}
                                                {{--<p class="text-header tiny">Jenny_Block</p>--}}
                                            {{--</a>--}}
                                            {{--<ul class="rating tooltip" title="Author's Reputation">--}}
                                                {{--<li class="rating-item">--}}
                                                    {{--<!-- SVG STAR -->--}}
                                                    {{--<svg class="svg-star">--}}
                                                        {{--<use xlink:href="#svg-star"></use>--}}
                                                    {{--</svg>--}}
                                                    {{--<!-- /SVG STAR -->--}}
                                                {{--</li>--}}
                                                {{--<li class="rating-item">--}}
                                                    {{--<!-- SVG STAR -->--}}
                                                    {{--<svg class="svg-star">--}}
                                                        {{--<use xlink:href="#svg-star"></use>--}}
                                                    {{--</svg>--}}
                                                    {{--<!-- /SVG STAR -->--}}
                                                {{--</li>--}}
                                                {{--<li class="rating-item">--}}
                                                    {{--<!-- SVG STAR -->--}}
                                                    {{--<svg class="svg-star">--}}
                                                        {{--<use xlink:href="#svg-star"></use>--}}
                                                    {{--</svg>--}}
                                                    {{--<!-- /SVG STAR -->--}}
                                                {{--</li>--}}
                                                {{--<li class="rating-item">--}}
                                                    {{--<!-- SVG STAR -->--}}
                                                    {{--<svg class="svg-star">--}}
                                                        {{--<use xlink:href="#svg-star"></use>--}}
                                                    {{--</svg>--}}
                                                    {{--<!-- /SVG STAR -->--}}
                                                {{--</li>--}}
                                                {{--<li class="rating-item empty">--}}
                                                    {{--<!-- SVG STAR -->--}}
                                                    {{--<svg class="svg-star">--}}
                                                        {{--<use xlink:href="#svg-star"></use>--}}
                                                    {{--</svg>--}}
                                                    {{--<!-- /SVG STAR -->--}}
                                                {{--</li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<!-- /USER RATING -->--}}
                                    {{--</div>--}}
                                    {{--<!-- /PRODUCT ITEM -->--}}



                            {{--</div>--}}
                            {{--<!-- /PRODUCT LIST -->--}}
                        {{--</div>--}}
                        {{--<!-- /PRODUCT SHOWCASE -->--}}


                    {{--<div class="clearfix"></div>--}}

                </div>
                <!-- CONTENT -->

                <!-- SIDEBAR -->
                <div class="sidebar">
                    <form class="search-form"  method="post">
                            <input type="text" class="rounded" name="search" id="mt_search" placeholder="إبحث عن منتجات...." style="font-size: 11px;">
                            <input type="image" id="search" src="{{ url('website/images/search-icon.png') }}" alt="search-icon">
                    </form>
                    <!-- Tags -->
                    <h4 style="font-size: 14px;margin-bottom: 15px; margin-right: 6px;"> الكلمات الدلالية  </h4>

                     <div class="sidebar-item tags" style="overflow-y: scroll;max-height: 201px;">
                            <form id="shop_search_form" name="shop_search_form">

                                @forelse ($sections as $item => $value)
                                    <!-- CHECKBOX -->
                                    <input type="checkbox" id="{!! "filter" . $value->section_id !!}" name="{!! "filter" . $value->section_id !!}">
                                    <label for="{!! "filter" . $value->section_id !!}">
                                        <span class="checkbox secondary"><span></span></span>
                                        {{json_decode($value->section_title)->ar}}
                                    </label>
                                    <!-- /CHECKBOX -->    
                                @empty
                                    
                                @endforelse
                                

                                

                               
                            </form>
                        </div>

                    <!-- /DROPDOWN -->

                    <!-- SIDEBAR ITEM -->
                    <div class="sidebar-item">
                            <h4> إختيار المنطقة </h4>
                            <hr class="line-separator line-cus">
                            <form id="shop_search_form" name="shop_search_form">
                                <label for="country_filter" class="select-block">
                                        <select name="country_filter" id="country_filter">
                                           <option disabled value="0" selected>إختر الدولة</option>
                                            @forelse(getAllCountry() as $key => $value)
                                                <option value="{!! $value->id !!}" >{!! $value->name !!}</option>
                                             @empty
                                             @endforelse
                                        </select>
                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </label>
                                    <label for="city_filter" class="select-block">
                                            <select name="city_filter" id="city_filter">
                                                <option value="0">المدينة</option>

                                            </select>
                                            <!-- SVG ARROW -->
                                            <svg class="svg-arrow">
                                                <use xlink:href="#svg-arrow"></use>
                                            </svg>
                                            <!-- /SVG ARROW -->
                                    </label>
                            </form>
                        </div>
                    <!-- /SIDEBAR ITEM -->

                    <!-- SIDEBAR ITEM -->
                    <div class="sidebar-item" style="padding-bottom: 9px;">
                            <h4> مستوى المنتج</h4>
                            <hr class="line-separator line-cus">
                            <form id="shop_search_form" name="shop_search_form">
                                <!-- CHECKBOX -->
                                <input type="checkbox" id="filter_new" name="filter_new">
                                <label for="filter_new">
                                    <span class="checkbox secondary"><span></span></span>
                                    جديده
                                </label>
                                <!-- /CHECKBOX -->

                                <!-- CHECKBOX -->
                                <input type="checkbox" id="filter_pro" name="filter_pro">
                                <label for="filter_pro">
                                    <span class="checkbox secondary"><span></span></span>
                                    موصى بها
                                </label>
                                <!-- /CHECKBOX -->

                                <!-- CHECKBOX -->
                                <input type="checkbox" id="filter_top" name="filter_top">
                                <label for="filter_top">
                                    <span class="checkbox secondary"><span></span></span>
                                    مميزة
                                </label>
                                <!-- /CHECKBOX -->
                                <!-- CHECKBOX -->
                                <input type="checkbox" id="filter_rr" name="filte_ee">

                                <!-- /CHECKBOX -->
                            </form>
                        </div>
                        <!-- /SIDEBAR ITEM -->

                    <!-- SIDEBAR ITEM -->
                    <div class="sidebar-item" style="padding-bottom: 23px;">
                        <h4>التقييمات</h4>
                        <hr class="line-separator line-cus" style="margin-bottom: 14px;">
                         <!-- /CHECKBOX -->
                        <div class="rating-2">
                            <p style="font-size: 13px;margin-bottom: 8px;">تقييم المنتج</p>
                            <div id="rateYo"></div>
                        </div>
                        <!-- /CHECKBOX -->


                    </div>
                    <!-- /SIDEBAR ITEM -->

                    <!-- SIDEBAR ITEM -->
                    <div class="sidebar-item range-feature" style="padding-bottom: 11px;">
                        <h4> نطاق السعر</h4>
                        <hr class="line-separator line-cus spaced" style="margin-bottom: 18px;">

                        <form action="">

                            <div class="first-price" style="position : relative;width: 48%;float: right;margin-left: 6px;">
                                <input class="pr" id="min_price"  type="number" placeholder="0" style="margin-top: 8px;padding-right: 30px;">
                                <span id="dlr-fr" style="position: absolute;
                                top: 18px;
                                right: 13px;
                                font-family: fantasy;
                                color: #9a9a9a;">$</span>
                            </div>
                           <div class="final-price" style="position : relative;width: 48%;float: right;">
                                <input type="number" id="max_price" placeholder="20000" style="margin-top: 8px;padding-right: 30px;">
                                <span id="dlr-fr" style="position: absolute;
                                top: 18px;
                                right: 13px;
                                font-family: fantasy;
                                color: #9a9a9a;">$</span>
                           </div>

                        </form>

                    </div>
                    <!-- /SIDEBAR ITEM -->
                </div>
                <!-- /SIDEBAR -->
            </div>
        </div>
        <!-- /SECTION -->

        @include('website.services')


@endsection

@push('scripts')


<!-- Checkbox Link -->
<script src="{{url('website/')}}/js/checkbox-link.js"></script>
<!-- Image Slides -->
<script src="{{url('website/')}}/js/image-slides.js"></script>
<!-- XM Pie Chart -->
<script src="{{url('website')}}/js/vendor/jquery.xmpiechart.min.js"></script>
<!-- XM Accordion -->
<script src="{{url('website')}}/js/vendor/jquery.xmaccordion.min.js"></script>
<!-- ImgLiquid -->
<script src="{{url('website')}}/js/vendor/imgLiquid-min.js"></script>
<!-- XM Tab -->
<script src="{{url('website')}}/js/vendor/jquery.xmtab.min.js"></script>
<!-- Post Tab -->
<script src="{{url('website/')}}/js/post-tab.js"></script>
<!-- Liquid -->
<script src="{{url('website/')}}/js/liquid.js"></script>
<script src="{{url('website/')}}/js/jquery.nicescroll.min.js"></script>
<!-- Item V1 -->
<script src="{{url('website/')}}/js/item-v1.js"></script>
<script src="{{url('website/owl')}}/vandors/owlcarousel/owl.carousel.min.js"></script>
<script src="{{url('website/owl')}}/dist/js/app.js"></script>
<script src="{{url('website/owl')}}/dist/js/service-slider.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script src="{{asset("website/js/filtters.js")}}"></script>
    <script>

        $(".pagination").addClass('pager tertiary');
        $('.page-item').addClass('pager-item');

        $(function () {

            $("#rateYo").rateYo({
                starWidth: "25px",
                rtl : true,
                onSet: function (rating, rateYoInstance) {
                        alert("Rating is set to: " + rating);
                }
            });
        });

    </script>



@endpush
