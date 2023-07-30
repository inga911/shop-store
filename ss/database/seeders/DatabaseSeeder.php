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

        $categoryTypes = [
            'Cream',
            'Powder',
            'Tablets',
            'Drink'
        ];

        foreach ($categoryTypes as $type) {
            DB::table('categories')->insert([
                'category_type' => $type,
            ]);
        }

        foreach (range(1, 10) as $_) {
            $categoryId = rand(1, count($categoryTypes));
            $id = DB::table('products')->insertGetId([
                'product_title' => $faker->catchPhrase,
                'product_description' => $faker->text($maxNbChars = 50),
                'product_how_to_use' => $faker->text($maxNbChars = 30),
                'product_warnings' => $faker->text($maxNbChars = 50),
                'product_ingredients' => $faker->text($maxNbChars = 60),
                'product_price' => rand(100, 5000) / 100,
                'category_id' => $categoryId
            ]);
        }
    }
}
