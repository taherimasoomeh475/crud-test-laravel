<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=Customer::class;
    public function definition(): array
    {
        return [
            'Firstname'=>$this->faker->firstName(),
            'Lastname'=>$this->faker->lastName(),
            'DateOfBirth'=>$this->faker->date(),
            'Email'=>$this->faker->unique()->email(),
        'PhoneNumber'=>$this->faker->unique()->phoneNumber(),
        'BankAccountNumber'=> 'GB94BARC20201530093459',
        ];
    }
}
