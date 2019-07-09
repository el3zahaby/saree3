
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

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Parent') !!}
        </label>
        {!! Form::select('parent_id', listModel(\App\Models\Section::class, 'title_translated'),null, array('placeholder' =>  __('Parent'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Slug') !!}
        </label>
        {!! Form::text('slug',null, array('placeholder' =>  __('Slug'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Order') !!}
        </label>
        {!! Form::number('order',null, array('placeholder' =>  __('Order'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Description') !!} (ar)
        </label>
        {!! Form::textarea('description[ar]',null, array('placeholder' =>  __('Description'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Description') !!} (en)
        </label>
        {!! Form::textarea('description[en]',null, array('placeholder' =>  __('Description'),'class' => 'form-control')) !!}
    </div>
</div>


<div class="col-lg-12">
    <div class="form-layout-footer">
        <button class="btn btn-info">@lang('Submit Form')</button>
        <button class="btn btn-secondary" href="{{route('backend.sections.index')}}">@lang('Cancel')</button>
    </div><!-- form-layout-footer -->
</div>