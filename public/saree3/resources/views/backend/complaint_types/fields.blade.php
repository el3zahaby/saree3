<div class="col-lg-12">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Name') !!}
        </label>
        {!! Form::text('name',null, array('placeholder' =>  __('Name'),'class' => 'form-control')) !!}
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Description') !!}
        </label>
        {!! Form::textarea('description',null, array('placeholder' =>  __('Description'),'class' => 'form-control')) !!}
    </div>
</div>


<div class="col-lg-12">
    <div class="form-layout-footer">
        <button class="btn btn-info">@lang('Submit Form')</button>
        <button class="btn btn-secondary" href="{{route('backend.complaint_types.index')}}">@lang('Cancel')</button>
    </div><!-- form-layout-footer -->
</div>