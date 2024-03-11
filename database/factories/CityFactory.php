<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;
use App\Models\Country;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory {

    protected $model = City::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $randomCountryId = Country::inRandomOrder()->value('id');
        
        return [
            'name' => $this->faker->city,
            'country_id' => $randomCountryId,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
