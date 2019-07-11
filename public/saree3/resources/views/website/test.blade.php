<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="{{ url('website/css/vendor/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ url('website/css/vendor/tooltipster.css') }}">
    <link rel="stylesheet" href="{{ url('website/css/vendor/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ url('website/css/vendor/magnific-popup.css') }}">
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{url('website/font-awesome/font-awesome.min.css')}}">


    <link rel="stylesheet" href="{{ url('website/css/style.css') }}">
    @stack('links')
    <!-- favicon -->
    <link rel="icon" href="favicon.ico">
    <title>test</title>

    <style>
        .dropdown-cus {
            width: 130px;
            position: absolute;
            left: 179px;
            top: -6px;
        }

        .dropdown-cus .dropdown-item>a {
            font-size : 11px;
            line-height: 29px;
        }
        .dropdown-cus:before {
            content: "";
            display: block;
            border-style: solid;
            border-width: 8px;
            border-color: transparent #cacaca transparent transparent;
            position: absolute;
            left: -17px;
            top: 8px;
        }
        .line-clear {
            margin-left : 0;
            margin-right: 0;
        }
    
    </style>
</head>
<body>

    <!-- FORM POPUP -->
    <div id="login-form" class="form-popup heddin-form">
        <!-- CLOSE BTN -->
        <div class="close-btn">
            <!-- SVG PLUS -->
            <svg class="svg-plus">
                <use xlink:href="#svg-plus"></use>
            </svg>
            <!-- /SVG PLUS -->
        </div>
        <!-- /CLOSE BTN -->

        <!-- FORM POPUP CONTENT -->
        <div  class="form-popup-content">
            <h4 class="popup-title" style="text-align: center;">تسجيل الدخول إلى حسابك</h4>
            <!-- LINE SEPARATOR -->
            <hr class="line-separator">
            <!-- /LINE SEPARATOR -->
            <form action="{{url('login')}}" method="post">
                @csrf
                <label for="username" class="rl-label">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username here...">
                <label for="password" class="rl-label">Password</label>
                <input type="password" id="password" name="password" placeholder="أدخل كلمة المرور هنا...">
                <!-- CHECKBOX -->
                <input type="checkbox" id="remember" name="remember" checked>
                <label for="remember" class="label-check">
                    <span class="checkbox primary primary"><span></span></span>
                    تدكرني
                </label>
                <!-- /CHECKBOX -->
                <p>هل نسيت كلمة المرور ؟ <a href="#" class="primary">!إضغط هنا</a></p>
                <button class="button mid dark">دخول <span class="primary">!الأن</span></button>
            </form>
            <!-- LINE SEPARATOR -->
            <hr class="line-separator double">
            <!-- /LINE SEPARATOR -->

            <!-- Login With Auther Social -->
            <a href="#" class="button mid fb half">
                <span class="text">تسجل عن طريق فيسبوك</span>
                <i class="fa fa-facebook"></i>
            </a>

            <a href="#" class="button mid gm half">
                <span class="text">تسجل عن طريق الجيميل </span>
                <i class="fa fa-google-plus icon"> </i>
            </a>
            <!-- Login With Auther Social -->

        </div>
        <!-- /FORM POPUP CONTENT -->
    </div>
    <!-- /FORM POPUP -->

    <!-- FORM POPUP -->
    <div class="form-popup heddin-form" id="register-form">
        <!-- CLOSE BTN -->
        <div class="close-btn">
            <!-- SVG PLUS -->
            <svg class="svg-plus">
                <use xlink:href="#svg-plus"></use>
            </svg>
            <!-- /SVG PLUS -->
        </div>
        <!-- /CLOSE BTN -->

        <!-- FORM POPUP CONTENT -->
        <div class="form-popup-content">
            <h4 class="popup-title">Register Account</h4>
            <!-- LINE SEPARATOR -->
            <hr class="line-separator">
            <!-- /LINE SEPARATOR -->
            <form>
                <label for="email_address2" class="rl-label required">البريد الإلكتروني</label>
                <input type="email" id="email_address2" name="email_address2" placeholder="أدخل بريدك الإلكتروني هنا...">
                <label for="username2" class="rl-label">Username</label>
                <input type="text" id="username2" name="username2" placeholder="Enter your username here...">
                <label for="password2" class="rl-label required">Password</label>
                <input type="password" id="password2" name="password2" placeholder="أدخل كلمة المرور هنا...">
                <label for="repeat_password2" class="rl-label required">أعد كتابة كلمة المرور</label>
                <input type="password" id="repeat_password2" name="repeat_password2" placeholder="أعد إدخال كلمة المرور هنا...">
                <button class="button mid dark">Register <span class="primary">Now!</span></button>
            </form>
        </div>
        <!-- /FORM POPUP CONTENT -->
    </div>
    <!-- /FORM POPUP -->
