<?php

namespace Database\Seeders;

//use http\Client\Curl\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(50)->create();

        $user = User::find(1);
        $user->name = 'Art';
        $user->email = 'art@example.com';
        $user->password = "$2y$10$7LvsR4TSAxNzFwERamUbW.R77WN2PoHNOXLUZoqSwChmqJaUeqqRi"; //123456
        $user->is_admin = true;
        $user->activated = true;
        $user->save();
    }
}
