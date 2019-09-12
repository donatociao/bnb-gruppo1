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
          'street' => 'Via della Casina',
          'civic_number' => 4,
          'geolocal_id' => 1,
        ],
        [
          'city' => 'Alezio',
          'cap' => 73011,
          'prov' => 'Lecce',
          'street' => 'Via Raheli',
          'civic_number' => 13,
          'geolocal_id' => 2,
        ],
        [
          'city' => 'Anghiari',
          'cap' => 52031,
          'prov' => 'Arezzo',
          'street' => 'Via Giordano Bruno',
          'civic_number' => 26,
          'geolocal_id' => 3,
        ],
        [
          'city' => 'Busto Arsizio',
          'cap' => 21052,
          'prov' => 'Varese',
          'street' => 'Via Carlo Tosi',
          'civic_number' => 2,
          'geolocal_id' => 4,
        ],
        [
          'city' => 'Cavriglia',
          'cap' => 52022,
          'prov' => 'Arezzo',
          'street' => 'Via delle Miniere',
          'civic_number' => 16,
          'geolocal_id' => 5,
        ],
        [
          'city' => 'Torino',
          'cap' => 10156,
          'prov' => '-',
          'street' => 'Via XX Settembre',
          'civic_number' => 26,
          'geolocal_id' => 6,
        ],
        [
          'city' => 'Foggia',
          'cap' => 71122,
          'prov' => '-',
          'street' => 'Via Arpi',
          'civic_number' => 85,
          'geolocal_id' => 7,
        ],
        [
          'city' => 'Firenze',
          'cap' => 50100,
          'prov' => '-',
          'street' => 'Via Mazzetta',
          'civic_number' => 13,
          'geolocal_id' => 8,
        ],
        [
          'city' => 'Firenze',
          'cap' => 50100,
          'prov' => '-',
          'street' => 'Via dei Serragli',
          'civic_number' => 21,
          'geolocal_id' => 9,
        ],
        [
          'city' => 'Milano Marittima',
          'cap' => 48015,
          'prov' => 'Ravenna',
          'street' => 'Via Due Giugno',
          'civic_number' => 69,
          'geolocal_id' => 10,
        ],

        [
          'city' => 'Milano',
          'cap' => 20123,
          'prov' => '-',
          'street' => 'Via Cordusio',
          'civic_number' => 4,
          'geolocal_id' => 11,
        ],
        [
          'city' => 'Milano',
          'cap' => 20123,
          'prov' => '-',
          'street' => 'Via Cesare Cantù',
          'civic_number' => 6,
          'geolocal_id' => 12,
        ],
        [
          'city' => 'Milano',
          'cap' => 20122,
          'prov' => '-',
          'street' => 'Via Palazzo Reale',
          'civic_number' => 3,
          'geolocal_id' => 13,
        ],
        [
          'city' => 'Polignano a Mare',
          'cap' => 70044,
          'prov' => 'Bari',
          'street' => 'Via Nicola d\'Aprile',
          'civic_number' => 97,
          'geolocal_id' => 14,
        ],
        [
          'city' => 'Olbia',
          'cap' => 07026,
          'prov' => 'Sassari',
          'street' => 'Via Brigata Sassari',
          'civic_number' => 20,
          'geolocal_id' => 15,
        ],
        [
          'city' => 'Olbia',
          'cap' => 07026,
          'prov' => 'Sassari',
          'street' => 'Via de Filippi',
          'civic_number' => 58,
          'geolocal_id' => 16,
        ],
        [
          'city' => 'Roma',
          'cap' => 10186,
          'prov' => '-',
          'street' => 'Piazza della Consolazione',
          'civic_number' => 27,
          'geolocal_id' => 17,
        ],
        [
          'city' => 'Roma',
          'cap' => 10153,
          'prov' => '-',
          'street' => 'Via Emilio Morosini',
          'civic_number' => 30,
          'geolocal_id' => 18,
        ],
        [
          'city' => 'Roma',
          'cap' => 10153,
          'prov' => '-',
          'street' => 'Via della Maddalena',
          'civic_number' => 30,
          'geolocal_id' => 19,
        ],
        [
          'city' => 'San Gimignano',
          'cap' => 53037,
          'prov' => 'Siena',
          'street' => 'Via del Castello',
          'civic_number' => 19,
          'geolocal_id' => 20,
        ],
      ];

      foreach ($addresses as $address) {
        $new_address = new Address();
        $new_address->city = $address['city'];
        $new_address->cap = $address['cap'];
        $new_address->prov = $address['prov'];
        $new_address->street = $address['street'];
        $new_address->civic_number = $address['civic_number'];
        $new_address->geolocal_id = $address['geolocal_id'];
        $new_address->save();
      }
    }
}