<!-- HEADER -->
<div class="header-wrap">
    <header>
        <!-- LOGO -->
        <a href="{{url('/')}}">
            <figure class="logo">
                <img src="{{ url('website/images/logo.png') }}" alt="logo">
            </figure>
        </a>
        <!-- /LOGO -->

        <!-- MOBILE MENU HANDLER -->
        <div class="mobile-menu-handler left primary">
            <img src="{{url('website/images/pull-icon.png')}}" alt="pull-icon">
        </div>
        <!-- /MOBILE MENU HANDLER -->

        <!-- LOGO MOBILE -->
        <a href="/">
            <figure class="logo-mobile">
                <img src="{{ url('website/images/logo_mobile.png') }}" alt="logo-mobile">
            </figure>
        </a>

        <!-- /LOGO MOBILE -->
        @if (auth()->guard()->check())

        <!-- MOBILE ACCOUNT OPTIONS HANDLER -->
        <div class="mobile-account-options-handler right secondary">
            <span class="icon-user"></span>
        </div>
        <!-- /MOBILE ACCOUNT OPTIONS HANDLER -->

        <!-- USER BOARD -->
        <div class="user-board">
            <!-- USER QUICKVIEW -->
            <div class="user-quickview">
                <!-- USER AVATAR -->
                <a href="author-profile.html">
                    <div class="outer-ring">
                        <div class="inner-ring"></div>
                        <figure class="user-avatar">
                            <img src="{{ url('website/images/avatars') }}/avatar_01.jpg" alt="avatar">
                        </figure>
                    </div>
                </a>
                <!-- /USER AVATAR -->

                <!-- USER INFORMATION -->
                <p class="user-name">{{auth()->guard()->user()->name}}</p>
                <!-- SVG ARROW -->
                <svg class="svg-arrow">
                    <use xlink:href="#svg-arrow"></use>
                </svg>
                <!-- /SVG ARROW -->
                <p class="user-money">${{auth()->guard()->user()->sell}}</p>
                <!-- /USER INFORMATION -->

                <!-- DROPDOWN -->
                <ul class="dropdown small hover-effect closed">
                    <li class="dropdown-item">
                        <div class="dropdown-triangle"></div>
                        <a href="{{url('authorProfile/1')}}">الملف الشخصي</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="dashboard-settings.html">إعدادات الحساب</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="dashboard-purchases.html">مشترياتك</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="dashboard-statement.html">كشف المبيعات</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="dashboard-buycredits.html">شراء الرصيد</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="dashboard-withdrawals.html">السحب</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="dashboard-uploaditem.html">رفع منتج</a>
                    </li>
                    <li class="dropdown-item">
                        <a href="dashboard-manageitems.html">إدارة المنتجات</a>
                    </li>
                </ul>
                <!-- /DROPDOWN -->
            </div>
            <!-- /USER QUICKVIEW -->

            <!-- ACCOUNT INFORMATION -->
            <div class="account-information">
                <a href="{{url('Favourites')}}">
                        <div class="account-wishlist-quickview">
                            <span class="icon-heart"></span>
                        </div>
                    </a>
                    <div class="account-cart-quickview">
                            <span class="icon-present">
                                <!-- SVG ARROW -->
                                <svg class="svg-arrow">
                                    <use xlink:href="#svg-arrow"></use>
                                </svg>
                                <!-- /SVG ARROW -->
                            </span>

                        <!-- PIN -->
                        <span class="pin soft-edged secondary">7</span>
                        <!-- /PIN -->

                    <!-- DROPDOWN CART -->
                    <ul class="dropdown cart closed">
                        <!-- DROPDOWN ITEM -->
                        <li class="dropdown-item">
                            <a href="item-v1.html" class="link-to"></a>
                            <!-- SVG PLUS -->
                            <svg class="svg-plus">
                                <use xlink:href="#svg-plus"></use>
                            </svg>
                            <!-- /SVG PLUS -->
                            <div class="dropdown-triangle"></div>
                            <figure class="product-preview-image tiny">
                                <img src="{{ url('website/images/items') }}/pixel_s.jpg" alt="">
                            </figure>
                            <p class="text-header tiny">قالب شوبيفاي عربي</p>
                            <p class="category tiny primary">شوبيفاي</p>
                            <p class="price tiny"><span>$</span>86</p>
                        </li>
                        <!-- /DROPDOWN ITEM -->

                        <!-- DROPDOWN ITEM -->
                        <li class="dropdown-item">
                            <a href="item-v1.html" class="link-to"></a>
                            <!-- SVG PLUS -->
                            <svg class="svg-plus">
                                <use xlink:href="#svg-plus"></use>
                            </svg>
                            <!-- /SVG PLUS -->
                            <figure class="product-preview-image tiny">
                                <img src="{{ url('website/images/items') }}/monsters_s.jpg" alt="">
                            </figure>
                            <p class="text-header tiny">باقة أزرار فوتوشوب من 40 عنصر</p>
                            <p class="category tiny primary">الجرافيك</p>
                            <p class="price tiny"><span>$</span>10</p>
                        </li>
                        <!-- /DROPDOWN ITEM -->

                        <!-- DROPDOWN ITEM -->
                        <li class="dropdown-item">
                            <a href="item-v1.html" class="link-to"></a>
                            <!-- SVG PLUS -->
                            <svg class="svg-plus">
                                <use xlink:href="#svg-plus"></use>
                            </svg>
                            <!-- /SVG PLUS -->
                            <figure class="product-preview-image tiny">
                                <img src="{{ url('website/images/items') }}/flat_s.jpg" alt="">
                            </figure>
                            <p class="text-header tiny">إضافة الشحن لشوبيفاي</p>
                            <p class="category tiny primary">شوبيفاي</p>
                            <p class="price tiny"><span>$</span>12</p>
                        </li>
                        <!-- /DROPDOWN ITEM -->

                        <!-- DROPDOWN ITEM -->
                        <li class="dropdown-item">
                            <p class="text-header tiny">المجموع</p>
                            <p class="price"><span>$</span>108.00</p>
                            <a href="cart.html" class="button primary half">الذهاب للسلة</a>
                            <a href="checkout.html" class="button secondary half">الذهاب للدفع</a>
                        </li>
                        <!-- /DROPDOWN ITEM -->
                    </ul>
                    <!-- /DROPDOWN CART -->
                </div>
                <div class="account-email-quickview">
						<span class="icon-envelope">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
                            <!-- /SVG ARROW -->
						</span>

                    <!-- PIN -->
                    <span class="pin soft-edged secondary">!</span>
                    <!-- /PIN -->

                    <!-- DROPDOWN NOTIFICATIONS -->
                    <ul class="dropdown notifications closed">
                        <!-- DROPDOWN ITEM -->
                        <li class="dropdown-item">
                            <div class="dropdown-triangle"></div>
                            <a href="dashboard-openmessage.html" class="link-to"></a>
                            <figure class="user-avatar">
                                <img src="{{ url('website/images/avatars') }}/avatar_06.jpg" alt="">
                            </figure>
                            <p class="text-header tiny"><span>حسين أحمد</span></p>
                            <p class="subject">سؤال عن منتج</p>
                            <p class="timestamp">18 ماي 2018</p>
                            <span class="notification-type secondary-new icon-envelope"></span>
                        </li>
                        <!-- /DROPDOWN ITEM -->

                        <!-- DROPDOWN ITEM -->
                        <li class="dropdown-item">
                            <a href="dashboard-openmessage.html" class="link-to"></a>
                            <figure class="user-avatar">
                                <img src="{{ url('website/images/avatars') }}/avatar_04.jpg" alt="">
                            </figure>
                            <p class="text-header tiny"><span>قالب ووردبريس</span></p>
                            <p class="subject">طلب دعم فني</p>
                            <p class="timestamp">5 ماي 2018</p>
                            <span class="notification-type icon-envelope-open"></span>
                        </li>
                        <!-- /DROPDOWN ITEM -->

                        <!-- DROPDOWN ITEM -->
                        <li class="dropdown-item">
                            <a href="dashboard-openmessage.html" class="link-to"></a>
                            <figure class="user-avatar">
                                <img src="{{ url('website/images/avatars') }}/avatar_07.jpg" alt="">
                            </figure>
                            <p class="text-header tiny"><span>إضافة جوملا</span></p>
                            <p class="subject">سؤال عن المنتج</p>
                            <p class="timestamp">2 فبراير 2018</p>
                            <span class="notification-type secondary-new icon-envelope"></span>
                        </li>
                        <!-- /DROPDOWN ITEM -->

                        <!-- DROPDOWN ITEM -->
                        <li class="dropdown-item">
                            <a href="dashboard-openmessage.html" class="link-to"></a>
                            <figure class="user-avatar">
                                <img src="{{ url('website/images/avatars') }}/avatar_08.jpg" alt="">
                            </figure>
                            <p class="text-header tiny"><span>أمين بدة</span></p>
                            <p class="subject">كيف أقوم بتنصيب القالب...</p>
                            <p class="timestamp">14 يناير 2018</p>
                            <span class="notification-type icon-action-undo"></span>
                            <a href="dashboard-inbox.html" class="button secondary">عرض جميع الرسائل</a>
                        </li>
                        <!-- /DROPDOWN ITEM -->
                    </ul>
                    <!-- /DROPDOWN NOTIFICATIONS -->
                </div>
                <div class="account-settings-quickview">
						<span class="icon-settings">
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
                            <!-- /SVG ARROW -->
						</span>

                    <!-- PIN -->
                    <span class="pin soft-edged primary">49</span>
                    <!-- /PIN -->

                    <!-- DROPDOWN NOTIFICATIONS -->
                    <ul class="dropdown notifications no-hover closed">
                        <!-- DROPDOWN ITEM -->
                        <li class="dropdown-item">
                            <div class="dropdown-triangle"></div>
                            <a href="author-profile.html">
                                <figure class="user-avatar">
                                    <img src="{{ url('website/images/avatars') }}/avatar_02.jpg" alt="">
                                </figure>
                            </a>
                            <p class="title">
                                <a href="author-profile.html"><span>أحمد حسين</span></a> أضاف
                                <a href="item-v1.html"><span>قالب مطاعم لوردبريس</span></a> للمفضلة
                            </p>
                            <p class="timestamp">قبل ساعتين</p>
                            <span class="notification-type primary-new icon-heart"></span>
                        </li>
                        <!-- /DROPDOWN ITEM -->

                        <!-- DROPDOWN ITEM -->
                        <li class="dropdown-item">
                            <a href="author-profile.html">
                                <figure class="user-avatar">
                                    <img src="{{ url('website/images/avatars') }}/avatar_03.jpg" alt="">
                                </figure>
                            </a>
                            <p class="title">
                                <a href="author-profile.html"><span>أمين بدة</span></a> كتب لك
                                <a href="author-reputation.html"><span>تقييم عن منتج</span></a>
                            </p>
                            <p class="timestamp">قبل 17 ساعة</p>
                            <span class="notification-type icon-star"></span>
                        </li>
                        <!-- /DROPDOWN ITEM -->

                        <!-- DROPDOWN ITEM -->
                        <li class="dropdown-item">
                            <a href="author-profile.html">
                                <figure class="user-avatar">
                                    <img src="{{ url('website/images/avatars') }}/avatar_04.jpg" alt="">
                                </figure>
                            </a>
                            <p class="title">
                                <a href="author-profile.html"><span>شركة أمد</span></a> قام بالتعليق على
                                <a href="item-v1.html"><span>إضافة ووردبريس للرحلات</span></a>
                            </p>
                            <p class="timestamp">قبل 5 أيام</p>
                            <span class="notification-type primary-new icon-bubble"></span>
                        </li>
                        <!-- /DROPDOWN ITEM -->

                        <!-- DROPDOWN ITEM -->
                        <li class="dropdown-item">
                            <a href="author-profile.html">
                                <figure class="user-avatar">
                                    <img src="{{ url('website/images/avatars') }}/avatar_05.jpg" alt="">
                                </figure>
                            </a>
                            <p class="title">
                                <a href="author-profile.html"><span>سعيد العربي</span></a> قام بشراء
                                <a href="item-v1.html"><span>40 زر إحترافي على فوتوشوب</span></a>
                            </p>
                            <p class="timestamp">قبل أسبوع</p>
                            <span class="notification-type icon-tag"></span>
                            <a href="dashboard-notifications.html" class="button primary">عرض جميع الإشعارات</a>
                        </li>
                        <!-- /DROPDOWN ITEM -->
                    </ul>
                    <!-- /DROPDOWN NOTIFICATIONS -->
                </div>
            </div>
            <!-- /ACCOUNT INFORMATION -->
            @endif

            <!-- ACCOUNT ACTIONS -->
            <div class="account-actions">
                @if(auth()->guard()->check())
                <a href="#" class="button secondary">تسجيل الخروج</a>
                @else
                <a href="{{'join'}}" class="button primary">إشترك </a>
                <a href="#login-form" class="button secondary open-login-popup">تسجيل الدخول</a>
                @endif
            </div>
            <!-- /ACCOUNT ACTIONS -->
        </div>
        <!-- /USER BOARD -->
    </header>
