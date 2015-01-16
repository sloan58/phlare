@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
Phlare::{{{ Lang::get('user/user.settings') }}}
@stop

{{-- New Laravel 4 Feature in use --}}
@section('styles')
@parent
body {
	background: #f2f2f2;
}
@stop

{{-- Content --}}
@section('content')
<div class="col-lg-6 col-lg-offset-3">
    <div class="page-header">
        <h3>Edit your settings</h3>
    </div>
    <form class="form-horizontal" method="post" action="{{ URL::to('user/' . $user->id . '/edit') }}"  autocomplete="off">
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <!-- ./ csrf token -->
        <!-- General tab -->
        <div class="tab-pane active" id="tab-general">

            <!-- username -->
            <div class="form-group {{{ $errors->has('username') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="username">Username</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="username" id="username" value="{{{ Input::old('username', $user->username) }}}" readonly/>
                    {{ $errors->first('username', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ username -->

            <!-- firstname -->
            <div class="form-group {{{ $errors->has('firstname') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="firstname">First Name</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="firstname" id="firstname" value="{{{ Input::old('firstname', $user->firstname) }}}" />
                    {{ $errors->first('firstname', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ firstname -->

            <!-- lastname -->
                <div class="form-group {{{ $errors->has('lastname') ? 'error' : '' }}}">
                    <label class="col-md-2 control-label" for="lastname">Last Name</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="lastname" id="lastname" value="{{{ Input::old('lastname', $user->lastname) }}}" />
                        {{ $errors->first('lastname', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>
                <!-- ./ firstname -->

            <!-- Email -->
            <div class="form-group {{{ $errors->has('email') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="email">Email</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="email" id="email" value="{{{ Input::old('email', $user->email) }}}" readonly/>
                    {{ $errors->first('email', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ email -->

            <!-- Account Number -->
            <div class="form-group {{{ $errors->has('account_number') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="account_number">Account Number</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="account_number" id="account_number" value="{{{ Input::old('account_number', $user->account_number) }}}" />
                    {{ $errors->first('account_number', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ account number -->

            <!-- PIN -->
                <div class="form-group {{{ $errors->has('pin') ? 'error' : '' }}}">
                    <label class="col-md-2 control-label" for="pin">PIN</label>
                    <div class="col-md-10">
                        <input class="form-control" type="password" name="pin" id="pin" value="{{{ Input::old('pin', $user->pin) }}}" />
                        {{ $errors->first('pin', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>
                <!-- ./ PIN -->

            <!-- Password -->
            <div class="form-group {{{ $errors->has('password') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="password">Password</label>
                <div class="col-md-10">
                    <input class="form-control" type="password" name="password" id="password" value="" />
                    {{ $errors->first('password', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ password -->

            <!-- Password Confirm -->
            <div class="form-group {{{ $errors->has('password_confirmation') ? 'error' : '' }}}">
                <label class="col-md-2 control-label" for="password_confirmation">Password Confirm</label>
                <div class="col-md-10">
                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="" />
                    {{ $errors->first('password_confirmation', '<span class="help-inline">:message</span>') }}
                </div>
            </div>
            <!-- ./ password confirm -->
        </div>
        <!-- ./ general tab -->

        <!-- Form Actions -->
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
        <!-- ./ form actions -->
    </form>
    </form>
</div>
@stop
