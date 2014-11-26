@extends('site.layouts.default')

{{-- Content --}}
@section('content')

<!-- content -->

<div class="row">

    <div class="col-md-8 col-md-offset-2">

    <h1>Showing {{ $contact->name }}</h1>

        <div class="alert alert-info text-center">
            <h2>{{ $contact->name }}</h2>
            <p>
                <strong>Telephone Number:</strong> {{ $contact->number }}<br>
            </p>
        </div>


    </div>
</div>