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
            {!!  __('Name') !!}
        </label>
        {!! Form::text('name',null, array('placeholder' =>  __('Name'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Section') !!}
        </label>
        {!! Form::select('section_id', listModel(\App\Models\Section::class, 'title_translated'),null, array('placeholder' =>  __('Section'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            المنطقة
        </label>
        {!! Form::select('area_id', listModel(\App\Models\Area::class),null, array('placeholder' =>  "إختر المنطقة",'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-8">
    <div class="custom-file mg-t-30">
        {!! Form::file('attachment',array('class' => 'custom-file-input','id'=>'coaver')) !!}
        <label for="name" class="custom-file-label">
            {!!  __('Photo') !!}
        </label>
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <label for="name" class="form-control-label">
            {!!  __('Location') !!}
        </label>
        <div id="map" class="ht-300 ht-sm-400 bd bg-gray-100"></div>
    </div>
</div>


<div class="col-lg-12">
    <div class="form-group">
        <label for="name" class="form-control-label">
            النص
        </label>
        {!! Form::textarea('body',null, array('placeholder' =>  __('Body'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            التمن
        </label>
        {!! Form::text('price',null, array('placeholder' =>  __('Price'),'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            لكل
        </label>
        {!! Form::select('per',['Hour' => "ساعة", 'Service' => "خدمة"], null, array('placeholder' =>  "لكل",'class' => 'form-control')) !!}
    </div>
</div>

<div class="col-lg-4">
    <div class="form-group">
        <label for="name" class="form-control-label">
            الحالة
        </label>
        {!! Form::select('status', status(),null, array('placeholder' =>  __('status'),'class' => 'form-control')) !!}
    </div>
</div>
{!! Form::hidden('lat', null, ['id' => 'lat']) !!}

{!! Form::hidden('lng', null, ['id' => 'lng']) !!}

<div class="col-lg-12">
    <div class="form-layout-footer">
        <button class="btn btn-info">@lang('Submit Form')</button>
        <button class="btn btn-secondary" href="{{route('backend.services.index')}}">@lang('Cancel')</button>
    </div><!-- form-layout-footer -->
</div>
@push('scripts')
    <script>
        loadjs([
            'http://maps.google.com/maps/api/js?key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg',
            '{{ url('backend/lib/gmaps/gmaps.min.js') }}',
            '{{ url('backend/js/map.shiftworker.js') }}'
        ], function () {
            var latField = $('input#lat'),
                lngField = $('input#lng');
            map = new GMaps({
                div: '#map',
                lat: {{@$data->lat ?? 30}},
                lng: {{@$data->lng ?? 36}},
                zoom: 6,
                click: function (event) {
                    map.removeMarkers();
                    var lat = event.latLng.lat();
                    var lng = event.latLng.lng();
                    map.addMarker({
                        lat: lat,
                        lng: lng,
                        title: 'Marker #',
                    });
                    var lat = event.latLng.lat();
                    var lng = event.latLng.lng();
                    latField.val(lat);
                    lngField.val(lng);
                },
            });
            map.addMarker({
                lat: {{@$data->lat ?? 30}},
                lng: {{@$data->lng ?? 36}},
                title: 'Marker #',
            });
                map.addStyle({
                    styledMapName:'Shift Worker Map',
                    styles: styleShiftWorker,
                    mapTypeId: 'map_shift_worker'
                });
                map.setStyle('map_shift_worker');



        });

    </script>
@endpush

