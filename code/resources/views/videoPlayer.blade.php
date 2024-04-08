@extends('layouts.app')
@section('title', 'videoPlayer')
@section('content')
    <div class="container">
        {!! $video->url !!}
        <h1>{{ $video->title }}</h1>
        <p>{{ $video->description }}</p>
        <p>{{ $video->created_at }}</p>
        <p>{{ $video->views }}</p>
        <div>
            <p>spooky meter:</p>
            <progress value="{{ $video->likes }}" max="{{ $video->likes + $video->dislikes }}"></progress>
        </div>
        <form action="{{ route('video.likeAction') }}" method="post">
            @csrf
            <input type="hidden" name="action" value="like">
            <input type="hidden" name="video_id" value="{{ $video->id }}">
            <button type="submit">very spooky</button>
        </form>
        <form action="{{ route('video.likeAction') }}" method="post">
            @csrf
            <input type="hidden" name="action" value="dislike">
            <input type="hidden" name="video_id" value="{{ $video->id }}">
            <button type="submit">not spooky</button>
        </form>
        <hr>
        {{-- if there is a next_video_id --}}
        @if( $nextVideo )
            <p>Next video:</p>
            {{-- link to the next video --}}
            <a href="{{ route('video.show', ['id' => $video->next_video_id]) }}">
                {{ $nextVideo->title }}
            </a>
            <hr>
        @endif
        {{-- if there is a previous_video_id --}}
        @if( $previousVideo )
            <p>Previous video:</p>
            {{-- link to the previous video --}}
            <a href="{{ route('video.show', ['id' => $previousVideo->id]) }}">
                {{ $previousVideo->title }}
            </a>
            <hr>
        @endif
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
