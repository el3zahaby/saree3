@extends('layouts.website')
@push('links')

     <!-- css file -->
     <link rel="stylesheet" href="{{url('website/owl/')}}/vandors/owlcarousel/assets/owl.carousel.min.css">
     <link rel="stylesheet" href="{{url('website/owl/')}}/vandors/owlcarousel/assets/owl.theme.default.min.css">

    <style>
        .slick-slide {
            display: none;
            float: left;
            height: 100%;
            min-height: 1px;
            padding: 3px;
        }
        .product-list.grid .product-item .product-preview-actions {
            right: 0 !important;
        }
        #pl-1 .owl-item , #pl-2 .owl-item , #pl-3 .owl-item ,  #pl-4 .owl-item {
            /*width: 262px !important;*/
            overflow: hidden;
            margin-right: 65px;
            margin-right: -28px;
            padding-right: 32px;
        }
        #pl-1 .product-list.grid .product-item .product-preview-actions , #pl-2 .product-list.grid .product-item .product-preview-actions , #pl-3 .product-list.grid .product-item .product-preview-actions , #pl-4 .product-list.grid .product-item .product-preview-actions{
            /*width: 248px;*/
        }
        #pl-1 .product-preview-image,  #pl-2 .product-preview-image ,#pl-3 .product-preview-image , #pl-4 .product-preview-image {
            width:100%;
        }
        #pl-1 .product-preview-actions, #pl-2 .product-preview-actions, #pl-3 .product-preview-actions, #pl-4 .product-preview-actions {
            width: 100% !important;
        }
        #pl-1.column4-wrap .column ,  #pl-2.column4-wrap .column ,  #pl-3.column4-wrap .column , #pl-4.column4-wrap .column {
            /*width: 227px !important;*/
            overflow: hidden;
            height: 311px;
        }
        #pl-1 .product-item , #pl-2 .product-item , #pl-3 .product-item , #pl-4 .product-item {
            /*padding: 174px 20px 8px !important;*/
        }
        figure.product-preview-image.big {
            overflow: hidden;
        }
        .product-preview-image img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{url('website/owl/')}}/dist/css/hero-slider.css" />
@endpush
@section('content')


@if(auth()->check())
    <!-- BANNER -->
    <div class="banner-wrap" style="background: none;height: 400px;">
        <!-- Hero Slider -->
        <div class="owl-carousel hero-slider">
            @forelse ($slider_top as $item => $value)
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
        <!-- /.Hero Slider -->
    </div>
    <!-- /BANNER -->
    <div class="clearfix"></div>

    <!-- Search -->
    <form class="search-widget-form search-bar-style">
        <input type="text" name="category_name" placeholder=" ...إبحت عن منتجات أو خدمات " style="text-align:right;">
        <label for="categories" class="select-block">
            <select name="categories" id="categories">
                <option value="0">جميع الأقسام</option>
                @forelse($parent_sec as $keys => $value)
                    <option value="0">{!! json_decode($value->section_title)->ar !!}</option>
                @empty
                @endforelse
            </select>
            <!-- SVG ARROW -->
            <svg class="svg-arrow">
                <use xlink:href="#svg-arrow"></use>
            </svg>
            <!-- /SVG ARROW -->
        </label>
        <button class="button medium primary">إبحت الأن</button>
    </form>
    <!-- Search -->
