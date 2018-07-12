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



@endsection
