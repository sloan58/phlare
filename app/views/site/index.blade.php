@extends('site.layouts.default')

{{-- Content --}}
@section('content')

<!-- content -->

<div class="row">

    @if (!Auth::check())
    <div class="col-lg-12">
        <div class="jumbotron-icon text-center">
            <i class="fa fa-fire"></i>
            <span class="blue slab" style="color: black">Phlare</span>
        </div>
        <hr style="height:1px;border:none;color:#333;background-color:#333;"/>
        <div class="row index-headings">
            <div class="col-lg-4">
                <h2 class="text-center">What is Phlare?</h2>
                <p class="ubuntu">Phlare is your own personal dial by name directory that's available from any phone, anytime!</p>
                {{--<p><a class="btn btn-primary" href="#" role="button">View details »</a></p>--}}
            </div>
            <div class="col-lg-4">
                <h2 class="text-center">How does it work?</h2>
                <p class="ubuntu">Phlare stores your contacts online so when you call in, we look up the contact you need to reach and then dial them for you.</p>
                {{--<p><a class="btn btn-primary" href="#" role="button">View details »</a></p>--}}
            </div>
            <div class="col-lg-4">
                <h2 class="text-center">Why use Phlare?</h2>
                <p class="ubuntu">Ever needed to make a call but you can't remember the number?  Add your contacts to Phlare and you'll never be out of touch.</p>
                {{--<p><a class="btn btn-primary" href="#" role="button">View details »</a></p>--}}
            </div>
            {{--<div class="col-lg-4">--}}
                {{--<h2></h2>--}}
                {{--<div class="col-md-2 col-md-offset-2">--}}
                    {{--<p><a class="btn btn-success" href={{{ URL::to('user/create') }}} role="button">Sign Up!</a></p>--}}
                {{--</div>--}}
        </div>
    </div>
</div>
    @else
    <div class="col-lg-10 col-lg-offset-1">
        <div class="jumbotron-icon text-center">
            <i class="fa fa-fire "></i>
            <span class="blue slab" style="color: black">Phlare</span>
        </div>
    </div>
    @endif

<!-- ./ content -->

@stop
