@extends('seller_dashboard.master')

@push('css')
    <link rel="stylesheet" href="{{asset('website/css/vendor/magnific-popup.css')}}">

	<style>
		.product-list.grid .product-item .product-preview-actions {

			width: 247px !important;

		}
		.product-preview-image {
			width: 100% !important;
			height: 100% !important;
		}
		figure>img {
			width: 100%;
			height:100%;
		}
	</style>
@endpush

@section('content')


        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline filter primary">
                <h4>إدارة منتوجاتك ({{count($services)}})</h4>
				<form>
					<label for="price_filter" class="select-block">
						<select name="price_filter" id="price_filter">
							<option value="0">السعر (من الأكبر للأصغر)</option>
							<option value="1">السعر (Low to High)</option>
						</select>
						<!-- SVG ARROW -->
						<svg class="svg-arrow">
							<use xlink:href="#svg-arrow"></use>
						</svg>
						<!-- /SVG ARROW -->
					</label>
				</form>
            </div>
            <!-- /HEADLINE -->

			<!-- PRODUCT LIST -->
			<a href="addservice">
			<div class="product-list grid column4-wrap">
				<!-- PRODUCT ITEM -->
				<div class="product-item upload-new column">
					<!-- PRODUCT PREVIEW ACTIONS -->
					<div class="product-preview-actions">
						<!-- PRODUCT PREVIEW IMAGE -->
						<figure class="product-preview-image">
							<img src="{{asset('website/')}}/images/dashboard/uploadnew-bg.jpg" alt="product-image">
						</figure>
						<!-- /PRODUCT PREVIEW IMAGE -->
					</div>
					<!-- /PRODUCT PREVIEW ACTIONS -->

					<!-- PRODUCT INFO -->
					<div class="product-info">
						<p class="text-header">إضافة خدمه جديده</p>
						<p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
					</div>
					<!-- /PRODUCT INFO -->
				</div>
			</a>
			<!-- /PRODUCT ITEM -->

				@forelse ($services as $item => $value)

			
					<!-- PRODUCT ITEM -->
				<div class="product-item column">
					<!-- PRODUCT PREVIEW ACTIONS -->
					<div class="product-preview-actions">
						<!-- PRODUCT PREVIEW IMAGE -->
						<figure class="product-preview-image">
							<img src="{{asset('uploads/services/'.get_services_imgs($value)[0]->img)}}" alt="product-image">
						</figure>
						<!-- /PRODUCT PREVIEW IMAGE -->

						<!-- PRODUCT SETTINGS -->
						<div class="product-settings primary dropdown-handle">
							<span class="sl-icon icon-settings"></span>
						</div>
						<!-- /PRODUCT SETTINGS -->

						<!-- DROPDOWN -->
						<ul class="dropdown small hover-effect closed">
							<li class="dropdown-item">
								<!-- DP TRIANGLE -->
								<div class="dp-triangle"></div>
								<!-- DP TRIANGLE -->
								<a href="#">Edit Item</a>
							</li>
							<li class="dropdown-item">
								<a href="#">Duplicate</a>
							</li>
							<li class="dropdown-item">
								<a href="#">Share</a>
							</li>
							<li class="dropdown-item">
								<a href="#">Delete</a>
							</li>
						</ul>
						<!-- /DROPDOWN -->
					</div>
					<!-- /PRODUCT PREVIEW ACTIONS -->

					<!-- PRODUCT INFO -->
					<div class="product-info">
						<a href="item-v1.html">
							<p class="text-header">{!! $value->services_name !!}</p>
						</a>
						<p class="product-description">{!! $value->services_desc !!}</p>
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
								<img src="{{asset('website/')}}/images/avatars/avatar_01.jpg" alt="user-avatar">
							</figure>
						</a>
						<a href="author-profile.html">
							<p class="text-header tiny">{!! $value->user_name !!}</p>
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
				@empty
					
				@endforelse

				

	
			</div>
			<!-- /PRODUCT LIST -->

			<div class="clearfix"></div>
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