@extends('backend.layout')

@section('content')

<div class="br-section-wrapper">
    <h6 class="br-section-label">@lang('Add') {{ str_plural(__('Component'), 1) }}</h6>
<!--    <p class="br-section-text">@lang('Description')</p>-->

    <div class="table-wrapper">

        {{Form::open(['route'=>['backend.menu.store'],'method'=>'POST' , 'files' => true])}}
        <div class="form-layout form-layout-1">
            <div class="row mg-b-25">

                @include('backend.menu.fields')
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>
@endsection
