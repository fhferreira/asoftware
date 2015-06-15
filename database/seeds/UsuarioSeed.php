<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Usuario;
class UsuarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_usuarios')->delete();
        Usuario::create(array(
                                        'user_name'     => 'Anilton',
                                        'user_email'    => 'aniton.francisco@gmail.com',
                                        'user_pass' => Hash::make('manager'),
                                    ));
    }
}
