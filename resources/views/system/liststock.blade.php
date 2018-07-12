@extends('layouts.app2')

@section('content')
<section class="main-content">
    <div class="container">
        <div class="row">
	    <div class="clearfix"></div>

	    <div class="last-rides">

	        <div class="col-md-12 col-sm-12 col-xs-12">

	            <div class="page-sub-title textcenter">
	                <h2>Available Stock</h2>
	                <div class="line"></div>
	            </div><!-- end .page-sub-title -->

	        </div>

	        <div class="col-md-12 col-sm-12 col-xs-12">
		    @if($stock->count())
		    	@foreach($stock as $item)
	            <article class="ride-box clearfix">

	                <div class="ride-content">
	                    <h3><a href="#">Name :{{$item->name}}</a>
	                </div>

	                <ul class="ride-meta">

	                    <li class="ride-people">
	                        <a href="#" class="tooltip-link" data-original-title="Description" data-toggle="tooltip">
	                            <i class="fa fa-user"></i>
	                            {{$item->description}}
	                        </a>
	                    </li>

                        <li class="ride-people">
                            <a href="#" class="tooltip-link" data-original-title="Quantity" data-toggle="tooltip">
                                <i class="fa fa-user"></i>
                                {{$item->quantity}}
                            </a>
                        </li>

                        <li class="ride-people">
                            <a href="#" class="tooltip-link" data-original-title="Cost" data-toggle="tooltip">
                                <i class="fa fa-user"></i>
                                {{$item->cost}}/=
                            </a>
                        </li>


	                </ul><!-- end .ride-meta -->

	            </article><!-- end .ride-box -->
	            @endforeach
                @else
                    <li>No Stock Available</li>
                @endif

	            <div class="clearfix"></div>

	        </div><!-- end .col-md-12 col-sm-12 col-xs-12 -->

	    </div><!-- end .last-rides -->
</div>
</div>
</section>
@endsection
