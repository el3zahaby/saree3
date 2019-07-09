<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('user_id') !!}
        </label>
        {!! Form::select('user_id', listModel(\App\Models\User::class),null, array('placeholder' =>  __('user_id'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('area_id') !!}
        </label>
        {!! Form::select('area_id', listModel(\App\Models\Area::class),null, array('placeholder' =>  __('area_id'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('first_name') !!}
        </label>
        {!! Form::text('first_name',null, array('placeholder' =>  __('first_name'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('last_name') !!}
        </label>
        {!! Form::text('last_name',null, array('placeholder' =>  __('last_name'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('address1') !!}
        </label>
        {!! Form::text('address1',null, array('placeholder' =>  __('address1'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('address2') !!}
        </label>
        {!! Form::text('address2',null, array('placeholder' =>  __('address2'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('postal_code') !!}
        </label>
        {!! Form::number('postal_code',null, array('placeholder' =>  __('postal_code'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('phone1') !!}
        </label>
        {!! Form::number('phone1',null, array('placeholder' =>  __('phone1'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('phone2') !!}
        </label>
        {!! Form::number('phone2',null, array('placeholder' =>  __('phone2'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('comment') !!}
        </label>
        {!! Form::text('comment',null, array('placeholder' =>  __('comment'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('lng') !!}
        </label>
        {!! Form::number('lng',null, array('placeholder' =>  __('lng'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('lat') !!}
        </label>
        {!! Form::number('lat',null, array('placeholder' =>  __('lat'),'class' => 'form-control')) !!}
    </div>
</div>


<div class="col-lg-12">
    <div class="form-layout-footer">
        <button class="btn btn-info">@lang('Submit Form')</button>
        <button class="btn btn-secondary" href="{{route('backend.addresses.index')}}">@lang('Cancel')</button>
    </div><!-- form-layout-footer -->
</div>