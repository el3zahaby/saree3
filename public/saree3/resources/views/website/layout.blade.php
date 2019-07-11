
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
    <script src="{{url('website/')}}/js/jquery.nicescroll.min.js"></script>

    <link rel="stylesheet" href="{{ url('website/css/style.css') }}">
    @stack('links')
    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{asset('images/favicon.png')}}" />
    <title>{{isset($title) ? $title : 'test' }}</title>

    <style>
        .errors {
            color: #ff504e;
            font-size: 10px;
            font-family: Cairo,sans-serif;
        }

        .icon-bell {
            font-size: 22px;
        }
        .dropdown-cus {
            width: 130px;
            position: absolute;
            left: 179px;
            top: -6px;
            border: 1px solid #9c9b9b;
        }

        .dropdown-cus .dropdown-item {
            border-bottom: 1px solid #9c9b9b;
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
        .main-menu .menu-item>.content-dropdown {
            
            right: 0px;
            min-width: 275px;
        }
        .menu-item {
            position : relative;
        }

         .error {
            display: block;
            margin-bottom: 15px;
            text-align: right;
            color: #ad0000;
            font-size: 13px;
         }
        .no-sub-section {
            font-size: 12px;
            color: #3a3a3a;
            font-family: Cairo;
            font-weight: 300;
            display: inline-block;
        }
        .loader {
            position : fixed;
            left: 0;
            top:0;
            width: 100%;
            height: 100%;
            background-color: #2b373a;
            z-index: 999999;
        }
        .img-loader {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
        }
        .desactive {
            opacity: 0;
            visibility: 0;
        }
        .img-handshak {
            height:31px;

        }
        .pd-lf-17 {
            padding-left: 17px !important;
        }
        .promo-banner {
           width: 50%;
           min-height: 420px;
           padding-left: 40px;
           padding-right: 40px;
           padding-top: 180px;
        }
        .promo-banner .icon-tag {
            color: #fff;
            top: 93px;
        }
        .promo-banner .icon-wallet {
            color: #d6a32e;
            top: 93px;
        }

    </style>

</head>
<body>

    <!-- Loader  -->
    <div class="loader active">
        <img class="img-loader" src="{{asset('website/images/loader.gif')}}" alt="">
    </div>

    	<!-- FORM POPUP -->
	<div id="promo-popup" class="form-popup promo mfp-hide">
		<!-- CLOSE BTN -->
		<div class="close-btn">
			<!-- SVG PLUS -->
			<svg class="svg-plus">
				<use xlink:href="#svg-plus"></use>
			</svg>
			<!-- /SVG PLUS -->
		</div>
		<!-- /CLOSE BTN -->

        <!-- PROMO -->
        <div class="promo-banner dark left">
            <span class="icon-wallet"></span>
            <h5>إبدأ بتقديم خدماتك</h5>
            <h1>سجل <span>كبائع</span></h1>
            <a href="{{route('user.reg',['type' => 'buyer'])}}" class="button medium primary">! سجل الان</a>
        </div>
        <!-- /PROMO -->

        <!-- PROMO -->
        <div class="promo-banner secondary right">
            <span class="icon-tag"></span>
            <h5>قم بإيجاد أي شيئ تريد</h5>
            <h1 style="font-size: 2.8em;">سجل كمشتري</h1>
            <a href="{{route('user.reg',['type' => 'seller'])}}" class="button medium dark">! سجل الان</a>
        </div>
        <!-- /PROMO -->
	</div>
	<!-- /FORM POPUP -->

    <!-- HEADER -->
    <div class="header-wrap">
        <header>
            <!-- LOGO -->
            <a href="{{url('/')}}">
                <figure class="logo" >
                    @if(!empty($logo))
                        <img src="{{ asset('images/'. $logo) }}" style="max-height: 100%;" alt="logo-small">
                      @else
                        <img src="{{ asset('images/logo.png') }}" style="max-height: 100%;" alt="logo-small">
                    @endif
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
                    <a href="{{url('authorProfile')}}">
                        <div class="outer-ring">
                            <div class="inner-ring"></div>
                            <figure class="user-avatar">
                                <img src="{{ asset('images/avatars/'.user()->image) }}" alt="avatar" style="height: 100%">
                            </figure>
                        </div>
                    </a>
                    <!-- /USER AVATAR -->

                    <!-- USER INFORMATION -->
                    <p class="user-name">{{user()->name}}</p>
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
                            <a href="{{url('authorProfile')}}">الملف الشخصي</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="{{url('seller/settings')}}">إعدادات الحساب</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="{{url('seller/purchases')}}">مشترياتك</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="{{url('seller/statement')}}">كشف المبيعات</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="{{url('seller/buycredits')}}">شراء الرصيد</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="{{url('seller/withdrawals')}}">السحب</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="{{url('seller/uploaditem')}}">رفع منتج</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="{{url('seller/manageitems')}}">إدارة المنتجات</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="{{url('logout')}}">تسجيل الخروج</a>
                        </li>
                    </ul>
                    <!-- /DROPDOWN -->
                </div>
                <!-- /USER QUICKVIEW -->

                <!-- ACCOUNT INFORMATION -->
                <div class="account-information">
                         <div class="account-email-quickview" style="padding-top:2px;">
                            <span class="icon-present">
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
                                <span class="notification-type secondary-new icon-present"></span>
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

                         <div class="account-email-quickview pd-lf-17">

                             <img class="img-handshak" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgY2xhc3M9IiI+PGcgdHJhbnNmb3JtPSJtYXRyaXgoMC45ODk4MDIgMCAwIDAuOTg5ODAyIDIuNjEwNjggLTUxLjgyODQpIj48Zz4KCTxnPgoJCTxwYXRoIGQ9Ik00MDQuMjY3LDMxNS40MWMtMTAuMDQ4LTIwLjk0OS00NS45OTUtNTAuMDI3LTgwLjcyNS03OC4xMjNjLTE5LjM3MS0xNS42NTktMzcuNjc1LTMwLjQ2NC00OS4zNDQtNDIuMTMzICAgIGMtMi45MjMtMi45NDQtNy4yOTYtMy44ODMtMTEuMTU3LTIuNDk2Yy03LjE4OSwyLjYwMy0xMS42MjcsNC42MDgtMTUuMTI1LDYuMTY1Yy01LjMzMywyLjM4OS03LjEyNSwzLjItMTQuMzE1LDMuOTI1ICAgIGMtMy4xNzksMC4zMi02LjAzNywyLjAyNy03LjgwOCw0LjY3MmMtMTUuMDgzLDIyLjU0OS0zMC42OTksMjAuNjI5LTQxLjEzMSwxNy4xMzFjLTMuMzI4LTEuMTA5LTMuOTI1LTIuNTM5LTQuMjQ1LTMuOTA0ICAgIGMtMi4yNC05LjM2NSw5LjAwMy0zMS4xNjgsMjMuNTczLTQ1LjczOWMzNC42NjctMzQuNjg4LDUyLjU0NC00My4zNzEsOTAuMzA0LTI2LjQ5NmM0Mi44MzcsMTkuMTU3LDg1Ljc2LDM0LjE1NSw4Ni4xODcsMzQuMzA0ICAgIGM1LjYxMSwxLjk0MSwxMS42NDgtMS4wMDMsMTMuNTg5LTYuNTcxYzEuOTItNS41NjgtMS4wMDMtMTEuNjQ4LTYuNTcxLTEzLjU4OWMtMC40MjctMC4xNDktNDIuNDk2LTE0Ljg0OC04NC40OC0zMy42NDMgICAgYy00OC45MTctMjEuODY3LTc1Ljc1NS03LjQ2Ny0xMTQuMDkxLDMwLjg5MWMtMTQuNTkyLDE0LjU5Mi0zNC40MTEsNDQuMTE3LTI5LjI5MSw2NS43NzFjMi4xOTcsOS4yMTYsOC42ODMsMTYuMDQzLDE4LjMyNSwxOS4yMjEgICAgYzI0LjE3MSw3Ljk3OSw0Ni4yMjksMC4zNDEsNjIuNjU2LTIxLjQ2MWM2Ljc4NC0xLjA0NSwxMC40NzUtMi41ODEsMTYuMDIxLTUuMDc3YzIuMDA1LTAuODk2LDQuMzUyLTEuOTQxLDcuNDY3LTMuMiAgICBjMTIuMjAzLDExLjQ1NiwyOC42NzIsMjQuNzg5LDQ2LjAxNiwzOC44MDVjMzEuMzYsMjUuMzY1LDY2LjkyMyw1NC4xMjMsNzQuOTIzLDcwLjc2M2MzLjk0Nyw4LjIxMy0wLjI5OSwxMy41NjgtMy4xNzksMTYuMDIxICAgIGMtNC4yMjQsMy42MjctMTAuMDA1LDQuNzc5LTEzLjE0MSwyLjU4MWMtMy40NTYtMi4zNjgtNy45NTctMi41MTctMTEuNTItMC4zODRjLTMuNTg0LDIuMTMzLTUuNTg5LDYuMTY1LTUuMTQxLDEwLjMwNCAgICBjMC43MjUsNi43ODQtNS40ODMsMTAuNjY3LTguMTcxLDEyLjAxMWMtNi44MjcsMy40NTYtMTMuOTUyLDIuODU5LTE2LjYxOSwwLjM4NGMtMi45ODctMi43NzMtNy4yNzUtMy41ODQtMTEuMDcyLTIuMTc2ICAgIGMtMy43OTcsMS40MjktNi40NDMsNC45MjgtNi44MjcsOC45ODFjLTAuNjQsNi45OTctNS44MjQsMTMuNzE3LTEyLjU4NywxNi4zNDFjLTMuMjY0LDEuMjM3LTgsMS45ODQtMTIuMjQ1LTEuODk5ICAgIGMtMi42NDUtMi4zODktNi4zMTUtMy4zMDctOS43NDktMi40NzVjLTMuNDc3LDAuODUzLTYuMjcyLDMuMzcxLTcuNDg4LDYuNzJjLTAuNDA1LDEuMDY3LTEuMzIzLDMuNjI3LTExLjMwNywzLjYyNyAgICBjLTcuMTA0LDAtMTkuODgzLTQuOC0yNi4xMzMtOC45MzljLTcuNDg4LTQuOTI4LTU0LjQ0My0zOS45NTctOTQuOTk3LTczLjkyYy01LjY5Ni00LjgtMTUuNTUyLTE1LjA4My0yNC4yNTYtMjQuMTcxICAgIGMtNy43MjMtOC4wNjQtMTQuNzg0LTE1LjM4MS0xOC40MTEtMTguNDUzYy00LjU0NC0zLjg0LTExLjI2NC0zLjI2NC0xNS4wNCwxLjI1OWMtMy43OTcsNC41MDEtMy4yNDMsMTEuMjQzLDEuMjU5LDE1LjA0ICAgIGMzLjMwNywyLjc5NSw5LjcwNyw5LjU1NywxNi43NjgsMTYuOTE3YzkuNTE1LDkuOTQxLDE5LjM0OSwyMC4yMjQsMjUuOTYzLDI1Ljc3MWMzOS43MjMsMzMuMjU5LDg3LjQ2Nyw2OS4xNjMsOTYuOTgxLDc1LjQxMyAgICBjNy44NTEsNS4xNjMsMjQuNzY4LDEyLjQxNiwzNy44NjcsMTIuNDE2YzEwLjUxNywwLDE4LjYwMy0yLjQxMSwyNC4yMTMtNy4xMjVjNy41MDksMi45MjMsMTYuMDQzLDIuOTQ0LDI0LjI1Ni0wLjI1NiAgICBjOS43MDctMy43NTUsMTcuNjg1LTExLjMyOCwyMi4yMDgtMjAuNTAxYzguNDA1LDEuNzkyLDE4LjAyNywwLjUzMywyNi43NzMtMy44NjFjOC41NTUtNC4zMDksMTQuNzQxLTEwLjkwMSwxNy44MTMtMTguNjAzICAgIGM4LjQ5MSwwLjQ0OCwxNy4yMzctMi41NiwyNC40NjktOC43NjhDNDA3Ljk3OSwzNDYuNDA3LDQxMS4zNDksMzMwLjEwOSw0MDQuMjY3LDMxNS40MXoiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6IzcxN0Y4MiIgZGF0YS1vbGRfY29sb3I9IiM3MTdmODIiPjwvcGF0aD4KCTwvZz4KPC9nPjxnPgoJPGc+CgkJPHBhdGggZD0iTTIxMy4zMzMsMTM4LjY2M2gtOTZjLTUuODg4LDAtMTAuNjY3LDQuNzc5LTEwLjY2NywxMC42NjdzNC43NzksMTAuNjY3LDEwLjY2NywxMC42NjdoOTYgICAgYzUuODg4LDAsMTAuNjY3LTQuNzc5LDEwLjY2Ny0xMC42NjdTMjE5LjIyMSwxMzguNjYzLDIxMy4zMzMsMTM4LjY2M3oiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6IzcxN0Y4MiIgZGF0YS1vbGRfY29sb3I9IiM3MTdmODIiPjwvcGF0aD4KCTwvZz4KPC9nPjxnPgoJPGc+CgkJPHBhdGggZD0iTTQzNS41MiwyOTIuNzExYy0zLjMwNy00Ljg4NS05LjkyLTYuMjI5LTE0LjgwNS0yLjkwMWwtMzEuMTg5LDIwLjk0OWMtNC44ODUsMy4yODUtNi4xODcsOS45Mi0yLjkwMSwxNC44MDUgICAgYzIuMDY5LDMuMDUxLDUuNDQsNC43MTUsOC44NzUsNC43MTVjMi4wMjcsMCw0LjA5Ni0wLjU3Niw1LjkzMS0xLjgxM2wzMS4xODktMjAuOTQ5ICAgIEM0MzcuNTA0LDMwNC4yMzEsNDM4LjgwNSwyOTcuNTk3LDQzNS41MiwyOTIuNzExeiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojNzE3RjgyIiBkYXRhLW9sZF9jb2xvcj0iIzcxN2Y4MiI+PC9wYXRoPgoJPC9nPgo8L2c+PGc+Cgk8Zz4KCQk8cGF0aCBkPSJNMzY5LjMwMSwzNDMuNjEzYy03LjYzNy02LjAxNi00MS43OTItNDAuOTgxLTYyLjkxMi02Mi45OTdjLTQuMDc1LTQuMjY3LTEwLjgzNy00LjQxNi0xNS4wODMtMC4zMiAgICBjLTQuMjY3LDQuMDc1LTQuMzk1LDEwLjgzNy0wLjMyLDE1LjA4M2M1LjQ4Myw1LjcxNyw1My44NDUsNTYuMTI4LDY1LjA4OCw2NS4wMDNjMS45NDEsMS41MzYsNC4yODgsMi4yODMsNi41OTIsMi4yODMgICAgYzMuMTM2LDAsNi4yNzItMS40MDgsOC40MDUtNC4wNzVDMzc0LjcyLDM1My45ODEsMzczLjkzMSwzNDcuMjYxLDM2OS4zMDEsMzQzLjYxM3oiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6IzcxN0Y4MiIgZGF0YS1vbGRfY29sb3I9IiM3MTdmODIiPjwvcGF0aD4KCTwvZz4KPC9nPjxnPgoJPGc+CgkJPHBhdGggZD0iTTMyNi42NzcsMzY1LjAxYy0xMi43NzktMTAuMjE5LTQ0Ljg4NS00NC4zMzEtNTIuMTM5LTUyLjIyNGMtNC4wMTEtNC4zNTItMTAuNzMxLTQuNjA4LTE1LjA4My0wLjY0ICAgIGMtNC4zMzEsMy45ODktNC42MjksMTAuNzUyLTAuNjQsMTUuMDgzYzAuMzg0LDAuNDA1LDM4LjY5OSw0MS43NzEsNTQuNTI4LDU0LjQ0M2MxLjk2MywxLjU1Nyw0LjMzMSwyLjMyNSw2LjY1NiwyLjMyNSAgICBjMy4xMTUsMCw2LjIyOS0xLjM4Nyw4LjM0MS0zLjk4OUMzMzIuMDExLDM3NS4zOTksMzMxLjI2NCwzNjguNjc5LDMyNi42NzcsMzY1LjAxeiIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojNzE3RjgyIiBkYXRhLW9sZF9jb2xvcj0iIzcxN2Y4MiI+PC9wYXRoPgoJPC9nPgo8L2c+PGc+Cgk8Zz4KCQk8cGF0aCBkPSJNMjg0LjIyNCwzODYuNDkzYy0xNS4yMTEtMTIuODIxLTQ2LjMzNi00NS45NTItNTIuNDE2LTUyLjQ1OWMtNC4wMzItNC4zMDktMTAuNzk1LTQuNTQ0LTE1LjA4My0wLjUxMiAgICBjLTQuMzA5LDQuMDMyLTQuNTIzLDEwLjc3My0wLjUxMiwxNS4wODNjOC43NDcsOS4zNjUsMzguNTI4LDQwLjkzOSw1NC4yNTEsNTQuMjA4YzIuMDA1LDEuNjg1LDQuNDM3LDIuNTE3LDYuODY5LDIuNTE3ICAgIGMzLjAyOSwwLDYuMDU5LTEuMzAxLDguMTcxLTMuNzk3QzI4OS4zMDEsMzk3LjAxLDI4OC43MjUsMzkwLjI5LDI4NC4yMjQsMzg2LjQ5M3oiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6IzcxN0Y4MiIgZGF0YS1vbGRfY29sb3I9IiM3MTdmODIiPjwvcGF0aD4KCTwvZz4KPC9nPjxnPgoJPGc+CgkJPHBhdGggZD0iTTEyNC42NzIsMTIwLjI1M0MxMDYuMzg5LDEwMi45MywzMy4yOCw5Ny4zMTksMTEuMzA3LDk2LjAxOGMtMy4wMjktMC4xNDktNS44MjQsMC44NTMtNy45NTcsMi44OCAgICBDMS4yMTYsMTAwLjkwMywwLDEwMy43MTksMCwxMDYuNjYzdjE5MmMwLDUuODg4LDQuNzc5LDEwLjY2NywxMC42NjcsMTAuNjY3aDY0YzQuNjA4LDAsOC43MDQtMi45NjUsMTAuMTMzLTcuMzYgICAgYzEuNTU3LTQuNzc5LDM4LjMxNS0xMTcuNTg5LDQzLjE1Ny0xNzMuMDU2QzEyOC4yMzUsMTI1LjY3MSwxMjcuMDQsMTIyLjQ3MSwxMjQuNjcyLDEyMC4yNTN6IE02Ni44OCwyODcuOTk3SDIxLjMzM1YxMTguMDk4ICAgIGMzNC4yODMsMi43MDksNzEuMjc1LDguNTk3LDg0LjcxNSwxNS4xMjVDMTAwLjM5NSwxNzkuOTQzLDc0LjgxNiwyNjIuOTUxLDY2Ljg4LDI4Ny45OTd6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiM3MTdGODIiIGRhdGEtb2xkX2NvbG9yPSIjNzE3ZjgyIj48L3BhdGg+Cgk8L2c+CjwvZz48Zz4KCTxnPgoJCTxwYXRoIGQ9Ik01MDEuMzMzLDExNy4zM2MtODMuNzU1LDAtMTMwLjIxOSwyMS40NC0xMzIuMTYsMjIuMzM2Yy0yLjc3MywxLjMwMS00Ljg0MywzLjcxMi01LjY5Niw2LjYzNXMtMC40MjcsNi4wNTksMS4xNzMsOC42NjEgICAgYzEzLjE4NCwyMS4yMjcsNTQuNDY0LDEzOS4xMTUsNjIuNCwxNjcuODcyYzEuMjgsNC42MjksNS40ODMsNy44MjksMTAuMjgzLDcuODI5aDY0YzUuODg4LDAsMTAuNjY3LTQuNzc5LDEwLjY2Ny0xMC42Njd2LTE5MiAgICBDNTEyLDEyMi4wODcsNTA3LjIyMSwxMTcuMzMsNTAxLjMzMywxMTcuMzN6IE00OTAuNjY3LDMwOS4zM2gtNDUuMzU1Yy0xMC4xMTItMzIuOTM5LTM5Ljk3OS0xMTguODI3LTU2LjY0LTE1NC4zMjUgICAgYzE2LjI3Ny01LjUyNSw1MS4yNDMtMTUuMDE5LDEwMS45OTUtMTYuMjEzVjMwOS4zM3oiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6IzcxN0Y4MiIgZGF0YS1vbGRfY29sb3I9IiM3MTdmODIiPjwvcGF0aD4KCTwvZz4KPC9nPjwvZz4gPC9zdmc+" />

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
                                <span class="notification-type secondary-new icon-clock"></span>
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
                                <span class="notification-type icon-close"></span>
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
                                <span class="notification-type secondary-new icon-check"></span>
                            </li>
                            <!-- /DROPDOWN ITEM -->

                            <!-- DROPDOWN ITEM -->
                            <li class="dropdown-item" style="height: 0;padding: 0;border: none;">
                                <a href="dashboard-inbox.html" class="button secondary">عرض جميع المشتريات</a>
                            </li>
                            <!-- /DROPDOWN ITEM -->
                        </ul>
                        <!-- /DROPDOWN NOTIFICATIONS -->
                    </div>
                        <a href="{{url('favourites')}}">
                            <div class="account-wishlist-quickview">
                                <span class="icon-heart"></span>
                            </div>
                        </a>

                        <div class="account-cart-quickview">
                                <span class="icon-basket" style="font-size:21px">
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow" style="top:7px;">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </span>

                            <!-- PIN -->
                            <span class="pin soft-edged secondary">{!! $card::content()->count() !!}</span>
                            <!-- /PIN -->

                            <!-- DROPDOWN CART -->
                            <ul class="dropdown cart closed">

                                @forelse($card::content() as $item)

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
                                            <p class="text-header tiny"> ({!! $item->qty !!}) {!! $item->name !!} </p>
                                            <p class="category tiny primary">{!! check_name_section($item->options->category) !!}</p>
                                            <p class="price tiny"><span>$</span>{!! $item->price !!}</p>

                                        </li>
                                        <!-- /DROPDOWN ITEM -->
                                @empty

                                @endempty


                                <!-- DROPDOWN ITEM -->
                                <li class="dropdown-item">
                                    <p class="text-header tiny">المجموع</p>
                                    <p class="price"><span>$</span>{!! $card::total() !!}</p>
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
                            <span class="icon-bell">
                                <!-- SVG ARROW -->
                                <svg class="svg-arrow" style="top: 7px;">
                                    <use xlink:href="#svg-arrow"></use>
                                </svg>
                                <!-- /SVG ARROW -->
                            </span>

                        <!-- PIN -->
                        <span class="pin soft-edged primary">{{count(auth()->user()->notifications)}}</span>
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
                    @if(!auth()->guard()->check())
                        <a href="#promo-popup" class="button primary promo-popup">إشترك  </a>
                        <a href="#login-form" class="button secondary open-login-popup"> <i class="fa fa-sign-in"></i> تسجيل الدخول </a>

                        <!-- Loader  -->
                        <div class="clear"></div>
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
                            <div  class="form-popup-content" style="overflow: hidden;">
                                <h4 class="popup-title" style="text-align: center;">تسجيل الدخول إلى حسابك</h4>
                                <!-- LINE SEPARATOR -->
                                <hr class="line-separator">
                                <!-- /LINE SEPARATOR -->
                                <form id="main-login-form" action="{{ route('login') }}" method="POST" style="direction: rtl;text-align: right;">
                                @csrf

                                <!-- Input Email -->
                                    <label for="email"  class="rl-label" >البريد الإلكتروني</label>
                                    <input type="email"  name="email" style="margin-bottom: 8px;" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="إدخل بريدك الإلكتروني ..." value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="errors" role="alert">
                                            <strong>{{$errors->first('email') }}
                                                @if ($errors->has('email'))
                                                    <script src="{{ url('website/js/vendor/jquery-3.1.0.min.js') }}"></script>
                                                    <script>
                                                          $(function () {
                                                              $('.open-login-popup').magnificPopup({
                                                                  type: 'inline',
                                                                  closeMarkup: '<div class="close-btn mfp-close"><svg class="svg-plus"><use xlink:href="#svg-plus"></use></svg></div>',
                                                              });


                                                              $('.open-login-popup').on('click',() => {
                                                                  var login = $('#login-form');
                                                                  //add class hiddin
                                                                  login.addClass('heddin-form');
                                                                  if(login.hasClass('heddin-form')) {
                                                                      login.removeClass('heddin-form');
                                                                  }

                                                              });

                                                              $('.open-login-popup').click();
                                                          });
                                                    </script>

                                                @endif
                                            </strong>
                                        </span>
                                    @endif


                                <!-- Input Password -->
                                    <label for="password" class="rl-label">كلمة السر</label>
                                    <input type="password" id="password" name="password" placeholder="أدخل كلمة السر هنا..."  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                                    @if ($errors->has('password'))
                                        <span class="errors" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                <!-- CHECKBOX -->
                                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember" class="label-check">
                                        <span class="checkbox primary primary"><span></span></span>
                                        تدكرني
                                    </label>
                                    <!-- /CHECKBOX -->



                                    <p style="text-align: left;">هل نسيت كلمة المرور ؟ <a href="#" class="primary">!إضغط هنا</a></p>
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
                <a href="{{url('products')}}">المنتجات</a>
            </li>
            <!-- /DROPDOWN ITEM -->

            <!-- DROPDOWN ITEM -->
            <li class="dropdown-item">
                <a href="{{url('services')}}">الخدمات</a>
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
                            <img src="{{ url('website/images/avatars/user.png') }}" alt="avatar">
                        </figure>
                    </div>
                </a>
                <!-- /USER AVATAR -->

                <!-- USER INFORMATION -->
                <p class="user-name">
                    @if (isset(Auth()->guard()->user()->name))
                        {{Auth()->guard()->user()->name}}
                    @endif
                 </p>
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
                <a href="{{url('f
                avourites')}}">المفضلة</a>
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

                    @forelse (get_page_pos(0) as $item => $val)
                    <!-- MENU ITEM -->
                    <li class="menu-item">
                       <a href="{{url("$val->slug")}}">{!! json_decode($val->title)->ar   !!}</a>
                    </li>
                    <!-- /MENU ITEM -->
                    @empty
                    @endempty
                  

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

                    @for ($i = 0; $i < count($parent_sec); $i++)
                        <li class="menu-item sub">
                            <a href="#" style="padding-left: 30px;">
                                {{json_decode($parent_sec[$i]->section_title)->ar}}

                                @if(count(json_decode($second_sections[$i])) != 0)
                                <!-- SVG ARROW -->
                                <svg class="svg-arrow">
                                    <use xlink:href="#svg-arrow"></use>
                                </svg>
                                <!-- /SVG ARROW -->
                                @endif
                            </a>
                            @if(count(json_decode($second_sections[$i])) != 0)
                            <div class="content-dropdown" style="text-align: right;">
                                    <!-- FEATURE LIST BLOCK -->
                                    <div class="feature-list-block">
                                        @foreach (json_decode($second_sections[$i]) as $key => $value)

                                                <h6 class="feature-list-title">{{json_decode($value->section_title)->ar}}</h6>
                                                <hr class="line-separator line-clear">
                                                <!-- FEATURE LIST -->
                                                <ul class="feature-list spaced">
                                                        @forelse(check_sub_section($value->section_id) as $keyitem => $valueitem)
                                                            <!-- FEATURE LIST ITEM -->
                                                                <li class="dropdown-item feature-list-item" style="position:relative;">
                                                                    <a id="g" href="#">{!! json_decode($valueitem->section_title)->ar !!}</a>
                                                                    <!-- DROPDOWN -->
                                                                    <ul class="dropdown dropdown-cus closed">
                                                                        <li class="dropdown-item">
                                                                            <a href="{{url('Service/'.$valueitem->section_url)}}">خدمات</a>
                                                                        </li>
                                                                        <li class="dropdown-item">
                                                                            <a href="{{url('Store/'.$valueitem->section_url)}}">متجر</a>
                                                                        </li>
                                                                        <li class="dropdown-item">
                                                                            <a href="{{url('Forum/'.$valueitem->section_url)}}">مجتمع</a>
                                                                        </li>
                                                                    </ul>
                                                                    <!-- DROPDOWN -->

                                                                </li>
                                                                <!-- /FEATURE LIST ITEM -->
                                                        @empty
                                                            <span class="no-sub-section">لا يوجد صنف </span>
                                                        @endempty







                                                </ul>
                                                <!-- /FEATURE LIST -->

                                                <div class="clearfix"></div>

                                         @endforeach

                                    </div>
                                    <!-- /FEATURE LIST BLOCK -->

                            </div>
                            @else

                            @endif
                        </li>
                        <!-- /MENU ITEM -->
                         @endfor

                </ul>
            </nav>
            <form class="search-form" style="left: -54px;">
                <input type="text" class="rounded" name="search" id="search_منتج" placeholder="إبحث عن منتجات أو خدمات....">
                <input type="image" src="{{ url('website/images/search-icon.png') }}" alt="search-icon">
            </form>
        </div>
    </div>
    <!-- /MAIN MENU -->

@yield('content')

<!-- SUBSCRIBE BANNER -->
<div id="subscribe-banner-wrap">
    <div id="subscribe-banner">
        <!-- SUBSCRIBE CONTENT -->
        <div class="subscribe-content">
            <!-- SUBSCRIBE HEADER -->
            <div class="subscribe-header">
                <figure>
                    <img src="{{ url('website/images/news_icon.png') }}" alt="subscribe-icon">
                </figure>
                <p class="subscribe-title">التسجيل بالقائمة البريدية</p>
                <p>و توصل باخر الأخبار و العروض</p>
            </div>
            <!-- /SUBSCRIBE HEADER -->

            <!-- SUBSCRIBE FORM -->
            <form class="subscribe-form">
                <input type="text" name="subscribe_email" id="subscribe_email" placeholder="ضع بريدك الإلكتروني هنا...">
                <button class="button medium dark">التسجيل!</button>
            </form>
            <!-- /SUBSCRIBE FORM -->
        </div>
        <!-- /SUBSCRIBE CONTENT -->
    </div>
</div>
<!-- /SUBSCRIBE BANNER -->

<!-- FOOTER -->
<footer>
    <!-- FOOTER TOP -->
    <div id="footer-top-wrap">
        <div id="footer-top">
            <!-- COMPANY INFO -->
            <div class="company-info">
                <figure class="logo small">
                    @if(!empty($logo))
                        <img src="{{ asset('images/'. $logo) }}" alt="logo-small">
                     @else
                        <img src="{{ asset('images/nologo.png') }}" alt="logo-small">
                     @endif
                </figure>
                <p>هنا نص عشوائي باللغة العربية يمكنك تجاهل هذا النص لأنه لا يعني أي شيئ مجرد تجربة.</p>
                <ul class="company-info-list">
                    <li class="company-info-item">
                        <span class="icon-present"></span>
                        <p><span>850.296</span> منتج</p>
                    </li>
                    <li class="company-info-item">
                        <span class="icon-energy"></span>
                        <p><span>1.207.300</span> مستخدم</p>
                    </li>
                    <li class="company-info-item">
                        <span class="icon-user"></span>
                        <p><span>74.059</span> بائع</p>
                    </li>
                </ul>
                <!-- SOCIAL LINKS -->
                <ul class="social-links">
                    <li class="social-link fb">
                        <a href="#"></a>
                    </li>
                    <li class="social-link twt">
                        <a href="#"></a>
                    </li>
                    <li class="social-link db">
                        <a href="#"></a>
                    </li>
                    <li class="social-link rss">
                        <a href="#"></a>
                    </li>
                </ul>
                <!-- /SOCIAL LINKS -->
            </div>
            <!-- /COMPANY INFO -->

            <!-- LINK INFO -->
            <div class="link-info">
                <p class="footer-title">مجتمعنا</p>
                <!-- LINK LIST -->
                <ul class="link-list">
                    <li class="link-item">
                        <div class="bullet"></div>
                        <a href="#">كيف تنضم إلينا</a>
                    </li>
                    <li class="link-item">
                        <div class="bullet"></div>
                        <a href="#">البيع و الشراء</a>
                    </li>
                    <li class="link-item">
                        <div class="bullet"></div>
                        <a href="forum.html">منتدى سريع</a>
                    </li>
                    <li class="link-item">
                        <div class="bullet"></div>
                        <a href="blog-v1.html">مدونة سريع</a>
                    </li>
                    <li class="link-item">
                        <div class="bullet"></div>
                        <a href="#">منتجات مجانية</a>
                    </li>
                    <li class="link-item">
                        <div class="bullet"></div>
                        <a href="#">نصائح للمستخدمين</a>
                    </li>
                </ul>
                <!-- /LINK LIST -->
            </div>
            <!-- /LINK INFO -->

            <!-- LINK INFO -->
            <div class="link-info">
                <p class="footer-title">المستخدمين</p>
                <!-- LINK LIST -->
                <ul class="link-list">
                    <li class="link-item">
                        <div class="bullet"></div>
                        <a href="#">برنامج الشراكة</a>
                    </li>
                    <li class="link-item">
                        <div class="bullet"></div>
                        <a href="#">إفتح متجر</a>
                    </li>
                    <li class="link-item">
                        <div class="bullet"></div>
                        <a href="#">شراء الرصيد</a>
                    </li>
                    <li class="link-item">
                        <div class="bullet"></div>
                        <a href="#">withdrawals</a>
                    </li>
                    <li class="link-item">
                        <div class="bullet"></div>
                        <a href="#">اللقاءات </a>
                    </li>
                    <li class="link-item">
                        <div class="bullet"></div>
                        <a href="#">كيف تستعمل سريع</a>
                    </li>
                </ul>
                <!-- /LINK LIST -->
            </div>
            <!-- /LINK INFO -->

            <!-- LINK INFO -->
            <div class="link-info">
                <p class="footer-title">المساعدة</p>
                <!-- LINK LIST -->
                <ul class="link-list">
                    <li class="link-item">
                        <div class="bullet"></div>
                        <a href="#">مركز المساعدة</a>
                    </li>
                    <li class="link-item">
                        <div class="bullet"></div>
                        <a href="#">الأسئلة الشائعة</a>
                    </li>
                    <li class="link-item">
                        <div class="bullet"></div>
                        <a href="#">شروط الإستخدام</a>
                    </li>
                    <li class="link-item">
                        <div class="bullet"></div>
                        <a href="#">سياسة الخصوصية</a>
                    </li>
                    <li class="link-item">
                        <div class="bullet"></div>
                        <a href="#">معلومات الأمان</a>
                    </li>
                </ul>
                <!-- /LINK LIST -->
            </div>
            <!-- /LINK INFO -->

            <!-- تويتر سريع -->
            <div class="twitter-feed">
                <p class="footer-title">تويتر سريع</p>
                <!-- TWEETS -->
                <ul class="tweets"></ul>
                <!-- /TWEETS -->
                @forelse (get_page_pos(1) as $item => $val)
                <!-- MENU ITEM -->
                <li class="menu-item">
                   <a href="{{url("$val->slug")}}">{!! json_decode($val->title)->ar   !!}</a>
                </li>
                <!-- /MENU ITEM -->
                @empty
                @endempty
            </div>
            <!-- /تويتر سريع -->
        </div>
    </div>
    <!-- /FOOTER TOP -->

    <!-- FOOTER BOTTOM -->
    <div id="footer-bottom-wrap">
        <div id="footer-bottom">
            <p><span>&copy;</span><a href="index.html">سريع</a> أمين بدة - جميع الحقوق محفوظة 2018</p>
        </div>
    </div>
    <!-- /FOOTER BOTTOM -->
</footer>
<!-- /FOOTER -->

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
<!-- Magnific Popup -->
<script src="{{'website/'}}/js/vendor/jquery.magnific-popup.min.js"></script>

<!-- Alerts Demo -->
<script src="{{'website/'}}/js/alerts-demo.js"></script>
<!-- Alerts Generator -->
<script src="{{'website/'}}/js/alerts-generator.js"></script>


<script>
    $('.open-login-popup').magnificPopup({
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

    $(window).on('load', function () {
        $(".loader").fadeOut(600);
    });


</script>
<script>
    $('.pagination .page-item').addClass('pager-item');
    $('.pagination').addClass('pager tertiary');


</script>
@stack('scripts')

</body>
</html>
