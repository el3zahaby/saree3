<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Name') !!}
        </label>
        {!! Form::text('name',null, array('placeholder' =>  __('Name'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Area Type') !!}
        </label>
        {!! Form::select('area_type', \App\Models\Area::$AreaTypes,null, array('placeholder' =>  __('Area Type'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Parent') !!}
        </label>
        {!! Form::select('parent_id', listModel(\App\Models\Area::class),null, array('placeholder' =>  __('Parent'),'class' => 'form-control')) !!}
    </div>
</div>


<div class="col-lg-12">
    <div class="form-layout-footer">
        <button class="btn btn-info">@lang('Submit Form')</button>
        <button class="btn btn-secondary" href="{{route('backend.areas.index')}}">@lang('Cancel')</button>
    </div><!-- form-layout-footer -->
</div>