<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Room;
use App\Models\Hotel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory {

    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $randomHotelId = Hotel::inRandomOrder()->value('id');

        return [
            'hotel_id' => $randomHotelId,
            'number' => $this->faker->randomNumber(6),
            'type' => $this->faker->randomElement(['single', 'double', 'suite']),
            'available' => $this->faker->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