</div>
<!-- /HEADER -->

<!-- SIDE MENU -->
<div id="mobile-menu" class="side-menu left closed">
    <!-- SVG PLUS -->
    <svg class="svg-plus">
        <use xlink:href="#svg-plus"></use>
    </svg>
    <!-- /SVG PLUS -->

    <!-- SIDE MENU HEADER -->
    <div class="side-menu-header">
        <figure class="logo small">
            <img src="{{ url('website/images/logo.png') }}" alt="logo">
        </figure>
    </div>
    <!-- /SIDE MENU HEADER -->

    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">الروابط الرئيسية</p>
    <!-- /SIDE MENU TITLE -->

    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect interactive">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
        <a href="{{url('/')}}">الرئيسية</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{'HowToShop'}}">كيف تتسوق ؟</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{url('Products')}}">المنتجات</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{url('Services')}}">الخدمات</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="shop-gridview-v1.html">المنتجات الرقمية</a>
        </li>
        <!-- /DROPDOWN ITEM -->
        <li class="dropdown-item">
        <a href="{{url('forum')}}">المجتمع</a>
        </li>
        <!-- DROPDOWN ITEM -->
    </ul>

    <!-- /DROPDOWN -->
</div>
<!-- /SIDE MENU -->

<!-- SIDE MENU -->
<div id="account-options-menu" class="side-menu right closed">
    <!-- SVG PLUS -->
    <svg class="svg-plus">
        <use xlink:href="#svg-plus"></use>
    </svg>
    <!-- /SVG PLUS -->

    <!-- SIDE MENU HEADER -->
    <div class="side-menu-header">
        <!-- USER QUICKVIEW -->
        <div class="user-quickview">
            <!-- USER AVATAR -->
            <a href="author-profile.html">
                <div class="outer-ring">
                    <div class="inner-ring"></div>
                    <figure class="user-avatar">
                        <img src="{{ url('website/images/avatars') }}/avatar_01.jpg" alt="avatar">
                    </figure>
                </div>
            </a>
            <!-- /USER AVATAR -->

            <!-- USER INFORMATION -->
            <p class="user-name">أمين بدة</p>
            <p class="user-money">$240.00</p>
            <!-- /USER INFORMATION -->
        </div>
        <!-- /USER QUICKVIEW -->
    </div>
    <!-- /SIDE MENU HEADER -->

    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">حسابك</p>
    <!-- /SIDE MENU TITLE -->

    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="dashboard-notifications.html">الإشعارات</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="dashboard-inbox.html">الرسائل</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="cart.html">سلة المشتريات</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{url('Favourites')}}">المفضلة</a>
        </li>
        <!-- /DROPDOWN ITEM -->
    </ul>
    <!-- /DROPDOWN -->

    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">لوحة التحكم</p>
    <!-- /SIDE MENU TITLE -->

    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="author-profile.html">الملف الشخصي</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="dashboard-settings.html">إعدادات الحساب</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="dashboard-purchases.html">مشترياتك</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="dashboard-statement.html">كشف الحساب</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="dashboard-buycredits.html">شراء الرصيد</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="dashboard-withdrawals.html">السحب</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="dashboard-uploaditem.html">رفع منتج</a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="dashboard-manageitems.html">إدارة المنتجات</a>
        </li>
        <!-- /DROPDOWN ITEM -->
    </ul>
    <!-- /DROPDOWN -->

    <a href="#" class="button medium secondary">تسجيل الخروج</a>
    <a href="#" class="button medium primary">إشترك كبائع</a>
