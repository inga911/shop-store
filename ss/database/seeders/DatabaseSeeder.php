<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 1,
            'password' => Hash::make('123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Client',
            'email' => 'client@gmail.com',
            'role' => 10,
            'password' => Hash::make('123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Client2',
            'email' => 'client2@gmail.com',
            'role' => 10,
            'password' => Hash::make('123'),
        ]);

        $categoryTypes = [
            'CATEGORY 1',
            'CATEGORY 2',
            'CATEGORY 3',
            'CATEGORY 4'
        ];

        foreach ($categoryTypes as $type) {
            DB::table('categories')->insert([
                'category_type' => $type,
            ]);
        }

        $productTitles = [
            'PRODUCT 1',
            'PRODUCT 2',
            'PRODUCT 3',
            'PRODUCT 4',
            'PRODUCT 5',
            'PRODUCT 6',
            'PRODUCT 7',
            'PRODUCT 8',
            'PRODUCT 9',
            'PRODUCT 10',
        ];

        foreach (range(1, 10) as $_) {
            $categoryId = rand(1, count($categoryTypes));
            $randomTitleIndex = array_rand($productTitles);
            $title = $productTitles[$randomTitleIndex];
            
            $id = DB::table('products')->insertGetId([
                'product_title' => $title,
                'product_description' => $faker->text($maxNbChars = 500),
                'product_how_to_use' => $faker->text($maxNbChars = 300),
                'product_warnings' => $faker->text($maxNbChars = 500),
                'product_ingredients' => $faker->text($maxNbChars = 600),
                'product_price' => rand(100, 5000) / 100,
                'category_id' => $categoryId
            ]);
        }
    }
}
