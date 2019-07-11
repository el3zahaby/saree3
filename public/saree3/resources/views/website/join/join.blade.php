@include('website.join.header')

<style>
	.form-popup input[type=email], .form-popup input[type=password], .form-popup input[type=text] {
		margin: 0;
	}

	label.rl-label {
		margin-top: 20px;
	}

	.intl-tel-input {
		margin-bottom: 0;
	}
</style>

<!-- SECTION HEADLINE -->
<div class="section-headline-wrap">
	<div class="section-headline">
		<h2>صفحة التسجيل</h2>
		<p>الرئيسية<span class="separator">/</span><span class="current-section">التسجيل</span></p>
	</div>
</div>
<!-- /SECTION HEADLINE -->
<!-- SECTION -->
	<div class="section-wrap">
		<div class="section demo">
		
			<!-- FORM POPUP -->
			<div class="form-popup joinform">

				<!-- FORM POPUP HEADLINE -->
				<div class="form-popup-headline primary">
					<h2>تسجيل حساب جديد</h2>
					<p>تسجل الأن وبدء ربح المال من منزلك</p>
				</div>
				<!-- /FORM POPUP HEADLINE -->

				<!-- FORM POPUP CONTENT -->
				<div class="form-popup-content">

					<div class="check-compte-type" style="overflow: hidden;height: 40px; margin-bottom: 6px;">
                        <!-- Check if As Saller -->
                        <div class="col-lg-6" style="float: left; width: 50%">
                            <input type="radio" id="buyer" name="usertype"   {{($type == 'seller')?'checked':'disabled'}}>
                            <label for="buyer">
                                <span class="radio primary"><span></span></span>
                                كمشتري
                            </label>
                        </div>
                        <!-- Check if As Saller -->

                        <!-- Check if As Buyer -->
                        <div class="col-lg-6 " style="float: left; width: 50%">
                            <input type="radio" id="seller" name="usertype" {{($type == 'buyer')?'checked':'disabled'}}>
                            <label for="seller">
                                <span class="radio primary"><span></span></span>
                                كبائع
                            </label>
                        </div>
                        <!-- Check if As Buyer -->
                    </div>

                    <div class="clearfix"></div>

					<!-- Form Register a Seller -->
					<form action="{{url('/join/buyer')}}" method="POST" style="display: {{ $type== 'buyer' ? 'block !important' : 'none' }};">
                       @csrf
						<label for="buyer_name" class="rl-label required">الإسم الكامل</label>
						<input type="text" id="seller_name" name="buyer_name" placeholder="أدخل إسمك الكامل" value="{{old('buyer_name')}}">
                        @if($errors->has('buyer_name'))
							<span class="errors">
								@foreach($errors->get('buyer_name') as $er)
									{{$er}}
                                @endforeach
							</span>
                        @endif

                        <label for="buyer_username" class="rl-label required">User Name</label>
						<div class="status_div">
                            <input type="text" id="buyer_username" name="buyer_username" placeholder="إدخل إسم المستخدم" value="{{old('buyer_username')}}">
							@if($errors->has('buyer_username'))
								<span class="errors">
								@foreach($errors->get('buyer_username') as $er)
										{{$er}}
									@endforeach
							</span>
							@endif
						</div>



						<label for="buyer_email" class="rl-label">البريد الإلكتروني</label>
						<input type="email" id="buyer_email" name="buyer_email" placeholder="أكتب بريدك الإلكتروني" value="{{old('buyer_email')}}">
						 @if($errors->has('buyer_email'))
                        <span class="errors">
                        @foreach($errors->get('buyer_email') as $er)
                                {{$er}}
                        @endforeach
                        </span>
                        @endif
                        
                        <label for="buyer_password" class="rl-label required">كلمة المرور</label>
						<input type="password" id="buyer_password" name="buyer_password" placeholder="أدخل كلمة المرور">
                         @if($errors->has('buyer_password'))
                        <span class="errors">
                        @foreach($errors->get('buyer_password') as $er)
                                {{$er}}
                        @endforeach
                        </span>
                        @endif
                        <label for="buyer_country" class="rl-label required">الدولة</label>
						<label for="buyer_country" class="select-block">
							
                            <select name="buyer_country" id="buyer_country">
									@foreach($countries_en as $k=>$v)
                                        @if(old('buyer_country') == $loop->index)
                                            <option value="{{$loop->index}}" selected>{{$v}}</option>
                                        @else
                                            <option value="{{$loop->index}}">{{$v}}</option>
                                        @endif
                                    
                                    @endforeach
								</select>
                           
								<!-- SVG ARROW -->
								<svg class="svg-arrow">
									<use xlink:href="#svg-arrow"></use>
								</svg>
								<!-- /SVG ARROW -->
							@if($errors->has('buyer_country'))
								<span class="errors">
							@foreach($errors->get('buyer_country') as $er)
											{{$er}}
										@endforeach
							</span>
							@endif
							</label>

                        
                        <label for="buyer_city" class="rl-label required">المنطقة</label>
						<input type="text" id="buyer_city" name="buyer_city" placeholder="أكتب منطقتك..." value="{{old('buyer_city')}}">
                           @if($errors->has('buyer_city'))
                        <span class="errors">
                        @foreach($errors->get('buyer_city') as $er)
                                {{$er}}
                        @endforeach
                        </span>
                        @endif
                                 <!-- INPUT CONTAINER -->
						<div class="input-container ">
							<label for="gender" class="rl-label required">الجنس</label>
							<label for="gender" class="select-block">
								<select name="gender" id="gender" requiredcustom>
									<option disabled selected>إختر جنسك...</option>
									@foreach($gender as $g)
                                     @if(old('gender') != null && old('gender') ==  $loop->index)
                                       <option value="{{$loop->index}}" selected>{{$g}}</option>
                                     @else
                                       <option value="{{$loop->index}}">{{$g}}</option>
                                     @endif
                                    @endforeach
						
									
								</select>
								<!-- SVG ARROW -->
								<svg class="svg-arrow">
									<use xlink:href="#svg-arrow"></use>
								</svg>
								<!-- /SVG ARROW -->
							</label>
							@if($errors->has('gender'))
								<span class="errors">
                        @foreach($errors->get('gender') as $er)
										{{$er}}
									@endforeach
                        </span>
							@endif
						</div>

					    
						<!-- INPUT CONTAINER -->
                        	<!-- INPUT CONTAINER -->
                        <label for="new_email" class="rl-label">تاريخ الإزدياد</label>
                        <div class="date-hb">
						<div class="input-container triplesmall item">
							<label for="year" class="rl-label required">العام</label>
							<label for="year" class="select-block">
								<select name="year" id="year" requiredcustom>
									<option disabled selected>العام</option>
                                    @for($i = 1900;$i <= \Carbon\Carbon::now()->format('Y') ; $i++)
                                     @if(old('year') != null && old('year') ==  $i))
                                     	<option value="{{$i}}" selected>{{$i}}</option>
                                    @else
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                    @endfor
								</select>
								<!-- SVG ARROW -->
								<svg class="svg-arrow">
									<use xlink:href="#svg-arrow"></use>
								</svg>
								<!-- /SVG ARROW -->
							</label>
                                   @if($errors->has('year'))
                        <span class="errors">
                        @foreach($errors->get('year') as $er)
                                {{$er}}
						@endforeach
                        </span>
                        @endif
						</div>
						<!-- /INPUT CONTAINER -->
						<!-- INPUT CONTAINER -->
						<div class="input-container triplesmall item">
							<label for="month" class="rl-label required">الشهر</label>
							<label for="month" class="select-block">
								<select name="month" id="month" requiredcustom>
									<option disabled selected>الشهر</option>
                                    @for($i = 1;$i <= 12; $i++)
                                    @if(old('month') != null && old('month') ==  $i)
									<option value="{{$i}}" selected>{{$i}}</option>
                                    @else
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endif
									@endfor
								</select>
								<!-- SVG ARROW -->
								<svg class="svg-arrow">
									<use xlink:href="#svg-arrow"></use>
								</svg>
								<!-- /SVG ARROW -->
							</label>
                                   @if($errors->has('month'))
                            <span class="errors">
                            @foreach($errors->get('month') as $er)
                                    {{$er}}
                                    @endforeach
                            </span>
                            @endif
                            </div>
                            <!-- /INPUT CONTAINER -->
                                <!-- INPUT CONTAINER -->
                            <div class="input-container triplesmall item">
                                <label for="day" class="rl-label required">اليوم</label>
                                <label for="day" class="select-block">
                                    <select name="day" id="day" requiredcustom>
                                        <option disabled selected>اليوم</option>
                                        @for($i = 1;$i <= 31; $i++)
                                        @if(old('day') != null && old('day') ==  $i)
                                        <option value="{{$i}}" selected>{{$i}}</option>
                                        @else
                                        <option value="{{$i}}">{{$i}}</option>
                                        @endif
                                        @endfor
                                        
                                    </select>
                                    <!-- SVG ARROW -->
                                    <svg class="svg-arrow">
                                        <use xlink:href="#svg-arrow"></use>
                                    </svg>
                                    <!-- /SVG ARROW -->
                                </label>
                                    @if($errors->has('day'))
                            <span class="errors">
                            @foreach($errors->get('day') as $er)
                                    {{$er}}
                            @endforeach
                            </span>
                            @endif
						</div>
                    
						<!-- /INPUT CONTAINER -->
                        </div>
                        <div class="clear"></div>
                        <label for="buyer_mobile" class="rl-label required">الهاتف</label>
						<input type="text" id="buyer_mobile" name="buyer_mobile" placeholder="أدخل رقم هاتفك" value="{{old('buyer_mobile')}}">
                        @if($errors->has('buyer_mobile'))
                        <span class="errors">
                        @foreach($errors->get('buyer_mobile') as $er)
                                {{$er}}
                        @endforeach
                        </span>
                        @endif
                        <input type="checkbox" id="seller_terms">
                        <label for="seller_terms" class="label-check">
							<span class="checkbox primary primary"><span></span></span>
							By joining, you agree to our’s Terms of Service,
                            as well as to receive occasional emails from us.
						</label>
                       
						<button class="button mid dark" disabled type="submit" id="sellerbtn">تسجل  <span class="primary">الأن!</span></button>
                        
                
					</form>
					<!-- Form Register a Seller -->

                    @if($errors->has('buyer_name') || $errors->has('buyer_email') || $errors->has('buyer_password') || $errors->has('buyer_country') || $errors->has('buyer_city'))
						<script>
						  $("#buyer").attr("checked", "checked");
						  $("#seller").removeAttr("checked");
						</script>
                    @endif


                    <!--
                         Form Register a Buyer 
                    -->
                    <form action="{{url('/join/seller')}}" method="post" style="display: {{ $type== 'seller' ? 'block !important' : 'none' }};">
                         @csrf
						<label for="buyer_name" class="rl-label required">الإسم الكامل</label>
						<input type="text" id="buyer_name" name="seller_name" placeholder="أدخل إسمك الكامل..." value="{{old('seller_name')}}">
                          @if($errors->has('seller_name'))
                        <span class="errors">
                        @foreach($errors->get('seller_name') as $er)
                                {{$er}}
                        @endforeach
                        </span>
                        @endif
                        <label for="buyer_name" class="rl-label required">username</label>
						<input type="text" id="buyer_name" name="seller_username" placeholder="أدخل username..." value="{{old('seller_username')}}">
                          @if($errors->has('seller_username'))
                        <span class="errors">
                        @foreach($errors->get('seller_username') as $er)
                                {{$er}}
                                @endforeach
                        </span>
                        @endif
						<label for="buyer_email" class="rl-label">البريد الإلكتروني</label>
						<input type="text" id="buyer_email" name="seller_email" placeholder="أدخل بريدك الإلكتروني..." value="{{old('seller_email')}}">
                             @if($errors->has('seller_email'))
                        <span class="errors">
                        @foreach($errors->get('seller_email') as $er)
                                {{$er}}
                                @endforeach
                        </span>
                        @endif
						<label for="buyer_password" class="rl-label required">كلمة المرور</label>
						<input type="password" id="buyer_password" name="seller_password" placeholder="أدخل كلمة المرور..." >
                            @if($errors->has('seller_password'))
                        <span class="errors">
                        @foreach($errors->get('seller_password') as $er)
                                {{$er}}
                                @endforeach
                        </span>
                        @endif
                        <label for="seller_country" class="rl-label required">الدولة</label>
						<label for="seller_country" class="select-block">
							
							<select name="seller_country" id="seller_country">
								@foreach($countries_en as $k=>$v)
									@if(old('seller_country') == $loop->index)
										<option value="{{$loop->index}}" selected>{{$v}}</option>
									@else
										<option value="{{$loop->index}}">{{$v}}</option>
									@endif
								@endforeach
							</select>
                           
                        
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
							@if($errors->has('seller_country'))
							<span class="errors">
							@foreach($errors->get('seller_country') as $er)
								{{$er}}
							@endforeach
							</span>
							@endif
							</label>

                        <label for="buyer_city" class="rl-label required">المنطقة</label>
						<input type="text" id="buyer_city" name="seller_city" placeholder="أدخل منطقتك..." value="{{old('seller_city')}}">
                           @if($errors->has('seller_city'))
                        <span class="errors">
                        @foreach($errors->get('seller_city') as $er)
							{{$er}}
                         @endforeach
                        </span>
                        @endif


						<div class="input-container ">
							<label for="gender" class="rl-label required">الجنس</label>
							<label for="gender" class="select-block">
								<select name="gender" id="gender" requiredcustom>
									<option disabled selected>إختر جنسك...</option>
									@foreach($gender as $g)
									@if(old('gender') != null && old('gender') ==  $loop->index)
									<option value="{{$loop->index}}" selected>{{$g}}</option>
									@else
									<option value="{{$loop->index}}">{{$g}}</option>
									@endif
									@endforeach
								</select>
								<!-- SVG ARROW -->
								<svg class="svg-arrow">
									<use xlink:href="#svg-arrow"></use>
								</svg>
								<!-- /SVG ARROW -->
							</label>
							@if($errors->has('gender'))
							<span class="errors">
								@foreach($errors->get('gender') as $er)
								{{$er}}
								@endforeach
							</span>
							@endif
						</div>




						<!-- INPUT CONTAINER -->
						<!-- INPUT CONTAINER -->
						<label for="new_email" class="rl-label">تاريخ الإزدياد</label>
						<div class="date-hb">
							<div class="input-container triplesmall item">
								<label for="year" class="rl-label required">العام</label>
								<label for="year" class="select-block">
									<select name="year" id="year" requiredcustom>
										<option disabled selected>العام</option>
										@for($i = 1900;$i <= \Carbon\Carbon::now()->format('Y') ; $i++)
											@if(old('year') != null && old('year') ==  $i))
											<option value="{{$i}}" selected>{{$i}}</option>
											@else
												<option value="{{$i}}">{{$i}}</option>
											@endif
										@endfor
									</select>
									<!-- SVG ARROW -->
									<svg class="svg-arrow">
										<use xlink:href="#svg-arrow"></use>
									</svg>
									<!-- /SVG ARROW -->
								</label>
						@if($errors->has('year'))
						<span class="errors">
                        @foreach($errors->get('year') as $er)
							{{$er}}
						@endforeach
                        </span>
						@endif
						</div>
							<!-- /INPUT CONTAINER -->
							<!-- INPUT CONTAINER -->
							<div class="input-container triplesmall item">
								<label for="month" class="rl-label required">الشهر</label>
								<label for="month" class="select-block">
									<select name="month" id="month" requiredcustom>
										<option disabled selected>الشهر</option>
										@for($i = 1;$i <= 12; $i++)
											@if(old('month') != null && old('month') ==  $i)
												<option value="{{$i}}" selected>{{$i}}</option>
											@else
												<option value="{{$i}}">{{$i}}</option>
											@endif
										@endfor
									</select>
									<!-- SVG ARROW -->
									<svg class="svg-arrow">
										<use xlink:href="#svg-arrow"></use>
									</svg>
									<!-- /SVG ARROW -->
								</label>
								@if($errors->has('month'))
									<span class="errors">
                            @foreach($errors->get('month') as $er)
											{{$er}}
										@endforeach
                            </span>
								@endif
							</div>
							<!-- /INPUT CONTAINER -->
							<!-- INPUT CONTAINER -->
							<div class="input-container triplesmall item">
								<label for="day" class="rl-label required">اليوم</label>
								<label for="day" class="select-block">
									<select name="day" id="day" requiredcustom>
										<option disabled selected>اليوم</option>
										@for($i = 1;$i <= 31; $i++)
											@if(old('day') != null && old('day') ==  $i)
												<option value="{{$i}}" selected>{{$i}}</option>
											@else
												<option value="{{$i}}">{{$i}}</option>
											@endif
										@endfor

									</select>
									<!-- SVG ARROW -->
									<svg class="svg-arrow">
										<use xlink:href="#svg-arrow"></use>
									</svg>
									<!-- /SVG ARROW -->
								</label>
								@if($errors->has('day'))
									<span class="errors">
                            @foreach($errors->get('day') as $er)
											{{$er}}
										@endforeach
                            </span>
								@endif
							</div>



							<div class="clear"></div>
                        <label for="seller_mobile2" class="rl-label required">الهاتف</label>
						<input type="text" id="seller_mobile2" name="seller_mobile" placeholder="أدخل رقم هاتفك..." value="{{old('seller_mobile')}}">
                        @if($errors->has('seller_mobile'))
                        <span class="errors">
                        @foreach($errors->get('seller_mobile') as $er)
                                {{$er}}
                        @endforeach
                        </span>
                        @endif
                         <input type="checkbox" id="buyer_terms">
                        <label for="buyer_terms" class="label-check">
							<span class="checkbox primary primary"><span></span></span>
							By joining, you agree to our’s Terms of Service,
                            as well as to receive occasional emails from us.
						</label>
						<button class="button mid dark" type="submit" id="buyerbtn" disabled>تسجل <span class="primary">الأن!</span></button>
					</form>
					<!-- Form Register a Buyer -->

				</div>
				<!-- /FORM POPUP CONTENT -->
			</div>
			<!-- /FORM POPUP -->

			<div class="clearfix"></div>
		</div>
	</div>
	<!-- /SECTION -->


@include('website.join.footer')
