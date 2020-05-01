<?php

use Illuminate\Database\Seeder;
Use Illuminate\Support\Facades\Hash;
Use App\User;
Use App\Rol;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolAdmin =Rol::where('nombre','admin')->first();
        $rolDesarollador =Rol::where('nombre','desarollador')->first();
        $rolUsuario =Rol::where('nombre','usuario')->first();

        $admin = User::create([
            'name' => 'Usuario Administrador',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('administrador')
         ]);
         $desarrollador = User::create([
            'name' => 'Usuario Desarrollador',
            'email' => 'desarrollador@gmail.com',
            'password' => Hash::make('desarrollador')
         ]);
         $usuario = User::create([
            'name' => 'Usuario General',
            'email' => 'usuario@gmail.com',
            'password' => Hash::make('usuario')
         ]);

         $admin->roles()->attach($rolAdmin);
         $desarrollador->roles()->attach($rolDesarrollador);
         $usuario->roles()->attach($rolUsuario);
    }
}
