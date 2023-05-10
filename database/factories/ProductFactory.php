<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->word($nb=4, $asText=true);
        $slug = Str::slug($name);
        return [
            'name'=> $name,
            'slug'=> $slug,
            'short_description'=> $this->faker->text(200),
            'description'=> $this->faker->text(500),
            'regular_price'=> $this->faker->numberBetween(10, 500),
            'sale_price'=> $this->faker->numberBetween(10, 500),
            'sku'=> 'PRD'. $this->faker->unique()->numberBetween(100, 500),
            'quantity'=> $this->faker->numberBetween(10, 50),
            'image'=> 'product-'. $this->faker->numberBetween(100,160000),
            'category_id'=> $this->faker->numberBetween(1,5),
        ];
    }
}
