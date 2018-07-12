@extends('layouts.app2')

@section('content')
<section class="main-content">
    <div class="container">
        <div class="row">
	    <div class="clearfix"></div>

	    <div class="last-rides">

	        <div class="col-md-12 col-sm-12 col-xs-12">

	            <div class="page-sub-title textcenter">
	                <h2>Inbox</h2>
	                <div class="line"></div>
	            </div><!-- end .page-sub-title -->

	        </div>

	        <div class="col-md-12 col-sm-12 col-xs-12">
            @if($message->count())
              @foreach($message as $messages)
	            <article class="ride-box clearfix">

	                <div class="ride-content">
	                    <h3><a href="#">Subject: {{$messages->subject}}</a>
	                </div>

	                <ul class="ride-meta">

	                    <li class="ride-people">
	                        <a href="#" class="tooltip-link" data-original-title="message" data-toggle="tooltip">
	                            <i class="fa fa-user"></i>
	                            {{$messages->messages}}
	                        </a>
	                    </li>
                      <a href="{{URL::to('deletemessage').'/'.$messages ->id}}" class="btn btn-warning">Delete</a>
                 </ul><!-- end .ride-meta -->

	            </article><!-- end .ride-box -->
	            @endforeach
                @else
                    <li>No Messages</li>
                @endif

	            <div class="clearfix"></div>

	        </div><!-- end .col-md-12 col-sm-12 col-xs-12 -->

	    </div><!-- end .last-rides -->
</div>
</div>
</section>
@endsection
