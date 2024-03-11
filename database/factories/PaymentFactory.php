<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Hotel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory {

    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $randomHotelId = Hotel::inRandomOrder()->value('id');
        $randomReservationId = Reservation::inRandomOrder()->value('id');
        
        return [
            'hotel_id' => $randomHotelId,
            'reservation_id' => $randomReservationId,
            'amount' => $this->faker->randomFloat(2, 50, 500), 
            'paid_at' => $this->faker->dateTimeBetween('-1 year', 'now'), 
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
