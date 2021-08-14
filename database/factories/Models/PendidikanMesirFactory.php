<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Biodatum;
use App\Models\PendidikanMesir;

class PendidikanMesirFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PendidikanMesir::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'biodata_id' => Biodatum::factory(),
            'jenjang' => $this->faker->word,
            'instansi' => $this->faker->word,
            'tempat' => $this->faker->word,
            'masuk' => $this->faker->date(),
            'keluar' => $this->faker->date(),
        ];
    }
}
