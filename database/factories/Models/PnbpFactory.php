<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\MasterPnbp;
use App\Models\Pnbp;

class PnbpFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pnbp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'master_pnbp_id' => MasterPnbp::factory(),
            'tanggal' => $this->faker->date(),
            'nama_pemohon' => $this->faker->word,
            'kode_pnbp' => $this->faker->word,
            'biaya' => $this->faker->word,
            'keterangan' => $this->faker->word,
        ];
    }
}
