@extends('website.layout')

@push('links')
    <style>
        .bg-cover {
            width: 100%;
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
        }
        figure>img {
            width: 100%;
            height: 100%;
        }

        .list_exp {
            overflow: hidden;
        }
        .list_exp li {
            float: left;
            width: calc(100%/4 - 2%);
            text-align: center;
            background: #737373;
            color: #fff;
            border-radius: 12px;
            margin-left: 2%;
            font-size: 13px;
            padding: 4px 0;   
        }
    </style>
@endpush

@section('content')


	<!-- SECTION HEADLINE -->
	<div class="section-headline-wrap">
            <div class="section-headline">
                <h2>الملف الشخصي</h2>
                <p>الرئيسية<span class="separator">/</span><span class="current-section">الملف الشخصي</span></p>
            </div>
    </div>
    <!-- /SECTION HEADLINE -->

    <!-- author PROFILE BANNER -->
    <div class="author-profile-banner" style="position: relative">
        <img src="{{asset('images/'.$user->cover)}}" class="bg-cover"/>
    </div>
    <!-- /author PROFILE BANNER -->

    <!-- author PROFILE META -->
    <div class="author-profile-meta-wrap">
        <div class="author-profile-meta">
            <!-- author PROFILE INFO -->
            <div class="author-profile-info">
                <!-- author PROFILE INFO ITEM -->
                <div class="author-profile-info-item">
                    <p class="text-header"> تاريخ الإنضمام :</p>
                    <p>{!! UserAt($user->created_at) !!}</p>
                </div>
                <!-- /author PROFILE INFO ITEM -->

                <!-- author PROFILE INFO ITEM -->
                <div class="author-profile-info-item">
                    <p class="text-header">إجمالي المبيعات:</p>
                    <p>0</p>
                </div>
                <!-- /author PROFILE INFO ITEM -->

                <!-- author PROFILE INFO ITEM -->
                <div class="author-profile-info-item">
                    <p class="text-header">  قيد التنفيذ:</p>
                    <p>0</p>
                </div>
                <!-- /author PROFILE INFO ITEM -->

                <!-- author PROFILE INFO ITEM -->
                <div class="author-profile-info-item">
                    <p class="text-header">سرعة الرد :</p>
                    <p>ساعة</p>
                </div>
                <!-- /author PROFILE INFO ITEM -->
                 <!-- author PROFILE INFO ITEM -->
                 <div class="author-profile-info-item">
                    <p class="text-header"> أخر تواجد :</p>
                    <p>1 يناير 5:30 م</p>
                </div>
                <!-- /author PROFILE INFO ITEM -->
            </div>
            <!-- /author PROFILE INFO -->
        </div>
    </div>
    <!-- /author PROFILE META -->

    <!-- SECTION -->
    <div class="section-wrap">
        <div class="section overflowable">
            <!-- SIDEBAR -->
            <div class="sidebar left author-profile">
                                   <!-- SIDEBAR ITEM -->
                <div class="sidebar-item author-bio author-badges-v2 column">
                    <!-- USER AVATAR -->
                    <a href="user-profile.html" class="user-avatar-wrap medium">
                        <figure class="user-avatar medium">
                        <img src="{{url('images/avatars/'.$user->image)}}" alt="">
                        </figure>
                    </a>
                    <!-- /USER AVATAR -->
                    <p class="text-header">{!! $user->name !!}</p>
                    <p class="text-oneline">{!! $user->job !!}</p>
                    <!-- SHARE LINKS -->
                    <ul class="share-links">
                        <li><a href="#" class="fb"></a></li>
                        <li><a href="#" class="twt"></a></li>
                        <li><a href="#" class="db"></a></li>
                    </ul>
                    <!-- /SHARE LINKS -->
                    <p class="text-header tiny">الأوسمة</p>
                    <!-- BADGE LIST -->
                    <div class="badge-list short">
                        <!-- BADGE LIST ITEM -->
                        <div class="badge-list-item">
                            <figure class="badge small liquid">
                                <img src="{{url('website/')}}/images/badges/community/gold_s.png" alt="">
                            </figure>
                        </div>
                        <!-- /BADGE LIST ITEM -->

                        <!-- BADGE LIST ITEM -->
                        <div class="badge-list-item">
                            <figure class="badge small liquid">
                                <img src="{{url('website/')}}/images/badges/flags/flag_usa_s.png" alt="">
                            </figure>
                        </div>
                        <!-- /BADGE LIST ITEM -->

                        
                    </div>
                    <!-- /BADGE LIST -->

                    <div class="clearfix"></div>
                    <a href="#" class="button mid dark spaced">الذهاب إلى <span class="primary">صفحة مقدم الخدمة </span></a>
                    <a href="#" class="button mid dark-light">تواصل معه</a>
                </div>
                <!-- /SIDEBAR ITEM -->


                <!-- SIDEBAR ITEM -->
                <div class="sidebar-item author-reputation full" style="padding-top: 23px;padding-bottom: 23px;">
                   <div class="item" style="margin-bottom: 30px;">
                       <h4>  <i class="fa fa-info"></i> النبذه : </h4>
                       <p>{!! $user->description !!}</p>
                       {{-- <p style="font-size: 11px;color: #383838;font-weight: bold;text-align: left;cursor: pointer">إقرأ المزيد</p> --}}
                   </div>
                    <div class="item" style="margin-bottom: 30px;">
                        <h4>  <i class="fa fa-question"></i> الخبرات : </h4>
                        <ul class="list_exp">
                            <li>PHP</li>
                            <li>HTML</li>
                            <li>CSS</li>   
                            <li>JS</li>                           
                        </ul>
                    </div>
                    <div class="item" style="margin-bottom: 30px;">

                        <h4>  <i class="fa fa-question"></i> المهارات : </h4>
                        <ul class="list_exp">
                                <li>PHP</li>
                                <li>HTML</li>
                                <li>CSS</li>   
                                <li>JS</li>                           
                        </ul>

                    </div>
                    <div class="item">
                        <h4>  <i class="fa fa-question"></i> الشهادات : </h4>
                        <p>{!! $user->certificates  !!}</p>
                        <ul class="list_exp">
                                <li>PHP</li>
                                <li>HTML</li>
                                <li>CSS</li>   
                                <li>JS</li>                           
                            </ul>
                    </div>

                </div>
                <!-- /SIDEBAR ITEM -->

                <!-- DROPDOWN -->
                <ul class="dropdown hover-effect">
                    <li class="dropdown-item active">
                        <a href="#">الملف الشخصي</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="#">الخدمات (20)</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="#">المواضيع</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="#">تقييمات العملاء (42)</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="#">المتابعين (5)</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="#">المتابعة (2)</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="#">الأوسمة (16)</a>
                    </li>
                </ul>
                <!-- /DROPDOWN -->

                <!-- SIDEBAR ITEM -->
                <div class="sidebar-item author-reputation full">
                    <h4>التقييمات</h4>
                    <hr class="line-separator">
                    <!-- PIE CHART -->
                    <div class="likes">

                        <div class="like">
                            <i class="fa fa-thumbs-o-up"></i>
                            <p>12 إيجابي</p>
                        </div>
                        <div class="like">
                            <i class="fa fa-thumbs-o-down"></i>
                            <p>15 سلبي</p>
                        </div>
                    </div>
                                        <!-- PIE CHART -->
                <div class="pie-chart pie-chart1">
                    <p class="text-header percent">86<span>%</span></p>
                    <p class="text-header percent-info">موصى به</p>
                    <!-- RATING -->
                    <ul class="rating">
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
                    <!-- /RATING -->
                </div>
                <!-- /PIE CHART -->
                    <a href="#" class="button mid dark-light">إقرأ جميع التقييمات</a>
                </div>
                <!-- /SIDEBAR ITEM -->
            </div>
            <!-- /SIDEBAR -->

            <!-- CONTENT -->
            <div class="content right">


                <!-- HEADLINE -->
                <div class="headline buttons primary">
                    <h4>أخر الخدمات</h4>
                    <a href="author-profile-items.html" class="button mid-short dark-light">عرض جميع الخدمات</a>
                </div>
                <!-- /HEADLINE -->

                <!-- PRODUCT LIST -->
                <div class="product-list grid column3-4-wrap">

                    @forelse($user_services as $key => $value)                    
                    <!-- PRODUCT ITEM -->
                    <div class="product-item column">
                        <!-- PRODUCT PREVIEW ACTIONS -->
                        <div class="product-preview-actions">
                            <!-- PRODUCT PREVIEW IMAGE -->
                            <figure class="product-preview-image">
                                <img src="{{url("uploads/services/".get_services_imgs($value)[0]->img)}}" alt="service-image">
                            </figure>
                            <!-- /PRODUCT PREVIEW IMAGE -->

                            <!-- PREVIEW ACTIONS -->
                            <div class="preview-actions">
                                <!-- PREVIEW ACTION -->
                                <div class="preview-action">
                                    <a href="{{url('Service/'.$value->slug)}}">
                                        <div class="circle tiny primary">
                                            <span class="icon-tag"></span>
                                        </div>
                                    </a>
                                    <a href="{{url('Service/'.$value->slug)}}">
                                        <p>إذهب للخدمة</p>
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
                                <a href="{{url('/srvices/1')}}">
                                    <p class="text-header">{!! $value->services_name !!}</p>
                                </a>
                                <p class="product-description">{!! $value->services_desc !!}</p>
                                <a href="services.html">
                                    <p class="category secondary">{!! json_decode($value->section_name)->ar !!}</p>
                                </a>
                                <p class="price"><span>$</span>{!! $value->price !!}</p>
                            </div>
                            <!-- /PRODUCT INFO -->
                        <hr class="line-separator" style="margin-left: -37px;margin-right: -37px;">

                        <!-- USER RATING -->
                        <div class="user-rating">
                            <a href="author-profile.html">
                                <figure class="user-avatar small">
                                    <img src="{{url('images/avatars/'.$value->userimage)}}" alt="user-avatar">
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
                    @endforeach


                </div>
                <!-- /PRODUCT LIST -->

                <div class="clearfix"></div>

                <!-- HEADLINE -->
                <div class="headline buttons primary">
                    <h4>تقييمات العملاء <!-- PIN -->
                        <span style="color: #ffc000;font-size: 14px;font-weight: bold;"> (2) <i class="fa fa-star"></i></span></h4>

                    <select class="stars-select" name="" id="" style="margin: 17px -9px;color:#2b2b2b;border-radius: 0px !important;
                    border-color: #afafaf;">
                        <option value=""> أحدت التقييمات </option>
                        <option value="">التقييمات الإيجابية</option>
                        <option value="">التقييمات السلبية</option>
                        <!-- SVG ARROW -->

                    </select>

                    <svg class="svg-arrow select-arow" style="top: 30px;">
                        <use xlink:href="#svg-arrow"></use>
                    </svg>
                    <!-- /SVG ARROW -->
                </div>
                <!-- /HEADLINE -->

                <!-- التعليقات -->
                <div class="comment-list">
                    <!-- COMMENT -->
                    <div class="comment-wrap">
                        <!-- USER AVATAR -->
                        <a href="user-profile.html">
                            <figure class="user-avatar medium">
                                <img src="{{url('website/')}}/images/avatars/avatar_02.jpg" alt="">
                            </figure>
                        </a>
                        <!-- /USER AVATAR -->
                        <div class="comment">
                            <p class="text-header">سارة أحمد</p>
                            <!-- PIN -->
                            <span style="color: #ffc000;font-size: 14px;font-weight: bold;"> 5 <i class="fa fa-star"></i></span>
                            <!-- /PIN -->
                            <p class="timestamp">5 Hours Ago</p>
                            <a href="#" class="التبليغ">التبليغ</a>
                            <p>لقد اشتريت قالبك قبل يومين و أنا غير قادر على تنصيبه المرجو مساعدتي إن أمكن و شكراً جزيلاً لك </p>
                        </div>
                    </div>
                    <!-- /COMMENT -->

                    <!-- LINE SEPARATOR -->
                    <hr class="line-separator">
                    <!-- /LINE SEPARATOR -->

                    <!-- COMMENT -->
                    <div class="comment-wrap">
                        <!-- USER AVATAR -->
                        <a href="user-profile.html">
                            <figure class="user-avatar medium">
                                 <img src="{{url('website/')}}/images/avatars/avatar_19.jpg" alt="">
                            </figure>
                        </a>
                        <!-- /USER AVATAR -->
                        <div class="comment">
                            <p class="text-header">Cloud Templates</p>
                            <!-- PIN -->
                            <span style="color: #ffc000;font-size: 14px;font-weight: bold;"> 5 <i class="fa fa-star"></i></span>
                            <p class="timestamp">8 Hours Ago</p>
                            <a href="#" class="التبليغ">التبليغ</a>
                            <p>هاذا نص تجريبي و لا يعني أي شيئ المرجو تجاهله هو للتجربة فقط و غير مهم بأي حال من الأحوال..</p>
                        </div>
                    </div>
                    <!-- /COMMENT -->
                </div>
                <!-- /التعليقات -->
            </div>
            <!-- CONTENT -->

            <div class="clearfix"></div>
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
    <!-- XM PieChart -->
    <script src="{{url('website/')}}/js/vendor/jquery.xmpiechart.min.js"></script>
    <!-- author Profile -->
    <script src="{{url('website/')}}/js/author-profile.js"></script>

@endpush
