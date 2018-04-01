<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hasAdmin = \App\User::where('username', 'admin')->first();

        if (!$hasAdmin) {
            $admin = new \App\User();
            $admin->name = 'ROOT ADMIN';
            $admin->username = 'admin';
            $admin->password = bcrypt('admin');
            $admin->email = 'admin@admin.com';
            $admin->is_admin = true;
            $admin->save();

            $this->command->info('Admin Has Created');
        }
    }
}
