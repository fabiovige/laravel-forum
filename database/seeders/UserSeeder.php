<?php

namespace Database\Seeders;

use App\Models\Kid;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create()->each( function ($user) {
            $kids = Kid::factory(6)->make();
            $user->kids()->saveMany($kids);
        });
    }
}
