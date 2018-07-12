@extends('layouts.app2')

@section('content')
<section class="main-content">
    <div class="container">
        <div class="row">
	    <div class="clearfix"></div>

	    <div class="last-rides">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="search-content">
                        	{!! Form::open(array('route'=>'search-rides','method'=>'post', 'class'=>'idealforms searchtours')) !!}
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="field">
                                            <select id="destination" name="origin">
                                                <option disabled selected>From</option>
                                                @if($origin->count())
    												@foreach($origin as $original => $places)
                                                        <option value="{{$original}}">{{$original}}</option>
                                                    @endforeach
                                                @else
									                <li>No Locations</li>
									            @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">

                                        <div class="field">
                                            <select id="destination" name="destination">
                                                <option disabled selected>To</option>
                                                	@if($destination->count())
    												@foreach($destination as $destin => $toplaces)
                                                        <option value="{{$destin}}">{{$destin}}</option>
                                                    @endforeach
                                                @else
									                <li>No Locations</li>
									            @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <select id="destination" name="date">
                                            <option disabled selected>Available Dates</option>
                                            @if($date->count())
												@foreach($date as $tarehe => $check)
                                                    <option value="{{$tarehe}}">{{ Carbon\Carbon::parse($tarehe)->format('d-m-Y')}}</option>
                                                @endforeach
                                            @else
								                <li>No Dates</li>
								            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="field">
                                            <select id="destination" name="capacity">
                                                <option disabled selected>Number of seats</option>
                                                @if($capacity->count())
    												@foreach($capacity as $seats => $seat)
                                                        <option value="{{$seats}}">{{$seats}}</option>
                                                    @endforeach
                                                @else
									                <li>No Locations</li>
									            @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="field buttons">
                                            <button type="submit" class="btn btn-lg green-color">Search</button>
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div><!-- end .search-content -->

                    </div><!-- end .col-sm-12 -->

	        <div class="col-md-12 col-sm-12 col-xs-12">

	            <div class="page-sub-title textcenter">
	                <h2>Available rides</h2>
	                <div class="line"></div>
	            </div><!-- end .page-sub-title -->

	        </div>

	        <div class="col-md-12 col-sm-12 col-xs-12">
		    @if($rides->count())
		    	@foreach($rides as $ride)
	            <article class="ride-box clearfix">

	                <div class="ride-content">
	                    <h3><a href="#">From {{$ride->origin}} to {{$ride->destination}}</a></h3>posted by <a href="#">{{$ride->username}}</a>
	                </div>

	                <ul class="ride-meta">

	                    <li class="ride-date">
	                        <a href="#" class="tooltip-link" data-original-title="Date" data-toggle="tooltip">
	                            <i class="fa fa-calendar"></i>
	                            {{ Carbon\Carbon::parse($ride->date)->format('d-m-Y')}}
	                        </a>
	                    </li><!-- end .ride-date -->

	                    <li class="ride-people">
	                        <a href="#" class="tooltip-link" data-original-title="Number of seats" data-toggle="tooltip">
	                            <i class="fa fa-user"></i>
	                            {{$ride->capacity}}
	                        </a>
	                    </li><!-- end .ride-people -->

	                    <li>
	                        <a href="{{ URL::route('book-ride', $ride->id) }}" onclick="return confirm('Are you sure you want to book this ride?');">
	                            <i class="fa fa-file"></i>
	                            Book
	                        </a>
	                    </li>

	                </ul><!-- end .ride-meta -->

	            </article><!-- end .ride-box -->
	            @endforeach
                @else
                    <li>No Rides Available</li>
                @endif

	            <div class="clearfix"></div>

	        </div><!-- end .col-md-12 col-sm-12 col-xs-12 -->

	    </div><!-- end .last-rides -->
</div>
</div>
</section>
@endsection