<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {
        $existingUser = User::where('email', 'ivan_as@gmail.com')->first();

        if (!$existingUser) {
            $user = new User();
            $user->name = 'Ivan Asparuhov';
            $user->email = 'ivan_as@gmail.com';
            $user->password = Hash::make('ivan_pass');
            $user->usertype = 'admin';
            $user->save();
        }

        User::factory(20)->create();
    }
}
