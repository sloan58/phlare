@extends('site.layouts.default')
@section('title')
    Phlare::Numbers::Add
@stop
{{-- Content --}}
@section('content')

<!-- content -->

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>Add a Phone Number</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::open(['url' => 'numbers']) }}

           <div class="form-group">
                       {{ Form::label('number', 'Phone Number') }}
                       {{ Form::text('number', null, array('class' => 'form-control')) }}
                   </div>

                   <div class="form-group">
                       {{ Form::label('label', 'Label') }}
                       {{ Form::text('label', null, array('class' => 'form-control')) }}
                   </div>

                   <div class="form-group">
                      {{ Form::hidden('contactId', $contactId, array('class' => '')) }}
                  </div>

            {{ Form::submit('Add the number!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</div>
