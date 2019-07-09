@extends('website.layout')

@push('links')
<style>
    .product-list.grid .product-item .product-preview-actions {
        width: 247px !important;
    }
    .product-preview-image {
        width: 100%;
        height: 100%;
    }
    figure>img {
        width: 100%;
        height:100%;
    }
    .section .pager {
        width: 174px;
        margin: 34px 0 0;
    }
    .product-list.grid .product-item {
        padding: 175px 36px 12px;
        margin-bottom: 44px;
        direction: rtl;
    }
    .column4-wrap .column {
        float: right;
        margin-left: 44px;
    }
    .section .content.full .pager {
        margin-right:0;
    }      
</style>
@endpush

@section('content')



	<!-- SECTION HEADLINE -->
	<div class="section-headline-wrap">
            <div class="section-headline">
                <h2>المفضلة</h2>
                <p>الرئيسية<span class="separator">/</span><span class="current-section">المفضلة</span></p>
            </div>
        </div>
        <!-- /SECTION HEADLINE -->

        <!-- HT BANNE--->

        <!-- SECTION -->
        <div class="section-wrap">
            <div class="section">
                <!-- CONTENT -->
                <div class="content full">
                    <!-- HEADLINE -->
                    <div class="headline primary">
                        <h4>{{count($fav)}} مفضلة موجودة</h4>
                        <!-- VIEW SELECTORS -->
                        <div class="view-selectors">
                            <a href="favourites.html" class="view-selector grid active"></a>
                            <a href="favourites-listview.html" class="view-selector list"></a>
                        </div>
                        <!-- /VIEW SELECTORS -->
                        <form id="shop_filter_form" name="shop_filter_form">
                            <label for="price_filter" class="select-block">
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
                            <label for="itemspp_filter" class="select-block">
                                <select name="itemspp_filter" id="itemspp_filter">
                                    <option value="0">12 عنصر بالصفحة</option>
                                    <option value="1">6 عناصر بالصفحة</option>
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
                        <div class="product-list grid column4-wrap">

                            @forelse ($fav as $item => $value)
                            <!-- PRODUCT ITEM -->
                            <div class="product-item column">
                                <!-- PRODUCT PREVIEW ACTIONS -->
                                <div class="product-preview-actions">
                                    <!-- PRODUCT PREVIEW IMAGE -->
                                    <figure class="product-preview-image">
                                        <img src="{{url('uploads/products/'.get_img($value))}}" alt="product-image">
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
                                                <p>إذهب للمنتج</p>
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
                                    <a href="item-v1.html">
                                        <p class="text-header">{!! $value->product_name !!}</p>
                                    </a>
                                    <p class="product-description">{!! substr($value->desc,0,30) !!}...</p>
                                    <a href="shop-gridview-v1.html">
                                        <p class="category primary">{!! check_name_section($value->category) !!}</p>
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
                                        <p class="text-header tiny">{!! $value->username !!}</p>
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
                                <p>0 products fav</p>
                            @endempty

                        </div>
                        <!-- /PRODUCT LIST -->
                    </div>
                    <!-- /PRODUCT SHOWCASE -->

                    <div class="clearfix"></div>
                    <!-- PAGER -->
                    {{$fav->links()}}
                    <!-- /PAGER -->

                   
                </div>
                <!-- CONTENT -->
            </div>
        </div>
        <!-- /SECTION -->

@endsection

@push('scripts')


@endpush
