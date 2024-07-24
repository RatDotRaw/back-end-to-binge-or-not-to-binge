
@extends('layouts.app')
@section('title', 'videoPlayer')
@section('content')
<div>
    <h1>All your notes</h1>

    @if(count($notes) > 0)
        <ul>
            {{-- loop through all video's to then loop through all related notes --}}
            @foreach($videos as $video)

                <div class="box">
                    <a href="{{ route('video.show', ['id' => $video->id]) }}"><h2>{{ $video->title }}</h2></a>
                    <ul>
                        @foreach($notes as $note)
                            @if($note->video_id == $video->id)
                                <div>
                                    {{-- mini form to edit notes --}}
                                    <form action="{{ route('note.updateNote') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="note_id" value="{{ $note->id }}">
                                        <textarea name="content" placeholder="empty notes will be deleted">{{ $note->content }}</textarea><br>
                                        <button type="submit">update</button>
                                    </form>
                                    {{-- mini form to delete notes --}}
                                    <form action="{{ route('note.deleteNote') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="note_id" value="{{ $note->id }}">
                                        <button type="submit">delete</button>
                                    </form>
                                    <hr>
                                </div>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </ul>
    @else
        <p>You have no notes yet</p>
    @endif
</div>
@endsection
