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
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
            @foreach($user->contacts as $key => $value)
                <tr>
                    <td>{{ $value->firstname }}</td>
                    <td>{{ $value->lastname }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- edit this contact(uses the edit method found at GET /contact/{id}/edit -->
                        <div class="col-md-2">
                            <a class="btn btn-small btn-primary" href="{{ URL::to('contacts/' . $value->id . '/edit') }}">Edit</a>
                        </div>

                        <!-- delete the contact (uses the destroy method DESTROY /contacts/{id} -->
                        <div class="col-md-2">
                            {{ Form::open(array('url' => 'contacts/' . $value->id, 'class' => '')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                            {{ Form::close() }}
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
