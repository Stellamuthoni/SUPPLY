@extends('layouts.app2')

@section('content')
<section class="main-content">
    <div class="container">
        <div class="row">
	    <div class="clearfix"></div>

	    <div class="last-rides">

	        <div class="col-md-12 col-sm-12 col-xs-12">

	            <div class="page-sub-title textcenter">
	                <h2>Users</h2>
	                <div class="line"></div>
	            </div><!-- end .page-sub-title -->


	        <div class="col-md-12 col-sm-12 col-xs-12">
		    @if($users->count())
		    	@foreach($users as $user)
	            <article class="ride-box clearfix">

	                <div class="ride-content">
	                    <h3><a href="#">Username: {{$user->username}}</a>
	                </div>

	                <ul class="ride-meta">

	                    <li class="ride-people">
	                        <a href="#" class="tooltip-link" data-original-title="Email" data-toggle="tooltip">
	                            <i class="fa fa-user"></i>
	                            {{$user->email}}
	                        </a>
	                    </li>

                        <li class="ride-people">
                            <a href="#" class="tooltip-link" data-original-title="Role" data-toggle="tooltip">
                                <i class="fa fa-user"></i>
                                {{$user->role}}
                            </a>
                        </li>

                        <li class="ride-people">
                            <a data-toggle="modal" data-target="#messageModal">
                                <i class="fa fa-user"></i>
                                send a message
                            </a>
                        </li>
                        <a href="{{URL::to('deleteuser').'/'.$user->id}}" class="btn btn-warning">Delete</a>
                        <a href="{{URL::to('edituser').'/'.$user->id}}" class="btn btn-danger">Edit</a>
	                </ul><!-- end .ride-meta -->

	            </article><!-- end .ride-box -->
              @endforeach
                @else
                    <li>No Users</li>
                @endif
			        <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			          <div class="modal-dialog">
			            <div class="modal-content">
			              <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			                <center><h4 class="modal-title">Send a message to {{$user->username}}</h4></center>
			              </div>
                  </div>
			              <div class="modal-body">
			                <form action="{{ route('message-post') }}" method="post" class="form-horizontal">
			                            {{ csrf_field() }}
			                    <div class="form-group">
			                      <label class="col-sm-4" for="subject">Subject</label>
			                      <div class="col-sm-7"><input class="form-control" id="inputSubject" placeholder="subject" type="text" name="subject"></div>
			                    </div>
			                    <div class="form-group">
			                      <label class="col-sm-4" for="message">Message</label>
			                      <div class="col-sm-7"><input class="form-control" id="message" placeholder="message" type="text" name="message" required></div>
			                    </div>
			                    <input type="hidden" name="userId" value="{{$user->id}}">
			              </div>
			              <div class="modal-footer">
			                <button type="submit" class="btn btn-primary ">Send <i class="fa fa-arrow-circle-right fa-lg"></i></button>
			              </div>
			              </form>
			              </div><!-- /.modal-content -->
			            </div><!-- /.modal-dialog -->
			        </div><!-- end .modal -->



	            <div class="clearfix"></div>

	        </div><!-- end .col-md-12 col-sm-12 col-xs-12 -->

	    </div><!-- end .last-rides -->
</div>
</div>
</section>
@endsection
