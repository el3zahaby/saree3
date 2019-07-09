
<div class="col-lg-12" style="margin-bottom: 28px;">
    <div class="custom-file mg-t-30">
        {!! Form::file('image',array('class' => 'custom-file-input','id'=>'coaver')) !!}
        <label for="name" class="custom-file-label">
            صورة المعرض
        </label>
    </div>
</div>


<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            إسم المعرض
        </label>
        {!! Form::text('name',null, array('placeholder' =>  'إسم المعرض','class' => 'form-control edit-pl')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            للمستخدم
        </label>
        {!! Form::select('user_id', listModel(\App\Models\User::class , 'email'),null, array('placeholder' =>  __('User'),'class' => 'form-control','style'=>'padding: 0 9px;')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            القسم
        </label>
        {!! Form::select('section_id', listModel(\App\Models\Section::class, 'title_translated'),null, array('placeholder' =>  'القسم','class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            المنطقة
        </label>
        {!! Form::select('area_id', listModel(\App\Models\Area::class),null, array('placeholder' => 'المنطقة','class' => 'form-control','style'=>'padding: 0 9px;')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            العنوان
        </label>
        {!! Form::text('address',null, array('placeholder' =>  'العنوان','class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label for="name" class="form-control-label">
            وصف المعرض
        </label>
        {!! Form::textarea('body',null, array('placeholder' =>  __('body'),'class' => 'form-control', 'id' => 'body')) !!}
    </div>
</div>


<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            البريد الإلكتروني
        </label>
        {!! Form::text('email',null, array('placeholder' => 'البريد الإلكتروني','class' => 'form-control')) !!}
    </div>
</div>
<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            الهاتف
        </label>
        {!! Form::text('phone',null, array('placeholder' => 'الهاتف','class' => 'form-control')) !!}
    </div>
</div>


<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            حالة المعرض
        </label>
        {!! Form::select('status', status(),null, array('placeholder' =>  'حالة المعرض','class' => 'form-control')) !!}
    </div>
</div>


<div class="col-lg-12">
    <div class="form-layout-footer">
        <button class="btn btn-info">@lang('Submit Form')</button>
        <button class="btn btn-secondary" href="{{route('backend.branches.index')}}">@lang('Cancel')</button>
    </div><!-- form-layout-footer -->
</div>


@push('scripts')

    <script !src="">
        loadjs([
            '{{url('backend/lib/summernote/summernote-bs4.css')}}',
            '{{ url('backend/lib/summernote/summernote-bs4.min.js') }}',
            '{{ url('backend/lib/summernote/summernote-ar-AR.js') }}'
        ], function() {
            loadjs([
                '{{ url('backend/lib/summernote/summernote-ar-AR.js') }}'
            ], function() {
                $('#body,#body1').summernote({
                    height: 300,
                    @if(__('en') == 'ar')
                    lang: 'ar-AR'
                    @endif
                });
            });
        });
    </script>
@endpush