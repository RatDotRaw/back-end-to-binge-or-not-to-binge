@extends('layouts.app')
@section('title', 'history')
@section('content')
    <div class="container">
        <h1>History</h1>
        <div class="row">
            @foreach($history as $video)
                <div class="box">
                    <a href="{{ route('video.show', ['id' => $video->id]) }}">
                        <p class="title">{{ $video->title }}</p>
                        <p>{{ $video->description }}</p>
                        <p>uploaded on: {{ $video->created_at }}</p>
                        <div class="align-vertically">
                            <p>handy meter:</p>
                            <progress value="{{ $video->likes }}" max="{{ $video->likes + $video->dislikes }}"></progress>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
