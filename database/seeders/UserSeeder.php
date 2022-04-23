<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        $userAdmin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@azzamydev.my.id',
            'password' => bcrypt('admin123'),
        ]);
        $userAdmin->assignRole($admin);

        $userUser = User::create([
            'name' => 'Angga Baskara',
            'username' => 'angga',
            'email' => 'angga@azzamydev.my.id',
            'password' => bcrypt('angga890'),
        ]);
        $userUser->assignRole($user);
    }
}
