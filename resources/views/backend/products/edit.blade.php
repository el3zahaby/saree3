@extends('backend.layout')

@section('content')

<div class="br-section-wrapper">
    <h6 class="br-section-label">@lang('Edit') {{ str_plural($title, 1) }}</h6>
<!--    <p class="br-section-text">@lang('Description')</p>-->

    <div class="table-wrapper">

        {{Form::model($data,['route'=>['backend.products.update', $data->id],'method'=>'PUT'])}}
        <div class="form-layout form-layout-1">
            <div class="row mg-b-25">

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="name_and_type" class="form-control-label">
                            إسم و نوع المنتج
                        </label>
                        {!! Form::text('name_and_type',null, array('placeholder' =>  'إسم و نوع المنتج','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="section_id" class="form-control-label">
                            {!!  __('Section') !!}
                        </label>
                        {!! Form::select('section_id', listModel(\App\Models\Section::class, 'title_translated'),null, array('placeholder' =>  __('section'),'class' => 'form-control')) !!}
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

                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="name" class="form-control-label">
                            {!!  __('body') !!}
                        </label>
                        {!! Form::textarea('body',null, array('placeholder' =>  __('body'),'class' => 'form-control', 'id' => 'body')) !!}
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="name" class="form-control-label">
                            إسم المعرض
                        </label>
                        {!! Form::text('branch_id',null, array('placeholder' =>  'إسم المعرض','class' => 'form-control')) !!}
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="name" class="form-control-label">
                            السعر
                        </label>
                        {!! Form::text('price',null, array('placeholder' => 'السعر','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="name" class="form-control-label">
                            في المخزن
                        </label>
                        {!! Form::select('in_stock', ['1'=>'نعم','0'=>'لا'],null, array('class' => 'form-control')) !!}
                    </div>
                </div>

                
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="name" class="form-control-label">
                            مقاس المنتج
                        </label>
                        <div class="taille" style="width: 100%;overflow: hidden;">
                            {!! Form::number('m' ,null, array('placeholder' => 'مقاس المنتج','class' => 'form-control item','id'=>'m','style' => 'width: 67%;float: right;border-radius: 0 3px 3px 0; border-left: 0.5px solid #f5ecec;')) !!}
                            {!! Form::select('w' ,['غ'=> 'غ' , 'كغ' => 'كغ' , 'سم' => 'سم', 'م' => 'م'  ],null, array('placeholder' => 'الوحده','id'=>'w','class' => 'form-control item','style'=>'width: 78px;padding: 0 16px;border-right: none;border-radius: 3px 0 0 3px;padding-left: 0;')) !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="name" class="form-control-label">
                            الكميه      
                        </label>
                        <div class="taille" style="width: 100%;overflow: hidden;">
                            {!! Form::number('Quantity' ,null, array('placeholder' => 'كميه المنتج','class' => 'form-control item')) !!}
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="name" class="form-control-label">
                            حالة المنتج
                        </label>
                        {!! Form::select('status', status(),null, array('placeholder' =>  __('status'),'class' => 'form-control')) !!}
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="name" class="form-control-label">
                            الشحن
                        </label>
                        {!! Form::select('trans', ['1'=>'مجاني','2'=>'حسب الموقع'],null, array('placeholder' =>  __('trans'),'class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::text('sku',null, array('placeholder' => 'السعر','class' => 'form-control','id' => 'sku','style' => 'display:none')) !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::text('slug',null, array('placeholder' => 'السعر','class' => 'form-control','id' => 'slug-input','style' => 'display:none')) !!}
                    </div>
                </div>



                <div class="col-lg-12">
                    <div class="form-layout-footer">
                        <button class="btn btn-info">@lang('Submit Form')</button>
                        <button class="btn btn-secondary" href="{{route('backend.products.index')}}">@lang('Cancel')</button>
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
                        
                        $('#add_product_form').submit(() => {
                            let m = $("#m").val();
                            let w = $("#w").val();
                            
                            $("#sku").val(m + w);
                            $("#slug-input").val($("#name_and_type").val());
                        });
                    </script>
                @endpush
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>
@endsection
