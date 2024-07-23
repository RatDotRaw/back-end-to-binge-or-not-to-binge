@extends('layouts.app')
@section('title', 'videoPlayer')
@section('content')
    <div class="container">
        <div class="showcase">
            {!! $video->url !!}
        </div>

        <h1>{{ $video->title }}</h1>
        <p>{{ $video->description }}</p>
        <p>uploaded on: {{ $video->created_at }}</p>
        <p>total views: {{ $video->views }}</p>
        <div class="align-vertically">
            <p>handy meter:</p>
            <progress value="{{ $video->likes }}" max="{{ $video->likes + $video->dislikes }}"></progress>
        </div>
        <div class="align-vertically">
            <form action="{{ route('video.likeAction') }}" method="post">
                @csrf
                <input type="hidden" name="action" value="like">
                <input type="hidden" name="video_id" value="{{ $video->id }}">
                <button type="submit">very handy</button>
            </form>
            <form action="{{ route('video.likeAction') }}" method="post">
                @csrf
                <input type="hidden" name="action" value="dislike">
                <input type="hidden" name="video_id" value="{{ $video->id }}">
                <button type="submit">not handy</button>
            </form>
        </div>
        <hr>
        <div> {{-- notes, only shown when the user is logged in --}}
            @if($user) {{-- if user is logged in --}}
                <form action="{{ route('video.addNote') }}" method="post">
                    @csrf
                    <input type="hidden" name="video_id" value="{{ $video->id }}">
                    <input type="text" name="note" placeholder="note">
                    <button type="submit">add note</button>
                </form>
            @endif
            @if(count($notes) != 0)
                dd($notes);
                <h1>Your notes</h1>
                <div class="row">
                    @foreach($notes as $note)
                        {{-- mini form to edit notes --}}
                        <form action="{{ route('video.editNote') }}" method="post">
                            @csrf
                            <input type="hidden" name="note_id" value="{{ $note->id }}">
                            <input type="text" name="note" value="{{ $note->note }}">
                            <button type="submit">edit</button>
                        </form>
                    @endforeach
                </div>
                <hr>
            @endif
        </div>
        <h1>More video's for you to watch</h1>
        @foreach($randomVideos as $video)
            <div class="col-4">
                <a href="{{ route('video.show', ['id' => $video->id]) }}">
                    <p>{{ $video->title }}</p>
                    {{-- <div>--}}
                    {{--     <p>handy meter:</p>--}}
                    {{--     <progress value="{{ $video->likes }}" max="{{ $video->likes + $video->dislikes }}"></progress>--}}
                    {{-- </div>--}}
                </a>
            </div>
        @endforeach
    </div>
@endsection
