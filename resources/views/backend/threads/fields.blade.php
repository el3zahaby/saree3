<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Section') !!}
        </label>
        {!! Form::select('section_id', listModel(\App\Models\threadSection::class, 'title_translated'),null, array('placeholder' =>  __('Section'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('User') !!}
        </label>
        {!! Form::select('user_id', listModel(\App\Models\User::class),null, array('placeholder' =>  __('User'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Title') !!}
        </label>
        {!! Form::text('title',null, array('placeholder' =>  __('title'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('body') !!}
        </label>
        {!! Form::textarea('body',null, array('placeholder' =>  __('body'),'class' => 'form-control','id' => 'body')) !!}
    </div>
</div>


<div class="col-lg-12">
    <div class="form-layout-footer">
        <button class="btn btn-info">@lang('Submit Form')</button>
        <button class="btn btn-secondary" href="{{route('backend.threads.index')}}">@lang('Cancel')</button>
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