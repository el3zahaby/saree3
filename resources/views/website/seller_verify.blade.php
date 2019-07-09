@extends('website.layout')

@push('links')

@endpush

@section('content')



<!-- SECTION HEADLINE -->
<div class="section-headline-wrap">
    <div class="section-headline">
        <h2>Accounts Verifications</h2>
        <p>Home<span class="separator">/</span><span class="current-section">Boxes</span></p>
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
                <h2>تأكيد حسابك</h2>
                <p>المرجو وضع الكود الدي سيصلك في هاتفك</p>
            </div>
            <!-- /FORM POPUP HEADLINE -->

            <!-- FORM POPUP CONTENT -->
            <div class="form-popup-content">
              
                <form  action="{{url('/')}}/join/seller/verify" method="post">
                     {{csrf_field()}}
                    <label for="verify_code" class="rl-label required">كود تأكيد الحساب</label>
                    <input type="text" id="verify_code" name="verify_code" placeholder="كود تأكيد الحساب" maxlength="5" min="5">
                   @if($errors->has('verify_code'))
                    <span class="errors">
                    @foreach($errors->get('verify_code') as $er)
                        {{$er}}
                    @endforeach
                    </span>
                    @endif
                    
                    <button class="button mid dark">Verify</button>
                </form>
            </div>
            <!-- /FORM POPUP CONTENT -->
        </div>
        <!-- /FORM POPUP -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- /SECTION -->


@endsection

@push('scripts')

@endpush
