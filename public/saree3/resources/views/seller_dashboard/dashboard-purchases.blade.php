@extends('seller_dashboard.master')

@push('css')
    <link rel="stylesheet" href="{{asset('website/css/vendor/magnific-popup.css')}}">
@endpush

@section('content')


        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline purchases primary">
                <h4>مشترياتك</h4>
                <form id="purchase_filter_form" name="purchase_filter_form">
                    <label for="itemspp_filter" class="select-block">
                        <select name="itemspp_filter" id="itemspp_filter">
                            <option value="0"> تم شراؤها </option>
                            <option value="1">قيد التنفيد</option>
                            <option value="1">تم إلغاؤها</option>

                        </select>
                        <!-- SVG ARROW -->
                        <svg class="svg-arrow">
                            <use xlink:href="#svg-arrow"></use>
                        </svg>
                        <!-- /SVG ARROW -->
                    </label>

                    <label for="date_filter" class="select-block">
                        <select name="date_filter" id="date_filter">
                            <option value="0">التاريخ (من الأحدث للأقدم)</option>
                            <option value="1">التاريخ (من الأقدم للأحدث)</option>
                        </select>
                        <!-- SVG ARROW -->
                        <svg class="svg-arrow">
                            <use xlink:href="#svg-arrow"></use>
                        </svg>
                        <!-- /SVG ARROW -->
                    </label>

                    <div class="search-form">
                        <input type="text" class="rounded search" name="search" id="search_منتج" placeholder="Search منتج here...">
                        <input type="image" src="{{asset('website/')}}/images/search-icon-small.png" alt="search-icon">
                    </div>
                </form>
            </div>
            <!-- /HEADLINE -->

            <!-- PURCHASES LIST -->
            <div class="purchases-list">
                <!-- PURCHASES LIST HEADER -->
                <div class="purchases-list-header">
                    <div class="purchases-list-header-date">
                        <p class="text-header small">التاريخ</p>
                    </div>
                    <div class="purchases-list-header-details">
                        <p class="text-header small">معلومات المنتج</p>
                    </div>
                    <div class="purchases-list-header-info">
                        <p class="text-header small">معلومات إضافية</p>
                    </div>
                    <div class="purchases-list-header-price">
                        <p class="text-header small">السعر</p>
                    </div>
                    <div class="purchases-list-header-download">
                        <p class="text-header small">التحميل</p>
                    </div>
                    <div class="purchases-list-header-recommend">
                        <p class="text-header small">التوصية</p>
                    </div>
                </div>
                <!-- /PURCHASES LIST HEADER -->

                <!-- PURCHASE ITEM -->
                <div class="purchase-item">
                    <div class="purchase-item-date">
                        <p>18يناير 2018</p>
                    </div>
                    <div class="purchase-item-details">
                        <!-- ITEM PREVIEW -->
                        <div class="item-preview">
                            <figure class="product-preview-image small liquid">
                                <img src="{{asset('website/')}}/images/items/westeros_s.jpg" alt="product-image">
                            </figure>
                            <p class="text-header">منتج رقمي جديد</p>
                            <p class="description">هذا نص تجريبي فقط و لا يعني أي شيئ للتجربة...</p>
                        </div>
                        <!-- /ITEM PREVIEW -->
                    </div>
                    <div class="purchase-item-info">
                        <p class="category primary">قالب PSD</p>
                        <p><span class="light">الترخيص</span> Standard</p>
                        <p><span class="light">البائع</span> أحمد حسين</p>
                        <p class="text-header tiny">الفاتورة</p>
                    </div>
                    <div class="purchase-item-price">
                        <p class="price"><span>$</span>14</p>
                    </div>
                    <div class="purchase-item-download">
                        <a href="#" class="button dark-light">تحميل المنتج</a>
                    </div>
                    <div class="purchase-item-recommend">
                        <div class="recommendation-wrap">
                            <a href="#recommendation-popup" class="recommendation good hoverable open-recommendation-form">
                                <span class="icon-like"></span>
                            </a>
                            <a href="#recommendation-popup" class="recommendation bad hoverable open-recommendation-form">
                                <span class="icon-dislike"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /PURCHASE ITEM -->

                <!-- PURCHASE ITEM -->
                <div class="purchase-item">
                    <div class="purchase-item-date">
                        <p>5 ماي 2018</p>
                    </div>
                    <div class="purchase-item-details">
                        <!-- ITEM PREVIEW -->
                        <div class="item-preview">
                            <figure class="product-preview-image small liquid">
                                <img src="{{asset('website/')}}/images/items/miniverse_s.jpg" alt="product-image">
                            </figure>
                            <p class="text-header">تأثيرات صوتية</p>
                            <p class="description">هذا نص تجريبي فقط و لا يعني أي شيئ للتجربة...</p>
                        </div>
                        <!-- /ITEM PREVIEW -->
                    </div>
                    <div class="purchase-item-info">
                        <p class="category primary">شخصيات كرتونية</p>
                        <p><span class="light">الترخيص</span> Standard</p>
                        <p><span class="light">البائع</span> أحمد حسين</p>
                        <p class="text-header tiny">الفاتورة</p>
                    </div>
                    <div class="purchase-item-price">
                        <p class="price"><span>$</span>12</p>
                    </div>
                    <div class="purchase-item-download">
                        <a href="#" class="button dark-light">تحميل المنتج</a>
                    </div>
                    <div class="purchase-item-recommend">
                        <div class="recommendation-wrap">
                            <a href="#recommendation-popup" class="recommendation good open-recommendation-form">
                                <span class="icon-like"></span>
                            </a>
                            <a href="#recommendation-popup" class="recommendation bad hoverable open-recommendation-form">
                                <span class="icon-dislike"></span>
                            </a>
                        </div>
                        <p class="text-header">
                            <a href="#recommendation-popup" class="open-recommendation-form">تقييمك </a>
                        </p>
                    </div>
                </div>
                <!-- /PURCHASE ITEM -->

                <!-- PURCHASE ITEM -->
                <div class="purchase-item">
                    <div class="purchase-item-date">
                        <p>4 ماي 2018</p>
                    </div>
                    <div class="purchase-item-details">
                        <!-- ITEM PREVIEW -->
                        <div class="item-preview">
                            <figure class="product-preview-image small liquid">
                                <img src="{{asset('website/')}}/images/items/pixel_s.jpg" alt="product-image">
                            </figure>
                            <p class="text-header">قالب متجر إلكتروني </p>
                            <p class="description">هذا نص تجريبي فقط و لا يعني أي شيئ للتجربة...</p>
                        </div>
                        <!-- /ITEM PREVIEW -->
                    </div>
                    <div class="purchase-item-info">
                        <p class="category primary">شوبيفاي</p>
                        <p><span class="light">الترخيص</span> Standard</p>
                        <p><span class="light">البائع</span> سارة أحمد</p>
                        <p class="text-header tiny">الفاتورة</p>
                    </div>
                    <div class="purchase-item-price">
                        <p class="price"><span>$</span>86</p>
                    </div>
                    <div class="purchase-item-download">
                        <a href="#" class="button dark-light">تحميل المنتج</a>
                    </div>
                    <div class="purchase-item-recommend">
                        <div class="recommendation-wrap">
                            <a href="#recommendation-popup" class="recommendation good hoverable open-recommendation-form">
                                <span class="icon-like"></span>
                            </a>
                            <a href="#recommendation-popup" class="recommendation bad open-recommendation-form">
                                <span class="icon-dislike"></span>
                            </a>
                        </div>
                        <p class="text-header">
                            <a href="#recommendation-popup" class="open-recommendation-form">تقييمك </a>
                        </p>
                    </div>
                </div>
                <!-- /PURCHASE ITEM -->

                <!-- PURCHASE ITEM -->
                <div class="purchase-item">
                    <div class="purchase-item-date">
                        <p>17 فبراير 2018</p>
                    </div>
                    <div class="purchase-item-details">
                        <!-- ITEM PREVIEW -->
                        <div class="item-preview">
                            <figure class="product-preview-image small liquid">
                                <img src="{{asset('website/')}}/images/items/city_s.jpg" alt="product-image">
                            </figure>
                            <p class="text-header">خلفيات إحترافية للألعاب</p>
                            <p class="description">هذا نص تجريبي فقط و لا يعني أي شيئ للتجربة...</p>
                        </div>
                        <!-- /ITEM PREVIEW -->
                    </div>
                    <div class="purchase-item-info">
                        <p class="category primary">خلفيات</p>
                        <p><span class="light">الترخيص</span> Standard</p>
                        <p><span class="light">البائع</span> أحمد السعيد</p>
                        <p class="text-header tiny">الفاتورة</p>
                    </div>
                    <div class="purchase-item-price">
                        <p class="price"><span>$</span>10</p>
                    </div>
                    <div class="purchase-item-download">
                        <a href="#" class="button dark-light">تحميل المنتج</a>
                    </div>
                    <div class="purchase-item-recommend">
                        <div class="recommendation-wrap">
                            <a href="#recommendation-popup" class="recommendation good hoverable open-recommendation-form">
                                <span class="icon-like"></span>
                            </a>
                            <a href="#recommendation-popup" class="recommendation bad hoverable open-recommendation-form">
                                <span class="icon-dislike"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /PURCHASE ITEM -->

                <!-- PURCHASE ITEM -->
                <div class="purchase-item">
                    <div class="purchase-item-date">
                        <p>22 يناير 2018</p>
                    </div>
                    <div class="purchase-item-details">
                        <!-- ITEM PREVIEW -->
                        <div class="item-preview">
                            <figure class="product-preview-image small liquid">
                                <img src="{{asset('website/')}}/images/items/punk_s.jpg" alt="product-image">
                            </figure>
                            <p class="text-header">قالب فلاير لمطعم</p>
                            <p class="description">هذا نص تجريبي فقط و لا يعني أي شيئ للتجربة...</p>
                        </div>
                        <!-- /ITEM PREVIEW -->
                    </div>
                    <div class="purchase-item-info">
                        <p class="category primary">صوتيات</p>
                        <p><span class="light">الترخيص</span> Standard</p>
                        <p><span class="light">البائع</span> أحمد السعيد</p>
                        <p class="text-header tiny">الفاتورة</p>
                    </div>
                    <div class="purchase-item-price">
                        <p class="price"><span>$</span>6</p>
                    </div>
                    <div class="purchase-item-download">
                        <a href="#" class="button dark-light">تحميل المنتج</a>
                    </div>
                    <div class="purchase-item-recommend">
                        <div class="recommendation-wrap">
                            <a href="#recommendation-popup" class="recommendation good open-recommendation-form">
                                <span class="icon-like"></span>
                            </a>
                            <a href="#recommendation-popup" class="recommendation bad hoverable open-recommendation-form">
                                <span class="icon-dislike"></span>
                            </a>
                        </div>
                        <p class="text-header">
                            <a href="#recommendation-popup" class="open-recommendation-form">تقييمك </a>
                        </p>
                    </div>
                </div>
                <!-- /PURCHASE ITEM -->

                <!-- PAGER -->
                <div class="pager-wrap">
                    <div class="pager primary">
                        <div class="pager-item"><p>1</p></div>
                        <div class="pager-item active"><p>2</p></div>
                        <div class="pager-item"><p>3</p></div>
                        <div class="pager-item"><p>...</p></div>
                        <div class="pager-item"><p>17</p></div>
                    </div>
                </div>
                <!-- /PAGER -->
            </div>
            <!-- /PURCHASES LIST -->
        </div>
        <!-- DASHBOARD CONTENT -->
    </div>
    <!-- /DASHBOARD BODY -->

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