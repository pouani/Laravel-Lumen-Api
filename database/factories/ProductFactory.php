<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
    	return [
    	    'name'=>$this->faker->name(),
            'description'=>$this->faker->paragraph,
            'price'=>$this->faker->numberBetween(1500, 6000),
            'status' => $this->faker->boolean(80)
    	];
    }
}
