<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@localhost',
            'password' => 'admin',
        ]);
    }
}
