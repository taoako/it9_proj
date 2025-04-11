<?php
// filepath: c:\laravel\it9_proj\proj_it9\database\seeders\HashPasswordsSeeder.php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HashPasswordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function ($user) {
            if (!Hash::needsRehash($user->password)) {
                echo "Skipping user {$user->username}, password already hashed.\n";
                return;
            }

            $user->password = Hash::make($user->password);
            $user->save();
            echo "Password hashed for user {$user->username}.\n";
        });
    }
}
