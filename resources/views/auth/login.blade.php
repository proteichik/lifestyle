@extends('layouts.site')

@section('content')
    <div class="login">
        <div class="login-grids">
            <div class="col-md-12 log">
                <h3>Login</h3>
                <form role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <h5>Email:</h5>
                    <input type="text" name="email" value="{{ old('email') }}">
                    <h5>Password:</h5>
                    <input id="password" type="password" name="password" required>
                    <input type="submit" value="Login">
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection