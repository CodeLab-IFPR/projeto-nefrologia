<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VideoFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence;
        return [
            'title' => $title,
            'link' => 'https://www.youtube.com/watch?v=' . Str::random(11),
            'description' => $this->faker->paragraph,
            'thumbnail' => $this->faker->imageUrl,
            'id_user' => 1, // 
            'slug' => Str::slug($title),
        ];
    }
}
