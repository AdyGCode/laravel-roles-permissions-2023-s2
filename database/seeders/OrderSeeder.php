<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedOrders = [
            [
                'id'=>1001,
                'name' => 'Order 1',
                'notes' => 'An order',
            ],
            [
                'id'=>null,
                'name' => 'Order 2',
                'notes' => 'A second order',
            ],
            [
                'id'=>null,
                'name' => 'Order 3',
                'notes' => 'Is this really an order',
            ],
            [
                'id'=>null,
                'name' => 'Order 4',
                'notes' => '',
            ],

        ];

        foreach ($seedOrders as $seedOrder) {
            $order = Order::create($seedOrder);
        }
    }
}
