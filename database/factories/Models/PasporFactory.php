<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Paspor;

class PasporFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Paspor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->word,
            'tgl_terbit' => $this->faker->date(),
            'no_lama' => $this->faker->word,
            'no_baru' => $this->faker->word,
            'berlaku' => $this->faker->date(),
        ];
    }
}