@else
    <!-- BANNER -->
    <div class="banner-wrap">
        <section class="banner banner-v2">
            <h5>تسجل الأن وبدأ</h5>
            <h1><span>البيع و الشراء</span></h1>

            <form class="search-widget-form">
                <input type="text" name="category_name" placeholder="...إبحت عن منتجات أو خدمات" style="text-align:right;">
                <label for="categories" class="select-block">
                    <select name="categories" id="categories">
                        <option value="0">جميع الأقسام</option>
                        @forelse($parent_sec as $keys => $value)
                            <option value="{{$value->section_id}}">{!! json_decode($value->section_title)->ar !!}</option>
                        @empty
                        @endempty
                    </select>
                    <!-- SVG ARROW -->
                    <svg class="svg-arrow">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </label>
                <button class="button medium primary">إبحت الأن</button>
            </form>
        </section>
    </div>
    <!-- /BANNER -->

    <!-- SERVICES -->
    <div id="services-wrap">
        <section id="services">
            <!-- SERVICE LIST -->
            <div class="service-list column4-wrap">

            @forelse ($com as $item => $value)
                <!-- SERVICE ITEM -->
                    <div class="service-item column">
                        <div class="circle medium gradient"></div>
                        <div class="circle white-cover"></div>
                        <div class="circle dark">
                            <span class="{{$value->icon}}"></span>
                        </div>
                        <h3>{!! $value->title !!}</h3>
                        <p>{!! $value->body !!}</p>
                    </div>
                    <!-- /SERVICE ITEM -->
                @empty


                @endempty


            </div>
            <!-- /SERVICE LIST -->
            <div class="clearfix"></div>
        </section>
    </div>
    <!-- /SERVICES -->

    <!-- PROMO -->
    <div class="promo-banner dark left">
        <span class="icon-wallet"></span>
        <h5>إربح المال في الحال !</h5>
        <h1>إبدأ <span>البيع</span></h1>
        <a href="#" class="button medium primary">! إفتح متجرك</a>
    </div>
    <!-- /PROMO -->

    <!-- PROMO -->
    <div class="promo-banner secondary right">
        <span class="icon-tag"></span>
        <h5>قم بإيجاد أي شيئ تريد</h5>
        <h1>إبدأ بالشراء</h1>
        <a href="#" class="button medium dark">! سجل الان</a>
    </div>
@endif


<!-- /PROMO -->

<div class="clearfix"></div>

