@extends('site.layouts.default')

@section('title')
    Phlare::Contacts
@stop

{{-- Content --}}
@section('content')

<!-- content -->

<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <div class="row">

            <div class="col-md-2">
                <a class="btn btn-small btn-success" href="{{ URL::to('contacts/create') }}">Create New Contact</a>
            </div>
        </div>

        <h1>All Contacts</h1>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Telephone Number</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
            @foreach($contacts as $key => $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td><a href="tel:{{ $value->number }}">{{ $value->number }}</a></td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete the contact (uses the destroy method DESTROY /contacts/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        <div>
                            {{ Form::open(array('url' => 'contacts/' . $value->id, 'class' => 'pull-right')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete this contact', array('class' => 'btn btn-warning')) }}
                            {{ Form::close() }}
                        </div>
                        <!-- edit this contact(uses the edit method found at GET /contact/{id}/edit -->
                        <div>
                            <a class="btn btn-small btn-info" href="{{ URL::to('contacts/' . $value->id . '/edit') }}">Edit this Contact</a>
                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- ./ content -->

@stop
