<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Product;
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
        // User::factory(5)->create();
        
        Game::create([
            'name' => 'Mobile Legend',
            'foto' => 'mobilelegend.jpg',
        ]);

        Game::create([
            'name' => 'Genshin',
            'foto' => 'genshin.jpg',
        ]);

        Game::create([
            'name' => 'Honkai',
            'foto' => 'hsr.jpg',
        ]);

        Product::create([
            'game_id' => '1',
            'name' => '90 Diamond',
            'foto' => 'diamond_ml.jpg',
            'harga' => '30.000',
        ]);

        Product::create([
            'game_id' => '1',
            'name' => '900 Diamond',
            'foto' => 'diamond_ml.jpg',
            'harga' => '300.000',
        ]);
        
        Product::create([
            'game_id' => '2',
            'name' => '120 primo',
            'foto' => 'primo_genshin.jpg',
            'harga' => '40.000',
        ]);
        
        Product::create([
            'game_id' => '2',
            'name' => '200 primo',
            'foto' => 'primo_genshin.jpg',
            'harga' => '90.000',
        ]);
        Product::create([
            'game_id' => '2',
            'name' => '120 primo',
            'foto' => 'primo_genshin.jpg',
            'harga' => '40.000',
        ]);
        
        Product::create([
            'game_id' => '2',
            'name' => '200 primo',
            'foto' => 'primo_genshin.jpg',
            'harga' => '90.000',
        ]);
        Product::create([
            'game_id' => '2',
            'name' => '120 primo',
            'foto' => 'primo_genshin.jpg',
            'harga' => '40.000',
        ]);
        
        Product::create([
            'game_id' => '2',
            'name' => '200 primo',
            'foto' => 'primo_genshin.jpg',
            'harga' => '90.000',
        ]);
        
        Product::create([
            'game_id' => '3',
            'name' => '80 crystal',
            'foto' => 'crystal.jpg',
            'harga' => '27.000',
        ]);

        Product::create([
            'game_id' => '3',
            'name' => '180 crystal',
            'foto' => 'crystal.jpg',
            'harga' => '200.000',
        ]);
    }
}
