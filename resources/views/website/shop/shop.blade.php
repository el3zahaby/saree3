@extends('website.layout')

@push('links')
<link rel="stylesheet" href="{{ url('website/css/flexslider.css') }}">
<link rel="stylesheet" href="{{ url('website/css/customv2.css') }}">

<!-- css file -->
<link rel="stylesheet" href="{{url('website/owl/')}}/vandors/owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="{{url('website/owl/')}}/vandors/owlcarousel/assets/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="{{url('website/owl/')}}/dist/css/app.css" />
<link rel="stylesheet" type="text/css" href="{{url('website/owl/')}}/dist/css/service-slider.css" />


@endpush

@section('content')

	<!-- SECTION HEADLINE -->
	<div class="section-headline-wrap">
            <div class="section-headline">
                <h2>المنتجات الرقمية</h2>
                <p>الرئيسية<span class="separator">/</span><span class="current-section">المنتجات الرقمية</span></p>
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
                                <h2>عنوان 1</h2>
                                <p>نص تجريبي</p>
                            </div>
                        </div>
                        <div class="item">
                                <div class="bg"><img src="{{url('images/')}}//2.jpeg" alt=""></div>
                                <div class="overlay">
                                    <h2>عنوان 1</h2>
                                    <p>نص تجريبي</p>
                                </div>
                            </div>
                            <div class="item">
                                    <div class="bg"><img src="{{url('images/')}}//3.jpeg" alt=""></div>
                                    <div class="overlay">
                                        <h2>عنوان 1</h2>
                                        <p>نص تجريبي</p>
                                    </div>
                                </div>
                    </div>
                    <!-- end Slider -->
                    <div class="clearfix"></div>

                    <!-- HEADLINE -->
                    <div class="headline secondary">
                        <h4>{{count($branches)}} معرض </h4>
                     <!-- SLIDE CONTROLS -->
					<div class="slide-control-wrap" style="left: 25px;top: 18px;">
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
                        <!-- VIEW SELECTORS -->
                        <div class="view-selectors"  style="margin-left: 112px;">
                            <a href="services.html" class="view-selector grid active"></a>
                            <a href="services-listview.html" class="view-selector list"></a>
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
                        <div class="product-list grid column3-4-wrap edit-column-wrap ">


                            @forelse($branches as $key => $value)
                                <!-- PRODUCT ITEM -->
                                    <div class="column product-item product-item column edit-colum">
                                        <!-- PRODUCT PREVIEW ACTIONS -->
                                        <div class="product-preview-actions product-preview-actions" style="width: 293px;height: 187px;">
                                            <!-- PRODUCT PREVIEW IMAGE -->
                                            <figure class="product-preview-image product-preview-image">
                                                <img src="{{asset('images/branches/' . $value->image)}}" alt="product-image" style="width: 100%;height: 100%;">
                                            </figure>
                                            <!-- /PRODUCT PREVIEW IMAGE -->

                                            <!-- PREVIEW ACTIONS -->
                                            <div class="preview-actions">
                                                <!-- PREVIEW ACTION -->
                                                <div class="preview-action preview-action" style="top: 64px;">
                                                    <a href="{{url('/Shop/'.$value->id)}}">
                                                        <div class="circle tiny primary">
                                                            <span class="icon-tag"></span>
                                                        </div>
                                                    </a>
                                                    <a href="{{url('/Shop/'.$value->id)}}">
                                                        <p>إذهب للمنتج</p>
                                                    </a>
                                                </div>
                                                <!-- /PREVIEW ACTION -->

                                                <!-- PREVIEW ACTION -->
                                                <div class="preview-action preview-action" style="top: 64px;right: 154px;">
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
                                            <a href="{{url('/Shop/'.$value->id)}}">
                                                <p class="text-header">{!! $value->name!!}</p>
                                            </a>
                                            <p class="product-description">{!! $value->desc !!}</p>
                                            <a href="services.html">
                                                <p class="category secondary">{!!json_decode(check_name_section($branches[0]->section)[0]->section_name)->ar !!}</p>
                                            </a>

                                        </div>
                                        <!-- /PRODUCT INFO -->
                                        <hr class="line-separator line" style="margin-left: -37px; margin-right: -37px;">

                                        <!-- USER RATING -->
                                        <div class="user-rating">
                                            <a href="author-profile.html">
                                                <figure class="user-avatar small">
                                                    <img src="{{url('website/images/avatars/avatar_14.jpg')}}" alt="user-avatar">
                                                </figure>
                                            </a>
                                            <a href="author-profile.html">
                                                <p class="text-header tiny">{{$value->username}}</p>
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

                             @endempty



                        </div>
                        <!-- /PRODUCT LIST -->


                    </div>
                    <!-- /PRODUCT SHOWCASE -->

                    <div class="clearfix"></div>

                    <!-- PAGER -->
                    <div class="pager secondary">
                        <div class="pager-item"><p>1</p></div>
                        <div class="pager-item active"><p>2</p></div>
                        <div class="pager-item"><p>3</p></div>
                        <div class="pager-item"><p>...</p></div>
                        <div class="pager-item"><p>17</p></div>
                    </div>
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
                            <input type="text" class="rounded" name="search" id="search_منتج" placeholder="إبحث عن المنتجات الرقمية...." style="font-size: 11px;">
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
                                <label for="price_filter" class="select-block">
                                        <select name="price_filter" id="price_filter">
                                            <option value="0">المغرب</option>
                                            <option value="1">الأردن</option>
                                        </select>
                                        <!-- SVG ARROW -->
                                        <svg class="svg-arrow">
                                            <use xlink:href="#svg-arrow"></use>
                                        </svg>
                                        <!-- /SVG ARROW -->
                                    </label>
                                    <label for="price_filter" class="select-block">
                                            <select name="price_filter" id="price_filter">
                                                <option value="0">المدينة</option>
                                                <option value="1"></option>
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
                    <div class="sidebar-item">
                            <h4> المستوى </h4>
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
                            </form>
                        </div>
                        <!-- /SIDEBAR ITEM -->

                    <!-- SIDEBAR ITEM -->
                    <div class="sidebar-item" style="padding-bottom: 0px;">
                        <h4>التقييم</h4>
                        <hr class="line-separator line-cus" style="margin-bottom: 14px;">

                        <!-- /CHECKBOX -->
                        <div class="rating-1" style="margin-bottom: 13px;text-align:center">
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
<!-- Item V1 -->
<script src="{{url('website/')}}/js/item-v1.js"></script>
<script src="{{url('website/')}}/js/jquery.nicescroll.min.js"></script>
<script src="{{url('website/owl')}}/vandors/owlcarousel/owl.carousel.min.js"></script>
<script src="{{url('website/owl')}}/dist/js/app.js"></script>
<script src="{{url('website/owl')}}/dist/js/service-slider.js"></script>




@endpush
