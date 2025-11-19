<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Price;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $prices = [
            0, 10, 15, 20, 25, 30, 35
        ];

        foreach($prices as $price){
            Price::create([
                'value' => $price
            ]);
        }
    }
}
