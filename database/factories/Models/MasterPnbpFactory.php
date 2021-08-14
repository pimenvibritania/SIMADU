<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\MasterPnbp;

class MasterPnbpFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterPnbp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode' => $this->faker->word,
            'is_active' => $this->faker->boolean,
            'jenis' => $this->faker->word,
            'biaya' => $this->faker->word,
        ];
    }
}
