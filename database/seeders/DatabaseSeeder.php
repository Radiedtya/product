<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // menambahkan data produk lewat model Product
        Product::create([
            'name'        => 'Basreng Spesial',
            'description' => 'basareng spesial pedas manis',
            'price       '=> 3000,
            'stock'       => 5000,
        ]);

        // menambahkan data produk lewat seeder terpisah
        // $this->call([
        //     ProductsTableSeeder::class,
        // ]);
    }
}
