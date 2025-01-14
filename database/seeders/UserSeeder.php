<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email'=>'dikshya@gmail.com'],
            [
                'name'=>'Samriddhi Kasaju',
                'password'=>'12345',
                'role'=>'admin'
            ]
        );
    }
}
