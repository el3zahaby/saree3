@extends('backend.layout')

@section('content')

    <div class="br-section-wrapper">
        <h6 class="br-section-label mg-b-30">@lang('Edit') {{ str_plural($title, 1) }}</h6>
        {{--<p class="br-section-text">@lang('Description')</p>--}}

        <div class="table-wrapper">

            {{Form::model($data,['route'=>['backend.staff.update', $data->id],'method'=>'PUT'])}}
            <div class="form-layout form-layout-1">
                <div class="row mg-b-25">

                    @include('backend.staff.fields')
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
@endsection
