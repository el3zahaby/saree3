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

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('url') !!}
        </label>
        {!! Form::text('url',null,array('placeholder'=> __('url'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Order') !!}
        </label>
        {!! Form::number('order',null,array('placeholder'=> __('Order'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Parent') !!}
        </label>
        {!! Form::select('parent_id', listModel(\App\Models\Menu::class, 'title'),null, array('placeholder' =>  __('Parent'),'class' => 'form-control')) !!}
    </div>
</div>


<div class="col-lg-12">
    <div class="form-layout-footer">
        <button class="btn btn-info">@lang('Submit Form')</button>
        <button class="btn btn-secondary" href="{{route('backend.menu.index')}}">@lang('Cancel')</button>
    </div><!-- form-layout-footer -->
</div>