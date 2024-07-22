<?php

namespace App\Http\Controllers;

use App\Models\DailyVideo;
use App\Models\User;
use App\Models\Video;
use App\Models\VideoHistory;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    function makeIframe($url) {
        return '<iframe width="560" height="315" src="'. $url .'" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
    }
    function randomRedirect()
    {
        $randomVideo = $this->randomVideo()->id;
        return redirect()->route('video.show', ['id' => $randomVideo]);
    }
    function randomVideo()
    {
        $randomVideo = Video::All()->random();
        return $randomVideo;
    }
    function randomVideos($count)
    {
        // check if there are enough videos in database
        // if not return all videos
        if (Video::count() < $count) {
            return Video::All()->shuffle();
        }

        // get max $count of random videos
        $randomVideos = Video::All()->random($count);
        return $randomVideos;
    }
    function show($id)
    {
        $video = Video::find($id);

        if (!$video) {
            return redirect()->route('home')->with('error', 'Video not found with id: '. $id);
        }

        // check if user is logged in
        if (auth()->check()) {
            $user = auth()->user();

            // get last viewed video and check if it is the same as current video
            $lastVideo = VideoHistory::where('user_id', $user->id)->orderBy('watched_at', 'desc')->first() ?? new VideoHistory();
            if ($lastVideo->video_id != $video->id) {
                // save video to history
                $videoHistory = new VideoHistory();
                $videoHistory->user_id = $user->id;
                $videoHistory->video_id = $video->id;
                $videoHistory->save();
            }
        }

        // update views value
        $video->views = $video->views + 1;
        $video->save();

        $video->url = $this->makeIframe($video->url);

        // get random video's
        $randomVideos = $this->randomVideos(10);

        return view('videoPlayer', ['video' => $video, 'randomVideos' => $randomVideos]);
    }

    function getDailyVideo() {
        $video = DailyVideo::orderBy('shown_at', 'desc')->first();

        // check if $video is empty or video is older than 24 hours
        if (!$video || $video->shown_at < now()->subDay()) {
            $video = new DailyVideo();
            $video->video_id = $this->randomVideo()->id;
            $video->save();
        }

        // get video object
        $video = Video::find($video->video_id);
        return $video;
    }

    function likeAction(Request $request)
    {


        $video = Video::find($request->video_id);
        if ($video) {
            if ($request->action == 'like') {
                $video->likes = $video->likes + 1;
            } if ($request->action == 'dislike') {
                $video->dislikes = $video->dislikes + 1;
            }
            $video->save();
            return redirect()->route('video.show', ['id' => $video->id]);
        }

        // video not found
        return redirect()->route('home')->with('error', 'Video not found');
    }
}
