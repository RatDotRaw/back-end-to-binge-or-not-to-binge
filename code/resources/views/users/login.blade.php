@extends('layouts.app')
@section('title', 'login')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <h1>Login</h1>
        <form action="{{ route('users.login.store') }}" method="post">
            @csrf
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection
