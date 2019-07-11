
<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Name' )!!}
        </label>
        {!! Form::text('name',null, array('placeholder' =>  __('Name' ),'class' => 'form-control')) !!}
    </div>
</div>


<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Slug' )!!}
        </label>
        {!! Form::text('slug',null, array('placeholder' =>  __('Slug' ),'class' => 'form-control')) !!}
    </div>
</div>




<div class="col-lg-12">
    <div class="form-layout-footer">
        <button class="btn btn-info">@lang('Submit Form')</button>
        <button class="btn btn-secondary" href="{{route('backend.sliders.index')}}">@lang('Cancel')</button>
    </div><!-- form-layout-footer -->
</div>