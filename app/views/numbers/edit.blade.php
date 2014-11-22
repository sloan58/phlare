@extends('site.layouts.default')

@section('title')
    Phlare::Numbers::Edit
@stop

{{-- Content --}}
@section('content')

<!-- will be used to show any messages -->
<div class="row top-buffer">

    @if (Session::has('message'))
        <div class="alert alert-info col-md-4 col-md-offset-4 text-center">{{ Session::get('message') }}</div>
    @endif

</div>

<!-- content -->
<div class="row">

    <div class="col-md-4 col-md-offset-4">

        <h1>Edit Phone Number</h1>


        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::model($number, array('route' => array('numbers.update', $number->id), 'method' => 'PUT')) }}

            <div class="form-group">
                {{ Form::label('number', 'Phone Number') }}
                {{ Form::text('number', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('label', 'Label') }}
                {{ Form::text('label', null, array('class' => 'form-control')) }}
            </div>

        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>

</div>