<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use App\Models\Video;
use Illuminate\Http\Request;


class NoteController extends Controller
{
    function index()
    {
        $user = auth()->user();
        // check if user is logged in
        if (!$user) return redirect()->route('home')->with('error', 'You need to be logged in to view notes');

        // get notes
        $notes = Notes::where('user_id', $user->id)->get();

        $videos = [];
        foreach ($notes as $note) { // DON'T TOUCH, THIS WORKS! IT TOOK ME 2 HOURS TO FIGURE THIS OUT
           $videoId = $note->video_id;
            // check if video is already in videos array
            foreach ($videos as $video) {
                if ($video->id == $videoId) continue 2;
            }

            // get video from database
            $videos[] = Video::find($videoId);
        }

        return view('notes', ['notes' => $notes, 'videos' => $videos]);
    }
    function save(Request $request)
    {
        // validate request
        $request->validate([
            'content' => 'required',
            'video_id' => 'required'
        ]);

        // get user
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('home')->with('error', 'You need to be logged in to add notes');
        }

        // save note
        $note = new Notes();
        $note->content = $request->content;
        $note->video_id = $request->video_id;
        $note->user_id = $user->id;
        $note->save();

        // redirect back to the video
        return redirect()->route('video.show', ['id' => $request->video_id]);
    }
    function delete(Request $request)
    {
        // validate request
        $request->validate([
            'note_id' => 'required'
        ]);

        // get user
        $user = auth()->user();
        if (!$user) return redirect()->route('home')->with('error', 'You need to be logged in to delete notes');

        // get note
        $note = Notes::find($request->note_id);
        if (!$note) return redirect()->route('home')->with('error', 'Note not found with id: '. $request->note_id);

        // check if user is the owner of the note
        if ($note->user_id != $user->id) return redirect()->route('home')->with('error', 'You are not the owner of this note');

        // delete note
        $note->delete();
        return redirect()->route('note.index');
    }
    function update(Request $request)
    {
        // validate request
        $request->validate([
            'note_id' => 'required'
        ]);

        // get user
        $user = auth()->user();
        if (!$user) return redirect()->route('home')->with('error', 'You need to be logged in to update notes');


        // get note
        $note = Notes::find($request->note_id);
        if (!$note) return redirect()->route('home')->with('error', 'Note not found with id: '. $request->note_id);


        // check if user is the owner of the note
        if ($note->user_id != $user->id) return redirect()->route('home')->with('error', 'You are not the owner of this note');

        // delete note if note is empty
        if ($request->content == "") {
            $note->delete();
            return redirect()->route('video.show', ['id' => $note->video_id]);
        } else {
            // update note
            $note->content = $request->content;
            $note->save();
            return redirect()->route('video.show', ['id' => $note->video_id]);
        }
    }
}
