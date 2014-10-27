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
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
            </div>
            <div class="col-lg-4">
                <h2>What is the cost?</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
            </div>
            <div class="col-lg-4">
                <h2>How can I get it?</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
                <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
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
