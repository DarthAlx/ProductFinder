<?php

use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Alexis Morales',
            'email'=>'alx.morales@outlook.com',
            'password'=>bcrypt('admin123'),
            'dob'=>'1992-09-30',
            'tel'=>'5549293724',
            'genero'=>'Masculino',
            'is_admin' =>true
        ]);
    }
}
