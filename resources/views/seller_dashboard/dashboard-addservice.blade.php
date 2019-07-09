
@extends('seller_dashboard.master')

@push('css')
    <link rel="stylesheet" href="{{asset('website/css/vendor/magnific-popup.css')}}">
	<link href="https://transloadit.edgly.net/releases/uppy/v0.29.1/dist/uppy.min.css" rel="stylesheet">


	<style>
		.clear {
			clear: both;
		}
		.textarea-container {
			margin-bottom: 25px;
		}
        .append-price , .append-services-extras {
            margin-bottom: 18px;
        }
		.devlope-service {
			background-color: whitesmoke;
			padding: 12px 22px;
			position: relative;
			border: 1px solid #cacaca;
			margin-bottom: 18px;
		}
		.inpt-item{
			width : 31.3333%;
			float:right;
			clear : none !important;
		}
		.inpt-item:nth-child(1) , .inpt-item:nth-child(2) {
			margin-left: 3%;
		} 
		.inputs-price {
			overflow: hidden;
		}
		 input , textarea , .chosen-choices {
			border: 1px solid #c3c3c3 !important;
		}
		.icon-close-form {
			position: absolute;
			top: -9px;
			left: -8px;
			background: #989898;
			color: #fff;
			padding: 2px;
			border-radius: 50%;
			transition: all .5s ease-in-out;
		}
		.icon-close-form:hover {
			cursor: pointer;
			background: #2c2c2c;
		}
		.form-box-item {
			border: 1px solid #c3c3c3 !important;
		}
		select {
			color: #6d6d6d !important;
		}
		
	</style>

@endpush

