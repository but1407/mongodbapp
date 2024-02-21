<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Database\Seeders\DB;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Post::insert([
        //     'title' => 'heeeehh'
        // ]);
        // DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle'])
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
            ]
        );
    }
}