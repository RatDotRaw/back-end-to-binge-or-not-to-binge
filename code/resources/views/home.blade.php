@extends('layouts.app')
@section('title', 'Home')
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="showcase">
        <h1>HOME</h1>
        <h1>daily spotlight!</h1>
        <a href="{{ route('video.show', ['id' => $dailyVideo->id]) }}">
            {!! $dailyVideo->url !!}
            <h1>{{ $dailyVideo->title }}</h1>
        </a>

    </div>
    <hr>
    <div class="container">
        <h1>random videos for you to pick and watch</h1>
        <div class="tiler">
            @foreach($randomVideos as $video)
                <div class="box">
                    <a href="{{ route('video.show', ['id' => $video->id]) }}">
                        {!! $video->url !!}
                        <div>
                            <p class="title">{{ $video->title }}</p>
                            <p>{{ $video->description }}</p>
                            <p>uploaded on: {{ $video->created_at }}</p>
                            <div class="align-vertically">
                                <p>handy meter:</p>
                                <progress value="{{ $video->likes }}" max="{{ $video->likes + $video->dislikes }}"></progress>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
@endsection
