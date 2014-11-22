@extends('site.layouts.default')
@section('title')
    Phlare::Contacts::Add
@stop
{{-- Content --}}
@section('content')

<!-- content -->

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>Create a Contact</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::open(array('url' => 'contacts')) }}

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
                       {{ Form::label('label', 'Label') }}
                       {{ Form::text('label', null, array('class' => 'form-control')) }}
                   </div>

            {{ Form::submit('Create the contact!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</div>
