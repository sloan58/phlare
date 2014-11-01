@extends('site.layouts.default')

@section('title')
    Phlare::Contacts::Edit
@stop

{{-- Content --}}
@section('content')

<!-- content -->

<div class="row">

    <div class="col-md-4 col-md-offset-4">

    <h1>Edit: {{ $contact->firstname . ' ' . $contact->lastname }}</h1>
    
    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}
    
    {{ Form::model($contact, array('route' => array('contacts.update', $contact->id), 'method' => 'PUT')) }}
    
        <div class="form-group">
            {{ Form::label('firstname', 'First Name') }}
            {{ Form::text('firstname', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('lastname', 'Last Name') }}
            {{ Form::text('lastname', null, array('class' => 'form-control')) }}
        </div>
    
        <div class="form-group">
            {{ Form::label('number', 'Telephone Number') }}
            {{ Form::text('number', null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('number_type', 'Number Type') }}
            {{ Form::text('number_type', null, array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
    
    {{ Form::close() }}

    </div>

</div>