<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
      $users = [
        [
          'email' => 'alessandroRossi643@gmail.com',
          'password' => Hash::make( 'Alessandro' ),
          'name' => 'Alessandro',
          'surname' => 'Rossi',
          'birth' => 1997/01/07,
        ],
        [
          'email' => 'donatoCiao@gmail.com',
          'password' => Hash::make( 'Donato' ),
          'name' => 'Donato',
          'surname' => 'Ciao',
          'birth' => 1987/02/25,
        ],
        [
          'email' => 'veroPra@libero.it',
          'password' => Hash::make( 'Veronica' ),
          'name' => 'Veronica',
          'surname' => 'Praino',
          'birth' => 1993/11/11,
        ],
        [
          'email' => 'DaniVitale@hotmail.com',
          'password' => Hash::make( 'Daniele' ),
          'name' => 'Daniele',
          'surname' => 'Vitale',
          'birth' => '',
        ],
        [
          'email' => 'PoscaVito98@gmail.com',
          'password' => Hash::make( 'Vito1998' ),
          'name' => 'Vito Posca',
          'surname' => '',
          'birth' => '',
        ],
      ];

      foreach ($users as $user) {
        $new_user = new User();
        $new_user->email = $user['email'];
        $new_user->password = $user['password'];
        $new_user->name = $user['name'];
        $new_user->surname = $user['surname'];
        $new_user->birth = $user['birth'];
        $new_user->save();
      }
    }
}
