<?php
    
    namespace Database\Factories;
    
    use App\Models\Model;
    use Illuminate\Database\Eloquent\Factories\Factory;
    
    /**
     * @extends Factory<Model>
     */
    class CategoryFactory extends Factory
    {
        
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array
        {
            return [
                'name' => fake()->words(2, true), 'description' => fake()->words(30, true)
            ];
        }
        
    }