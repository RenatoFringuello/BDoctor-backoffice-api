<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            [
                "name" => "Alessio",
                "lastname" => "Ricci",
                "email" => "aler@gmail.re",
                "password" => "123456789",
                "isActive" => true
            ],
            [
                "name" => "Donato",
                "lastname" => "Fumagalli",
                "email" => "donafuma@gmail.bn",
                "password" => "123456789",
                "isActive" => false
            ],
            [
                "name" => "Sonia",
                "lastname" => "De Cillis",
                "email" => "soniad@mailme.de",
                "password" => "123456789",
                "isActive" => true
            ],
            [
                "name" => "Francesco",
                "lastname" => "Emmolo",
                "email" => "fraemme@writeme.ge",
                "password" => "123456789",
                "isActive" => false
            ],
            [
                "name" => "Francesca",
                "lastname" => "Barducci",
                "email" => "frabard@qwerty.re",
                "password" => "123456789",
                "isActive" => true
            ],
            [
                "name" => "Giulia",
                "lastname" => "Trudu",
                "email" => "giutru@sardinia.net",
                "password" => "123456789",
                "isActive" => false
            ],
            [
                "name" => "Rebecca",
                "lastname" => "De Cillis",
                "email" => "rebeccad@mailme.de",
                "password" => "123456789",
                "isActive" => true
            ],
            [
                "name" => "Claudia",
                "lastname" => "Fringuella",
                "email" => "clafringuella@gmail.bn",
                "password" => "123456789",
                "isActive" => true
            ],
            [
                "name" => "Alessia",
                "lastname" => "De Angelis",
                "email" => "alessiad@gmail.te",
                "password" => "123456789",
                "isActive" => true
            ],
            [
                "name" => "Roberto",
                "lastname" => "Mantiglia",
                "email" => "robymant@gmail.nv",
                "password" => "123456789",
                "isActive" => false
            ],
            [
                "name" => "Daniel",
                "lastname" => "De Claudis",
                "email" => "danield@gmail.re",
                "password" => "123456789",
                "isActive" => true
            ],
            [
                "name" => "Giusy",
                "lastname" => "Boni",
                "email" => "giusyb@gmail.te",
                "password" => "123456789",
                "isActive" => true
            ],
            [
                "name" => "Daniel",
                "lastname" => "Ricci",
                "email" => "danielr@gmail.te",
                "password" => "123456789",
                "isActive" => true
            ],
            [
                "name" => "Roberta",
                "lastname" => "La Tora",
                "email" => "robertinalt@gmail.te",
                "password" => "123456789",
                "isActive" => true
            ],
            [
                "name" => "Renato",
                "lastname" => "Ruggeri",
                "email" => "renator@gmail.te",
                "password" => "123456789",
                "isActive" => true
            ],
            [
                "name" => "Alessio",
                "lastname" => "Bonaccorso",
                "email" => "alessiob@gmail.te",
                "password" => "123456789",
                "isActive" => false
            ],
            [
                "name" => "Benedetto",
                "lastname" => "Croci",
                "email" => "benedettoc@gmail.te",
                "password" => "123456789",
                "isActive" => true
            ],
            [
                "name" => "Pasquale",
                "lastname" => "Boni",
                "email" => "Pasqualeb@gmail.te",
                "password" => "123456789",
                "isActive" => true
            ],
            [
                "name" => "Bruna",
                "lastname" => "Massa",
                "email" => "bmassa@gmail.te",
                "password" => "123456789",
                "isActive" => true
            ],
            [
                "name" => "Francesca",
                "lastname" => "Lommi",
                "email" => "fralommi@gmail.te",
                "password" => "123456789",
                "isActive" => true
            ],
        ];

        foreach ($users as $user) {
            $newUser = new User();
            $newUser->name = $user['name'];
            $newUser->lastname = $user['lastname'];
            $newUser->email = $user['email'];
            $newUser->password = Hash::make($user['password']);
            $newUser->isActive = $user['isActive'];
            $newUser->save();
        }







        /*  $newUser = new User();
        $newUser->name = 'Gino';
        $newUser->lastname = 'Ginetti';
        $newUser->email = 'g@gmail.com';//ricordiamoci che se lo implementiamo con il for di metterlo unique
        $newUser->password = Hash::make(12345678);
        $newUser->isActive = true;
        $newUser->save(); */
    }
}
