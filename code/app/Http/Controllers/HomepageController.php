<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    function index()
    {
        // get daily video
        $videoController = new VideoController();
        $dailyVideo = $videoController->getDailyVideo();
        $dailyVideo->url = $videoController->makeIframe($dailyVideo->url);
        $randomVideos = $videoController->randomVideos(10);
        // create list of iframes of randomvideos
        foreach ($randomVideos as $video) {
            $video->url = $videoController->makeIframe($video->url);
        }

        return view('home', ['dailyVideo' => $dailyVideo, 'randomVideos' => $randomVideos]);
    }
}
