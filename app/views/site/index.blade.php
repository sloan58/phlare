@extends('site.layouts.default')

{{-- Content --}}
@section('content')

<!-- content -->

<div class="row">

    @if (!Auth::check())
    <div class="col-lg-10 col-lg-offset-1">
        <div class="jumbotron-icon text-center">
            <i class="fa fa-fire"></i>
            <span class="blue slab" style="color: black">Phlare</span>
        </div>
        <hr style="height:1px;border:none;color:#333;background-color:#333;"/>
        <div class="row index-headings">
            <div class="col-lg-6">
                <h2 class="text-center">What is Phlare?</h2>
                <p class="ubuntu">Phlare is your own personal dial by name directory that's available from any phone in the world, anytime!  If you ever lose your contacts or just don't have them handy you can call Phlare and we'll connect you.</p>
                {{--<p><a class="btn btn-primary" href="#" role="button">View details »</a></p>--}}
            </div>
            <div class="col-lg-6">
                <h2 class="text-center">How does it work?</h2>
                <p class="ubuntu">We store the contacts you create online and when you call Phlare, we can look up your contacts and dial them for you.  Call us from any phone and we'll keep your contacts stored online so you can always reach them.</p>
                {{--<p><a class="btn btn-primary" href="#" role="button">View details »</a></p>--}}
            </div>
            {{--<div class="col-lg-4">--}}
                {{--<h2></h2>--}}
                {{--<div class="col-md-2 col-md-offset-2">--}}
                    {{--<p><a class="btn btn-success" href={{{ URL::to('user/create') }}} role="button">Sign Up!</a></p>--}}
                {{--</div>--}}
            {{--</div>--}}
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
</div>

<!-- ./ content -->

@stop
