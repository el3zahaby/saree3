<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('icon') !!}
        </label>
        {!! Form::text('icon',null,array('placeholder'=> __('Example')." : icon-like",'class' => 'form-control')) !!}
    </div>
</div>



<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Title') !!}
        </label>
        {!! Form::text('title',null,array('placeholder'=> __('Title'),'class' => 'form-control')) !!}
    </div>
</div>



<div class="col-lg-12">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('body') !!}
        </label>
        {!! Form::textarea('body',null, array('placeholder' =>  __('body'),'class' => 'form-control', 'id' => 'body')) !!}
    </div>
</div>


<div class="col-lg-12">
    <div class="form-layout-footer">
        <button class="btn btn-info">@lang('Submit Form')</button>
        <button class="btn btn-secondary" href="{{route('backend.sliders.index')}}">@lang('Cancel')</button>
    </div><!-- form-layout-footer -->
</div>