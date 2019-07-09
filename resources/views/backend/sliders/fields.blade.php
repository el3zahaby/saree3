
<div class="col-lg-12" style="margin-bottom: 28px;">
    <div class="custom-file mg-t-30">
        {!! Form::file('images',array('class' => 'custom-file-input','id'=>'coaver','multiple'=>'yes')) !!}
        <label for="name" class="custom-file-label">
            {!!  __('Photos') !!}
        </label>
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Title') !!}
        </label>
        {!! Form::text('title',null, array('placeholder' =>  'title','class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {{__('position slider')}}
        </label>
        {!! Form::select('slider_position', listModel(\App\Models\positionSlider::class, 'name'),null, array('placeholder' => 'إختر مكان سليدر','class' => 'form-control')) !!}
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