<!-- PRODUCT SIDESHOW -->
<div id="product-sideshow-wrap">
    <div id="product-sideshow">
        <!-- PRODUCT SHOWCASE -->
        <div class="product-showcase">
            <!-- HEADLINE -->
            <div class="headline primary">
                <h4>الخدمات</h4>
                <!-- SLIDE CONTROLS -->
                <div class="slide-control-wrap">
                    <div class="slide-control prev-btn left">
                        <!-- SVG ARROW -->
                        <svg class="svg-arrow">
                            <use xlink:href="#svg-arrow"></use>
                        </svg>
                        <!-- /SVG ARROW -->
                    </div>

                    <div href="#" class="slide-control next-btn right">
                        <!-- SVG ARROW -->
                        <svg class="svg-arrow">
                            <use xlink:href="#svg-arrow"></use>
                        </svg>
                        <!-- /SVG ARROW -->
                    </div>
                </div>
                <!-- /SLIDE CONTROLS -->
            </div>
            <!-- /HEADLINE -->

            <!-- PRODUCT LIST -->
            <div id="pl-1" class="product-list grid  ">
                @foreach($services as $keys => $value)
                <!-- PRODUCT ITEM -->
                <div class="product-item column">
                    <!-- PRODUCT PREVIEW ACTIONS -->
                    <div class="product-preview-actions">
                        <!-- PRODUCT PREVIEW IMAGE -->
                        <figure class="product-preview-image">
                            <img  src="{{url('uploads/services/'.get_services_imgs($value)[0]->img)}}" alt="{!! $value->services_name !!} ">
                        </figure>
                        <!-- /PRODUCT PREVIEW IMAGE -->

                        <!-- PREVIEW ACTIONS -->
                        <div class="preview-actions">
                            <!-- PREVIEW ACTION -->
                            <div class="preview-action">
                                <a href="item-v1.html">
                                    <div class="circle tiny primary">
                                        <span class="icon-tag"></span>
                                    </div>
                                </a>
                                <a href="{{url('services/'.$value->slug)}}">
                                    <p>الذهاب للمنتج</p>
                                </a>
                            </div>
                            <!-- /PREVIEW ACTION -->

                            <!-- PREVIEW ACTION -->
                            <div class="preview-action">
                                <a href="#">
                                    <div class="circle tiny secondary">
                                        <span class="icon-heart"></span>
                                    </div>
                                </a>
                                <a href="#">
                                    <p>أضف للمفضلة</p>
                                </a>
                            </div>
                            <!-- /PREVIEW ACTION -->
                        </div>
                        <!-- /PREVIEW ACTIONS -->
                    </div>
                    <!-- /PRODUCT PREVIEW ACTIONS -->

                    <!-- PRODUCT INFO -->
                    <div class="product-info">
                        <a href="{{url('services/'.$value->slug)}}">
                            <p class="text-header">{!! $value->services_name !!}</p>
                        </a>
                        <p class="product-description">{!! $value->services_desc !!} ...</p>
                        <a href="shop-gridview-v1.html">
                            <p class="category primary">{!! json_decode($value->section_name)->ar !!}</p>
                        </a>
                        <p class="price"><span>$</span>{!! $value->price !!}</p>
                    </div>
                    <!-- /PRODUCT INFO -->
                    <hr class="line-separator">

                    <!-- USER RATING -->
                    <div class="user-rating">
                        <a href="author-profile.html">
                            <figure class="user-avatar small">
                                <img src="{{url('images/avatars/'.$value->userimage)}}" alt="user-avatar">
                            </figure>
                        </a>
                        <a href="author-profile.html">
                            <p class="text-header tiny">{!! $value->user_name !!}</p>
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
                <!-- PRODUCT ITEM -->
                <div class="product-item column">
                    <!-- PRODUCT PREVIEW ACTIONS -->
                    <div class="product-preview-actions">
                        <!-- PRODUCT PREVIEW IMAGE -->
                        <figure class="product-preview-image">
                            <img  src="{{url('uploads/services/'.get_services_imgs($value)[0]->img)}}" alt="{!! $value->services_name !!} ">
                        </figure>
                        <!-- /PRODUCT PREVIEW IMAGE -->

                        <!-- PREVIEW ACTIONS -->
                        <div class="preview-actions">
                            <!-- PREVIEW ACTION -->
                            <div class="preview-action">
                                <a href="item-v1.html">
                                    <div class="circle tiny primary">
                                        <span class="icon-tag"></span>
                                    </div>
                                </a>
                                <a href="{{url('services/'.$value->slug)}}">
                                    <p>الذهاب للمنتج</p>
                                </a>
                            </div>
                            <!-- /PREVIEW ACTION -->

                            <!-- PREVIEW ACTION -->
                            <div class="preview-action">
                                <a href="#">
                                    <div class="circle tiny secondary">
                                        <span class="icon-heart"></span>
                                    </div>
                                </a>
                                <a href="#">
                                    <p>أضف للمفضلة</p>
                                </a>
                            </div>
                            <!-- /PREVIEW ACTION -->
                        </div>
                        <!-- /PREVIEW ACTIONS -->
                    </div>
                    <!-- /PRODUCT PREVIEW ACTIONS -->

                    <!-- PRODUCT INFO -->
                    <div class="product-info">
                        <a href="{{url('services/'.$value->slug)}}">
                            <p class="text-header">{!! $value->services_name !!}</p>
                        </a>
                        <p class="product-description">{!! $value->services_desc !!} ...</p>
                        <a href="shop-gridview-v1.html">
                            <p class="category primary">{!! json_decode($value->section_name)->ar !!}</p>
                        </a>
                        <p class="price"><span>$</span>{!! $value->price !!}</p>
                    </div>
                    <!-- /PRODUCT INFO -->
                    <hr class="line-separator">

                    <!-- USER RATING -->
                    <div class="user-rating">
                        <a href="author-profile.html">
                            <figure class="user-avatar small">
                                <img src="{{url('images/avatars/'.$value->userimage)}}" alt="user-avatar">
                            </figure>
                        </a>
                        <a href="author-profile.html">
                            <p class="text-header tiny">{!! $value->user_name !!}</p>
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
                <!-- PRODUCT ITEM -->
                <div class="product-item column">
                    <!-- PRODUCT PREVIEW ACTIONS -->
                    <div class="product-preview-actions">
                        <!-- PRODUCT PREVIEW IMAGE -->
                        <figure class="product-preview-image">
                            <img  src="{{url('uploads/services/'.get_services_imgs($value)[0]->img)}}" alt="{!! $value->services_name !!} ">
                        </figure>
                        <!-- /PRODUCT PREVIEW IMAGE -->

                        <!-- PREVIEW ACTIONS -->
                        <div class="preview-actions">
                            <!-- PREVIEW ACTION -->
                            <div class="preview-action">
                                <a href="item-v1.html">
                                    <div class="circle tiny primary">
                                        <span class="icon-tag"></span>
                                    </div>
                                </a>
                                <a href="{{url('services/'.$value->slug)}}">
                                    <p>الذهاب للمنتج</p>
                                </a>
                            </div>
                            <!-- /PREVIEW ACTION -->

                            <!-- PREVIEW ACTION -->
                            <div class="preview-action">
                                <a href="#">
                                    <div class="circle tiny secondary">
                                        <span class="icon-heart"></span>
                                    </div>
                                </a>
                                <a href="#">
                                    <p>أضف للمفضلة</p>
                                </a>
                            </div>
                            <!-- /PREVIEW ACTION -->
                        </div>
                        <!-- /PREVIEW ACTIONS -->
                    </div>
                    <!-- /PRODUCT PREVIEW ACTIONS -->

                    <!-- PRODUCT INFO -->
                    <div class="product-info">
                        <a href="{{url('services/'.$value->slug)}}">
                            <p class="text-header">{!! $value->services_name !!}</p>
                        </a>
                        <p class="product-description">{!! $value->services_desc !!} ...</p>
                        <a href="shop-gridview-v1.html">
                            <p class="category primary">{!! json_decode($value->section_name)->ar !!}</p>
                        </a>
                        <p class="price"><span>$</span>{!! $value->price !!}</p>
                    </div>
                    <!-- /PRODUCT INFO -->
                    <hr class="line-separator">

                    <!-- USER RATING -->
                    <div class="user-rating">
                        <a href="author-profile.html">
                            <figure class="user-avatar small">
                                <img src="{{url('images/avatars/'.$value->userimage)}}" alt="user-avatar">
                            </figure>
                        </a>
                        <a href="author-profile.html">
                            <p class="text-header tiny">{!! $value->user_name !!}</p>
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
                @endforeach

            </div>

            <!-- /PRODUCT LIST -->
        </div>
        <!-- /PRODUCT SHOWCASE -->
        @if(count($products) != 0)
        <!-- PRODUCT SHOWCASE -->
        <div class="product-showcase">
            <!-- HEADLINE -->
            <div class="headline secondary">
                <h4>المنتجات</h4>


                <!-- SLIDE CONTROLS -->
                <div class="slide-control-wrap">
                    <div class="slide-control left">
                        <!-- SVG ARROW -->
                        <svg class="svg-arrow">
                            <use xlink:href="#svg-arrow"></use>
                        </svg>
                        <!-- /SVG ARROW -->
                    </div>

                    <div class="slide-control right">
                        <!-- SVG ARROW -->
                        <svg class="svg-arrow">
                            <use xlink:href="#svg-arrow"></use>
                        </svg>
                        <!-- /SVG ARROW -->
                    </div>
                </div>
                <!-- /SLIDE CONTROLS -->
            </div>
            <!-- /HEADLINE -->
            <!-- PRODUCT LIST -->
            <div id="pl-2" class="product-list grid ">

                @foreach ($products as $key => $value)
                <!-- PRODUCT ITEM -->
                <div class="product-item column">
                        <!-- PRODUCT PREVIEW ACTIONS -->
                        <div class="product-preview-actions">
                            <!-- PRODUCT PREVIEW IMAGE -->
                            <figure class="product-preview-image">
                                <img src="{{url('uploads/products/'.json_decode($value->products_images)[0]->img)}}" alt="product-image">
                            </figure>
                            <!-- /PRODUCT PREVIEW IMAGE -->

                            <!-- PREVIEW ACTIONS -->
                            <div class="preview-actions">
                                <!-- PREVIEW ACTION -->
                                <div class="preview-action" style="top: 39px;right: 17px;" >
                                    <a href="{{url('products/'.$value->slug)}}">
                                        <div class="circle tiny primary">
                                            <span class="icon-tag"></span>
                                        </div>
                                    </a>
                                    <a href="{{url('products/'.$value->slug)}}">
                                        <p>الذهاب للمنتج</p>
                                    </a>
                                </div>
                                <!-- /PREVIEW ACTION -->

                                <!-- PREVIEW ACTION -->
                                <div class="preview-action" style="right: 113px;top: 40px;">
                                    <a href="#">
                                        <div class="circle tiny secondary">
                                            <span class="icon-heart"></span>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <p>أضف للمفضلة</p>
                                    </a>
                                </div>
                                <!-- /PREVIEW ACTION -->
                            </div>
                            <!-- /PREVIEW ACTIONS -->
                        </div>
                        <!-- /PRODUCT PREVIEW ACTIONS -->

                          <!-- PRODUCT INFO -->
                          <div class="product-info">
                                <a href="{{url('products/'.$value->slug)}}">
                                    <p class="text-header">{!! $value->products_name !!}</p>
                                </a>
                                <p class="product-description">{!!$value->products_desc!!}</p>
                                <a href="services.html">
                                  <p class="category secondary">{!! json_decode($value->products_category)->ar !!}</p>
                                </a>
                                <p class="price"><span>$</span>{!!$value->products_price !!}</p>
                            </div>
                            <!-- /PRODUCT INFO -->
                        <hr class="line-separator">

                        <!-- USER RATING -->
                        <div class="user-rating">
                            <a href="author-profile.html">
                                <figure class="user-avatar small">
                                    <img src="{{ url('images/avatars/'.$value->user_image) }}" alt="user-avatar">
                                </figure>
                            </a>
                            <a href="author-profile.html">
                                <p class="text-header tiny" style="font-size: 10px;">{!! $value->user_name !!}</p>
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
                @endforeach





            </div>
            <!-- /PRODUCT LIST -->
        </div>
        <!-- /PRODUCT SHOWCASE -->
        @endif
        <!-- PRODUCT SHOWCASE -->
        <div class="product-showcase" >
            <!-- HEADLINE -->
            <div class="headline" style="margin-bottom: 26px;">
                <h4>المعارض</h4>



                   <!-- SVG ARROW -->
                   <svg class="svg-arrow" style ="position: absolute;
                   left: 64px;
                   top: 28px;
                   z-index: 999;
                   fill: #fff;    width: 8px;
                   height: 12px;">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->

                      <!-- SVG ARROW -->
                      <svg class="svg-arrow" style="    position: absolute;
                      left: 27px;
                      top: 28px;
                      z-index: 999;
                      fill: #fff;
                      transform: rotate(180deg);    width: 8px;
                      height: 12px;">
                            <use xlink:href="#svg-arrow"></use>
                       </svg>
                       <!-- /SVG ARROW -->

            </div>
            <!-- /HEADLINE -->

            <div class="clearfix"></div>

            <!-- Start Slider -->

            <div class="slider m-5 single-item">
                @forelse ($slider as $item => $value)
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

            <!-- PRODUCT SHOWCASE -->
			<div class="product-showcase">
                    <!-- PRODUCT LIST -->
                    <div class="product-list grid v4 column3-wrap">
                        <!-- PRODUCT ITEM -->
                        <div class="product-item column">
                            <!-- PRODUCT PREVIEW ACTIONS -->
                            <div class="product-preview-actions">
                                <!-- PRODUCT PREVIEW IMAGE -->
                                <figure class="product-preview-image big">
                                <img src="{{url('website/')}}/images/items/westeroshtml_m02.jpg" alt="product-image">
                                </figure>
                                <!-- /PRODUCT PREVIEW IMAGE -->

                                <!-- PREVIEW ACTIONS -->
                                <div class="preview-actions">
                                    <!-- PREVIEW ACTION -->
                                    <div class="preview-action">
                                        <a href="item-v1.html">
                                            <div class="circle tiny primary">
                                                <span class="icon-tag"></span>
                                            </div>
                                        </a>
                                        <a href="item-v1.html">
                                            <p>Go to Item</p>
                                        </a>
                                    </div>
                                    <!-- /PREVIEW ACTION -->

                                    <!-- PREVIEW ACTION -->
                                    <div class="preview-action">
                                        <a href="#">
                                            <div class="circle tiny secondary">
                                                <span class="icon-heart"></span>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <p>Favourites +</p>
                                        </a>
                                    </div>
                                    <!-- /PREVIEW ACTION -->
                                </div>
                                <!-- /PREVIEW ACTIONS -->
                            </div>
                            <!-- /PRODUCT PREVIEW ACTIONS -->

                            <!-- PRODUCT INFO -->
                            <div class="product-info">
                                <a href="item-v1.html">
                                    <p class="text-header">Westeros HTML Custom Cloth...</p>
                                </a>
                                <a href="shop-gridview-v1.html">
                                    <p class="category tiny primary">PSD Templates</p>
                                </a>
                                <p class="price big"><span>$</span>28</p>
                            </div>
                            <!-- /PRODUCT INFO -->
                            <hr class="line-separator">

                            <!-- USER RATING -->
                            <div class="user-rating">
                                <a href="author-profile.html">
                                    <figure class="user-avatar small">
                                        <img src="{{url('website/')}}/images/avatars/avatar_01.jpg" alt="user-avatar">
                                    </figure>
                                </a>
                                <a href="author-profile.html">
                                    <p class="text-header tiny">Johnny Fisher</p>
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
                        <div class="product-item column">
                            <!-- PRODUCT PREVIEW ACTIONS -->
                            <div class="product-preview-actions">
                                <!-- PRODUCT PREVIEW IMAGE -->
                                <figure class="product-preview-image big" style=" overflow: hidden; ">
                                    <img src="{{url('website/')}}/images/items/pixel_m02.jpg" alt="product-image">
                                </figure>
                                <!-- /PRODUCT PREVIEW IMAGE -->

                                <!-- PREVIEW ACTIONS -->
                                <div class="preview-actions">
                                    <!-- PREVIEW ACTION -->
                                    <div class="preview-action">
                                        <a href="item-v1.html">
                                            <div class="circle tiny primary">
                                                <span class="icon-tag"></span>
                                            </div>
                                        </a>
                                        <a href="item-v1.html">
                                            <p>Go to Item</p>
                                        </a>
                                    </div>
                                    <!-- /PREVIEW ACTION -->

                                    <!-- PREVIEW ACTION -->
                                    <div class="preview-action">
                                        <a href="#">
                                            <div class="circle tiny secondary">
                                                <span class="icon-heart"></span>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <p>Favourites +</p>
                                        </a>
                                    </div>
                                    <!-- /PREVIEW ACTION -->
                                </div>
                                <!-- /PREVIEW ACTIONS -->
                            </div>
                            <!-- /PRODUCT PREVIEW ACTIONS -->

                            <!-- PRODUCT INFO -->
                            <div class="product-info">
                                <a href="item-v1.html">
                                    <p class="text-header">Pixel Diamond Gaming Shop</p>
                                </a>
                                <a href="shop-gridview-v1.html">
                                    <p class="category tiny primary">Shopify</p>
                                </a>
                                <p class="price big"><span>$</span>86</p>
                            </div>
                            <!-- /PRODUCT INFO -->
                            <hr class="line-separator">

                            <!-- USER RATING -->
                            <div class="user-rating">
                                <a href="author-profile.html">
                                    <figure class="user-avatar small">
                                        <img src="{{url('website/')}}/images/avatars/avatar_06.jpg" alt="user-avatar">
                                    </figure>
                                </a>
                                <a href="author-profile.html">
                                    <p class="text-header tiny">Sarah-Imaginarium</p>
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
                        <div class="product-item column">
                            <!-- PIN -->
                            <span class="pin featured">مميز</span>
                            <!-- /PIN -->

                            <!-- PRODUCT PREVIEW ACTIONS -->
                            <div class="product-preview-actions">
                                <!-- PRODUCT PREVIEW IMAGE -->
                                <figure class="product-preview-image big">
                                    <img src="{{url('website/')}}/images/items/phantom_m02.jpg" alt="product-image">
                                </figure>
                                <!-- /PRODUCT PREVIEW IMAGE -->

                                <!-- PREVIEW ACTIONS -->
                                <div class="preview-actions">
                                    <!-- PREVIEW ACTION -->
                                    <div class="preview-action">
                                        <a href="item-v1.html">
                                            <div class="circle tiny primary">
                                                <span class="icon-tag"></span>
                                            </div>
                                        </a>
                                        <a href="item-v1.html">
                                            <p>Go to Item</p>
                                        </a>
                                    </div>
                                    <!-- /PREVIEW ACTION -->

                                    <!-- PREVIEW ACTION -->
                                    <div class="preview-action">
                                        <a href="#">
                                            <div class="circle tiny secondary">
                                                <span class="icon-heart"></span>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <p>Favourites +</p>
                                        </a>
                                    </div>
                                    <!-- /PREVIEW ACTION -->
                                </div>
                                <!-- /PREVIEW ACTIONS -->
                            </div>
                            <!-- /PRODUCT PREVIEW ACTIONS -->

                            <!-- PRODUCT INFO -->
                            <div class="product-info">
                                <a href="item-v1.html">
                                    <p class="text-header">Phantom Cloud Illustration Shop</p>
                                </a>
                                <a href="shop-gridview-v1.html">
                                    <p class="category tiny primary">PSD Templates</p>
                                </a>
                                <p class="price big"><span>$</span>14</p>
                            </div>
                            <!-- /PRODUCT INFO -->
                            <hr class="line-separator">

                            <!-- USER RATING -->
                            <div class="user-rating">
                                <a href="author-profile.html">
                                    <figure class="user-avatar small">
                                        <img src="{{url('website/')}}/images/avatars/avatar_09.jpg" alt="user-avatar">
                                    </figure>
                                </a>
                                <a href="author-profile.html">
                                    <p class="text-header tiny">Odin_Design</p>
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
                                    <li class="rating-item">
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

                    <div class="clearfix"></div>
                </div>
                <!-- /PRODUCT SHOWCASE -->
        </div>
        <!-- PRODUCT SHOWCASE -->
    </div>
</div>
<!-- /منتج SIDESHOW -->


@endsection

@push('scripts')
<script src="{{url('website/owl')}}/vandors/owlcarousel/owl.carousel.min.js"></script>
<script src="{{url('website/owl')}}/dist/js/home-sliderv1.js"></script>
<script src="{{url('website/owl')}}/dist/js/products-slider.js"></script>

<!-- home -->
<script src="{{ url('website/js/home.js') }}"></script>

@endpush
