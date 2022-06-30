<?php

namespace Database\Seeders;

use App\Models\Admin;
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
        // User::factory(10)->create();
        Admin::create([
            'name' => 'Admin Gamebox',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'image' => ''
        ]);
    }
}
