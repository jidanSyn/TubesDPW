<?php

namespace Database\Seeders;

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
            'name' => 'Jidan Abdurahman Aufan',
            'username' => 'jidan_',
            'email' => 'ark@akmail.com',
            'password' => bcrypt('abcd1234'),
            'is_admin' => 1
        ]);

        User::create([
            'name' => 'Repan Dhia Nararya',
            'username' => 'repan_',
            'email' => 'ark1@akmail.com',
            'password' => bcrypt('abcd1234'),
            'is_admin' => 1
        ]);
        User::factory(5)->create();

    }
}
