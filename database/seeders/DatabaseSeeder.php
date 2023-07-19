<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pemagang;
use App\Models\Supervisor;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(4)->create();
        
        // Retrieve all users with type 1 and create supervisors
        $supervisorUsers = User::where('type', 1)->get();
        foreach ($supervisorUsers as $user) {
            Supervisor::factory()->create();
        }
        $magangUsers = User::where('type', 0)->get();
        foreach ($magangUsers as $user) {
            Pemagang::factory()->create();
        }

        
        // User::factory(4)->create()->each(function ($user) {
        //     if ($user->type == 1) {
        //         // dd($user->type);
        //         Supervisor::factory()->create();
        //     } elseif ($user->type == 0) {
        //         Pemagang::factory()->create(['userId' => $user->id]);
        //     }
        // });
        // User::factory()->recycle(
            // Supervisor::factory()->create(),
            // Pemagang::factory()->create()
            // )->create();

        // User::factory(1)->create()->each(function (User $user) {
        //     $user->supervisor()->save(Supervisor::factory()->make());
        //     $user->pemagang()->save(Pemagang::factory()->make());
        // });
        // Pemagang::factory()->count(15)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }

}
