@extends('backend.layout')

@push('links')

@endpush

@section('content')
<div class="br-section-wrapper">
    <div class="row mg-b-10">
        <div class="col-md-2">
            <a href="{{ route('backend.subscriptions.create') }}" class="btn btn-outline-dark form-control"><i class="fa fa-plus"></i> @lang('Add New')</a>
        </div>
    </div>
    <div class="table-wrapper">
        {{Form::open(['route'=>'backend.subscriptions.updateAll','method'=>'post'])}}

        <table id="datatable" class="table display responsive nowrap">
            <thead>
            <tr>
                <th class="wd-10-force"></th>
                <th class="">@lang('#')</th>
                <th class="">@lang('Name')</th>
                <th class="">@lang('Plan')</th>
                <th class="">@lang('User')</th>
                <th class="">@lang('Status')</th>
                <th class="">@lang('Renew at')</th>
                <th class="wd-100">@lang('Created at')</th>
            </tr>
            </thead>
        </table>

        <div class="row mg-t-20">
            <div class="col-md-6">
                <select name="action" id="action" class="input-sm form-control w-sm inline v-middle"
                        required>
                    <option value="">@lang('Choose ...')</option>
                    <option value="delete">@lang('Delete selected')</option>
                </select>
            </div>
            <div class="col-md-3">
                <a href="" class="btn btn-primary tx-12 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#dialog">@lang('Save')</a>
            </div>
            <div class="col-md-3">
                <button class="btn btn-outline-dark form-control"  type="button" id="checkAll">@lang('Check All')</button>
            </div>
        </div>

        <div id="dialog" class="modal fade">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-body tx-center pd-y-20 pd-x-20">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="icon icon ion-ios-close-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                        <h4 class="tx-danger  tx-semibold mg-b-20">@lang('Are you sure?')</h4>
                        <p class="mg-b-20 mg-x-20">@lang('You will remove selected item forever.')</p>
                        <button type="submit"  class="btn btn-danger tx-12 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" >
                            @lang('Continue')</button>
                    </div><!-- modal-body -->
                </div><!-- modal-content -->
            </div><!-- modal-dialog -->
        </div><!-- modal -->
        {{Form::close()}}
    </div>

</div>
@endsection

@push('scripts')
<script>
    loadjs([
        '{{ url('backend/lib/datatables.net/js/jquery.dataTables.min.js') }}',
        '{{ url('backend/lib/datatables.net-dt/js/dataTables.dataTables.min.js') }}',
        '{{ url('backend/lib/datatables.net-responsive/js/dataTables.responsive.min.js') }}',
        '{{ url('backend/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js') }}'
    ], function() {
        $('#datatable').DataTable({
            bLengthChange: false,
            searching: false,
            processing: true,
            serverSide: true,
            ajax: '{!! route('backend.subscriptions.datatable') !!}',
            columns: [
                {
                    orderable: false,
                    sortable: false,
                    searchable: false,
                    data: null,
                    render: function (data) {
                        return  '<label class="ckbox"><input id="checkAll" name="ids['+ data.id +']" type="checkbox"><span></span></label>'
                    }

                },
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'plan_id', name: 'plan_id'},
                {data: 'user_id', name: 'user_id'},
                {data: 'status', name: 'status'},
                {data: 'renew_at', name: 'renew_at'},
                {data: 'created_at', name: 'created_at'},

            ],
            order: [[2, 'desc']],

        });
    });


    $("#checkAll").click(function () {
        $('input:checkbox').not(this).trigger('click');
    });

</script>
@endpush
