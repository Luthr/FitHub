<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         $this->call(ScheduleSeeder::class);

         $admin = \App\User::find(1);

         if (!$admin instanceof \App\User) {
             \App\User::create(['id' => 1, 'name' => 'admin', 'email' => 'admin@localhost', 'password' => bcrypt('hotdog123')]);
         }

    }
}
