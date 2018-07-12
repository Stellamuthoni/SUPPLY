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
                    <h2>Sign Up</h2>
                    <div class="line"></div>
                </div><!-- end .page-sub-title -->
            </div><!-- end .col-md-12 col-sm-12 col-xs-12 -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-content">
                    {!! Form::open(array('route'=>'account-create-post','method'=>'post', 'class'=>'idealforms add-ride')) !!}
                        <div class="field">
                            <input type="text" name="username" class="form-control" placeholder="Username" {{ (Input::old('username')) ? ' value=' . e(Input::old('username')) .'' : '' }}>
                                @if($errors->has('username'))
                                    {{ $errors->first('username')}}
                                @endif
                        </div>
                        <div class="field">
                            <input type="email" name="email" class="form-control" placeholder="Email" {{ (Input::old('email')) ? ' value=' . e(Input::old('email')) .'' : '' }}>
                                @if($errors->has('email'))
                                    {{ $errors->first('email')}}
                                @endif
                        </div>
                        <div class="field">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                                @if($errors->has('password'))
                                    {{ $errors->first('password')}}
                                @endif
                        </div>
                        <div class="field">
                            <input type="password" name="password_again" class="form-control" placeholder="Password (Confirm)">
                                @if($errors->has('password_again'))
                                    {{ $errors->first('password_again')}}
                                @endif
                        </div>
                        <div class="field buttons">
                            <button type="submit" class="btn btn-lg blue-color">Submit</button>
                        </div>

                        {!! Form::close() !!}

</div>
</div>
</div>
</div>
</section>
@stop
