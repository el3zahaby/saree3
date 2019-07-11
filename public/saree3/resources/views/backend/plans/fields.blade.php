<div class="col-lg-6">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Name') !!}
        </label>
        {!! Form::text('name',null, array('placeholder' =>  __('Name'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Price') !!}
        </label>
        {!! Form::text('price',null, array('placeholder' =>  __('Price'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Note') !!}
        </label>
        {!! Form::textarea('note',null, array('placeholder' =>  __('Note'),'class' => 'form-control')) !!}
    </div>
</div>


<div class="col-lg-12">
    <div class="form-layout-footer">
        <button class="btn btn-info">@lang('Submit Form')</button>
        <button class="btn btn-secondary" href="{{route('backend.plans.index')}}">@lang('Cancel')</button>
    </div><!-- form-layout-footer -->
</div>