@section('content')

	<!-- DASHBOARD CONTENT -->
	<div class="dashboard-content">

		<!-- HEADLINE -->
		<div class="headline simple primary">
			<h4>إضافة خدمة</h4>
		</div>
		<!-- /HEADLINE -->

        <!-- This Alert In Add Services Successfully -->
		@if(session()->has('service_created'))
			<div class="service_created"></div>
	     @endif
        <!-- This Alert In Add Services Successfully -->

	    <!-- FORM BOX ITEMS -->
		<div class="form-box-items wrap-3-1 left" style="overflow: hidden;width: 100%;">
			<!-- FORM BOX ITEM -->
			<div class="form-box-item full" style="width: 73%;">
				<h4>ميزات خدمتك</h4>
				<hr class="line-separator" style="margin-right: -24px;margin-left: -24px;">

				<form id="register-form6"
					  class="seller_add_service"
					  action="{{url('seller/addservice')}}"
					  method="post"
					  enctype="multipart/form-data">
					@csrf

					<div class="input-container">
						<label for="name" class="rl-label required">ما هي خدمتك ؟</label>
						<input type="text" id="name" name="name" value="{{old('name')}}" requiredcustom>
						<!-- For Show Any Errors -->
						@if($errors->has('name'))
							<span class="errors">
                        @foreach($errors->get('name') as $er)
									{{$er}}
								@endforeach
                        </span>
					@endif
					<!-- For Show Any Errors -->
					</div>


					<div class="textarea-container">
						<label for="body" class="rl-label required">معلومات عن خدمتك</label>
						<textarea type="text"
								  id="body"
								  name="body"
								  placeholder="أدخل معلومات عن خدمتك هنا..."
								  requiredcustom>{{old('body')}}</textarea>
						<!-- Show Errors -->
						@if($errors->has('body'))
							<span class="errors">
                        @foreach($errors->get('body') as $er)
									{{$er}}
								@endforeach
                        </span>
						@endif
					</div>

					<div class="clear"></div>
					<div>
						<div class="input-container half">
							<label for="seller_add_service_Category" class="rl-label required">القسم الرئيسي</label>
							<label for="seller_add_service_Category" class="select-block">
								<select name="section_id" id="seller_add_service_Category" requiredcustom>
									<option value="0" disabled selected>إختر القسم الرئيسي...</option>

									@foreach($parent_sec as $key => $value)
										<option value="{{ $value->section_id }}">{{ json_decode($value->section_title)->ar }}</option>
									@endforeach

								</select>
								<!-- SVG ARROW -->
								<svg class="svg-arrow">
									<use xlink:href="#svg-arrow"></use>
								</svg>
								<!-- /SVG ARROW -->
								<!-- Show Errors -->
								@if($errors->has('section_id'))
									<span class="errors">
                                    @foreach($errors->get('section_id') as $er)
											{{$er}}
										@endforeach
                                </span>
							@endif
							<!-- Show Errors -->
							</label>
						</div>

						<div class="input-container half">
							<label for="seller_add_service_Sub_Category" class="rl-label required">القسم الفرعي</label>
							<label for="seller_add_service_Sub_Category" class="select-block">
								<select name="sub_section" id="seller_add_service_Sub_Category" requiredcustom>
									<option value="0" disabled selected>إختر القسم الفرعي...</option>
								</select>
								<!-- SVG ARROW -->
								<svg class="svg-arrow">
									<use xlink:href="#svg-arrow"></use>
								</svg>
								<!-- /SVG ARROW -->
								<!-- Show Error -->
								@if($errors->has('sub_section'))
									<span class="errors">
                                    @foreach($errors->get('sub_section') as $er)
										{{$er}}
									@endforeach
                                </span>
							@endif
							<!-- Show Error -->
							</label>
						</div>
					</div>
					<div class="clear"></div>
					<div>
						<div class="input-container half">
							<label for="seller_add_service_Sub_Category" class="rl-label required">الفرعي الثاني</label>
							<label for="seller_add_service_Sub_Category" class="select-block">
								<select name="sub_sub_section" id="seller_add_service_Sub_Sub_Category" requiredcustom>
									<option value="0" disabled selected>إختر الفرعي الثاني...</option>

								</select>
								<!-- SVG ARROW -->
								<svg class="svg-arrow">
									<use xlink:href="#svg-arrow"></use>
								</svg>
								<!-- /SVG ARROW -->
								<!-- Show Errors-->
								@if($errors->has('sub_sub_section'))
									<span class="errors">
                                    @foreach($errors->get('sub_sub_section') as $er)
										{{$er}}
									@endforeach
                                 </span>
								@endif
								<!-- Show Errors-->
							</label>
						</div>
						<div class="input-container half">
							<label for="seller_add_service_Sub_Sub_Categories" class="rl-label required">التصنيف</label>
							<label for="seller_add_service_Sub_Sub_Categories" class="select-block">
								<select name="category" id="seller_add_service_Sub_Sub_Categories" requiredcustom>
									<option value="0" disabled selected>إختر التصنيف...</option>
									@foreach($categories as $category)
										<option value="{{$category->id}}" {{ $category->id == old('category') }} >{{$category->name}}</option>
									@endforeach
								</select>
								<!-- SVG ARROW -->
								<svg class="svg-arrow">
									<use xlink:href="#svg-arrow"></use>
								</svg>
								<!-- /SVG ARROW -->
								<!-- Show Errors-->
								@if($errors->has('category'))
									<span class="errors">
                                    @foreach($errors->get('category') as $er)
											{{$er}}
									@endforeach
                                 	</span>
								@endif
								<!-- Show Errors-->
							</label>
						</div>

						<div class="clear"></div>

						<div class="input-container half">
							<label for="price" class="rl-label required">السعر</label>
							<input type="number" id="price" name="price" value="{{old('price')}}" requiredcustom>
							<!-- Show Errors-->
							@if($errors->has('price'))
								<span class="errors">
                                    @foreach($errors->get('price') as $er)
										{{$er}}
									@endforeach
                                 </span>
							@endif
							<!-- Show Errors-->
						</div>

						<div class="input-container half">
							<label for="to" class="rl-label required">حسب</label>
							<label for="to" class="select-block">
								<select name="to" id="to" requiredcustom>
									<option value="0" disabled selected>إختر ...</option>
									<option value="1" {{ old('to') == 1 ? 'selected': '' }}>قطعه</option>
									<option value="2" {{ old('to') == 2 ? 'selected': '' }}>متر</option>
									<option value="3" {{ old('to') == 3 ? 'selected': '' }}>ساعه</option>
									<option value="4" {{ old('to') == 4 ? 'selected': '' }}>يوم</option>
								</select>
								<!-- SVG ARROW -->
								<svg class="svg-arrow">
									<use xlink:href="#svg-arrow"></use>
								</svg>
								<!-- /SVG ARROW -->
								<!-- Show Errors-->
								@if($errors->has('to'))
									<span class="errors">
                                    @foreach($errors->get('to') as $er)
										{{$er}}
									@endforeach
                                 </span>
								@endif
								<!-- Show Errors-->
							</label>
						</div>
						<div class="clear"></div>
						<div class="append-price">
						</div>
						<a class="button mid-short primary add_service_related"
						   style="margin-bottom: 38px;float:right;width:160px;cursor: pointer;"> إضافة أسعار إضافيه
							<span style="font-size:15px;">+</span>
						</a>
						<div class="clear"></div>

						<div class="textarea-container">
							<label for="experiences"
								   class="rl-label required"
								   style="display: inline-block;font-size: 15px; margin-bottom: 22px;">ميزات
								خدمتك </label>
							<span style="font-size: 15px;color: #4a4a4a;margin-right:8px;"> لما سيرغب الناس في خدمتك</span>
							<h3 class="rl-label"
								style="text-align: right;font-size: 13.1px;font-weight: 700;margin-bottom: 14px;">ما هي
								خبراتك ؟</h3>
							<textarea type="text"
									  id="experiences"
									  name="experiences"
									  placeholder="أكتب خبراتك...."
									  requiredcustom>{{old('experiences')}}</textarea>
							@if($errors->has('experiences'))
								<span class="errors">
                            @foreach($errors->get('experiences') as $er)
										{{$er}}
									@endforeach
                            </span>
							@endif
						</div>
						<div class="clear"></div>
						<div class="input-container">
							<label for="tags" class="rl-label required">مهاراتك</label>
							<select data-placeholder="إختر مهاراتك"
									multiple
									class="chosen-select"
									tabindex="8"
									name="skills[]">

								@foreach($all_tags as $tag)
									<option value="{{$tag->id}}" {{ in_array($tag->id,old('skills') == null ? [] : old('skills') ) ? 'selected' : '' }}>{{$tag->name}}</option>
								@endforeach

							</select>
							@if($errors->has('skills.0'))
								<span class="errors">
                            @foreach($errors->get('skills.0') as $er)
								{{$er}}
							@endforeach
                            </span>
							@endif
						</div>
						<div class="append-services-extras">
							<!-- Apend Here -->
						</div>

						<div class="clear"></div>

						<!-- INPUT CONTAINER -->
						<div class="input-container">
							<label class="rl-label required">حمل صوره أو فيديو </label>
							<!-- UPLOAD FILE -->
							<div class="upload-file">
								<div class="upload-file-actions">
									<a id="serviceimg"
									   class="button mid-short btn-dowload"
									   style="width: 120px;cursor: pointer">تحميل ...</a>
									<p></p>
									<input id="inpt-serviceimg"
										   type="file"
										   name="attachment[]"
										   multiple="yes"
										   requiredcustom
										   style="visibility: hidden; opacity: 0;">
								</div>
								<div class="upload-file-progress" style="display: none">
									<!-- BADGE PROGRESS -->
									<div class="upload-bar">
										<div class="upload-pg1"></div>
									</div>
									<!-- /BADGE PROGRESS -->
									<span style="line-height: 1.8;float: right;margin-right: 12px;">%</span><span class="text-header timer"
																												  data-from="0"
																												  data-to="100"
																												  data-speed="1500"
																												  data-refresh-interval="50"
																												  style="margin-right: 3px !important;"></span>
									<span href="" class="button dark-light square">
										<img src="{{asset('website')}}/images/dashboard/close-icon-small.png"
											 id="close-dwn"
											 alt="close-icon">
									</span>
								</div>
							</div>
							<!-- UPLOAD FILE -->
							@if($errors->has('attachment.0'))
								<span class="errors">
                            @foreach($errors->get('attachment.0') as $er)
								{{$er}}
							@endforeach
                            </span>
							@endif
						</div>
						<!-- /INPUT CONTAINER -->

						<div class="service_related_section">

						</div>
						<button class="button mid dark" type="submit" id="uploadserverbtn">إضافة <span class="primary">خدمة!</span>
						</button>
					</div>
				</form>

			</div>
			<!-- /FORM BOX ITEM -->
		</div>
		<!-- /FORM BOX ITEMS -->

		<!-- FORM BOX ITEMS -->
		<div class="form-box-items wrap-1-3 right" style="width: 24%;">

			<!-- FORM BOX ITEM -->
			<div class="form-box-item full" style="width: 100%;">
				<h4>Upload Guidelines</h4>
				<hr class="line-separator" style="margin-right: -24px;margin-left: -24px;">
				<!-- PLAIN TEXT BOX -->
				<div class="plain-text-box">
					<!-- PLAIN TEXT BOX ITEM -->
					<div class="plain-text-box-item">
						<p class="text-header">File Upload:</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
					</div>
					<!-- /PLAIN TEXT BOX ITEM -->

					<!-- PLAIN TEXT BOX ITEM -->
					<div class="plain-text-box-item">
						<p class="text-header">Photos and Images:</p>
						<p>Lorem ipsum dolor sit amet.<br>Consectetur adipisicing elit, sed do.</p>
						<p>Eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
					<!-- /PLAIN TEXT BOX ITEM -->

					<!-- PLAIN TEXT BOX ITEM -->
					<div class="plain-text-box-item">
						<p class="text-header">Guide with Links:</p>
						<p><a href="#" class="primary">Click here for the link.</a></p>
					</div>
					<!-- /PLAIN TEXT BOX ITEM -->
				</div>
				<!-- /PLAIN TEXT BOX -->
			</div>
			<!-- /FORM BOX ITEM -->
		</div>
		<!-- /FORM BOX ITEMS -->

		<div class="clearfix"></div>
	</div>
	<!-- DASHBOARD CONTENT -->
	</div>
	<!-- /DASHBOARD BODY -->

	<div class="shadow-film closed"></div>

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
    <!-- xmAlert -->
    <script src="{{asset("website/js/vendor/jquery.xmalert.min.js")}}"></script>

    <!-- XM LineFill -->
	<script src="{{asset('website/js/vendor/jquery.xmlinefill.min.js')}}"></script>
	<!-- Dashboard UploadItem -->
	<script src="{{asset('website/js/dashboard-uploaditem.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countto/1.2.0/jquery.countTo.js"></script>



    <script>
        $('.add_service_related').click(function () {
            let content = "\t\t\t\t\t\t\t\t<div class=\"devlope-service\">\n" +
                "\t\t\t\t\t\t\t\t\t\t<div class=\"input-container\">\n" +
                "\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"price\" class=\"rl-label \">النص</label>\n" +
                "\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"name\" name=\"name\" value=\"{{old('name')}}\" requiredcustom>\n" +
                "\t\t\t\t\t\t\t\t\t\t</div>\n" +
                "\t\t\t\t\t\t\t\t\t<div class=\"inputs-price\">\n" +
                "\t\t\t\t\t\t\t\t\t\t\t\n" +
                "\t\t\t\t\t\t\t\t\t\t\t<div class=\"inpt-item input-container\">\n" +
                "\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"price\" class=\"rl-label \">+يوم </label>\n" +
                "\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"name\" name=\"name\" value=\"{{old('name')}}\" requiredcustom>\n" +
                "\t\t\t\t\t\t\t\t\t\t\t</div>\n" +
                "\t\t\t\t\t\t\t\t\t\t\t<div class=\"inpt-item input-container\">\n" +
                "\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"price\" class=\"rl-label \">الكميه</label>\n" +
                "\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"name\" name=\"name\" value=\"{{old('name')}}\" requiredcustom>\n" +
                "\t\t\t\t\t\t\t\t\t\t\t</div>\n" +
                "\t\t\t\t\t\t\t\t\t\t\t<div class=\"inpt-item input-container\">\n" +
                "\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"price\" class=\"rl-label \">السعر</label>\n" +
                "\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"name\" name=\"name\" value=\"{{old('name')}}\" requiredcustom>\n" +
                "\t\t\t\t\t\t\t\t\t\t\t</div>\n" +
                "\t\t\t\t\t\t\t\t\t</div>\n" +
                "\t\n" +
                "\t\t\t\t\t\t\t\t\t<span class=\"sl-icon icon-close icon-close-form\" onClick=\"removeDiv(this)\"></span>\n" +
                "\t\n" +
                "\t\t\t\t\t\t\t\t</div>";

            $(".append-price").append(content);

        });
        function removeDiv(elem){
            $(elem).parent('div').remove();
        }

		$("#inpt-serviceimg").change(() => {
		    var text = $("#inpt-serviceimg").val();
            var files = $("#inpt-serviceimg")[0].files;
		    console.log(files.length);
			$(".upload-file-progress").show();
            var lineBars = [
                { name: 'pg1', percent: 86 },
                { name: 'pg2', percent: 92 },
                { name: 'upload-pg1', percent: 100 },
                { name: 'upload-pg2', percent: 100 },
                { name: 'upload-pg3', percent: 68 },
                { name: 'upload-pg4', percent: 73 },
                { name: 'upload-pg5', percent: 92 }
            ];

            lineBars.forEach(function( pg ){
                $('.' + pg.name).xmlinefill({
                    percent: pg.percent,
                    fillWidth: 10,
                    gradient: true,
                    gradientColors: ['#d6a32e', '#d6a32e'],
                    speed: 1,
                    outline: true,
                    outlineColor: "#eff0f4",
                    resizable: true,
                    animateOnScroll: false
                });
            });
            $('.timer').countTo("restart");
            $('.timer').countTo();
		    $(".upload-file-actions p ").text(' عدد الصور '+files.length);
		});


        $("#close-dwn").click(function () {
            $(".upload-file-actions p ").text(' ');
            $(".upload-file-progress").hide();
		});

        $(".service_created").xmalert({
            x: 'left',
            y: 'top',
            xOffset: 30,
            yOffset: 30,
            alertSpacing: 40,
            lifetime: 6000,
            fadeDelay: 0.3,
            template: 'messageSuccess',
            title: 'نجح',
            paragraph: 'تم إضافة الخدمه بنجاح',
        });

        $("#serviceimg").click(function ()  {
            $("#inpt-serviceimg").click();
        });

        $("#seller_add_service_Category").change(function () {
            var selected = $(this).val();

            $.ajax({
                url : 'getsubcat',
                methode :'POST',
                data :  {id : selected , title : "إختر القسم الفرعي..."},
                success:function (data) {
                    $("#seller_add_service_Sub_Category").html(data);
                }

            });


        });

        $("#seller_add_service_Sub_Category").change(function () {
			var selected = $(this).val();
            $.ajax({
                url : 'getsubcat',
                methode :'POST',
                data :  {id : selected , title : "إختر التصنيف..."},
                success:function (data) {
                    $("#seller_add_service_Sub_Sub_Category").html(data);
                }
            });
        });


    </script>
@endpush