@extends('layouts.login-layout',['title' => 'Login'])

@section('sidebar')
    @parent

@endsection

@section('content')
<form method="POST" action="/login" class="signin">
    {!! csrf_field() !!}

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email">
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div>
        <input type="checkbox" name="remember"> Remember Me
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Login</button>
    </div>
</form>

@endsection