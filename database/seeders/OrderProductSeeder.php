<?php

namespace Database\Seeders;

use App\Models\OrderProduct;use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedOrderDetails = [
            [
                'id' => null,
                'order_id' => 1001,
                'product_id' => 101,
                'sale_price'=>1000,
                'quantity'=>1,
            ],
            [
                'id' => null,
                'order_id' => 1001,
                'product_id' =>103,
                'sale_price'=>2000,
                'quantity'=>3,
            ],
            [
                'id' => null,
                'order_id' => 1002,
                'product_id' => 101,
                'sale_price'=>1500,
                'quantity'=>1,
            ],
            [
                'id' => null,
                'order_id' => 1003,
                'product_id' => 104,
                'sale_price'=>2500,
                'quantity'=>3,
            ],

        ];

        foreach ($seedOrderDetails as $seedData) {
            $order = OrderProduct::create($seedData);
        }
    }
}
