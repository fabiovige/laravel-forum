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
        User::factory(2)->create()->each( function ($user) {
            $kids = Kid::factory(3)->make();
            $user->kids()->saveMany($kids);
        });
    }
}
