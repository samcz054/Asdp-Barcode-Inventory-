<?php

namespace Database\Factories;

use App\Jabatan;
use App\Karyawan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class KaryawanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Karyawan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $pend = $this->faker->randomElement([
            'SD',
            'SMP',
            'SMA',
            'D3',
            'D4',
            'S1',
            'S2',
            'S3',
        ]);
        $status = $this->faker->randomElement([
            'K/0',
            'K/1',
            'K/2',
            'K/3',
            'K/4'
        ]);
        $jurusan = $this->faker->randomElement([
            'Sistem Informasi',
            'Manajemen',
            'Akuntansi',
            'Elektronika',
            'Mekatronika'
        ]);
        $umur = rand(18, 60);
        $masaker = rand(1, 30);
        $masaja = rand(1, 15);

        return [

            //

            'nama_karyawan' => $this->faker->name(),
            'jabatan_id' => Jabatan::inRandomOrder()->first()->id,
            'nik' => $this->faker->numberBetween($min = 10000000, $max = 1000000000),
            'nik_ktp' => $this->faker->numberBetween($min = 10000000, $max = 1000000000),
            'no_bpjs_kesehatan' => $this->faker->numberBetween($min = 10000000, $max = 1000000000),
            'no_bpjs_ketenagakerjaan' => $this->faker->numberBetween($min = 10000000, $max = 1000000000),
            'no_npwp' => $this->faker->numberBetween($min = 10000000, $max = 1000000000),
            'status_keluarga' => $status,
            'pendidikan' => $pend,
            'tanggal_lahir' => $this->faker->date(),
            'tempat_lahir' => $this->faker->date(),
            'sk' => $this->faker->numberBetween($min = 10000000, $max = 1000000000),
            'usia' => $umur,
            'tanggal_masuk_kerja' => $this->faker->date(),
            'tanggal_pilih_jabatan' => $this->faker->date(),
            'masa_jabatan' => $masaja,
            'masa_kerja' => $masaker,
            'jurusan' => $jurusan,

        ];
    }
}
