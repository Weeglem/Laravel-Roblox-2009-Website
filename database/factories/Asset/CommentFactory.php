<?php

namespace Database\Factories\Asset;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Asset\Comment;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset\Comment>
 */
class CommentFactory extends Factory
{
    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "comment" => $this->faker->realText(),
            "user_id" => $this->faker->numberBetween(1, 10),
            "asset_id" => 4,
        ];
    }
}