</div>
<!-- /SIDE MENU -->

<!-- MAIN MENU -->
<div class="main-menu-wrap">
    <div class="menu-bar">
        <nav>
            <ul class="main-menu">
                <!-- MENU ITEM -->
                <li class="menu-item">
                    <a href="{{url('/')}}">الرئيسية</a>
                </li>
                <!-- /MENU ITEM -->

                <!-- MENU ITEM -->
                <li class="menu-item">
                <a href="{{url('HowToShop')}}">كيف تتسوق؟</a>
                </li>
                <!-- /MENU ITEM -->

                <!-- MENU ITEM -->
                <li class="menu-item">
                    <a href="{{url('Products')}}">المنتجات</a>
                </li>
                <!-- /MENU ITEM -->

                <!-- MENU ITEM -->
                <li class="menu-item">
                    <a href="{{url('Services')}}">الخدمات</a>
                </li>
                <!-- /MENU ITEM -->

                <!-- MENU ITEM -->
                <li class="menu-item">
                    <a href="{{url('Shop')}}">المنتجات الرقمية</a>
                </li>
                <!-- /MENU ITEM -->

                <li class="menu-item">
                    <a href="{{url('/forum')}}">المجتمع</a>
                </li>
                <!-- /MENU ITEM -->
                <!-- MENU ITEM -->
					<li class="menu-item sub">
						<a href="#" style="padding-left: 30px;">
							سيارات
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</a>
						<div class="content-dropdown" style="text-align: right;">

							<!-- FEATURE LIST BLOCK -->
							<div class="feature-list-block">
								<h6 class="feature-list-title">سيارات المانية</h6>
								<hr class="line-separator line-clear">
								<!-- FEATURE LIST -->
								<ul class="feature-list spaced">


									<!-- FEATURE LIST ITEM -->
									<li class="dropdown-item feature-list-item" style="position:relative;"> 
                                        <a id="g" href="#">BMV</a>
                                        <!-- DROPDOWN -->
                                        <ul class="dropdown dropdown-cus closed">
                                            <li class="dropdown-item">
                                                <a href="#">خدمات</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">متجر</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">مجتمع</a>
                                            </li>
                                        </ul>
                                        <!-- DROPDOWN -->
                                          
									</li>
									<!-- /FEATURE LIST ITEM -->
                                    
									<!-- FEATURE LIST ITEM -->
									<li class="dropdown-item feature-list-item" style="position:relative;"> 
                                        <a id="g" href="#">Games</a>
                                        <!-- DROPDOWN -->
                                        <ul class="dropdown dropdown-cus closed">
                                            <li class="dropdown-item">
                                                <a href="#">خدمات</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">متجر</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">مجتمع</a>
                                            </li>
                                        </ul>
                                        <!-- DROPDOWN -->
                                          
									</li>
									<!-- /FEATURE LIST ITEM -->
                                    
                                    <!-- FEATURE LIST ITEM -->
									<li class="dropdown-item feature-list-item" style="position:relative;"> 
                                        <a id="g" href="#">Games</a>
                                        <!-- DROPDOWN -->
                                        <ul class="dropdown dropdown-cus closed">
                                            <li class="dropdown-item">
                                                <a href="#">خدمات</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">متجر</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">مجتمع</a>
                                            </li>
                                        </ul>
                                        <!-- DROPDOWN -->
                                          
									</li>
									<!-- /FEATURE LIST ITEM -->

								
								</ul>
								<!-- /FEATURE LIST -->
								
								<div class="clearfix"></div>

								<h6 class="feature-list-title">Entertainment</h6>
								<hr class="line-separator line-clear">
								<!-- FEATURE LIST -->
								<ul class="feature-list">
									<!-- FEATURE LIST ITEM -->
									<li class="dropdown-item feature-list-item" style="position:relative;"> 
                                        <a id="g" href="#">Games</a>
                                        <!-- DROPDOWN -->
                                        <ul class="dropdown dropdown-cus closed">
                                            <li class="dropdown-item">
                                                <a href="#">خدمات</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">متجر</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">مجتمع</a>
                                            </li>
                                        </ul>
                                        <!-- DROPDOWN -->
                                          
									</li>
									<!-- /FEATURE LIST ITEM -->

									<!-- FEATURE LIST ITEM -->
									<li class="dropdown-item feature-list-item" style="position:relative;"> 
                                        <a id="g" href="#">Games</a>
                                        <!-- DROPDOWN -->
                                        <ul class="dropdown dropdown-cus closed">
                                            <li class="dropdown-item">
                                                <a href="#">خدمات</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">متجر</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">مجتمع</a>
                                            </li>
                                        </ul>
                                        <!-- DROPDOWN -->
                                          
									</li>
									<!-- /FEATURE LIST ITEM -->

									<!-- FEATURE LIST ITEM -->
									<li class="dropdown-item feature-list-item" style="position:relative;"> 
                                        <a id="g" href="#">Games</a>
                                        <!-- DROPDOWN -->
                                        <ul class="dropdown dropdown-cus closed">
                                            <li class="dropdown-item">
                                                <a href="#">خدمات</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">متجر</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">مجتمع</a>
                                            </li>
                                        </ul>
                                        <!-- DROPDOWN -->
                                          
									</li>
									<!-- /FEATURE LIST ITEM -->
								</ul>
								<!-- /FEATURE LIST -->
							</div>
							<!-- /FEATURE LIST BLOCK -->

							<!-- FEATURE LIST BLOCK -->
							<div class="feature-list-block">
								<h6 class="feature-list-title">سيارات المانية</h6>
								<hr class="line-separator line-clear">
								<!-- FEATURE LIST -->
								<ul class="feature-list spaced">


									<!-- FEATURE LIST ITEM -->
									<li class="dropdown-item feature-list-item" style="position:relative;"> 
                                        <a id="g" href="#">BMV</a>
                                        <!-- DROPDOWN -->
                                        <ul class="dropdown dropdown-cus closed">
                                            <li class="dropdown-item">
                                                <a href="#">خدمات</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">متجر</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">مجتمع</a>
                                            </li>
                                        </ul>
                                        <!-- DROPDOWN -->
                                          
									</li>
									<!-- /FEATURE LIST ITEM -->
                                    
									<!-- FEATURE LIST ITEM -->
									<li class="dropdown-item feature-list-item" style="position:relative;"> 
                                        <a id="g" href="#">Games</a>
                                        <!-- DROPDOWN -->
                                        <ul class="dropdown dropdown-cus closed">
                                            <li class="dropdown-item">
                                                <a href="#">خدمات</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">متجر</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">مجتمع</a>
                                            </li>
                                        </ul>
                                        <!-- DROPDOWN -->
                                          
									</li>
									<!-- /FEATURE LIST ITEM -->
                                    
                                    <!-- FEATURE LIST ITEM -->
									<li class="dropdown-item feature-list-item" style="position:relative;"> 
                                        <a id="g" href="#">Games</a>
                                        <!-- DROPDOWN -->
                                        <ul class="dropdown dropdown-cus closed">
                                            <li class="dropdown-item">
                                                <a href="#">خدمات</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">متجر</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">مجتمع</a>
                                            </li>
                                        </ul>
                                        <!-- DROPDOWN -->
                                          
									</li>
									<!-- /FEATURE LIST ITEM -->

								
								</ul>
								<!-- /FEATURE LIST -->
								
								<div class="clearfix"></div>

								<h6 class="feature-list-title">Entertainment</h6>
								<hr class="line-separator line-clear">
								<!-- FEATURE LIST -->
								<ul class="feature-list">
									<!-- FEATURE LIST ITEM -->
									<li class="dropdown-item feature-list-item" style="position:relative;"> 
                                        <a id="g" href="#">Games</a>
                                        <!-- DROPDOWN -->
                                        <ul class="dropdown dropdown-cus closed">
                                            <li class="dropdown-item">
                                                <a href="#">خدمات</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">متجر</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">مجتمع</a>
                                            </li>
                                        </ul>
                                        <!-- DROPDOWN -->
                                          
									</li>
									<!-- /FEATURE LIST ITEM -->

									<!-- FEATURE LIST ITEM -->
									<li class="dropdown-item feature-list-item" style="position:relative;"> 
                                        <a id="g" href="#">Games</a>
                                        <!-- DROPDOWN -->
                                        <ul class="dropdown dropdown-cus closed">
                                            <li class="dropdown-item">
                                                <a href="#">خدمات</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">متجر</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">مجتمع</a>
                                            </li>
                                        </ul>
                                        <!-- DROPDOWN -->
                                          
									</li>
									<!-- /FEATURE LIST ITEM -->

									<!-- FEATURE LIST ITEM -->
									<li class="dropdown-item feature-list-item" style="position:relative;"> 
                                        <a id="g" href="#">Games</a>
                                        <!-- DROPDOWN -->
                                        <ul class="dropdown dropdown-cus closed">
                                            <li class="dropdown-item">
                                                <a href="#">خدمات</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">متجر</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">مجتمع</a>
                                            </li>
                                        </ul>
                                        <!-- DROPDOWN -->
                                          
									</li>
									<!-- /FEATURE LIST ITEM -->
								</ul>
								<!-- /FEATURE LIST -->
							</div>
							<!-- /FEATURE LIST BLOCK -->

							<!-- FEATURE LIST BLOCK -->
							<div class="feature-list-block">
								<h6 class="feature-list-title">سيارات المانية</h6>
								<hr class="line-separator line-clear">
								<!-- FEATURE LIST -->
								<ul class="feature-list spaced">


									<!-- FEATURE LIST ITEM -->
									<li class="dropdown-item feature-list-item" style="position:relative;"> 
                                        <a id="g" href="#">BMV</a>
                                        <!-- DROPDOWN -->
                                        <ul class="dropdown dropdown-cus closed">
                                            <li class="dropdown-item">
                                                <a href="#">خدمات</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">متجر</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">مجتمع</a>
                                            </li>
                                        </ul>
                                        <!-- DROPDOWN -->
                                          
									</li>
									<!-- /FEATURE LIST ITEM -->
                                    
									<!-- FEATURE LIST ITEM -->
									<li class="dropdown-item feature-list-item" style="position:relative;"> 
                                        <a id="g" href="#">Games</a>
                                        <!-- DROPDOWN -->
                                        <ul class="dropdown dropdown-cus closed">
                                            <li class="dropdown-item">
                                                <a href="#">خدمات</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">متجر</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">مجتمع</a>
                                            </li>
                                        </ul>
                                        <!-- DROPDOWN -->
                                          
									</li>
									<!-- /FEATURE LIST ITEM -->
                                    
                                    <!-- FEATURE LIST ITEM -->
									<li class="dropdown-item feature-list-item" style="position:relative;"> 
                                        <a id="g" href="#">Games</a>
                                        <!-- DROPDOWN -->
                                        <ul class="dropdown dropdown-cus closed">
                                            <li class="dropdown-item">
                                                <a href="#">خدمات</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">متجر</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">مجتمع</a>
                                            </li>
                                        </ul>
                                        <!-- DROPDOWN -->
                                          
									</li>
									<!-- /FEATURE LIST ITEM -->

								
								</ul>
								<!-- /FEATURE LIST -->
								
								<div class="clearfix"></div>

								<h6 class="feature-list-title">Entertainment</h6>
								<hr class="line-separator line-clear">
								<!-- FEATURE LIST -->
								<ul class="feature-list">
									<!-- FEATURE LIST ITEM -->
									<li class="dropdown-item feature-list-item" style="position:relative;"> 
                                        <a id="g" href="#">Games</a>
                                        <!-- DROPDOWN -->
                                        <ul class="dropdown dropdown-cus closed">
                                            <li class="dropdown-item">
                                                <a href="#">خدمات</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">متجر</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">مجتمع</a>
                                            </li>
                                        </ul>
                                        <!-- DROPDOWN -->
                                          
									</li>
									<!-- /FEATURE LIST ITEM -->

									<!-- FEATURE LIST ITEM -->
									<li class="dropdown-item feature-list-item" style="position:relative;"> 
                                        <a id="g" href="#">Games</a>
                                        <!-- DROPDOWN -->
                                        <ul class="dropdown dropdown-cus closed">
                                            <li class="dropdown-item">
                                                <a href="#">خدمات</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">متجر</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">مجتمع</a>
                                            </li>
                                        </ul>
                                        <!-- DROPDOWN -->
                                          
									</li>
									<!-- /FEATURE LIST ITEM -->

									<!-- FEATURE LIST ITEM -->
									<li class="dropdown-item feature-list-item" style="position:relative;"> 
                                        <a id="g" href="#">Games</a>
                                        <!-- DROPDOWN -->
                                        <ul class="dropdown dropdown-cus closed">
                                            <li class="dropdown-item">
                                                <a href="#">خدمات</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">متجر</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#">مجتمع</a>
                                            </li>
                                        </ul>
                                        <!-- DROPDOWN -->
                                          
									</li>
									<!-- /FEATURE LIST ITEM -->
								</ul>
								<!-- /FEATURE LIST -->
							</div>
							<!-- /FEATURE LIST BLOCK -->
    

						</div>
					</li>
					<!-- /MENU ITEM -->
                           
            </ul>
        </nav>
        <form class="search-form" style="left: -54px;">
            <input type="text" class="rounded" name="search" id="search_منتج" placeholder="إبحث عن منتجات أو خدمات....">
            <input type="image" src="{{ url('website/images/search-icon.png') }}" alt="search-icon">
        </form>
    </div>
