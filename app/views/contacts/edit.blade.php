@extends('site.layouts.default')

@section('title')
    Phlare::Contacts::Edit
@stop

{{-- Content --}}
@section('content')

<!-- content -->

<div class="row">

    <div class="col-md-8 col-md-offset-2">

    <h1>Edit: {{ $contact->name }}</h1>
    
    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}
    
    {{ Form::model($contact, array('route' => array('contacts.update', $contact->id), 'method' => 'PUT')) }}
    
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>
    
        <div class="form-group">
            {{ Form::label('number', 'Telephone Number') }}
            {{ Form::text('number', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('dial_profile', 'Dial Profile') }}
            {{ Form::text('dial_profile', null, array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
    
    {{ Form::close() }}

    </div>

</div>