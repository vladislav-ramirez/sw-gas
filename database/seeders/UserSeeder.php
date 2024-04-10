<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin@admin.admin',
            'is_admin' => true,
            'password' => Hash::make('123'),
            'name' => 'Администратор'
        ]);

        User::create([
            'email' => 'user@user.user',
            'is_admin' => false,
            'password' => Hash::make('123'),
            'name' => 'Пользователь'
        ]);
    }
}
