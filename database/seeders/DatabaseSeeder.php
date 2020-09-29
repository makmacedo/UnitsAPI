<?php

namespace Database\Seeders;

use Carbon\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()->make();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@units-api.test',
            'password' => Hash::make('password')
        ]);
    }
}
