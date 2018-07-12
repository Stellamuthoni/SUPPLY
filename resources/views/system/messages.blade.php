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
                    <h2>Add message</h2>
                    <div class="line"></div>
                </div><!-- end .page-sub-title -->
            </div><!-- end .col-md-12 col-sm-12 col-xs-12 -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-content add-new-ride">
{!! Form::open(array('route'=>'message-post','method'=>'post', 'class'=>'idealforms add-ride')) !!}
                            <div class="field">
                            <input type="text" name="subject" placeholder="Subject" {{ (Input::old('subject')) ? ' value=' . e(Input::old('subject')) .'' : '' }}>
                                @if($errors->has('subject'))
                                    {{ $errors->first('subject')}}
                                @endif
                            </div>
                            <div class="field">
                                <input type="text" name="message" placeholder="message" {{ (Input::old('message')) ? ' value=' . e(Input::old('message')) .'' : '' }}>
                                    @if($errors->has('message'))
                                        {{ $errors->first('message')}}
                                    @endif
                            </div>
                            <div class="field">
                                <input type="int" name="userId" placeholder="UserID" {{ (Input::old('message')) ? ' value=' . e(Input::old('message')) .'' : '' }}>
                                    @if($errors->has('message'))
                                        {{ $errors->first('message')}}
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
</section
@endsection
