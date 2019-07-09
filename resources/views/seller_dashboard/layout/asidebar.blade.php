<!-- SIDE MENU -->
<div id="dashboard-options-menu" class="side-menu dashboard left closed">
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
            <a href="{{url('authorProfile')}}">
                <div class="outer-ring">
                    <div class="inner-ring"></div>
                    <figure class="user-avatar">
                        <img src="{{asset('/images/avatars/'.user()->image)}}" alt="avatar" style="height: 100%;">
                    </figure>
                </div>
            </a>
            <!-- /USER AVATAR -->

            <!-- USER INFORMATION -->
            <a href="{{url('authorProfile')}}">
                <p class="user-name"> {{Auth()->guard()->user()->name}}</p>
            </a>
            <p class="user-money">$0</p>
            <!-- /USER INFORMATION -->
        </div>
        <!-- /USER QUICKVIEW -->
    </div>
    <!-- /SIDE MENU HEADER -->

    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">حسابك</p>
    <!-- /SIDE MENU TITLE -->
    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect interactive">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item active">
            <a href="{{url('seller')}}">
                <span class="sl-icon icon-home"></span>
                الرئيسية
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN -->
        <ul class="dropdown dark hover-effect interactive">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{url('seller/settings')}}">
                <span class="sl-icon icon-settings"></span>
                إعدادات الحساب
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{url('seller/notifications')}}">
                <span class="sl-icon icon-star"></span>
                الإشعارات
            </a>
            <!-- PIN -->
            <span class="pin soft-edged big primary">{{count(auth()->user()->notifications)}}</span>
            <!-- /PIN -->
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item interactive">
            <a href="#">
                <span class="sl-icon icon-envelope"></span>
                الرسائل
                <!-- SVG ARROW -->
                <svg class="svg-arrow">
                    <use xlink:href="#svg-arrow"></use>
                </svg>
                <!-- /SVG ARROW -->
            </a>

            <!-- INNER DROPDOWN -->
            <ul class="inner-dropdown">
                <!-- INNER DROPDOWN ITEM -->
                <li class="inner-dropdown-item">
                    <a href="{{url('seller/messages/inbox')}}">صندوق الوارد (36)</a>
                    <!-- PIN -->
                    <span class="pin soft-edged secondary">2</span>
                    <!-- /PIN -->
                </li>
                <!-- /INNER DROPDOWN ITEM -->

                <!-- INNER DROPDOWN ITEM -->
                <li class="inner-dropdown-item">
                    <a href="{{url('seller/messages/inbox')}}">رسائل مميزة</a>
                </li>
                <!-- /INNER DROPDOWN ITEM -->

                <!-- INNER DROPDOWN ITEM -->
                <li class="inner-dropdown-item">
                    <a href="{{url('seller/messages/inbox')}}">الرسائل المحدوفة</a>
                </li>
                <!-- /INNER DROPDOWN ITEM -->
            </ul>
            <!-- INNER DROPDOWN -->

            <!-- PIN -->
            <span class="pin soft-edged big secondary">!</span>
            <!-- /PIN -->
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
           <a href="{{url('seller/purchases')}}">
                <span class="sl-icon icon-tag"></span>
                مشترياتك
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{url('seller/buycredits')}}">
                <span class="sl-icon icon-credit-card"></span>
                شراء الرصيد
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
    </ul>
    <!-- /DROPDOWN -->

    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">معلومات و إحصائيات</p>
    <!-- /SIDE MENU TITLE -->

    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
        <a href="{{url('seller/statement')}}">
                <span class="sl-icon icon-layers"></span>
                المبيعات
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{url('seller/statistics')}}">
                <span class="sl-icon icon-chart"></span>
                الإحصائيات
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
    </ul>
    <!-- /DROPDOWN -->

    <!-- SIDE MENU TITLE -->
    <p class="side-menu-title">أدوات البائع</p>
    <!-- /SIDE MENU TITLE -->

    <!-- DROPDOWN -->
    <ul class="dropdown dark hover-effect">
        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{url('seller/addservice')}}">
                <span class="sl-icon icon-arrow-up-circle"></span>
                 إضافة خدمة   
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{url('seller/manageitems')}}">
                <span class="sl-icon icon-folder-alt"></span>
                إدارة الخدمات
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->


    @if(user()->upload_products == 1)
        <!--This operation for priv => admin -->
            <li class="dropdown-item">
                <a href="{{url('seller/addproducts')}}">
                    <span class="sl-icon icon-arrow-up-circle"></span>
                    إضافة منتج
                </a>
            </li>
            <!-- /DROPDOWN ITEM -->

            <!-- DROPDOWN ITEM -->
            <li class="dropdown-item">
                <a href="{{url('seller/manageitems')}}">
                    <span class="sl-icon icon-folder-alt"></span>
                    إدارة المنتجات
                </a>
            </li>
            <!-- /DROPDOWN ITEM -->
    @endif

        <!-- DROPDOWN ITEM -->
        <li class="dropdown-item">
            <a href="{{url('seller/withdrawals')}}">
                <span class="sl-icon icon-wallet"></span>
                سحب الأرباح
            </a>
        </li>
        <!-- /DROPDOWN ITEM -->
    </ul>
    <!-- /DROPDOWN -->
        <a href="{{url('/')}}" class="button medium secondary">الذهاب للموقع</a>
        <a href="{{url('logout')}}" class="button medium secondary">تسجيل الخروج</a>
</div>
<!-- /SIDE MENU -->
