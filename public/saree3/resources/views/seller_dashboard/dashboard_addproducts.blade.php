@extends('seller_dashboard.master')

@push('css')
    <link rel="stylesheet" href="{{asset('website/css/vendor/magnific-popup.css')}}">

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
        .numbers-item {
            width: 48%;
            float: right;
        }
        .numbers-item:first-child {
            margin-left: 4%;
        }
        .numbers-items .input-container {
            clear: none !important;
        }

    </style>
@endpush

@section('content')

    <!-- DASHBOARD CONTENT -->
    <div class="dashboard-content">

        <!-- HEADLINE -->
        <div class="headline simple primary">
            <h4>إضافة منتج</h4>
        </div>
        <!-- /HEADLINE -->

        <!-- This Alert In Add Services Successfully -->
        @if(session()->has('service_created'))
            <div class="product_created"></div>
        @endif
        <!-- This Alert In Add Services Successfully -->

        <!-- FORM BOX ITEMS -->
        <div class="form-box-items wrap-3-1 left" style="overflow: hidden;width: 100%;">
            <!-- FORM BOX ITEM -->
            <div class="form-box-item full" style="width: 73%;">
                <h4>ميزات منتجك</h4>
                <hr class="line-separator" style="margin-right: -24px;margin-left: -24px;">

                <form id="register-form6" class="seller_add_service" action="{{url('seller/addproducts')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="user_id" value="{{user()->id}}" style="display: none">
                    <div class="input-container">
                        <label for="name_and_type" class="rl-label requiredcostom">إسم و نوع المنتج</label>
                        <input type="text" id="name_and_type" name="name_and_type" value="{{old('name_and_type')}}" requiredcostom>
                        <!-- For Show Any Errors -->
                        @if($errors->has('name_and_type'))
                            <span class="errors">
                        @foreach($errors->get('name_and_type') as $er)
                            {{$er}}
                        @endforeach
                        </span>
                        @endif
                    <!-- For Show Any Errors -->
                    </div>


                    <div class="textarea-container">
                        <label for="body" class="rl-label requiredcostom">وصف المنتج</label>
                        <textarea type="text"  id="body" name="body" placeholder="صف منتوجك هنا..." requiredcostom>{{old('body')}}</textarea>
                        <!-- Show Errors -->
                        @if($errors->has('body'))
                            <span class="errors">
                        @foreach($errors->get('body') as $er)
                                    {{$er}}
                                @endforeach
                        </span>
                        @endif
                        <!-- End Show Error body -->
                    </div>

                    <div class="clear"></div>

                    <div>
                        <div class="input-container half">
                            <label for="seller_add_service_Category" class="rl-label requiredcostom">القسم الرئيسي</label>
                            <label for="seller_add_service_Category" class="select-block">
                                <select name="section_id" id="seller_add_service_Category" requiredcostom>
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
                            <label for="seller_add_service_Sub_Category" class="rl-label requiredcostom">القسم الفرعي</label>
                            <label for="seller_add_service_Sub_Category" class="select-block">
                                <select name="sub_section" id="seller_add_service_Sub_Category" requiredcostom>
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
                            <label for="seller_add_service_Sub_Category" class="rl-label requiredcostom">التصنيف</label>
                            <label for="seller_add_service_Sub_Category" class="select-block">
                                <select name="category" id="seller_add_service_Sub_Sub_Category" requiredcostom>
                                    <option value="0" disabled selected>إختر التصنيف...</option>
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
                        <div class="input-container">
                            <label for="price" class="rl-label requiredcostom">الكميه </label>
                            <input type="number" id="price" name="Quantity" value="{{old('Quantity')}}" requiredcostom>
                            @if($errors->has('Quantity'))
                                <span class="errors">
                            @foreach($errors->get('Quantity') as $er)
                                {{$er}}
                            @endforeach
                            </span>
                            @endif
                        </div>

                        <div class="clear"></div>

                        <div class="input-container">
                            <label for="price" class="rl-label requiredcostom">السعر</label>
                            <input type="number" id="price" name="price" value="{{old('price')}}" requiredcostom>
                            @if($errors->has('price'))
                                <span class="errors">
                                @foreach($errors->get('price') as $er)
                                    {{$er}}
                                @endforeach
                            </span>
                            @endif
                        </div>




                        <div class="append-price">


                        </div>

                        <a class="button mid-short primary add_service_related" style="margin-bottom: 38px;float:right;width:160px;cursor: pointer;"> إضافة أسعار إضافيه <span style="font-size:15px;">+</span></a>
                        <div class="clear"></div>
                         <div class="numbers-items">
                             <div class="input-container numbers-item">
                                 <label for="price" class="rl-label requiredcostom">المقاس</label>
                                 <div class="items">
                                     <input style="width: 70%;float: right;border-radius: 0 3px 3px 0;" type="number" value="{{ old("m") }}" id="m" name="m" requiredcostom>

                                     <label style="width: 30%;margin:0;float: right;" for="seller_add_service_Sub_Category" class="select-block">
                                         <select id="w" name="w" style="border-right: none;border-radius: 3px 0 0 3px;">
                                             <option  {{ old("w") == 0  ? 'selected': '' }} value="0" selected disabled>الوحده</option>
                                             <option {{ old("w") == "غ"  ? 'selected': '' }} value="غ">غ</option>
                                             <option {{ old("w") == "كغ"  ? 'selected': '' }} value="كغ">كغ</option>
                                             <option {{ old("w") == "سم"  ? 'selected': '' }} value="سم">سم</option>
                                             <option {{ old("w") == "م"  ? 'selected': '' }} value="م">م</option>
                                         </select>
                                         <!-- SVG ARROW -->
                                         <svg class="svg-arrow">
                                             <use xlink:href="#svg-arrow"></use>
                                         </svg>
                                         <!-- /SVG ARROW -->
                                     </label>
                                     @if($errors->has('m'))
                                         <span class="errors">
                                            @foreach($errors->get('m') as $er)
                                                 {{$er}}
                                             @endforeach
                                        </span>
                                     @endif

                                     @if($errors->has('w'))
                                         <span class="errors" style="float: left; margin-left: 10px;">
                                            @foreach($errors->get('w') as $er)
                                                 {{$er}}
                                             @endforeach
                                        </span>
                                     @endif

                                     <input id="mk-input" style="display:none" name="sku">
                                     <input id="slug-input" style="display:none" name="slug">
                                 </div>
                             </div>

                             <div class="input-container numbers-item">
                                 <label for="branch_name" class="rl-label requiredcostom">إسم المعرض </label>
                                 <input type="text" id="branch_name" name="branch_name" value="{{old('branch_name')}}" requiredcostom>
                                 @if($errors->has('branch_name'))
                                     <span class="errors">
                                    @foreach($errors->get('branch_name') as $er)
                                         {{$er}}
                                     @endforeach
                                 </span>
                                 @endif
                             </div>

                         </div>
                        <div class="clear"></div>


                        <div class="input-container">
                            <label for="trans" class="rl-label requiredcostom">الشحن</label>
                            <label for="trans" class="select-block">
                                <select name="trans" requiredcostom>
                                        <option {{ old("trans") == 0  ? 'selected': '' }} value="0" disabled selected>إختر الشحن...</option>
                                        <option {{ old("trans") == 1  ? 'selected': '' }} value="1">مجاني</option>
                                        <option {{ old("trans") == 2  ? 'selected': '' }} value="2">يحدد من خلال الموقع</option>
                                </select>
                                <!-- SVG ARROW -->
                                <svg class="svg-arrow">
                                    <use xlink:href="#svg-arrow"></use>
                                </svg>
                                <!-- /SVG ARROW -->
                                @if($errors->has('trans'))
                                    <span class="errors">
                                    @foreach($errors->get('trans') as $er)
                                            {{$er}}
                                        @endforeach
                                 </span>
                                @endif
                            </label>
                        </div>



						<!-- INPUT CONTAINER -->
						<div class="input-container">
							<label class="rl-label requiredcostom">حمل صوره أو فيديو</label>
							<!-- UPLOAD FILE -->
							<div class="upload-file">
								<div class="upload-file-actions">
									<a  id="productimg" class="button mid-short btn-dowload" style="width: 120px;cursor: pointer">تحميل ...</a>
									<p></p>
									<input id="inpt-productimg" type="file" name="attachment[]" multiple="yes" requiredcostom style="visibility: hidden; opacity: 0;">
                                </div>
								<div class="upload-file-progress" style="display: none">
									<!-- BADGE PROGRESS -->
									<div class="upload-bar">
										<div class="upload-pg1"></div>
									</div>
									<!-- /BADGE PROGRESS -->
									<span style="line-height: 1.8;float: right;margin-right: 12px;">%</span><span class="text-header timer" data-from="0" data-to="100"
									   data-speed="1500" data-refresh-interval="50" style="margin-right: 3px !important;"></span>
									<span href="" class="button dark-light square">
										<img src="{{asset('website/')}}/images/dashboard/close-icon-small.png" id="close-dwn" alt="close-icon">
									</span>
								</div>
							</div>
                            @if($errors->has('attachment.0'))
                                <span class="errors">
                                @foreach($errors->get('attachment.0') as $er)
                                    {{$er}}
                                @endforeach
                                </span>
                            @endif
                            @if($errors->has('attachment'))
                                <span class="errors">
                                @foreach($errors->get('attachment.0') as $er)
                                        {{$er}}
                                    @endforeach
                                </span>
                            @endif

							<!-- UPLOAD FILE -->
						</div>
						<!-- /INPUT CONTAINER -->

                        <div class="service_related_section">

                        </div>
                        <button class="button mid dark" type="submit" id="uploadserverbtn">إضافة <span class="primary">المنتج !</span></button>
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
        <!-- xmAlert -->
        <script src="{{asset("website/js/vendor/jquery.xmalert.min.js")}}"></script>

        <!-- XM LineFill -->
        <script src="{{asset('website/js/vendor/jquery.xmlinefill.min.js')}}"></script>
        <!-- Dashboard UploadItem -->
        <script src="{{asset('website/js/dashboard-uploaditem.js')}}"></script>
    <!-- Dashboard Purchases -->
    <script src="{{asset('website/js/dashboard-purchases.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countto/1.2.0/jquery.countTo.js"></script>

    <script>
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
        $(".product_created").xmalert({
            x: 'left',
            y: 'top',
            xOffset: 30,
            yOffset: 30,
            alertSpacing: 40,
            lifetime: 6000,
            fadeDelay: 0.3,
            template: 'messageSuccess',
            title: 'نجح',
            paragraph: 'تم إضافة المنتج بنجاح',
        });

        $('.add_service_related').click(function () {
            let content = "\t\t\t\t\t\t\t\t<div class=\"devlope-service\">\n" +
                "\t\t\t\t\t\t\t\t\t\t<div class=\"input-container\">\n" +
                "\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"price\" class=\"rl-label \">النص</label>\n" +
                "\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"name\" name=\"name\" value=\"{{old('name')}}\" requiredcostom>\n" +
                "\t\t\t\t\t\t\t\t\t\t</div>\n" +
                "\t\t\t\t\t\t\t\t\t<div class=\"inputs-price\">\n" +
                "\t\t\t\t\t\t\t\t\t\t\t\n" +
                "\t\t\t\t\t\t\t\t\t\t\t<div class=\"inpt-item input-container\">\n" +
                "\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"price\" class=\"rl-label \">+يوم </label>\n" +
                "\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"name\" name=\"name\" value=\"{{old('name')}}\" requiredcostom>\n" +
                "\t\t\t\t\t\t\t\t\t\t\t</div>\n" +
                "\t\t\t\t\t\t\t\t\t\t\t<div class=\"inpt-item input-container\">\n" +
                "\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"price\" class=\"rl-label \">الكميه</label>\n" +
                "\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"name\" name=\"name\" value=\"{{old('name')}}\" requiredcostom>\n" +
                "\t\t\t\t\t\t\t\t\t\t\t</div>\n" +
                "\t\t\t\t\t\t\t\t\t\t\t<div class=\"inpt-item input-container\">\n" +
                "\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"price\" class=\"rl-label \">السعر</label>\n" +
                "\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" id=\"name\" name=\"name\" value=\"{{old('name')}}\" requiredcostom>\n" +
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

        $("#productimg").click(function ()  {
            $("#inpt-productimg").click();
        });



        $('#register-form6').submit(() => {
            let m = $("#m").val();
            let w = $("#w").val();
            $("#mk-input").val(m + w);
            $("#slug-input").val($("#name_and_type").val());
        });

        $("#inpt-productimg").change(() => {

            var files = $("#inpt-productimg")[0].files;

            var text = $("#inpt-productimg").val();

		    // console.log(files);

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
		    $(".upload-file-actions p ").text(' عدد الملفات '+files.length);
		});

        $("#close-dwn").click(function () {
            $(".upload-file-actions p ").text(' ');
            $(".upload-file-progress").hide();
		});

    </script>

@endpush