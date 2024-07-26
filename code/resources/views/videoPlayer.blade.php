@extends('layouts.app')
@section('title', 'videoPlayer')
@section('content')
  <div class="container">
    <div class="showcase">
      {!! $video->url !!}
    </div>

    <h1>{{ $video->title }}</h1>
    <p>{{ $video->description }}</p>
    <br>
    <p>uploaded on: {{ $video->created_at }}</p>
    <p>total views: {{ $video->views }}</p>
    <br>
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
    <br>
    <hr>
    @if($video->tools && $video->tools->count() > 0)
      <div>
        <h2>tools used in this video</h2>
        <div class="tools-section">
          @foreach($video->tools as $tool)
            <div class="tool box">
              <div class="img-div">
                <img src="{{$tool->image}}" alt="">
              </div>
              <p>{{ $tool->name }}</p>
              <a class="shop-button" href="{{$tool->link}}">Buy now!</a>
            </div>
          @endforeach
        </div>
      </div>
    @endif
    <div> {{-- notes, only shown when the user is logged in --}}
      @if($user)
        {{-- if user is logged in --}}
        <h1>Notes</h1>
        <p>add a note to the video</p>
        <form action="{{ route('note.saveNote') }}" method="post">
          @csrf
          <input type="hidden" name="video_id" value="{{ $video->id }}">
          <textarea name="content" placeholder="note"></textarea>
          <button type="submit">add note</button>
        </form>
      @endif
      @if(count($notes) != 0)
        <br>
        <h2>Your notes:</h2>
        <div class="row">
          @foreach($notes as $note)
            {{-- mini form to edit notes --}}
            <form action="{{ route('note.updateNote') }}" method="post">
              @csrf
              <input type="hidden" name="note_id" value="{{ $note->id }}">
              <textarea name="content" placeholder="empty notes will be deleted">{{ $note->content }}</textarea><br>
              <button type="submit">update</button>
            </form><br>
          @endforeach
        </div>
        <br>
        <hr>
      @endif
      <hr>
    </div>
    <h1>More video's for you to watch</h1>
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

{{--    @foreach($randomVideos as $video)--}}
{{--      <div class="col-4">--}}
{{--        <a href="{{ route('video.show', ['id' => $video->id]) }}">--}}
{{--          <p>{{ $video->title }}</p>--}}
{{--          --}}{{-- <div>--}}
{{--          --}}{{--     <p>handy meter:</p>--}}
{{--          --}}{{--     <progress value="{{ $video->likes }}" max="{{ $video->likes + $video->dislikes }}"></progress>--}}
{{--          --}}{{-- </div>--}}
{{--        </a>--}}
{{--      </div>--}}
{{--    @endforeach--}}

  </div>
@endsection
