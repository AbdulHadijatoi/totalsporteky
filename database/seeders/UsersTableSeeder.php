<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = new User;
        $superAdmin->name = 'super-admin';
        $superAdmin->email = 'superAdmin@admin.com';
        $superAdmin->password = Hash::make('12345678');
        $superAdmin->role = 'super-admin';
        $superAdmin->save();
        
        $admin = new User;
        $admin->name = 'admin';
        $admin->email = 'admin@admin.com';
        $admin->password = $superAdmin->password; // Reusing the same password as super-admin
        $admin->role = 'admin';
        $admin->save();
    }
}
