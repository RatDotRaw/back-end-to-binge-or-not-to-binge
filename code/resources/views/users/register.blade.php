@extends('layouts.app')
@section('title', 'Register')
@section('content')
    <div class="container">
        <h1>Register</h1>
        <form action="{{ route('users.register.store') }}" method="post">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection
