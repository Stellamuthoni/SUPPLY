@extends('beautymail::templates.sunny')

@section('content')

    @include ('beautymail::templates.sunny.heading' , [
        'heading' => 'Welcome!',
        'level' => 'h1',
    ])

    @include('beautymail::templates.sunny.contentStart')
    	
        <center><p>Thanks for signing up {{ ucfirst(trans($username))}}!</p></center>
        <center><p>To start using the system, please verify your email address by clicking the button below. If you received this by mistake or were not expecting it, please disregard this email.</p></center>

    @include('beautymail::templates.sunny.contentEnd')

    @include('beautymail::templates.sunny.button', [
        	'title' => 'Activate',
        	'link' => $link
    ])

@stop