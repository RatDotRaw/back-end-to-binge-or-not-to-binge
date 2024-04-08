@extends('layouts.app')
@section('title', 'Register')
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="container">
        <h1>HOME</h1>
    </div>
    <h1>daily spotlight!</h1>
    {!! $dailyVideo->url !!}
    <hr>
    <div class="container">
        <h1>random videos for you to pick and watch</h1>
        <div class="row">
            @foreach($randomVideos as $video)
                <div class="col-4">
                    <a href="{{ route('video.show', ['id' => $video->id]) }}">
                        {!! $video->url !!}
                        <h1>{{ $video->title }}</h1>
                        <p>{{ $video->description }}</p>
                        <p>{{ $video->created_at }}</p>
                        <div>
                            <p>spooky meter:</p>
                            <progress value="{{ $video->likes }}" max="{{ $video->likes + $video->dislikes }}"></progress>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
@endsection
