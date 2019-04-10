<?php

use Illuminate\Support\Str;
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
        $admin = new App\User();
        $admin->name = 'Administrador';
        $admin->email = 'admin@prueba.com';
        $admin->rol = 'admin';
        $admin->email_verified_at = now();
        $admin->password = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm';
        $admin->remember_token = Str::random(10);
        $admin->save();

        factory(App\User::class, 15)->create();
    }
}
