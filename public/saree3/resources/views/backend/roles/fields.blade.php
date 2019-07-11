<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Name') !!}
        </label>
        {!! Form::text('name',null, array('placeholder' =>  __('Name'),'class' => 'form-control')) !!}
    </div>
</div>
<div class="clearfix"></div>
<div class="col-lg-2 mg-t-30">
    <div class="form-group">
        <label class="ckbox">
        <button type="button" id="checkAll" class="btn btn-outline-secondary btn-block mg-b-10">{{__('Toggle')}}</button>
        </label>
    </div>
</div>

<div class="col-md-12 mg-b-30">
    <div class="row">
        @php $title1 = 'Staff'; @endphp
        @foreach($permissions as $value)
            @if(@$title1 != explode('-', $value->name)[1])
    </div>
    <div class="row">
        <h6 class="br-section-label col-md-2">- @lang(ucfirst(explode('-', $value->name)[1]))</h6>
        @endif
        @php $title1 = explode('-', $value->name)[1]; @endphp
        <div class="col-md-2">
            <label class="ckbox">
                {{ Form::checkbox('permissions[]', $value->id, null, array('class' => 'name')) }}
                <span>@lang(title_case(str_replace('-'.$title1,'',$value->name)))</span>
            </label>
        </div>
        @endforeach
    </div>
</div>
<div class="col-md-12">
    <div class="form-layout-footer">
        <button class="btn btn-info">@lang('Submit Form')</button>
        <button class="btn btn-secondary" href="{{route('backend.roles.index')}}">@lang('Cancel')</button>
    </div><!-- form-layout-footer -->
</div>

@push('scripts')
    <script !src="">
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).trigger('click');
        });
    </script>
@endpush