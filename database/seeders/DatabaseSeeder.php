<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Waste;
use App\Models\Category;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin1',
            'password' => bcrypt('123456')
        ]);

        Category::create([
            'name' => 'Plastic',
            'slug' => 'plastic'
        ]);
        
        Category::create([
            'name' => 'Glass',
            'slug' => 'glass'
        ]);
        
        Category::create([
            'name' => 'Bottle',
            'slug' => 'bottle'
        ]);
        
        Category::create([
            'name' => 'Paper',
            'slug' => 'paper'
        ]);

        Waste::factory(10)->create();
    }
}
