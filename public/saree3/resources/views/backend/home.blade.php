@extends('backend.layout')

@push('links')

@endpush

@section('content')
    <div class="row no-gutters widget-1 shadow-base">
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Today's Sales</h6>
                    <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="card-body">
                    <span class="spark">5,3,9,6,5,9,7,3,5,2</span>
                    <span>$1,850</span>
                </div><!-- card-body -->
                <div class="card-footer">
                    <div>
                        <span class="tx-11">Gross Sales</span>
                        <h6 class="tx-inverse">$2,210</h6>
                    </div>
                    <div>
                        <span class="tx-11">No. of Items</span>
                        <h6 class="tx-inverse">68</h6>
                    </div>
                    <div>
                        <span class="tx-11">Tax Return</span>
                        <h6 class="tx-danger">$320</h6>
                    </div>
                </div><!-- card-footer -->
            </div><!-- card -->
        </div><!-- col-3 -->
        <div class="col-sm-6 col-lg-3 mg-t-1 mg-sm-t-0">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">This Week's Sales</h6>
                    <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="card-body">
                    <span class="spark">2,8,7,8,2,6,5,3,5,2</span>
                    <span class="tx-medium tx-inverse tx-32">$3,324</span>
                </div><!-- card-body -->
                <div class="card-footer">
                    <div>
                        <span class="tx-11">Gross Sales</span>
                        <h6 class="tx-inverse">$5,471</h6>
                    </div>
                    <div>
                        <span class="tx-11">Purchase</span>
                        <h6 class="tx-inverse">211</h6>
                    </div>
                    <div>
                        <span class="tx-11">Tax Return</span>
                        <h6 class="tx-danger">$1,988</h6>
                    </div>
                </div><!-- card-footer -->
            </div><!-- card -->
        </div><!-- col-3 -->
        <div class="col-sm-6 col-lg-3 mg-t-1 mg-lg-t-0">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">This Month's Sales</h6>
                    <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="card-body">
                    <span class="spark">8,6,5,9,8,4,9,3,5,9</span>
                    <span>$12,324</span>
                </div><!-- card-body -->
                <div class="card-footer">
                    <div>
                        <span class="tx-11">Gross Sales</span>
                        <h6 class="tx-inverse">$18,433</h6>
                    </div>
                    <div>
                        <span class="tx-11">Purchase</span>
                        <h6 class="tx-inverse">654</h6>
                    </div>
                    <div>
                        <span class="tx-11">Tax Return</span>
                        <h6 class="tx-danger">$3,314</h6>
                    </div>
                </div><!-- card-footer -->
            </div><!-- card -->
        </div><!-- col-3 -->
        <div class="col-sm-6 col-lg-3 mg-t-1 mg-lg-t-0">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Overall Sales</h6>
                    <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="card-body">
                    <span class="spark">8,3,9,6,3,7,1,3,8,5</span>
                    <span>$32,324</span>
                </div><!-- card-body -->
                <div class="card-footer">
                    <div>
                        <span class="tx-11">Gross Sales</span>
                        <h6 class="tx-inverse">$56,433</h6>
                    </div>
                    <div>
                        <span class="tx-11">Purchases</span>
                        <h6 class="tx-inverse">1,654</h6>
                    </div>
                    <div>
                        <span class="tx-11">Tax Return</span>
                        <h6 class="tx-danger">$15,354</h6>
                    </div>
                </div><!-- card-footer -->
            </div><!-- card -->
        </div><!-- col-3 -->
    </div><!-- row -->

@endsection

@push('scripts')
    <script>
        loadjs([
        '{{ url('backend/lib/jquery-sparkline/jquery.sparkline.min.js') }}',
        ], function() {
            $('.spark').sparkline('html', {
                type: 'bar',
                barWidth: 8,
                height: 30,
                barColor: '#29B0D0',
                chartRangeMax: 12
            });

        });
    </script>
@endpush
