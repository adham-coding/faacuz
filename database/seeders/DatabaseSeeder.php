<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::create([
            'name' => 'laziz',
            'email' => 'laziz@laziz',
            'email_verified_at' => now(),
            'password' => bcrypt('laziz@laziz'),
            'remember_token' => Str::random(10),
        ]);

        // $categories = \App\Models\Category::factory(5)->create();
        // $products = \App\Models\Product::factory(25)->create();
        // $abouts = \App\Models\About::factory(4)->create();
        \App\Models\Contact::factory(1)->create();

        // foreach ($categories as $category) { 
        //     $category->update(['order' => $category->id]);
        // }

        // foreach ($products as $product) { 
        //     $product->update(['order' => $product->id]);
        // }

        // foreach ($abouts as $about) { 
        //     $about->update(['order' => $about->id]);
        // }

        // php artisan migrate:fresh --seed
    }
}
