<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $seedProducts = [
            [
                'id'=>101,
                'name' => 'Product 1',
                'details' => 'A product',
                'price'=> 1000,
            ],
            [
                'id'=>null,
                'name' => 'Product 2',
                'details' => 'A second product',
                'price'=> 2000,
            ],
            [
                'id'=>null,
                'name' => 'Product 3',
                'details' => 'Is this really a product',
                'price'=> 3000,
            ],
            [
                'id'=>null,
                'name' => 'Product 4',
                'details' => '',
                'price'=> 4000,
            ],
            [
                'id'=>null,
                'name' => 'Product 5'   ,
                'details' => 'You wish this product existed',
                'price'=> 5000,
            ],

        ];

        foreach ($seedProducts as $seedProduct) {
            $product = Product::create($seedProduct);
        }

    }
}
