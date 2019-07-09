@extends('website.layout')

@push('links')

@endpush

@section('content')

<!-- SECTION HEADLINE -->
<div class="section-headline-wrap">
		<div class="section-headline">
			<h2>كيف تتسوق</h2>
			<p>الرئيسية<span class="separator">/</span><span class="current-section">كيف تتسوق</span></p>
		</div>
	</div>
	<!-- /SECTION HEADLINE -->

	<!-- HT BANNER WRAP -->
	<div class="ht-banner-wrap">
		<!-- HT BANNER -->
		<div class="ht-banner void violet">
			<figure class="ht-banner-img1">
            <img src="{{url('website/images/how_to_shop_01.png')}}" alt="">
			</figure>
		</div>
		<!-- /HT BANNER -->

		<!-- HT BANNER -->
		<div class="ht-banner">
			<!-- HT BANNER CONTENT -->
			<div class="ht-banner-content">
				<p class="text-header">سجل حسابك معنا</p>
				<p>هذا مجرد نص تجريبي و هو لا يعني شيئ لمجرد التجربة فقط و لمعاينة طريقة عرض النصوص على منصة سريع الإلكترونية لتقديم الخدمات و المنتجات الرقمية.</p>
				<a href="#" class="button mid dark"> سجل <span class="primary">حسابك الجديد</span></a>
			</div>
			<!-- /HT BANNER CONTENT -->
		</div>
		<!-- /HT BANNER -->

		<!-- HT BANNER -->
		<div class="ht-banner void pink">
			<figure class="ht-banner-img2">
            <img src="{{url('website/images/how_to_shop_02.png')}}" alt="">
			</figure>
		</div>
		<!-- /HT BANNER -->

		<!-- HT BANNER -->
		<div class="ht-banner">
			<!-- HT BANNER CONTENT -->
			<div class="ht-banner-content">
				<p class="text-header">تصفح منتجات سريع</p>
				<p>هذا مجرد نص تجريبي و هو لا يعني شيئ لمجرد التجربة فقط و لمعاينة طريقة عرض النصوص على منصة سريع الإلكترونية لتقديم الخدمات و المنتجات الرقمية.</p>
				<a href="#" class="button mid dark"><span class="primary">المنتجات</span> الأكثر شهرة</a>
			</div>
			<!-- /HT BANNER CONTENT -->
		</div>
		<!-- /HT BANNER -->

		<!-- HT BANNER -->
		<div class="ht-banner void blue">
			<figure class="ht-banner-img3">
                    <img src="{{url('website/images/how_to_shop_03.png')}}" alt="">
			</figure>
		</div>
		<!-- /HT BANNER -->

		<!-- HT BANNER -->
		<div class="ht-banner">
			<!-- HT BANNER CONTENT -->
			<div class="ht-banner-content">
				<p class="text-header">سلة المشتريات و الدفع</p>
				<p>هذا مجرد نص تجريبي و هو لا يعني شيئ لمجرد التجربة فقط و لمعاينة طريقة عرض النصوص على منصة سريع الإلكترونية لتقديم الخدمات و المنتجات الرقمية.</p>
				<a href="#" class="button mid dark">جرب <span class="primary">وسائل الدفع</span></a>
			</div>
			<!-- /HT BANNER CONTENT -->
		</div>
		<!-- /HT BANNER -->
	</div>
	<!-- /HT BANNER WRAP -->


@endsection

@push('scripts')

@endpush
