<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'aseprayana@tring.id',
            ],
            [
                'name' => 'Administrator',
                'password' => Hash::make('MOBAback1995@'),
                'email_verified_at' => now(),
            ]
        );
    }
}
