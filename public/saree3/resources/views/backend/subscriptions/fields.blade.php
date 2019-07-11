<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('status') !!}
        </label>
        {!! Form::select('status', status(),null, array('placeholder' =>  __('status'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('user_id') !!}
        </label>
        {!! Form::select('user_id' ,listModel(\App\Models\User::class) ,null, array('placeholder' =>  __('user_id'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('plan_id') !!}
        </label>
        {!! Form::select('plan_id',listModel(\App\Models\Plan::class) ,null, array('placeholder' =>  __('plan_id'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('renew_at') !!}
        </label>
        {!! Form::date('renew_at',null, array('placeholder' =>  __('renew_at'),'class' => 'form-control')) !!}
    </div>
</div>



<div class="col-lg-12">
    <div class="form-layout-footer">
        <button class="btn btn-info">@lang('Submit Form')</button>
        <button class="btn btn-secondary" href="{{route('backend.subscriptions.index')}}">@lang('Cancel')</button>
    </div><!-- form-layout-footer -->
</div>