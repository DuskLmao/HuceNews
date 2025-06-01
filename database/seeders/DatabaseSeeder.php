<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        DB::table('users')->insert([
            'name' => 'admin',
            'username' => 'admin',
            'image' => 'avatar.jpg',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 1,
            'active' => 1
        ]);
        DB::table('abouts')->insert([
            'id' => 1,
            'logo' => 'logo.jpg',
            'phone' => '123456789',
            'email' => 'example@gmail.com',
            'address' => '123 street, state, city',
            'linkfb' => 'facebook.com',
            'copyright' => 'copyrigt',
            'linkcopyright' => 'link copyrigt'
        ]);
    }
}
