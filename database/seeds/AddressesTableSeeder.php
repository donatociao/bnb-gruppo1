<?php

use App\Address;
use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $addresses = [
        [
          'city' => 'Pieve Santo Stefano',
          'cap' => 52036,
          'prov' => 'Arezzo',
          'street' => 'Via del Colledestro',
          'civic_number' => 43,
        ],
        [
          'city' => 'Alezio',
          'cap' => 73011,
          'prov' => 'Lecce',
          'street' => 'Piazza Guido Romati',
          'civic_number' => 6,
        ],
        [
          'city' => 'Anghiari',
          'cap' => 52031,
          'prov' => 'Arezzo',
          'street' => 'Via Baldaccio Bruni',
          'civic_number' => 10,
        ],
        [
          'city' => 'Busto Arsizio',
          'cap' => 21052,
          'prov' => 'Varese',
          'street' => 'Corso Mistero',
          'civic_number' => 1,
        ],
        [
          'city' => 'Cavriglia',
          'cap' => 52022,
          'prov' => 'Arezzo',
          'street' => 'Viale Fallimento',
          'civic_number' => 23,
        ],
        [
          'city' => 'Torino',
          'cap' => 10156,
          'prov' => '-',
          'street' => 'Via Vittorio Emanuele Garibaldi',
          'civic_number' => 140,
        ],
        [
          'city' => 'Foggia',
          'cap' => 71122,
          'prov' => '-',
          'street' => 'Via Zdenek',
          'civic_number' => 14,
        ],
      ];

      foreach ($addresses as $address) {
        $new_address = new Address();
        $new_address->city = $address['city'];
        $new_address->cap = $address['cap'];
        $new_address->prov = $address['prov'];
        $new_address->street = $address['street'];
        $new_address->civic_number = $address['civic_number'];
        $new_address->save();
      }
    }
}
