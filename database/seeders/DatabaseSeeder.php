<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Inserir sellers
        DB::table('sellers')->insert([
            ['name' => 'Seller 1', 'email' => 'seller1@example.com'],
            ['name' => 'Seller 2', 'email' => 'seller2@example.com'],
            ['name' => 'Seller 3', 'email' => 'seller3@example.com'],
        ]);

        // Inserir products
        DB::table('products')->insert([
            ['seller_id' => 1, 'name' => 'Product A', 'amount' => 100.00, 'status' => 'activated'],
            ['seller_id' => 1, 'name' => 'Product B', 'amount' => 200.00, 'status' => 'activated'],
            ['seller_id' => 2, 'name' => 'Product C', 'amount' => 300.00, 'status' => 'inactivated'],
        ]);

        // Inserir categories
        DB::table('categories')->insert([
            ['name' => 'Electronics'],
            ['name' => 'Furniture'],
        ]);

        // Exemplo de inserção adicional para criar mais dados
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
