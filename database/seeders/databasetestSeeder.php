<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class databasetestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('customers')->insert([
            [
                'name' => 'Rhozy',
                'city' => 'Bogor',
                'registered_date' => '2023-01-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kukuh',
                'city' => 'Bandung',
                'registered_date' => '2023-02-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Asep',
                'city' => 'Jogja',
                'registered_date' => '2023-05-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Agung',
                'city' => 'Tangerang',
                'registered_date' => '2023-07-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('orders')->insert([
            [
                'customer_id' => 1,
                'order_date' => '2023-03-05',
                'total_amount' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_id' => 1,
                'order_date' => '2023-06-20',
                'total_amount' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_id' => 2,
                'order_date' => '2023-04-10',
                'total_amount' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_id' => 2,
                'order_date' => '2023-08-15',
                'total_amount' => 250,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_id' => 3,
                'order_date' => '2023-09-01',
                'total_amount' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_id' => 4,
                'order_date' => '2023-09-10',
                'total_amount' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'customer_id' => 4,
                'order_date' => '2023-09-15',
                'total_amount' => 180,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('order_items')->insert([
            [
                'order_id' => 1,
                'product_name' => 'Laptop',
                'quantity' => 1,
                'unit_price' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 2,
                'product_name' => 'Smartphone',
                'quantity' => 2,
                'unit_price' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 3,
                'product_name' => 'TV',
                'quantity' => 1,
                'unit_price' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 4,
                'product_name' => 'Headphones',
                'quantity' => 5,
                'unit_price' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 5,
                'product_name' => 'Keyboard',
                'quantity' => 2,
                'unit_price' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 6,
                'product_name' => 'Mouse',
                'quantity' => 4,
                'unit_price' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 7,
                'product_name' => 'Monitor',
                'quantity' => 1,
                'unit_price' => 180,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('orders1')->insert([
            [
                'user_id' => 5,
                'total_amount' => 150000,
                'order_date' => '2024-06-01 10:00:00',
                'status' => 'success',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'total_amount' => 80000,
                'order_date' => '2024-06-02 11:00:00',
                'status' => 'failed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 6,
                'total_amount' => 125000,
                'order_date' => '2024-06-01 12:00:00',
                'status' => 'success',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        $this->call([
            databasetestSeeder::class
        ]);
    }
}
