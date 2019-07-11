
<div class="col-lg-6">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Title')  !!} (ar)
        </label>
        {!! Form::text('title[ar]',null, array('placeholder' =>  __('Title'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Title') !!} (en)
        </label>
        {!! Form::text('title[en]',null, array('placeholder' =>  __('Title'),'class' => 'form-control')) !!}
    </div>
</div>



<div class="col-lg-7" style="display:none">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Slug') !!}
        </label>
        {!! Form::text('slug',null, array('placeholder' =>  __('Slug'),'class' => 'form-control')) !!}
    </div>
</div>


<div class="col-lg-6">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('body') !!} (ar)
        </label>
        {!! Form::textarea('body[ar]',null, array('placeholder' =>  __('Description'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('body') !!} (en)
        </label>
        {!! Form::textarea('body[en]',null, array('placeholder' =>  __('Description'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            حالة 
        </label>
        {!! Form::select('status', status(),null, array('placeholder' =>  __('status'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-8" style="margin-bottom: 28px;">
    <div class="custom-file mg-t-30">
        {!! Form::file('images',array('class' => 'custom-file-input','id'=>'coaver')) !!}
        <label for="name" class="custom-file-label">
            {!!  __('image') !!}
        </label>
    </div>
</div>




<div class="col-lg-12">
    <div class="form-layout-footer">
        <button class="btn btn-info">@lang('Submit Form')</button>
        <button class="btn btn-secondary" href="{{route('backend.sections.index')}}">@lang('Cancel')</button>
    </div><!-- form-layout-footer -->
</div>