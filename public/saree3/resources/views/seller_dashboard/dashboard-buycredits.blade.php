@extends('seller_dashboard.master')

@push('css')
    <link rel="stylesheet" href="{{asset('website/css/vendor/magnific-popup.css')}}">
@endpush

@section('content')


        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline simple primary">
                <h4>شراء رصيد</h4>
            </div>
            <!-- /HEADLINE -->

			<!-- PACK BOXES -->
			<div class="pack-boxes">
				<!-- PACK BOX -->
				<div class="pack-box">
					<p class="text-header small">Small Pack</p>
					<p class="price larger"><span>$</span>10</p>
					<p class="credit">No Bonus Credit</p>
					<a href="#" class="button dark-light">Select Pack</a>
				</div>
				<!-- /PACK BOX -->

				<!-- PACK BOX -->
				<div class="pack-box">
					<p class="text-header small">Medium Pack</p>
					<p class="price larger"><span>$</span>25</p>
					<p class="credit">No Bonus Credit</p>
					<a href="#" class="button dark-light">Select Pack</a>
				</div>
				<!-- /PACK BOX -->

				<!-- PACK BOX -->
				<div class="pack-box">
					<!-- PIN -->
					<span class="pin primary">Popular</span>
					<!-- /PIN -->
					<p class="text-header small">Big Pack</p>
					<p class="price larger"><span>$</span>50</p>
					<p class="credit primary">$10 Bonus Credit</p>
					<a href="#" class="button dark-light">Select Pack</a>
				</div>
				<!-- /PACK BOX -->

				<!-- PACK BOX -->
				<div class="pack-box">
					<p class="text-header small">Premium Pack</p>
					<p class="price larger"><span>$</span>100</p>
					<p class="credit primary">$25 Bonus Credit</p>
					<a href="#" class="button primary">Selected!</a>
				</div>
				<!-- /PACK BOX -->

				<!-- PACK BOX -->
				<div class="pack-box">
					<p class="text-header small">Diamond Pack</p>
					<p class="price larger"><span>$</span>500</p>
					<p class="credit primary">$50 Bonus Credit</p>
					<a href="#" class="button dark-light">Select Pack</a>
				</div>
				<!-- /PACK BOX -->
			</div>
			<!-- /PACK BOXES -->

			<div class="clearfix"></div>			

			<!-- FORM BOX ITEMS -->
			<div class="form-box-items">
				<!-- FORM BOX ITEM -->
				<div class="form-box-item">
					<h4>Payment &amp; Confirmation</h4>
					<hr class="line-separator">
					<form>
						<label class="rl-label">Choose your Payment Method</label>
						<!-- RADIO -->
						<input type="radio" id="credit_card" name="payment_method" value="cc" checked>
						<label for="credit_card">
							<span class="radio primary"><span></span></span>
							Credit Card
						</label>
						<!-- /RADIO -->

						<!-- RADIO -->
						<input type="radio" id="paypal" name="payment_method" value="pp">
						<label for="paypal">
							<span class="radio primary"><span></span></span>
							Paypal
						</label>
						<!-- /RADIO -->
						<hr class="line-separator top">

						<!-- INPUT CONTAINER -->
						<div class="input-container">
							<label for="ccnum" class="rl-label required">Credit Card Number</label>
							<input type="text" id="ccnum" name="ccnum" placeholder="Enter your credit card number here...">
						</div>
						<!-- /INPUT CONTAINER -->

						<!-- INPUT CONTAINER -->
						<div class="input-container half">
							<label for="exp_year" class="rl-label required">Expiration Year</label>
							<label for="exp_year" class="select-block">
								<select name="exp_year" id="exp_year">
									<option value="0">Select the expiration year...</option>
									<option value="1">2017</option>
									<option value="2">2018</option>
									<option value="3">2019</option>
									<option value="4">2020</option>
								</select>
								<!-- SVG ARROW -->
								<svg class="svg-arrow">
									<use xlink:href="#svg-arrow"></use>
								</svg>
								<!-- /SVG ARROW -->
							</label>
						</div>
						<!-- /INPUT CONTAINER -->

						<!-- INPUT CONTAINER -->
						<div class="input-container half">
							<label for="secode" class="rl-label required">Security Code</label>
							<input type="password" id="secode" name="secode" placeholder="Enter your security code here...">
						</div>
						<!-- /INPUT CONTAINER -->
						<div class="clearfix"></div>
						<hr class="line-separator">
						<button class="button big dark">Buy Credits <span class="primary">Now!</span></button>
					</form>
				</div>
				<!-- /FORM BOX ITEM -->
			</div>
			<!-- /FORM BOX ITEMS -->
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