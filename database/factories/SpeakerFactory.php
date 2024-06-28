<?php

namespace Database\Factories;

use App\Models\Speaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SpeakerFactory extends Factory
{
    protected $model = Speaker::class;

    public function definition()
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'bio' => $this->faker->word(),
            'fb_url' => $this->faker->url(),
            'x_url' => $this->faker->url(),
            'website_url' => $this->faker->url(),
        ];
    }
}
