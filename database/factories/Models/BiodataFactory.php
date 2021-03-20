<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Biodata;
use App\Models\User;

class BiodataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Biodata::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'is_active' => $this->faker->boolean,
            'user_id' => User::factory(),
            'no_induk' => $this->faker->word,
            'nama' => $this->faker->word,
            'kelamin' => $this->faker->word,
            'agama' => $this->faker->word,
            'is_nikah' => $this->faker->boolean,
            'tempat_lahir' => $this->faker->word,
            'tanggal_lahir' => $this->faker->date(),
            'tinggi_badan' => $this->faker->word,
            'jenis_vipa_1' => $this->faker->word,
            'no_paspor' => $this->faker->word,
            'jenis_paspor' => $this->faker->word,
            'keluar_paspor' => $this->faker->word,
            'berlaku_paspor_from' => $this->faker->date(),
            'berlaku_paspor_to' => $this->faker->date(),
            'tiba_mesir' => $this->faker->date(),
            'tanggal_lapor' => $this->faker->date(),
            'izin_tinggal' => $this->faker->date(),
            'pendidikan_akhir' => $this->faker->word,
            'pekerjaan_indo' => $this->faker->word,
            'tujuan_mesir' => $this->faker->word,
            'nama_pasangan' => $this->faker->word,
            'nama_ayah' => $this->faker->word,
            'nama_ibu' => $this->faker->word,
            'alamat_ayah' => $this->faker->word,
            'alamat_ibu' => $this->faker->word,
            'pekerjaan_ayah' => $this->faker->word,
            'pekerjaan_ibu' => $this->faker->word,
            'no_ayah' => $this->faker->word,
            'no_ibu' => $this->faker->word,
            'catatan' => $this->faker->text,
            'alamat_mesir' => $this->faker->text,
            'kota_mesir' => $this->faker->word,
            'provinsi_mesir' => $this->faker->word,
            'no_mesir' => $this->faker->word,
            'alamat_indo' => $this->faker->text,
            'kecamatan_indo' => $this->faker->word,
            'desa_indo' => $this->faker->word,
            'kota_indo' => $this->faker->word,
            'provinsi_indo' => $this->faker->word,
            'pos_indo' => $this->faker->word,
            'no_indo' => $this->faker->word,
        ];
    }
}
