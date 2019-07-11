@extends('seller_dashboard.master')

@push('css')
    <link rel="stylesheet" href="{{asset('website/css/vendor/magnific-popup.css')}}">
@endpush

@section('content')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline buttons primary">
                <h4>إشعاراتك ({{count(auth()->user()->notifications)}})</h4>
				<a href="#" class="button mid-short primary">تحديد الكل كمقروء</a>
            </div>
            <!-- /HEADLINE -->

			<!-- PROFILE NOTIFICATIONS -->
			<div class="profile-notifications">

				@forelse (auth()->user()->notifications as $noth)
				<!-- PROFILE NOTIFICATION -->
				<div class="profile-notification">
					<!-- NOTIFICATION CLOSE -->
					<div class="notification-close"></div>
					<!-- NOTIFICATION CLOSE -->
					<div class="profile-notification-date">
						<p>2 Hours ago</p>
					</div>
					<div class="profile-notification-body">
						<figure class="user-avatar">
							<img src="{{url('website/')}}/images/avatars/avatar_02.jpg" alt="user-avatar">
						</figure>
						<p><span>MeganV.</span> added <span>Pixel Diamond Gaming Shop</span> to favourites</p>
					</div>
					<div class="profile-notification-type">
						<span class="type-icon icon-heart primary"></span>
					</div>
				</div>
				<!-- PROFILE NOTIFICATION -->
				@empty
					<p> لا توجد لديك إشعارات حاليا </p>
				@endforelse
				

		
			</div>
			<!-- /PROFILE NOTIFICATIONS -->

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