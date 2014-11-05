@extends('site.layouts.default')

@section('title')
    Phlare::Contacts::Edit
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

    <div class="col-md-2 col-md-offset-1 top-buffer">

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

        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>

    <div class="col-md-6 col-md-offset-1 top-buffer">

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td class="text-center">Phone Number</td>
                    <td class="text-center">Label</td>
                    <td class="text-center">Actions</td>
                </tr>
            </thead>
            <tbody>
            @foreach($contact->numbers as $key => $value)
                <tr>
                    <td class="text-center">{{ $value->number }}</td>
                    <td class="text-center">{{ $value->label }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td class="text-center">

                        <div class="col-md-2">
                            <a class="btn btn-small btn-success" href="tel:{{ $value->number }}">Call</a>
                        </div>
                        <!-- edit this number(uses the edit method found at GET /number/{id}/edit -->
                        <div class="col-md-2">
                            <a class="btn btn-small btn-primary" href="{{ URL::to('numbers/' . $value->id . '/edit') }}">Edit</a>
                        </div>

                        <!-- delete the number (uses the destroy method DESTROY /numbers/{id} -->
                        <div class="col-md-2">
                            {{ Form::open(array('url' => 'numbers/' . $value->id, 'class' => '')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::hidden('contactId', $contact->id, array('class' => '')) }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                            {{ Form::close() }}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-small btn-success" href="{{ URL::to('numbers/create?contactId=' . $contact->id) }}">Add Phone Number</a>
    </div>
</div>