<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\KetNonBeasiswa;
use App\Models\TandaTangan;
use App\Models\User;

class KetNonBeasiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KetNonBeasiswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'type' => $this->faker->word,
            'no_permohonan' => $this->faker->word,
            'no_surat' => $this->faker->word,
            'thn_ajaran' => $this->faker->numberBetween(-10000, 10000),
            'tujuan' => $this->faker->word,
            'keperluan' => $this->faker->word,
            'tanda_tangan_id' => TandaTangan::factory(),
            'status' => $this->faker->word,
            'jml_surat' => $this->faker->numberBetween(-10000, 10000),
            'tgl_ambil' => $this->faker->date(),
        ];
    }
}
