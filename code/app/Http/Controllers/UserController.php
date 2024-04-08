<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VideoHistory;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function profile($id) {
        $user = User::find($id);
        return view('users.profile', ['user' => $user]);
    }

    function editProfile(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'bio' => 'required'
        ]);

        // check if user is editing his own profile
        if ($request->id != auth()->user()->id) {
            return redirect()->route('home');
        }

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->bio = $request->bio;
        $user->save();
        return redirect()->route('users.profile', ['id' => $request->id]);
    }

    function history() {
        // check if user is logged in
        if (!auth()->check()) {
            return redirect()->route('home');
        }

        $user = User::find(auth()->user()->id);
        $history = VideoHistory::where('user_id', $user->id)
            ->join('videos', 'video_histories.video_id', '=', 'videos.id')
            ->select('videos.*', 'video_histories.watched_at')
            ->orderBy('video_histories.watched_at', 'desc')
            ->get();
//        $history = VideoHistory::where('user_id', $user->id)->with('video')->orderBy('watched_at', 'desc')->get() ?? new VideoHistory();
        return view('users.history', ['history' => $history]);
    }
}