</div>
<!-- /MAIN MENU -->


<div class="shadow-film closed"></div>

<!-- SVG ARROW -->
<svg style="display: none;">
    <symbol id="svg-arrow" viewBox="0 0 3.923 6.64014" preserveAspectRatio="xMinYMin meet">
        <path d="M3.711,2.92L0.994,0.202c-0.215-0.213-0.562-0.213-0.776,0c-0.215,0.215-0.215,0.562,0,0.777l2.329,2.329
			L0.217,5.638c-0.215,0.215-0.214,0.562,0,0.776c0.214,0.214,0.562,0.215,0.776,0l2.717-2.718C3.925,3.482,3.925,3.135,3.711,2.92z"/>
    </symbol>
</svg>
<!-- /SVG ARROW -->

<!-- SVG STAR -->
<svg style="display: none;">
    <symbol id="svg-star" viewBox="0 0 10 10" preserveAspectRatio="xMinYMin meet">
        <polygon points="4.994,0.249 6.538,3.376 9.99,3.878 7.492,6.313 8.082,9.751 4.994,8.129 1.907,9.751
	2.495,6.313 -0.002,3.878 3.45,3.376 "/>
    </symbol>
</svg>
<!-- /SVG STAR -->

<!-- SVG PLUS -->
<svg style="display: none;">
    <symbol id="svg-plus" viewBox="0 0 13 13" preserveAspectRatio="xMinYMin meet">
        <rect x="5" width="3" height="13"/>
        <rect y="5" width="13" height="3"/>
    </symbol>
