@extends('seller_dashboard.master')

@push('css')
    <style>
        .birt-date .item {
            width: 32.33333%;
            float: left;
            clear:none !important;
            margin-left: 1%;
        }

    </style>
@endpush

@section('content')

        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- HEADLINE -->
            <div class="headline buttons primary">
                <h4>إعددات الحساب </h4>

            </div>
            <!-- /HEADLINE -->
        <!-- FORM BOX ITEMS -->
            <div class="form-box-items" style="overflow: hidden;">
                <!-- FORM BOX ITEM -->
                <div class="form-box-item" style="overflow: hidden;">

                    <h4>تعديل الملف الشخصي</h4>
                    <hr class="line-separator" style="margin-right: -26px;margin-left: -26px;">
                    <!-- PROFILE IMAGE UPLOAD -->
                    <div class="profile-image">
                        <div class="profile-image-data">
                            <figure class="user-avatar medium">
                                <img src="{{asset('images/avatars/'.user()->image)}}" alt="profile-default-image" id="output" style="height: 100%;">
                            </figure>
                            <p class="text-header">الصورة الشخصية</p>
                            <p class="upload-details">المرجو رفع صورة عالية الجودة</p>
                        </div>
                        <a  id="userimagebtn" class="button mid-short btn-dowload" style="cursor: pointer">تحميل الصورة...</a>
                    </div>
                    @if($errors->has('image'))
                        <span class="errors">
                        @foreach($errors->get('image') as $er)
                                {{$er}}
                            @endforeach
                        </span>
                    @endif
                    <!-- PROFILE IMAGE UPLOAD -->

                    <form id="profile-info-form" action="{{url('seller/settings/normal')}}" method="POST" enctype="multipart/form-data">
                        <!-- INPUT CONTAINER -->
                        @csrf
                        <input src="no" type="file" accept='image/*' name="image" id="userimage" style="visibility:hidden;opacity: 0;">

                        <!-- INPUT CONTAINER -->
                        <div class="input-container">
                            <label for="experience" class="rl-label">مجال عملك</label>
                            <select data-placeholder="إختر مجال عملك" multiple class="chosen-select" tabindex="8" name="job[]">
                                @foreach($experiences as $experience)
                                    @if($loop->index < count(user()->experiences))
                                        @if($experience->id == user()->experiences[$loop->index]->experience_info->id)
                                            <option value="{{$experience->id}}" selected>{{$experience->name}}</option>
                                        @else
                                            <option value="{{$experience->id}}" >{{$experience->name}}</option>
                                        @endif
                                    @else
                                        <option value="{{$experience->id}}" >{{$experience->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    <!-- /INPUT CONTAINER -->
                        <!-- INPUT CONTAINER -->
                        <div class="input-container">
                            <label for="profile_experience" class="rl-label required"> سنوات الخبرة</label>
                            <label for="profile_experience" class="select-block">
                                <select name="experience_year" id="profile_experience" requiredcustom>
                                    <option disabled selected>إختر سنوات الخبرة</option>
                                    @for($i = 1 ; $i <= 20 ; $i++)
                                        @if(user()->experienceyears == $i)
                                            <option value="{{$i}}" selected>{{$i}} سنة</option>
                                        @else
                                            <option value="{{$i}}">{{$i}} سنة</option>
                                        @endif
                                    @endfor

                                </select>
                                <!-- SVG ARROW -->
                                <svg class="svg-arrow">
                                    <use xlink:href="#svg-arrow"></use>
                                </svg>
                                <!-- /SVG ARROW -->
                                @if($errors->has('experience_year'))
                                <span class="errors">
                                @foreach($errors->get('experience_year') as $er)
                                    {{$er}}
                                @endforeach
                                </span>
                                @endif
                            </label>

                        </div>

                        <!-- /INPUT CONTAINER -->
                        <!-- INPUT CONTAINER -->
                        <div class="input-container">
                            <label for="experience" class="rl-label">المهارات</label>
                            <select data-placeholder="إختر مهراتك" multiple class="chosen-select" tabindex="8" name="skills[]">
                                @foreach($experiences as $experience)
                                    @if($loop->index <  count(user()->experiences))
                                        @if($experience->id == user()->experiences[$loop->index]->experience_info->id)
                                            <option value="{{$experience->id}}" selected>{{$experience->name}}</option>

                                        @else
                                            <option value="{{$experience->id}}" >{{$experience->name}}</option>
                                        @endif
                                    @else
                                        <option value="{{$experience->id}}" >{{$experience->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if($errors->has('experience'))
                            <span class="errors">
                            @foreach($errors->get('experience') as $er)
                            {{$er}}
                            @endforeach
                            </span>
                            @endif
                        </div>

                     <!-- /INPUT CONTAINER -->
                        <!-- INPUT CONTAINER -->
                        <div class="input-container">
                            <label for="certificates" class="rl-label">الشهادات</label>
                            <input type="text" id="certificates" name="certificates" placeholder="أدخل شهداتك..."  @if(user()->certificates) value="{{user()->certificates}}" @else value="{{old('certificates')}}" @endif  requiredcustom>
                            @if($errors->has('certificates'))
                            <span class="errors">
                            @foreach($errors->get('certificates') as $er)
                                {{$er}}
                            @endforeach
                            </span>
                            @endif
                        </div>

                    <!-- /INPUT CONTAINER -->

                        <!-- INPUT CONTAINER -->

                        <!-- INPUT CONTAINER -->
                        <div class="textarea-container">
                            <label for="description" class="rl-label required">الوصف</label>
                            <textarea form="profile-info-form" id="description" name="description" placeholder="Enter your description..." requiredcustom>@if(user()->description) {{user()->description}} @else {{old('description')}} @endif </textarea>
                        @if($errors->has('description'))
                            <span class="errors">
                            @foreach($errors->get('description') as $er)
                                {{$er}}
                            @endforeach
                            </span>
                        @endif
                        </div>

                    <!-- /INPUT CONTAINER -->
                    <button class="button primary" style="width:120px;float:right;margin-top:15px;">  حفظ التعديلات </button>

                    </form>
                </div>
                <!-- /FORM BOX ITEM -->

                <!-- FORM BOX ITEM -->
                <div class="form-box-item ">
                    <h4>معلومات الحساب</h4>
                    <hr class="line-separator">
                    <form id="profile-info-form2">
                        <!-- INPUT CONTAINER -->
                        <!-- /INPUT CONTAINER -->
                        <div class="input-container">
                            <label for="acc_name" class="rl-label required">الإسم الكامل</label>
                            <input type="text" id="acc_name"  value="{{user()->name}}" disabled alt="If You Want change This Field Please Contact With Help Center">
                        </div>

                        <!-- /INPUT CONTAINER -->
                        <div class="input-container">
                            <label for="profile_email" class="rl-label">البريد الإلكتروني</label>
                            <input type="email" id="profile_email" alt="If You Want change This Field Please Contact With Help Center" disabled   value="{{user()->email}}" >
                        </div>
                        <!-- /INPUT CONTAINER -->
                        <!-- INPUT CONTAINER -->
                        <div class="input-container">
                            <label for="profile_mobile" class="rl-label">الهاتف</label>
                            <input type="text" id="profile_mobile" disabled alt="If You Want change This Field Please Contact With Help Center"   value="{{user()->mobile}}" >
                        </div>


                        <!-- INPUT CONTAINER -->
                        <div class="input-container ">
                            <label for="gender" class="rl-label required">الجنس</label>
                            <label for="gender" class="select-block">
                                <select disabled id="gender" style="background-color: rgb(235, 235, 228);">
                                    <option disabled selected>إختر جنسك...</option>
                                    @foreach($gender as $g)
                                        @if(user()->gender == $loop->index)
                                            <option value="{{$loop->index}}" selected>{{$g}}</option>
                                        @else
                                            <option value="{{$loop->index}}">{{$g}}</option>
                                        @endif
                                    @endforeach
                                </select>

                            </label>
                        </div>


                        <!-- INPUT CONTAINER -->
                        <label for="new_email" class="rl-label">تاريخ الميلاد</label>

                        <div class="birt-date">
                            <div class="item input-container triple">
                                <label for="year" class="rl-label">السنة</label>
                                <label for="year" class="select-block">
                                    <select  id="year" style="background-color: rgb(235, 235, 228);">
                                        <option  selected>إختر السنة...</option>
                                        @for($i = 1900;$i <= \Carbon\Carbon::now()->format('Y') ; $i++)
                                            @if(user()->dirthyear == $i)
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

                            </div>
                            <!-- /INPUT CONTAINER -->
                            <!-- INPUT CONTAINER -->
                            <div class="item  input-container triple">
                                <label for="month" class="rl-label">الشهر</label>
                                <label for="month" class="select-block">
                                    <select  id="month" style="background-color: rgb(235, 235, 228);">
                                        <option  selected>إختر الشهر...</option>
                                        @for($i = 1;$i <= 12; $i++)
                                            @if(user()->dirthmonth == $i)
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

                            </div>
                            <!-- /INPUT CONTAINER -->
                            <!-- INPUT CONTAINER -->
                            <div class="item  input-container triple">
                                <label for="day" class="rl-label ">اليوم</label>
                                <label for="day" class="select-block">
                                    <select  id="day" style="background-color: rgb(235, 235, 228);">
                                        <option  selected>إختر اليوم...</option>
                                        @for($i = 1;$i <= 31; $i++)
                                            @if(user()->dirthday == $i)
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

                            </div>
                            <div class="clear"></div>
                            <!-- /INPUT CONTAINER -->
                        </div>

                        <div class="input-container">
                            <label  class="rl-label">التاريخ الحالي</label>
                            <input type="text" disabled  value="{{user()->created_at}}" >
                        </div>
                        <!-- /INPUT CONTAINER -->
                        <!-- INPUT CONTAINER -->
                        <div class="input-container">
                            <label for="profile_city1" class="rl-label required">الدولة</label>
                            <label for="profile_city1" class="select-block">
                                <select disabled name="city" id="profile_city1" requiredcustom>
                                           <option value="2" selected>{{json_decode(get_country_city(user()->last_ip))->country}}</option>
                                </select>
                                <!-- SVG ARROW -->
                                <svg class="svg-arrow">
                                    <use xlink:href="#svg-arrow"></use>
                                </svg>
                                <!-- /SVG ARROW -->
                                @if($errors->has('country'))
                                    <span class="errors">
                                    @foreach($errors->get('country') as $er)
                                        {{$er}}
                                    @endforeach
                                    </span>
                                @endif
                            </label>
                        </div>
                        <!-- /INPUT CONTAINER -->
                        <!-- INPUT CONTAINER -->
                        <label for="profile_country1" class="rl-label required">المدينة</label>
                        <label for="profile_country1" class="select-block">
                            <select disabled name="country" id="profile_country1" required style="background-color: rgb(235, 235, 228);">
                                        <option disabled value="1" selected>{{json_decode(get_country_city(user()->last_ip))->city}}</option>
                            </select>
                            <!-- SVG ARROW -->
                            <svg class="svg-arrow">
                                <use xlink:href="#svg-arrow"></use>
                            </svg>
                            <!-- /SVG ARROW -->
                        </label>
                        @if($errors->has('city'))
                            <span class="errors">
                                @foreach($errors->get('city') as $er)
                                    {{$er}}
                                @endforeach
                        </span>
                    @endif
                    <!-- INPUT CONTAINER -->
                    </form>
                </div>
                <!-- /FORM BOX ITEM -->
                <!-- FORM BOX ITEM -->
                <div class="form-box-item " style="float: left;overflow: hidden;">
                    <h4>تغير كلمة المرور</h4>
                    <hr class="line-separator">
                    <form id="profile-info-form3" action="{{url('/')}}/seller/settings/passwords" method="post">
                        <!-- INPUT CONTAINER -->
                        {{csrf_field()}}
                        <div class="input-container">
                            <label for="profile_seller_pass_current" class="rl-label">كلمة المرور الحالية</label>
                            <div class="status_div">
                                <input type="password" id="profile_seller_pass_current" name="current_password" placeholder="أدخل كلمة المرور الحالية..." requiredcustom>

                            </div>
                            @if($errors->has('current_password'))
                                <span class="errors">
                                @foreach($errors->get('current_password') as $er)
                                    {{$er}}
                                @endforeach
                                </span>
                            @endif
                        </div>

                    <!-- /INPUT CONTAINER -->
                        <!-- INPUT CONTAINER -->
                        <div class="input-container ">
                            <label for="profile_seller_pass_new" class="rl-label">كلمة المرور الجديد</label>
                            <div class="status_div">
                                <input type="password" id="profile_seller_pass_new" name="new_password" placeholder="أدخل كلمة المرور الجديدة..." requiredcustom>

                            </div>
                            @if($errors->has('new_password'))
                            <span class="errors">
                                @foreach($errors->get('new_password') as $er)
                                    {{$er}}
                                @endforeach
                            </span>
                            @endif
                        </div>
                    <!-- /INPUT CONTAINER -->
                        <!-- INPUT CONTAINER -->
                        <div class="input-container ">
                            <label for="profile_seller_pass_new_re" class="rl-label">تأكيد كلمة المرور الجديدة</label>
                            <div class="status_div">
                                <input type="password" id="profile_seller_pass_new_re" name="new_password_repeat" placeholder="أدخل كلمة المرور لتأكيد..." requiredcustom>

                            </div>
                            @if($errors->has('new_password_repeat'))
                            <span class="errors">
                            @foreach($errors->get('new_password_repeat') as $er)
                                {{$er}}
                            @endforeach
                            </span>
                            @endif
                        </div>

                    <!-- /INPUT CONTAINER -->
                        <button class="button primary" type="submit" style="width:120px;float:right">تغيير</button>
                    </form>
                </div>
                <!-- /FORM BOX ITEM -->


            </div>
            <!-- /FORM BOX -->
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
    <!-- User Quickview Dropdown -->
    <script src="{{asset('website/')}}/js/user-board.js"></script>
    <!-- Alerts Demo -->
    <script src="{{asset('website/')}}/js/alerts-demo.js"></script>
    <!-- xmAlert -->
    <script src="{{asset('website/')}}/js/vendor/jquery.xmalert.min.js"></script>
     @if(session()->has('success'))
        <div class="succ-alert"></div>
    @endif

    <script>
        $('.succ-alert').xmalert({
            x: 'right',
            y: 'top',
            xOffset: 30,
            yOffset: 30,
            alertSpacing: 40,
            lifetime: 6000,
            fadeDelay: 0.3,
            template: 'messageSuccess',
            title: 'نجح !',
            paragraph: 'تم تعديل معلومات الحساب بنجاح',
        });

        $('#userimagebtn').click(function () {
            $('#userimage').click();
        });

        $(".close-btn").click(function () {
            $(".succ-alert").fadeOut(1000);
        });

    </script>
@endpush



