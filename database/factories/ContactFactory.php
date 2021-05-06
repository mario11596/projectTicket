<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\User; //inkludanje?
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'name' => $this->faker->name(),
            'age' => $this->faker->numberBetween(18,90),
            'address' => $this->faker->address(),
            'mobile' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'currentaccountbalance' => $this->faker->numberBetween(1000,10000),
            'credit'=> $this->faker->numberBetween(0,10000)   
        ];
    }
}
