<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Users
        |--------------------------------------------------------------------------
        */

        $admin = User::create([
            'name' => 'Admin Kosmetik',
            'email' => 'admin@kosmetik.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $editor = User::create([
            'name' => 'Editor Kosmetik',
            'email' => 'editor@kosmetik.test',
            'password' => Hash::make('password'),
            'role' => 'editor',
        ]);

        $users = User::factory(8)->create([
            'role' => 'user',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        $categories = Category::insert([
            [
                'name' => 'Skincare',
                'description' => 'Produk perawatan dan kesehatan kulit.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Makeup',
                'description' => 'Produk kosmetik untuk tata rias wajah.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hair Care',
                'description' => 'Produk perawatan rambut.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Body Care',
                'description' => 'Produk perawatan tubuh.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fragrance',
                'description' => 'Produk parfum dan wewangian.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Beauty Tools',
                'description' => 'Peralatan pendukung kecantikan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Tags
        |--------------------------------------------------------------------------
        */

        $tagNames = [
            'Best Seller',
            'New Arrival',
            'Promo',
            'Popular',
            'Natural',
            'Vegan',
            'Sensitive Skin',
            'Waterproof',
            'Brightening',
            'Hydrating',
        ];

        $tags = collect();

        foreach ($tagNames as $tagName) {
            $tags->push(
                Tag::create([
                    'name' => $tagName,
                ])
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Products
        |--------------------------------------------------------------------------
        */

        $categoryIds = Category::pluck('id');
        $userIds = User::pluck('id');

        Product::factory(60)->create([
            'category_id' => fn () => $categoryIds->random(),
            'user_id' => fn () => $userIds->random(),
        ])->each(function (Product $product) use ($tags) {
            $product->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