</svg>
<!-- /SVG PLUS -->

<!-- jQuery -->
<script src="{{ url('website/js/vendor/jquery-3.1.0.min.js') }}"></script>
<!-- Tooltipster -->
<script src="{{ url('website/js/vendor/jquery.tooltipster.min.js') }}"></script>
<!-- Owl Carousel -->
<script src="{{ url('website/js/vendor/owl.carousel.min.js') }}"></script>
<!-- Tweet -->
<script src="{{ url('website/js/vendor/twitter/jquery.tweet.min.js') }}"></script>
<!-- xmAlerts -->
<script src="{{ url('website/js/vendor/jquery.xmalert.min.js') }}"></script>
<script src="{{ url('website/js/vendor/jquery.magnific-popup.min.js') }}"></script>
<!-- Side Menu -->
<script src="{{ url('website/js/side-menu.js') }}"></script>
<!-- Tooltip -->
<script src="{{ url('website/js/tooltip.js') }}"></script>
<!-- User Quickview Dropdown -->
<script src="{{ url('website/js/user-board.js') }}"></script>
<!-- home Alerts -->
<script src="{{ url('website/js/home-alerts.js') }}"></script>
<!-- Footer -->
<script src="{{ url('website/js/footer.js') }}"></script>

<script>
    $('.open-login-popup').magnificPopup({
        type: 'inline',
        closeMarkup: '<div class="close-btn mfp-close"><svg class="svg-plus"><use xlink:href="#svg-plus"></use></svg></div>',
    });

    $('.open-register-popup').magnificPopup({
        type: 'inline',
        closeMarkup: '<div class="close-btn mfp-close"><svg class="svg-plus"><use xlink:href="#svg-plus"></use></svg></div>',
    });
    $('.open-login-popup').click(function () {
        var login = $('#login-form');
        //add class hiddin
        login.addClass('heddin-form');
        if(login.hasClass('heddin-form')) {
            login.removeClass('heddin-form');
        }

    });
    $('.open-register-popup').click(function () {

        var register = $('#register-form');

        //add class hiddin
        register.addClass('heddin-form');
        if(register.hasClass('heddin-form')) {
            register.removeClass('heddin-form');
        }
    });


        $(".dropdown-item #g").hover(function () {
            if($(this).parent().find(".dropdown-cus").hasClass("closed")) {
                    $(this).parent().find(".dropdown-cus").removeClass('closed');
            }
            else {
                 $(this).parent().find(".dropdown-cus").addClass('closed');
            }
               
        });

        $(".dropdown-item .dropdown-cus").hover(function () {
                if($(this).parent().find(".dropdown-cus").hasClass("closed")) {
                        $(this).parent().find(".dropdown-cus").removeClass('closed');
                }
                else {
                    $(this).parent().find(".dropdown-cus").addClass('closed');
                }
        });

  
        

       
 
</script>
@stack('scripts')

</body>
</html>
