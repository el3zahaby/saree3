@extends('backend.layout')

@push('links')

@endpush

@section('content')
<div class="br-section-wrapper">
    <div class="row mg-b-10">
        <div class="col-md-12 mg-b-10">
            @lang('Complaints of Users')
        </div>
    </div>
    <div class="table-wrapper">
        {{Form::open(['route'=>'backend.complaints.updateAll','method'=>'post'])}}

        <table id="datatable" class="table display responsive nowrap">
            <thead>
            <tr>
                <th class="wd-10-force"></th>
                <th class="">@lang('#')</th>
                <th class="">@lang('User')</th>
                <th class="">@lang('Model')</th>
                <th class="">@lang('Complain Type')</th>
                <th class="">@lang('Status')</th>
                <th class="">@lang('Date')</th>
                <th class="">@lang('Details')</th>
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
                    <option value="activate">@lang('Active Selected')</option>
                    <option value="block">@lang('Inactive Selected')</option>
                </select>
            </div>
            <div class="col-md-3">
                <a href="" id="submit_show_msg" class="btn btn-primary tx-12 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#dialog" style="display: none">@lang('Save')</a>
                <button href=""  id="submit_all" class="btn btn-primary tx-12 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" >@lang('Save')</button>
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
            ajax: '{!! route('backend.complaints.datatable') !!}',
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
                {data: 'user_id', name: 'user_id'},
                {data: 'about_type', name: 'about_type'},
                {data: 'complain_type_id', name: 'complain_type_id'},
                {data: 'status', name: 'status'},
                {data: 'date', name: 'date'},
                {data: 'details', name: 'details'},
                {data: 'created_at', name: 'created_at'},

            ],
            order: [[2, 'desc']],

        });
    });


    $("#checkAll").click(function () {
        $('input:checkbox').not(this).trigger('click');
    });
    $("#action").change(function () {
        if (this.value == "delete") {
            $("#submit_all").css("display", "none");
            $("#submit_show_msg").css("display", "inline-block");
        } else {
            $("#submit_all").css("display", "inline-block");
            $("#submit_show_msg").css("display", "none");
        }
    });

</script>
@endpush
