<?php
    
    namespace Database\Factories;
    
    use App\Models\User;
    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Str;
    
    /**
     * @extends Factory<User>
     */
    class UserFactory extends Factory
    {
        
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array
        {
            return [
                'role_id'           => fake()->numberBetween(2, 3), 'first_name' => fake()->firstName(),
                'last_name'         => fake()->lastName(), 'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(), 'password' => Hash::make('password123'),
                'remember_token'    => Str::random(10),
            ];
        }
        
        /**
         * Indicate that the model's email address should be unverified.
         */
        public function unverified(): static
        {
            return $this->state(fn(array $attributes) => [
                'email_verified_at' => null,
            ]);
        }
        
    }