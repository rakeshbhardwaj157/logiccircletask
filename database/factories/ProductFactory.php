<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' =>      $this->faker->city(),
			'description'=> $this->faker->paragraph($nb =8),
			'slug'=>        $this->faker->unique()->slug,
            'price' =>      $this->faker->numberBetween($min = 500, $max = 8000),
			'details' =>    $this->faker->paragraph($nb =2),
            'in_stock' => 1,
            'status' => 1 
        ];
    }
	
	public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'deleted_at' => null,
            ];
        });
    }
}
