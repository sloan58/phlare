@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
Phlare::Register
@stop

{{-- Content --}}
@section('content')
<div class="col-lg-6 col-lg-offset-3">
    <div class="page-header text-center">
        <h1>Signup</h1>
    </div>
    {{ Confide::makeSignupForm()->render() }}
</div>
@stop
