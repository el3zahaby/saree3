@extends('website.layout')

@push('links')
<link rel="stylesheet" href="{{ url('website/css/flexslider.css') }}">
<link rel="stylesheet" href="{{ url('website/css/custom.css') }}">

    <!-- css file -->
    <link rel="stylesheet" href="{{url('website/owl/')}}/vandors/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('website/owl/')}}/vandors/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('website/owl/')}}/dist/css/app.css" />
    <link rel="stylesheet" type="text/css" href="{{url('website/owl/')}}/dist/css/service-slider.css" />
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
                        <div class="item">
                            <div class="bg"><img src="{{url('images/')}}/1.jpeg" alt=""></div>
                            <div class="overlay">
                                <h2>welcome1</h2>
                                <p>texttext</p>
                            </div>
                        </div>
                        <div class="item">
                                <div class="bg"><img src="{{url('images/')}}//2.jpeg" alt=""></div>
                                <div class="overlay">
                                    <h2>welcome2</h2>
                                    <p>texttext</p>
                                </div>
                            </div>
                            <div class="item">
                                    <div class="bg"><img src="{{url('images/')}}//3.jpeg" alt=""></div>
                                    <div class="overlay">
                                        <h2>welcome3</h2>
                                        <p>texttext</p>
                                    </div>
                                </div>
                    </div>
                    <!-- end Slider -->
                    <div class="clearfix"></div>

                    <!-- HEADLINE -->
                    <div class="headline secondary">
                        <h4>{{count($products)}}  منتج </h4>
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
                                    <option value="0">السعر (الأعلى للأدنى)</option>
                                    <option value="1">السعر (الأدنى للأعلى)</option>
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

                            @forelse($products as $key => $value)
                            <!-- PRODUCT ITEM -->
                            <div class="column product-item product-item column">
                                <!-- PRODUCT PREVIEW ACTIONS -->
                                <div class="product-preview-actions product-preview-actions">
                                    <!-- PRODUCT PREVIEW IMAGE -->
                                    <figure class="product-preview-image product-preview-image">
                                    <img src="{{url('uploads/services/'.$value->products_image)}}" alt="product-image">
                                    </figure>
                                    <!-- /PRODUCT PREVIEW IMAGE -->

                                    <!-- PREVIEW ACTIONS -->
                                    <div class="preview-actions">
                                        <!-- PREVIEW ACTION -->
                                        <div class="preview-action preview-action">
                                            <a href="{{url('/Services/1')}}">
                                                <div class="circle tiny primary">
                                                    <span class="icon-tag"></span>
                                                </div>
                                            </a>
                                            
                                            <a href="{{url('/Services/1')}}">
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
                                    <a href="{{url('/Products/1')}}">
                                        <p class="text-header">{!! $value->products_name !!}</p>
                                    </a>
                                    <p class="product-description">{!! $value->products_desc !!}</p>
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
                                            <img src="{{url('website/images/avatars/avatar_14.jpg')}}" alt="user-avatar">
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

                                <p>no products</p>
                            @endempty

                        </div>
                        <!-- /PRODUCT LIST -->


                    </div>
                    <!-- /PRODUCT SHOWCASE -->

                    <div class="clearfix"></div>

                    <!-- PAGER -->
                     {{$products->links()}}
                    <!-- /PAGER -->
                    <div class="clearfix"></div>
                    <!-- Start Slider -->
                    <div class="owl-carousel slider-services-down plus" style="margin-top: 25px;height: 400px;">
                        <div class="item">
                            <div class="bg"><img src="{{url('website/owl/')}}/dist/images/1.jpeg" alt=""></div>
                            <div class="overlay">
                                <h2>welcome1</h2>
                                <p>texttext</p>
                            </div>
                        </div>
                        <div class="item">
                                <div class="bg"><img src="{{url('website/owl/')}}/dist/images/1.jpeg" alt=""></div>
                                <div class="overlay">
                                    <h2>welcome2</h2>
                                    <p>texttext</p>
                                </div>
                            </div>
                            <div class="item">
                                    <div class="bg"><img src="{{url('website/owl/')}}/dist/images/1.jpeg" alt=""></div>
                                    <div class="overlay">
                                        <h2>welcome3</h2>
                                        <p>texttext</p>
                                    </div>
                                </div>
                    </div>
                    <!-- end Slider -->
                    <div class="clearfix"></div>

                    <!-- PRODUCT SHOWCASE -->
                    <div class="product-showcase">
                            <!-- PRODUCT LIST -->
                            <div class="product-list grid column3-4-wrap edit-column-wrap ">
                                <!-- PRODUCT ITEM -->
                                <div class="product-item column edit-column" style="margin-left:10px;overflow: hidden;height: 340px;padding: 175px 20px 12px;">
                                    <!-- PRODUCT PREVIEW ACTIONS -->
                                    <div class="product-preview-actions" style="width: 296px;height: 175px;">
                                        <!-- PRODUCT PREVIEW IMAGE -->
                                        <figure class="product-preview-image" style="width: 100%;height: 100%; overflow: hidden;">
                                            <img src="{{url('website/')}}/images/items/logos_m.jpg" alt="product-image" style="height: 100%;">
                                        </figure>
                                        <!-- /PRODUCT PREVIEW IMAGE -->

                                        <!-- PREVIEW ACTIONS -->
                                        <div class="preview-actions" style="height: 176px;">
                                            <!-- PREVIEW ACTION -->
                                            <div class="preview-action" style="right: 57px;top: 54px;">
                                                <a href="service-page.html">
                                                    <div class="circle tiny primary">
                                                        <span class="icon-tag"></span>
                                                    </div>
                                                </a>
                                                <a href="service-page.html">
                                                    <p>الدهاب للمنتج</p>
                                                </a>
                                            </div>
                                            <!-- /PREVIEW ACTION -->

                                            <!-- PREVIEW ACTION -->
                                            <div class="preview-action" style="left: 9px;top: 54px;">
                                                <a href="#">
                                                    <div class="circle tiny secondary">
                                                        <span class="icon-heart"></span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <p>المفضل +</p>
                                                </a>
                                            </div>
                                            <!-- /PREVIEW ACTION -->
                                        </div>
                                        <!-- /PREVIEW ACTIONS -->
                                    </div>
                                    <!-- /PRODUCT PREVIEW ACTIONS -->

                                    <!-- PRODUCT INFO -->
                                    <div class="product-info" style="margin-top: 31px;">
                                        <a href="service-page.html">
                                            <p class="text-header">Professional Corporate Logos</p>
                                        </a>
                                        <p class="product-description">Lorem ipsum dolor sit urarde...</p>
                                        <a href="services.html">
                                            <p class="category secondary">Graphic Design</p>
                                        </a>
                                        <p class="price"><span>$</span>260</p>
                                    </div>
                                    <!-- /PRODUCT INFO -->
                                    <hr class="line-separator">

                                    <!-- USER RATING -->
                                    <div class="user-rating">
                                        <a href="author-profile.html">
                                            <figure class="user-avatar small">
                                                <img src="{{url('website/')}}/images/avatars/avatar_14.jpg" alt="user-avatar">
                                            </figure>
                                        </a>
                                        <a href="author-profile.html">
                                            <p class="text-header tiny">Jenny_Block</p>
                                        </a>
                                        <ul class="rating tooltip" title="Author's Reputation">
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

                                <!-- PRODUCT ITEM -->
                                <div class="product-item column edit-column" style="margin-left:10px;overflow: hidden;height: 340px;padding: 175px 20px 12px;">
                                        <!-- PRODUCT PREVIEW ACTIONS -->
                                        <div class="product-preview-actions" style="width: 296px;height: 175px;">
                                            <!-- PRODUCT PREVIEW IMAGE -->
                                            <figure class="product-preview-image" style="width: 100%;height: 100%; overflow: hidden;">
                                                <img src="{{url('website/')}}/images/items/logos_m.jpg" alt="product-image" style="height: 100%;">
                                            </figure>
                                            <!-- /PRODUCT PREVIEW IMAGE -->

                                            <!-- PREVIEW ACTIONS -->
                                            <div class="preview-actions" style="height: 176px;">
                                                <!-- PREVIEW ACTION -->
                                                <div class="preview-action" style="right: 57px;top: 54px;">
                                                    <a href="service-page.html">
                                                        <div class="circle tiny primary">
                                                            <span class="icon-tag"></span>
                                                        </div>
                                                    </a>
                                                    <a href="service-page.html">
                                                        <p>الدهاب للمنتج</p>
                                                    </a>
                                                </div>
                                                <!-- /PREVIEW ACTION -->

                                                <!-- PREVIEW ACTION -->
                                                <div class="preview-action" style="left: 9px;top: 54px;">
                                                    <a href="#">
                                                        <div class="circle tiny secondary">
                                                            <span class="icon-heart"></span>
                                                        </div>
                                                    </a>
                                                    <a href="#">
                                                        <p>المفضل +</p>
                                                    </a>
                                                </div>
                                                <!-- /PREVIEW ACTION -->
                                            </div>
                                            <!-- /PREVIEW ACTIONS -->
                                        </div>
                                        <!-- /PRODUCT PREVIEW ACTIONS -->

                                        <!-- PRODUCT INFO -->
                                        <div class="product-info" style="margin-top: 31px;">
                                            <a href="service-page.html">
                                                <p class="text-header">Professional Corporate Logos</p>
                                            </a>
                                            <p class="product-description">Lorem ipsum dolor sit urarde...</p>
                                            <a href="services.html">
                                                <p class="category secondary">Graphic Design</p>
                                            </a>
                                            <p class="price"><span>$</span>260</p>
                                        </div>
                                        <!-- /PRODUCT INFO -->
                                        <hr class="line-separator">

                                        <!-- USER RATING -->
                                        <div class="user-rating">
                                            <a href="author-profile.html">
                                                <figure class="user-avatar small">
                                                    <img src="{{url('website/')}}/images/avatars/avatar_14.jpg" alt="user-avatar">
                                                </figure>
                                            </a>
                                            <a href="author-profile.html">
                                                <p class="text-header tiny">Jenny_Block</p>
                                            </a>
                                            <ul class="rating tooltip" title="Author's Reputation">
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

                                <!-- PRODUCT ITEM -->
                                <div class="product-item column edit-column" style="overflow: hidden;height: 340px;padding: 175px 20px 12px;">
                                        <!-- PRODUCT PREVIEW ACTIONS -->
                                        <div class="product-preview-actions" style="width: 296px;height: 175px;">
                                            <!-- PRODUCT PREVIEW IMAGE -->
                                            <figure class="product-preview-image" style="width: 100%;height: 100%; overflow: hidden;">
                                                <img src="{{url('website/')}}/images/items/logos_m.jpg" alt="product-image" style="height: 100%;">
                                            </figure>
                                            <!-- /PRODUCT PREVIEW IMAGE -->

                                            <!-- PREVIEW ACTIONS -->
                                            <div class="preview-actions" style="height: 176px;">
                                                <!-- PREVIEW ACTION -->
                                                <div class="preview-action" style="right: 57px;top: 54px;">
                                                    <a href="service-page.html">
                                                        <div class="circle tiny primary">
                                                            <span class="icon-tag"></span>
                                                        </div>
                                                    </a>
                                                    <a href="service-page.html">
                                                        <p>الدهاب للمنتج</p>
                                                    </a>
                                                </div>
                                                <!-- /PREVIEW ACTION -->

                                                <!-- PREVIEW ACTION -->
                                                <div class="preview-action" style="left: 9px;top: 54px;">
                                                    <a href="#">
                                                        <div class="circle tiny secondary">
                                                            <span class="icon-heart"></span>
                                                        </div>
                                                    </a>
                                                    <a href="#">
                                                        <p>المفضل +</p>
                                                    </a>
                                                </div>
                                                <!-- /PREVIEW ACTION -->
                                            </div>
                                            <!-- /PREVIEW ACTIONS -->
                                        </div>
                                        <!-- /PRODUCT PREVIEW ACTIONS -->

                                        <!-- PRODUCT INFO -->
                                        <div class="product-info" style="margin-top: 31px;">
                                            <a href="service-page.html">
                                                <p class="text-header">Professional Corporate Logos</p>
                                            </a>
                                            <p class="product-description">Lorem ipsum dolor sit urarde...</p>
                                            <a href="services.html">
                                                <p class="category secondary">Graphic Design</p>
                                            </a>
                                            <p class="price"><span>$</span>260</p>
                                        </div>
                                        <!-- /PRODUCT INFO -->
                                        <hr class="line-separator">

                                        <!-- USER RATING -->
                                        <div class="user-rating">
                                            <a href="author-profile.html">
                                                <figure class="user-avatar small">
                                                    <img src="{{url('website/')}}/images/avatars/avatar_14.jpg" alt="user-avatar">
                                                </figure>
                                            </a>
                                            <a href="author-profile.html">
                                                <p class="text-header tiny">Jenny_Block</p>
                                            </a>
                                            <ul class="rating tooltip" title="Author's Reputation">
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



                            </div>
                            <!-- /PRODUCT LIST -->
                        </div>
                        <!-- /PRODUCT SHOWCASE -->


                    <div class="clearfix"></div>

                </div>
                <!-- CONTENT -->

                <!-- SIDEBAR -->
                <div class="sidebar">
                    <form class="search-form">
                            <input type="text" class="rounded" name="search" id="search_منتج" placeholder="إبحث عن منتجات...." style="font-size: 11px;">
                            <input type="image" src="{{ url('website/images/search-icon.png') }}" alt="search-icon">
                    </form>
                    <!-- Tags -->
                    <h4 style="font-size: 14px;margin-bottom: 15px; margin-right: 6px;"> الكلمات الدلالية  </h4>

                     <div class="sidebar-item tags" style="overflow-y: scroll;max-height: 201px;">
                            <form id="shop_search_form" name="shop_search_form">
                                <!-- CHECKBOX -->
                                <input type="checkbox" id="filter1" name="filter1">
                                <label for="filter1">
                                    <span class="checkbox secondary"><span></span></span>
                                    جديد
                                </label>
                                <!-- /CHECKBOX -->

                                <!-- CHECKBOX -->
                                <input type="checkbox" id="filter2" name="filter2">
                                <label for="filter2">
                                    <span class="checkbox secondary"><span></span></span>
                                    نشيط
                                </label>
                                <!-- /CHECKBOX -->

                                <!-- CHECKBOX -->
                                <input type="checkbox" id="filter3" name="filter3">
                                <label for="filter3">
                                    <span class="checkbox secondary"><span></span></span>
                                    مميز
                                </label>
                                <!-- /CHECKBOX -->
                                <!-- CHECKBOX -->
                                <input type="checkbox" id="filter3" name="filter3">
                                <label for="filter3">
                                    <span class="checkbox secondary"><span></span></span>
                                    موثوق
                                </label>
                                <!-- /CHECKBOX -->
                                <!-- CHECKBOX -->
                                <input type="checkbox" id="filter1" name="filter1">
                                <label for="filter1">
                                    <span class="checkbox secondary"><span></span></span>
                                    جديد
                                </label>
                                <!-- /CHECKBOX -->

                                <!-- CHECKBOX -->
                                <input type="checkbox" id="filter2" name="filter2">
                                <label for="filter2">
                                    <span class="checkbox secondary"><span></span></span>
                                    نشيط
                                </label>
                                <!-- /CHECKBOX -->

                                <!-- CHECKBOX -->
                                <input type="checkbox" id="filter3" name="filter3">
                                <label for="filter3">
                                    <span class="checkbox secondary"><span></span></span>
                                    مميز
                                </label>
                                <!-- /CHECKBOX -->
                                <!-- CHECKBOX -->
                                <input type="checkbox" id="filter3" name="filter3">
                                <label for="filter3">
                                    <span class="checkbox secondary"><span></span></span>
                                    موثوق
                                </label>
                                <!-- /CHECKBOX -->
                                <!-- CHECKBOX -->
                                <input type="checkbox" id="filter1" name="filter1">
                                <label for="filter1">
                                    <span class="checkbox secondary"><span></span></span>
                                    جديد
                                </label>
                                <!-- /CHECKBOX -->

                                <!-- CHECKBOX -->
                                <input type="checkbox" id="filter2" name="filter2">
                                <label for="filter2">
                                    <span class="checkbox secondary"><span></span></span>
                                    نشيط
                                </label>
                                <!-- /CHECKBOX -->

                                <!-- CHECKBOX -->
                                <input type="checkbox" id="filter3" name="filter3">
                                <label for="filter3">
                                    <span class="checkbox secondary"><span></span></span>
                                    مميز
                                </label>
                                <!-- /CHECKBOX -->
                                <!-- CHECKBOX -->
                                <input type="checkbox" id="filter3" name="filter3">
                                <label for="filter3">
                                    <span class="checkbox secondary"><span></span></span>
                                    موثوق
                                </label>
                                <!-- /CHECKBOX -->
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
                                <input type="checkbox" id="filter1" name="filter1" checked>
                                <label for="filter1">
                                    <span class="checkbox secondary"><span></span></span>
                                    جديده
                                </label>
                                <!-- /CHECKBOX -->

                                <!-- CHECKBOX -->
                                <input type="checkbox" id="filter2" name="filter2">
                                <label for="filter2">
                                    <span class="checkbox secondary"><span></span></span>
                                    موصى بها
                                </label>
                                <!-- /CHECKBOX -->

                                <!-- CHECKBOX -->
                                <input type="checkbox" id="filter3" name="filter3">
                                <label for="filter3">
                                    <span class="checkbox secondary"><span></span></span>
                                    مميزة
                                </label>
                                <!-- /CHECKBOX -->
                                <!-- CHECKBOX -->
                                <input type="checkbox" id="filter3" name="filter3">

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
                            <i class="fa fa-star icon-rat" style="font-size: 20px;color:#cfcfcf"></i>
                            <i class="fa fa-star icon-rat" style="font-size: 20px;color:#cfcfcf"></i>
                            <i class="fa fa-star icon-rat" style="font-size: 20px;color:#cfcfcf"></i>
                            <i class="fa fa-star icon-rat" style="font-size: 20px;color:#cfcfcf"></i>
                            <i class="fa fa-star icon-rat" style="font-size: 20px;color:#cfcfcf"></i>
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
                                <input class="pr"  type="number" placeholder="0" style="margin-top: 8px;padding-right: 30px;">
                                <span id="dlr-fr" style="position: absolute;
                                top: 18px;
                                right: 13px;
                                font-family: fantasy;
                                color: #9a9a9a;">$</span>
                            </div>
                           <div class="final-price" style="position : relative;width: 48%;float: right;">
                                <input type="number" placeholder="20000" style="margin-top: 8px;padding-right: 30px;">
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

    <!-- SERVICES -->
	<div id="services-wrap">
		<section id="services" class="services-v2">
			<!-- SERVICE LIST -->
			<div class="service-list small column3-wrap">
				<!-- SERVICE ITEM -->
				<div class="service-item column">
					<div class="outer-ring">
						<div class="inner-ring"></div>
						<span class="icon-present"></span>
					</div>
					<h3>Buy &amp; Sell Easily</h3>
					<p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<!-- /SERVICE ITEM -->

				<!-- SERVICE ITEM -->
				<div class="service-item column">
					<div class="outer-ring">
						<div class="inner-ring"></div>
						<span class="icon-lock"></span>
					</div>
					<h3>Secure Transaction</h3>
					<p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<!-- /SERVICE ITEM -->

				<!-- SERVICE ITEM -->
				<div class="service-item column">
					<div class="outer-ring">
						<div class="inner-ring"></div>
						<span class="icon-like"></span>
					</div>
					<h3>Products Control</h3>
					<p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<!-- /SERVICE ITEM -->

				<!-- SERVICE ITEM -->
				<div class="service-item column">
					<div class="outer-ring">
						<div class="inner-ring"></div>
						<span class="icon-diamond"></span>
					</div>
					<h3>Quality Platform</h3>
					<p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<!-- /SERVICE ITEM -->

				<!-- SERVICE ITEM -->
				<div class="service-item column">
					<div class="outer-ring">
						<div class="inner-ring"></div>
						<span class="icon-earphones-alt"></span>
					</div>
					<h3>Assistance 24/7</h3>
					<p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<!-- /SERVICE ITEM -->

				<!-- SERVICE ITEM -->
				<div class="service-item column">
					<div class="outer-ring">
						<div class="inner-ring"></div>
						<span class="icon-bubble"></span>
					</div>
					<h3>Support Forums</h3>
					<p>Lorem ipsum dolor sit amet, consectetur sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
				<!-- /SERVICE ITEM -->
			</div>
			<!-- /SERVICE LIST -->
			<div class="clearfix"></div>
		</section>
	</div>
	<!-- /SERVICES -->


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

    <script>
        $("#country_filter").change(function () {
            var selected = $(this).val();
            $.ajax({
                url : 'getcity',
                methode :'POST',
                data :  {id : selected , title : "إختر المدينة..."},
                success:function (data) {
                    $("#city_filter").html(data);
                }
            });
        });

    </script>



@endpush
