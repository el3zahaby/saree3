@extends('backend.layout')

@push('links')

@endpush

@section('content')
    <div class="br-section-wrapper">

    {!! Form::open(['route' => 'backend.settings.update', 'method' => 'post' ,'class' => 'ui form','files' => true]) !!}

    @foreach ($settings as $setting)
        <div class="form-group row">
            <label style="color: teal;" class="col-sm-2 form-control-label">{{ $setting->set_slug }} : </label>
            <div class="col-sm-10">

                @if($setting->type == 1)
                    {!! Form::text($setting->set_name, $setting->value , ['class' => 'form-control']) !!}
                @elseif($setting->type == 2)
                    {!! Form::textarea($setting->set_name, $setting->value , ['class' => 'form-control']) !!}
                @elseif($setting->set_name == 'statue')
                    {!! Form::select($setting->set_name,['online' => 'Online', 'offline' => 'Offline'] , $setting->value , ['class' => 'form-control']) !!}
                @elseif($setting->set_name == 'direction')
                    {!! Form::select($setting->set_name,['rtl' => 'Right to left', 'ltr' => 'Left To Right'] , $setting->value , ['class' => 'form-control']) !!}

                @elseif($setting->set_name == 'fav_icon')
                    {{--{!! Form::file($setting->set_name) !!}--}}
                    {{--<img src="{{url('/uploads/thumb/' . $setting->value)}}" alt="thumbnail">--}}

                @elseif($setting->set_name == 'logo')
                    {!! Form::file($setting->set_name) !!}
                    <img src="{{url('/uploads/thumb/' . $setting->value)}}" alt="thumbnail">
                @endif
            </div>

        </div>
        <br/>
    @endforeach
    <div class="form-group row m-t-md">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary m-t">
                {!! trans('Save') !!}
            </button>
            <a href="{{route("backend.home")}}" class="btn btn-default m-t">
                {!! trans('Cancel') !!}
            </a>
        </div>
    </div>
    {!! Form::close() !!}


</div>

@endsection

@push('scripts')

@endpush
