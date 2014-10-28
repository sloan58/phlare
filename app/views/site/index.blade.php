@extends('site.layouts.default')

{{-- Content --}}
@section('content')

<!-- content -->

<div class="row">

    @if (!Auth::check())
    <div class="col-lg-10 col-lg-offset-1">
        <div class="jumbotron jumbotron-icon text-center">
            <i class="fa fa-fire "></i>
            <span class="blue slab">Phlare</span>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h2>What is Phlare?</h2>
                <p></p>
                <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
            </div>
            <div class="col-lg-4">
                <h2>How does it work?</h2>
                <p></p>
                <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
            </div>
            <div class="col-lg-4">
                <h2></h2>
                <div class="col-md-2 col-md-offset-2">
                    <p><a class="btn btn-success" href={{{ URL::to('user/create') }}} role="button">Sign Up!</a></p>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="col-lg-10 col-lg-offset-1">
        <div class="jumbotron jumbotron-icon text-center">
            <i class="fa fa-fire "></i>
            <span class="blue slab">Phlare</span>
        </div>
    </div>
    @endif
</div>

<!-- ./ content -->

@stop
