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
            {!!  __('Email') !!}
        </label>
        {!! Form::email('email',null, array('placeholder' =>  __('Email'),'class' => 'form-control','id'=>'email')) !!}
    </div>
</div>
<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Username') !!}
        </label>
        {!! Form::text('username',null, array('placeholder' =>  __('Username'),'class' => 'form-control','id'=>'username')) !!}
    </div>
</div>
<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Password') !!}
        </label>
        {!! Form::text('password','', array('placeholder' =>  __('Type Password'),'class' => 'form-control','style'=>'-webkit-text-security: disc !important;
    ')) !!}
    </div>
</div>
<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Confirm Password') !!}
        </label>
        {!! Form::text('confirm-password',null, array('placeholder' =>  __('Retype Password'),'class' => 'form-control','style'=>'-webkit-text-security: disc !important;
    ')) !!}
    </div>
</div>
<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Roles') !!}
        </label>
        {!! Form::select('roles', $roles ,$role, array('placeholder' =>  __('Select'),'class' => 'form-control','id'=>'roles')) !!}
    </div>
</div>
<div class="col-lg-12">
    <div class="form-layout-footer">
        <button class="btn btn-info">@lang('Submit Form')</button>
        <button class="btn btn-secondary" href="{{route('backend.staff.index')}}">@lang('Cancel')</button>
    </div><!-- form-layout-footer -->
</div>