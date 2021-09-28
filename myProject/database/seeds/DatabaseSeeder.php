<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class, 2)->create()->each(function($user){
            $user->roles()->save(factory(App\Role::class)->make());
        });
         //$this->call(UserSeeder::class);
    }
}
