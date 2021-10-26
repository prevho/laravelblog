<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'image' => $this->faker->imageUrl($width = 800, $height = 600),
            'title' => $this->faker->sentence,
            'slug' => Str::slug($this->faker->sentence),
            'body' => $this->faker->paragraph(20),
            'category_id' => 1,
            'user_id' => 1,
            'featured' => 0,
            'published_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
