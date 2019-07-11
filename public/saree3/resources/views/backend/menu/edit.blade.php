@extends('backend.layout')

@section('content')

<div class="br-section-wrapper">
    <h6 class="br-section-label">@lang('Edit') {{ str_plural($title, 1) }}</h6>
<!--    <p class="br-section-text">@lang('Description')</p>-->

    <div class="table-wrapper">

        {{Form::model($data,['route'=>['backend.menu.update', $data->id],'method'=>'PUT'])}}
            <div class="form-layout form-layout-1">
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="name" class="form-control-label">
                                {!!  __('url') !!}
                            </label>
                            {!! Form::number('order',null,array('placeholder'=> __('Order'),'class' => 'form-control')) !!}
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-12">
                        <div class="form-layout-footer">
                            <button class="btn btn-info">@lang('Submit Form')</button>
                            <button class="btn btn-secondary" href="{{route('backend.menu.index')}}">@lang('Cancel')</button>
                        </div><!-- form-layout-footer -->
                    </div>
                </div>
            </div>
        {{Form::close()}}

    </div>
</div>
@endsection
