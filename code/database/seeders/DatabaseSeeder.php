<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // run the seeders
        $toolsSeeder = new ToolsSeeder();
        $toolsSeeder->run(); // important that tools are generated before video's

        $videoSeeder = new VideoSeeder();
        $videoSeeder->run();


        // insert dummy user
        $user = new User();
        $user->name = 'John Doe';
        $user->email = 'user@user';
        $user->password = bcrypt('changeme');
        $user->save();

        // User::factory(10)->create();
        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}
