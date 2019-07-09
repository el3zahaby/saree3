@extends('backend.layout')

@section('content')

<div class="br-section-wrapper">
    <h6 class="br-section-label">@lang('Add') @lang(str_plural(title_case(str_replace('_',' ',$title))))</h6>
<!--    <p class="br-section-text">@lang('Description')</p>-->

    <div class="table-wrapper">

        {{Form::open(['route'=>['backend.complaint_types.store'],'method'=>'POST' ])}}
        <div class="form-layout form-layout-1">
            <div class="row mg-b-25">

                @include('backend.complaint_types.fields')
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>
@endsection
