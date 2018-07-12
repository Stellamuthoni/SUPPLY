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
                    <h2>Log in</h2>
                    <div class="line"></div>
                </div><!-- end .page-sub-title -->
            </div><!-- end .col-md-12 col-sm-12 col-xs-12 -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-content">
                        <form name="ajax-form" id="contact-form2" action="{{ route('account-sign-in-post') }}" method="POST" class="contact-form">
                            {{ csrf_field() }}
                            @include('flash::message')
                            <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" name="email" required="" placeholder="email" type="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" name="password" required placeholder="password" type="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>                          
                            <div class="col-sm-3 col-md-5">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me
                                </label>
                            </div>
                            <div class="field buttons">
                            <button type="submit" class="btn btn-lg blue-color">Submit</button>
                        </div>
                            <div class="col-sm-12 col-md-12">
                                <span>Don’t have an account? <a href="{{ route('account-create') }}">Create</a></span>
                            </div>
                        </form>
</div>
</div>
</div>
</div>
</section>
@endsection
