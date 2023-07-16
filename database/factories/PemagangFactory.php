<?php

namespace Database\Factories;

use App\Models\Pemagang;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use app\Models\User;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PemagangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Pemagang::class;
    public function definition(): array
    {
        
        $users = DB::table('users')->where('type', '=', false)->get();
        $mulai = $this->faker->dateTimeBetween('- 1 months', '+3 months');
        $selesai = $this->faker->dateTimeBetween(
            $mulai->format('Y-m-d H:i:s').' +30 days',
            $mulai->format('Y-m-d H:i:s').' +3 months'
        );

        // $faker = Factory::create();

        if($users){
            return   [
                'userId' => \App\Models\User::factory(),
                'email' => function (array $attributes) {
                    return \App\Models\User::find($attributes['userId'])->email;},
                'namaPemagang' => function (array $attributes) {
                    return \App\Models\User::find($attributes['userId'])->nama;},
                'fotoProfil' => '',
                'namaUniversitas' => '',
                'tglMulai' => $mulai,
                'tglSelesai' => $selesai,
                'noTelp' => $this->faker->phoneNumber(),
            ];
        }
        // return $hasil;
        
    }
}
