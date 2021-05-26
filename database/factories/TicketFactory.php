<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Contact;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'contact_id' => Contact::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'title' => $this->faker->sentence(),
            'priority' => $this->faker->randomElement(['Nije hitno','Može pričekati', 'Požuriti', 'Hitno']),
            'message' => $this->faker->text(),
            'status' => $this->faker->word(),
        ];
    }
}
