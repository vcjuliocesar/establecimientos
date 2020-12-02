<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Julio',
            'email'=>'correo@correo.com',
            'password'=>Hash::make('12345678'),
            'email_verified_at'=>Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'=>'Cesar',
            'email'=>'correo2@correo.com',
            'password'=>Hash::make('12345678'),
            'email_verified_at'=>Carbon::now(),
        ]);
    }
}
