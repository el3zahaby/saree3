
<div class="col-lg-6">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Title') !!} (ar)
        </label>
        {!! Form::text('title[ar]',null, array('placeholder' =>  __('Title'),'class' => 'form-control','id'=>'titlear')) !!}
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Title') !!} (en)
        </label>
        {!! Form::text('title[en]',null, array('placeholder' =>  __('Title'),'class' => 'form-control','id'=>'titleen')) !!}
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Slug') !!} (en)
        </label>
        {!! Form::text('slug',null, array('placeholder' =>  "Example : page/pagename",'class' => 'form-control','id'=>'slug')) !!}
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('body page') !!}  (ar)
        </label>
        {!! Form::textarea('body[ar]',null, array('placeholder' =>  __('Name'),'class' => 'form-control','id'=>'body')) !!}
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('body page') !!} (en)
        </label>
        {!! Form::textarea('body[en]',null, array('placeholder' =>  __('Name'),'class' => 'form-control','id'=>'body1')) !!}
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!! __('position page') !!}
        </label>
        {!! Form::select('position', ['0'=>'نفبار (فوق) ','1'=>' فوتر (اسفل) '],null, array('placeholder' =>  __('position page'),'class' => 'form-control')) !!}

    </div>
</div>

<div class="col-lg-6">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Status') !!}
        </label>
        {!! Form::select('status', status(),null, array('placeholder' =>  __('Status'),'class' => 'form-control')) !!}
    </div>
</div>


<div class="col-lg-12" style="margin-bottom: 40px;">
    <div class="custom-file mg-t-30">
        {!! Form::file('cover',array('class' => 'custom-file-input','id'=>'coaver')) !!}
        <label for="name" class="custom-file-label">
            {!!  __('Cover Image') !!}
        </label>
    </div>
</div>

<div class="col-lg-12">
    <div class="form-layout-footer">
        <button class="btn btn-info">@lang('Submit Form')</button>
        <button class="btn btn-secondary" href="{{route('backend.pages.index')}}">@lang('Cancel')</button>
    </div><!-- form-layout-footer -->
</div>
{{--{{dd($locale)}}--}}
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