<?php
    
    namespace Database\Factories;
    
    use App\Models\Post;
    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Str;
    
    /**
     * @extends Factory<Post>
     */
    class PostFactory extends Factory
    {
        
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array
        {
            return [
                'author_id'    => fake()->numberBetween(1, 20), 'category_id' => fake()->numberBetween(1, 10),
                'title'        => fake()->words(4, true), 'body' => fake()->paragraphs(4, true),
                'is_published' => fake()->boolean(70), 'slug' => Str::slug(fake()->words(4, true), '-')
            ];
        }
        
    }