<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Braintree\Customer as Braintree_Customer;

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
                "name" => "Sonia",
                "lastname" => "De Marco",
                "email" => "soniademarquez@mailme.de",
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
                "email" => "alessimad@gmail.te",
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
                "lastname" => "De Cillis",
                "email" => "danield",
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
            [
                "name" => "Alex",
                "lastname" => "Catalano",
                "email" => "alecata@gmail.re",
                "password" => "123456669",
                "isActive" => true
            ],
            [
                "name" => "Donato",
                "lastname" => "Di Felice",
                "email" => "donadife@gmail.bn",
                "password" => "1235556789",
                "isActive" => true
            ],
            [
                "name" => "Federica",
                "lastname" => "Bonolis",
                "email" => "boolisf@mailme.de",
                "password" => "1233356789",
                "isActive" => true
            ],
            [
                "name" => "Emanuele",
                "lastname" => "Sau",
                "email" => "emasau@writeme.ge",
                "password" => "1223456789",
                "isActive" => false
            ],
            [
                "name" => "Guglielmo",
                "lastname" => "Elisei",
                "email" => "guglieli@qwerty.re",
                "password" => "123456788",
                "isActive" => false
            ],
            [
                "name" => "Federico",
                "lastname" => "Alpelli",
                "email" => "fedealp@resident.net",
                "password" => "113456789",
                "isActive" => false
            ],
            [
                "name" => "Oriana",
                "lastname" => "De Angelis",
                "email" => "oridea@mailme.de",
                "password" => "123446789",
                "isActive" => true
            ],
            [
                "name" => "Claudia",
                "lastname" => "Inchingoli",
                "email" => "clainchi@gmail.bn",
                "password" => "123356789",
                "isActive" => true
            ],
            [
                "name" => "Alessia",
                "lastname" => "De Cubellis",
                "email" => "alessiad@gmail.te",
                "password" => "223456789",
                "isActive" => true
            ],
            [
                "name" => "Manuel",
                "lastname" => "Carta",
                "email" => "manucarta@gmail.nv",
                "password" => "123456799",
                "isActive" => false
            ],
            [
                "name" => "Daniel",
                "lastname" => "Curci",
                "email" => "danielc@gmail.re",
                "password" => "222256789",
                "isActive" => true
            ],
            [
                "name" => "Carlotta",
                "lastname" => "Boni",
                "email" => "karol@gmail.tim",
                "password" => "123456999",
                "isActive" => true
            ],
            [
                "name" => "Sara",
                "lastname" => "Ricci",
                "email" => "sarar@gmail.te",
                "password" => "123226789",
                "isActive" => true
            ],
            [
                "name" => "Ethan",
                "lastname" => "La Tora",
                "email" => "ethanlt@gmail.te",
                "password" => "333456789",
                "isActive" => true
            ],
            [
                "name" => "Renato",
                "lastname" => "Sanches",
                "email" => "renatosan@gmail.te",
                "password" => "123456666",
                "isActive" => true
            ],
            [
                "name" => "Alessio",
                "lastname" => "Pirelli",
                "email" => "alessiop@gmail.te",
                "password" => "555556789",
                "isActive" => false
            ],
            [
                "name" => "Dante",
                "lastname" => "Sorrentino",
                "email" => "dantesorrentino@gmail.te",
                "password" => "777776789",
                "isActive" => true
            ],
            [
                "name" => "Pasquale",
                "lastname" => "Abbatini",
                "email" => "Pasqualeabba@gmail.te",
                "password" => "666985479",
                "isActive" => true
            ],
            [
                "name" => "Fernando",
                "lastname" => "Bruni",
                "email" => "bferna@gmail.te",
                "password" => "152469873",
                "isActive" => true
            ],
            [
                "name" => "Francesca",
                "lastname" => "Caruso",
                "email" => "fraca@gmail.te",
                "password" => "458796521",
                "isActive" => true
            ],
        ];

        foreach ($users as $user) {
            $newUser = new User();
            // using your customer id we will create
            // brain tree customer id with same id
            $response = Braintree_Customer::create([
                'id' => $newUser->id
            ]);
            // save your braintree customer id

            if ($response->success) {
                $newUser->customer_id = $response->customer->id;
            }
            $newUser->name = $user['name'];
            $newUser->lastname = $user['lastname'];
            $newUser->email = $user['email'];
            $newUser->password = Hash::make($user['password']);
            $newUser->isActive = $user['isActive'];
            $newUser->save();
        }
    }
}