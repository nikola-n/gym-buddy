<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        //User::factory()->create([
        //    'email'    => 'nikola@thecodeconnectors.nl',
        //    'password' => bcrypt('test1234'),
        //    'roles'    => 'admin',
        //]);

        Blog::factory()->count(5)->create();
    }
}
