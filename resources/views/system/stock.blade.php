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
                    <h2>Add Stock</h2>
                    <div class="line"></div>
                </div><!-- end .page-sub-title -->
            </div><!-- end .col-md-12 col-sm-12 col-xs-12 -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="page-content add-new-ride">
{!! Form::open(array('route'=>'stock-post','method'=>'post', 'class'=>'idealforms add-ride')) !!}
                            <div class="field">
                            <input type="text" name="name" placeholder="Name" {{ (Input::old('name')) ? ' value=' . e(Input::old('name')) .'' : '' }}>
                                @if($errors->has('name'))
                                    {{ $errors->first('name')}}
                                @endif
                            </div>
                            <div class="field">
                                <input type="text" name="description" placeholder="Description" {{ (Input::old('description')) ? ' value=' . e(Input::old('description')) .'' : '' }}>
                                    @if($errors->has('description'))
                                        {{ $errors->first('description')}}
                                    @endif
                            </div>
                            <div class="field">
                                <input type="text" name="quantity" placeholder="Quantity" {{ (Input::old('quantity')) ? ' value=' . e(Input::old('quantity')) .'' : '' }}>
                                    @if($errors->has('quantity'))
                                        {{ $errors->first('quantity')}}
                                    @endif
                            </div>
                            <div class="field">
                                <input type="text" name="cost" placeholder="Cost" {{ (Input::old('cost')) ? ' value=' . e(Input::old('cost')) .'' : '' }}>
                                    @if($errors->has('cost'))
                                        {{ $errors->first('cost')}}
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
