<?php

namespace Database\Factories\Asset;

use App\Models\Asset\Asset;
use App\Models\Asset\AssetConfig;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset\Asset>
 */
class AssetFactory extends Factory
{
    protected $model = Asset::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->name(),
            "about" => $this->faker->text(),
            "type" => $this->faker->randomElement(["game","model","cloth"]),
            "owner_id" => 1,
        ];
    }

    public function game()
    {
        return $this->state(fn (array $attributes) => [
            "type" => "game"]);
    }

    public function model()
    {
        return $this->state(fn (array $attributes) => [
            "type" => "model"]);
    }
}
