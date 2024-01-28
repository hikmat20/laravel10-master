<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create(
            [
                'full_name' => "Hikmat Aolia Robani",
                'nick_name' => "Hikmat",
                'username' => "hikmat20",
                'email' => "hikmat@mail.com",
                'phone_number' => "0211155467",
                'email_verified_at' => null,
                'password' => Hash::make('Adm@123**'),
                'image' => fake()->imageUrl(200,200,null, false,'HI'),
                'change_password' => null,
                'last_change_password' => null,
            ]
        );

        \App\Models\User::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
