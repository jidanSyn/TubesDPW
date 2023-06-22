<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $dateBetween = mt_rand(1672531200, 1687412159); // 1 January 2023 - 22 June 2023
        $date = date("Y-m-d H:i:s", $dateBetween);
        
        
        $fakeData = array(     
            'product_id' => mt_rand(1, 97),
            'user_id' => mt_rand(3, 103),
            'uid_game' => $this->faker->randomNumber(9, true),
            'pembayaran_id' => mt_rand(1,3),
            'purchased_on' => $date
        );

        $selectedProduct = Product::where('id', $fakeData['product_id'])->first();

        $fakeData['harga'] = $selectedProduct->harga;

        // dd($fakeData);
        
        return $fakeData;
    }
}
