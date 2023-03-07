<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Website>
 */
class WebsiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'url' => $this->faker->url,
        ];
    }

//    public function configure(): WebsiteFactory
//    {
//        return $this->afterCreating(function (Website $website) {
//            $website->posts()->createMany(Post::factory()->count(5)->make());
//        });
//    }
}
