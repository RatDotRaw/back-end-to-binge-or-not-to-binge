<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [
            [
                'id' =>1,
                'name' => 'hammer',
                'description' => 'A hammer is a tool consisting of a weighted "head" fixed to a long handle that is swung to deliver an impact to a small area of an object.', // ai generated
                'link' => 'https://en.wikipedia.org/wiki/Hammer',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/84/Claw-hammer.jpg/1920px-Claw-hammer.jpg',
            ],
            [
                'id' =>2,
                'name' => 'screwdriver',
                'description' => 'A screwdriver is a tool, manual or powered, used for screwing (installing) and unscrewing (removing) screws.', // ai generated
                'link' => 'https://en.wikipedia.org/wiki/Screwdriver',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/1/1c/Screw_Driver_display.jpg',
            ],
            [
                'id' =>3,
                'name' => 'wrench',
                'description' => 'A wrench or spanner is a tool used to provide grip and mechanical advantage in applying torque to turn objects—usually rotary fasteners, such as nuts and bolts—or keep them from turning.', // ai generated
                'link' => 'https://en.wikipedia.org/wiki/Wrench',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1c/Gedore_No._7_combination_wrenches_6%E2%80%9319_mm.jpg/800px-Gedore_No._7_combination_wrenches_6%E2%80%9319_mm.jpg',
            ],
            [
                'id' =>4,
                'name' => 'pliers',
                'description' => 'Pliers are a hand tool used to hold objects firmly, possibly developed from tongs used to handle hot metal in Bronze Age Europe.', // ai generated
                'link' => 'https://en.wikipedia.org/wiki/Pliers',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/5/51/Tool-pliers.jpg',
            ],
            [
                'id' =>5,
                'name' => 'tape measure',
                'description' => 'A tape measure or measuring tape is a flexible ruler used to measure size or distance.', // ai generated
                'link' => 'https://en.wikipedia.org/wiki/Tape_measure',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/5/5e/Tape_measure_colored.jpeg',
            ],
        ];

        foreach ($list as $tool) {
            $toolModel = new Tool();
            $toolModel->id = $tool['id'];
            $toolModel->name = $tool['name'];
            $toolModel->description = $tool['description'];
            $toolModel->link = $tool['link'];
            $toolModel->image = $tool['image'];
            $toolModel->save();
        }
    }
}
