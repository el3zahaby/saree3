@extends('seller_dashboard.master')

@push('css')
    <link rel="stylesheet" href="{{asset('website/css/vendor/magnific-popup.css')}}">
@endpush

@section('content')

    <!-- DASHBOARD CONTENT -->
    <div class="dashboard-content">
        <!-- HEADLINE -->
        <div class="headline simple primary">
            <h4>سحب الأرباح</h4>
        </div>
        <!-- /HEADLINE -->

        <!-- FORM BOX ITEMS -->
        <div class="form-box-items">
            <!-- FORM BOX ITEM -->
            <div class="form-box-item">
                <h4>Withdraw Earnings</h4>
                <hr class="line-separator">
                <form id="withdraw-form">
                    <!-- INPUT CONTAINER -->
                    <div class="input-container">
                        <label for="amount" class="rl-label required">Amount to Withdraw ($745.00 Maximum)</label>
                        <input type="number" id="amount" name="amount" min="0" step="any" placeholder="Enter the amount you want to withdraw...">
                    </div>
                    <!-- /INPUT CONTAINER -->
                    <hr class="line-separator">

                    <!-- INPUT CONTAINER -->
                    <div class="input-container">
                        <label class="rl-label required">إختر طريقة السحب </label>
                        <!-- RADIO -->
                        <input type="radio" id="paypal" name="payment_method" value="pp" checked>
                        <label for="paypal">
                            <span class="radio primary"><span></span></span>
                            Paypal
                        </label>
                        <!-- /RADIO -->

                        <!-- RADIO -->
                        <input type="radio" id="skrill" name="payment_method" value="sk">
                        <label for="skrill">
                            <span class="radio primary"><span></span></span>
                            Skrill
                        </label>
                        <!-- /RADIO -->

                        <!-- RADIO -->
                        <input type="radio" id="int_transf" name="payment_method" value="it">
                        <label for="int_transf">
                            <span class="radio primary"><span></span></span>
                            International Transfer ($200 Minimum)
                        </label>
                        <!-- /RADIO -->
                    </div>
                    <!-- /INPUT CONTAINER -->

                    <hr class="line-separator">

                    <!-- INPUT CONTAINER -->
                    <div class="input-container">
                        <label for="pp_ac" class="rl-label required">حساب بيبال الخاص بك</label>
                        <input type="text" id="pp_ac" name="pp_ac" placeholder="أدخل حساب بيبال الخاص بك...">
                    </div>
                    <!-- /INPUT CONTAINER -->

                    <!-- INPUT CONTAINER -->
                    <div class="input-container">
                        <label for="pwd_ac" class="rl-label required">تأكيد كلمة المرور</label>
                        <input type="password" id="pwd_ac" name="pwd_ac" placeholder="تأكيد كلمة المرور للحماية...">
                    </div>
                    <!-- /INPUT CONTAINER -->

                    <hr class="line-separator">

                    <button class="button big dark">طلب <span class="primary">السحب</span></button>
                </form>
            </div>
            <!-- /FORM BOX ITEM -->

            <!-- FORM BOX ITEM -->
            <div class="form-box-item withdraw-history">
                <h4>Withdrawal History</h4>
                <hr class="line-separator">
                <!-- TRANSACTION HISTORY -->
                <div class="transaction-history">
                    <!-- TRANSACTION HISTORY ITEM -->
                    <div class="transaction-history-item">
                        <div class="transaction-history-item-date">
                            <p>Mar 27th, 2014</p>
                        </div>
                        <div class="transaction-history-item-mail">
                            <p>jhonny_fisher@paypal.com</p>
                        </div>
                        <div class="transaction-history-item-amount">
                            <p class="text-header">$537,20</p>
                        </div>
                        <div class="transaction-history-item-status">
                            <p class="text-header">Pending</p>
                        </div>
                    </div>
                    <!-- /TRANSACTION HISTORY ITEM -->

                    <!-- TRANSACTION HISTORY ITEM -->
                    <div class="transaction-history-item">
                        <div class="transaction-history-item-date">
                            <p>Feb 25th, 2014</p>
                        </div>
                        <div class="transaction-history-item-mail">
                            <p>jhonny_fisher@paypal.com</p>
                        </div>
                        <div class="transaction-history-item-amount">
                            <p class="text-header">$235,00</p>
                        </div>
                        <div class="transaction-history-item-status">
                            <p class="text-header primary">Paid</p>
                        </div>
                    </div>
                    <!-- /TRANSACTION HISTORY ITEM -->

                    <!-- TRANSACTION HISTORY ITEM -->
                    <div class="transaction-history-item">
                        <div class="transaction-history-item-date">
                            <p>Jan 28th, 2014</p>
                        </div>
                        <div class="transaction-history-item-mail">
                            <p>jhonny_fisher@paypal.com</p>
                        </div>
                        <div class="transaction-history-item-amount">
                            <p class="text-header">$1200,85</p>
                        </div>
                        <div class="transaction-history-item-status">
                            <p class="text-header primary">Paid</p>
                        </div>
                    </div>
                    <!-- /TRANSACTION HISTORY ITEM -->

                    <!-- TRANSACTION HISTORY ITEM -->
                    <div class="transaction-history-item">
                        <div class="transaction-history-item-date">
                            <p>Dec 26th, 2013</p>
                        </div>
                        <div class="transaction-history-item-mail">
                            <p>jhonny_fisher@paypal.com</p>
                        </div>
                        <div class="transaction-history-item-amount">
                            <p class="text-header">$406,08</p>
                        </div>
                        <div class="transaction-history-item-status">
                            <p class="text-header primary">Paid</p>
                        </div>
                    </div>
                    <!-- /TRANSACTION HISTORY ITEM -->

                    <!-- TRANSACTION HISTORY ITEM -->
                    <div class="transaction-history-item">
                        <div class="transaction-history-item-date">
                            <p>Nov 29th, 2013</p>
                        </div>
                        <div class="transaction-history-item-mail">
                            <p>jhonny_fisher@paypal.com</p>
                        </div>
                        <div class="transaction-history-item-amount">
                            <p class="text-header">$97,60</p>
                        </div>
                        <div class="transaction-history-item-status">
                            <p class="text-header primary">Paid</p>
                        </div>
                    </div>
                    <!-- /TRANSACTION HISTORY ITEM -->

                    <!-- TRANSACTION HISTORY ITEM -->
                    <div class="transaction-history-item">
                        <div class="transaction-history-item-date">
                            <p>Oct 24th, 2013</p>
                        </div>
                        <div class="transaction-history-item-mail">
                            <p>jhonny_fisher@paypal.com</p>
                        </div>
                        <div class="transaction-history-item-amount">
                            <p class="text-header">$512,64</p>
                        </div>
                        <div class="transaction-history-item-status">
                            <p class="text-header primary">Paid</p>
                        </div>
                    </div>
                    <!-- /TRANSACTION HISTORY ITEM -->
                </div>
                <!-- /TRANSACTION HISTORY -->
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