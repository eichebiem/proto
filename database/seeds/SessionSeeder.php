<?php

use Illuminate\Database\Seeder;

use App\User;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Harris Mariano",
            'username' => "harrisbmariano",
            'password' => bcrypt("password"),
            'position' => "Administrator"
        ]);
    }
}
