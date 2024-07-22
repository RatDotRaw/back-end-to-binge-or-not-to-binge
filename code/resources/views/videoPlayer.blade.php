@extends('layouts.app')
@section('title', 'videoPlayer')
@section('content')
    <div class="container">
        <div class="showcase">
            {!! $video->url !!}
        </div>

        <h1>{{ $video->title }}</h1>
        <p>{{ $video->description }}</p>
        <p>{{ $video->created_at }}</p>
        <p>{{ $video->views }}</p>
        <div class="align-vertically">
            <p>spooky meter:</p>
            <progress value="{{ $video->likes }}" max="{{ $video->likes + $video->dislikes }}"></progress>
        </div>
        <div class="align-vertically">
            <form action="{{ route('video.likeAction') }}" method="post">
                @csrf
                <input type="hidden" name="action" value="like">
                <input type="hidden" name="video_id" value="{{ $video->id }}">
                <button type="submit">very spooky</button>
            </form>
            <form  action="{{ route('video.likeAction') }}" method="post">
                @csrf
                <input type="hidden" name="action" value="dislike">
                <input type="hidden" name="video_id" value="{{ $video->id }}">
                <button type="submit">not spooky</button>
            </form>
        </div>
        <hr>
        <h1>More video's for you to watch</h1>
        @foreach($randomVideos as $video)
            <div class="col-4">
                <a href="{{ route('video.show', ['id' => $video->id]) }}">
                    <p>{{ $video->title }}</p>
{{--                    <div>--}}
{{--                        <p>spooky meter:</p>--}}
{{--                        <progress value="{{ $video->likes }}" max="{{ $video->likes + $video->dislikes }}"></progress>--}}
{{--                    </div>--}}
                </a>
            </div>
        @endforeach
    </div>
@endsection
