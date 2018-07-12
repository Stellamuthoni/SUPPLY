@extends('layouts.app2')

@section('content')
<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                @if (Session::has('flash_notification.message'))
                    <div align="center" class="alert alert-{{ Session::get('flash_notification.level') }}">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('flash_notification.message') }}
                    </div>
                @endif
                <div class="page-sub-title textcenter">
                    <h2>Give a Ride</h2>
                    <div class="line"></div>
                </div><!-- end .page-sub-title -->
            </div><!-- end .col-md-12 col-sm-12 col-xs-12 -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-content add-new-ride">
                    {!! Form::open(array('route'=>'give-ride-post','method'=>'post', 'class'=>'idealforms add-ride')) !!}
                            <div class="field">
                            <input type="text" name="origin" placeholder="Origin" {{ (Input::old('origin')) ? ' value=' . e(Input::old('origin')) .'' : '' }}>
                                @if($errors->has('origin'))
                                    {{ $errors->first('origin')}}
                                @endif
                            </div>
                            <div class="field">
                                <input type="text" name="destination" placeholder="Destination" {{ (Input::old('destination')) ? ' value=' . e(Input::old('destination')) .'' : '' }}>
                                    @if($errors->has('destination'))
                                        {{ $errors->first('destination')}}
                                    @endif
                            </div>
                            <div class="field">
                                <input name="date" type="text" placeholder="Date" class="datepicker">
                            </div>
                            <div class="field">
                                <select id="capacity" name="capacity">
                                    <option disabled value="default">Vehicle Capacity</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5+</option>
                                </select>
                                @if($errors->has('capacity'))
                                        {{ $errors->first('capacity')}}
                                    @endif
                            </div>
                            <div class="field buttons">
                                <button type="submit" class="btn btn-lg green-color">Submit</button>
                            </div>

                        {!! Form::close() !!}

</div>
</div>
</div>
</div>
</section>
@stop
