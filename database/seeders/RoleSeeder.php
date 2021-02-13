<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_rol = Role::create([
            'role_name' => 'admin',

        ]);

        $staff_rol = Role::create([
            'role_name' => 'staff',

        ]);
    }
}
