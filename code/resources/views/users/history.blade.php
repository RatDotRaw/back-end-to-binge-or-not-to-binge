@extends('layouts.app')
@section('title', 'history')
@section('content')
    <div class="container">
        <h1>History</h1>
        <div class="row">
            @foreach($history as $video)
                <div class="col-4">
                    <a href="{{ route('video.show', ['id' => $video->id]) }}">
                        <p>{{ $video->title }}</p>
                        <div>
                            <p>spooky meter:</p>
                            <progress value="{{ $video->likes }}" max="{{ $video->likes + $video->dislikes }}"></progress>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
