<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $useradmin = User::create([
            'name' => 'Angel',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin'),
            'role_id' => 1,
            'status' => 'active'

        ]);
    }
}
