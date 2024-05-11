@extends('layouts.app')
@section('title', 'My profile')
@section('content')
    <h1>username: {{ $user->name }}</h1>
    <div class="box">
        <p>bio:</p>
        <p>{{ $user->bio }}</p>
    </div>

    {{-- if the user id is the same as the authenticated user id --}}
    @if( $user->id === Auth::id() )
        <hr>
        <form class="box" action="{{ route('user.update') }}" method="post">
            @csrf
            <h1>update profile shenanigans</h1>
            <input type="hidden" name="id" value="{{ $user->id }}">
            <label for="name">name:</label>
            <input type="text" name="name" value="{{ $user->name }}"><br>
            <label for="bio">bio:</label>
            <input type="text" name="bio" value="{{ $user->bio }}"><br>
            <button type="submit">Update</button>
    @endif
@endsection
