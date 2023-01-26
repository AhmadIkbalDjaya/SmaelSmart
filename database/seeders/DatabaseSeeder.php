<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'username' => 'admin',
            'password' => bcrypt('password'),
            'name'=>'admin',
            'level' => 1,
        ]);
        User::create([
            'username' => 'suha',
            'password' => bcrypt('password'),
            'name'=>'suha',
            'level' => 2,
        ]);
        User::create([
            'username' => 'ikbalDjaya',
            'password' => bcrypt('password'),
            'name'=>'Ahmad Ikbal Djaya',
            'level' => 3,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
