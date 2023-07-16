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
        $kampus = ["Universitas Indonesia", "Telkom University", "Institut Teknologi Telkom Surabaya",
                 "Universitas Pelita Harapan", "Universitas Gajah Mada", "Universitas Veteran Jawa Timuer",
                 "Universitas Negeri Surbaya", "Insitut Teknologi Sepuluh November"];

        // $faker = Factory::create();

        if($users){
            return   [
                'userId' => \App\Models\User::factory(),
                'email' => function (array $attributes) {
                    return \App\Models\User::find($attributes['userId'])->email;},
                'namaPemagang' => function (array $attributes) {
                    return \App\Models\User::find($attributes['userId'])->nama;},
                'fotoProfil' => $this->faker->image('public/storage/images',640,480, null, false),
                'namaUniversitas' => $this->faker->randomElement($kampus),
                'tglMulai' => $mulai,
                'tglSelesai' => $selesai,
                'noTelp' => $this->faker->phoneNumber(),
            ];
        }
        
    }
}
