<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        \App\Models\Category::factory(6)->create();
        \App\Models\Product::factory(22)->create();
        DB::table('home_sliders')->insert(
            [
                'id' => 1,
                'title' => 'Gear i Back to school',
                'subtitle' => 'PC Gaming | Laptop Gaming Gear | Màn Hinh',
                'price' => 99,
                'link' => 'http://127.0.0.1:8000/',
                'image' => 'back-to-school-la-gi-va-lich-cua-mot-so-nuoc-thumb-1.jpg',
                'status' => 1,
                'created_at' => '2023-11-23 06:42:06',
                'updated_at' => '2023-11-23 06:42:06'
            ]
        );
        DB::table('sales')->insert(
            [
                'id' => 1,
                'sale_date' => '2023-11-23 13:39:29',
                'status' => 1
            ]
        );
        DB::table('home_categories')->insert(
            [
                'id' => 1,
                'sel_categories' => '1,2',
                'no_of_products' => 5
            ]
        );
        DB::table('users')->insert(
            [
                'id' => 1, 'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('admin'),
                'profile_photo_path' => 'hinhthe3x4.jpg',
                'utype' => 'ADM'
            ]
        );
    }
}
