<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        $list = [
            [
                'id' => 1,
                'title' => 'MyHouse.WAD',
                'description' => 'A map uploaded by an unknown user, with secrets hidden deep inside its walls...',
                'url' => 'https://www.youtube.com/embed/5wAo54DHDY0?si=wpWerY1-0lRWFTv7',
            ],
            [
                'id' => 2,
                'title' => 'The Spaghetti Monster — Creepypasta narrated',
                'description' => 'The Spaghetti monster is the second part part of a creepypasta, horror, scary story.',
                'url' => 'https://www.youtube.com/embed/j05GUKWzGmc?si=RXdjHwVyo0me1NBU',
            ],
            [
                'id' => 3,
                'title' => 'Vita Carnis - Living Meat Research Documentary 1 - Intro and The Crawl',
                'description' => 'Documentary of the Vita Carnis Species',
                'url' => 'https://www.youtube.com/embed/xNc-jv3d2o0?si=kEn2qf9X_0EgQIO0',
            ],
            [
                'id' => 4,
                'title' => 'Vita Carnis - Living Meat Research Documentary 2 - Trimmings',
                'description' => 'Documentary of the Vita Carnis Species',
                'url' => 'https://www.youtube.com/embed/1vK0rZm4dyk?si=orkhpgOUIj3qVoQX',
            ],
            [
                'id' => 5,
                'title' => 'The Mandela Catalogue Vol. 1',
                'description' => '',
                'url' => 'https://www.youtube.com/embed/C8d12w6pMos?si=Kv5LsDZCjt6-VSUY',
            ],
            [
                'id' => 6,
                'title' => 'The Mandela Catalogue Vol.2',
                'description' => '',
                'url' => 'https://www.youtube.com/embed/XuDMawgx5Mw?si=zBpUU0k_rQrN4BuN',
            ]
        ];

        // add videos to database
        foreach ($list as $video) {
            $videoModel = new \App\Models\Video();
            // set id manually
            $videoModel->id = $video['id'];
            $videoModel->title = $video['title'];
            $videoModel->description = $video['description'];
            $videoModel->url = $video['url'];
            // $videoModel->next_video_id = $video['next_video_id'];
            $videoModel->save();
        }

        // insert dummy user
        $user = new \App\Models\User();
        $user->name = 'John Doe';
        $user->email = 'user@user';
        $user->password = bcrypt('changeme');
    }
}
