<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Hotel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory {

    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $randomHotelId = Hotel::inRandomOrder()->value('id');
        $randomRoomId = Room::inRandomOrder()->value('id');

        return [
            'hotel_id' => $randomHotelId,
            'room_id' => $randomRoomId,
            'start_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'end_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'user_id' => $this->faker->numberBetween(1, 100),
            'customer_name' => $this->faker->firstName,
            'customer_family' => $this->faker->lastName,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
