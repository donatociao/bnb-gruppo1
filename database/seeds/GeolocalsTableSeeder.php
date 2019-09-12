<?php

use App\Geolocal;
use Illuminate\Database\Seeder;

class GeolocalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $geolocals = [
        [
          'latitude' => 43.672331,
          'longitude' => 12.038454,
        ],
        [
          'latitude' => 40.062184,
          'longitude' => 18.057213,
        ],
        [
          'latitude' => 43.540804,
          'longitude' => 12.055432,
        ],
        [
          'latitude' => 45.612511,
          'longitude' => 8.847890,
        ],
        [
          'latitude' => 43.524137,
          'longitude' => 11.487781,
        ],
        [
          'latitude' => 45.073729,
          'longitude' => 7.684968,
        ],
        [
          'latitude' => 41.463480,
          'longitude' => 15.542396,
        ],
        [
          'latitude' => 43.765819,
          'longitude' => 11.247249,
        ],
        [
          'latitude' => 43.767807,
          'longitude' => 11.245998,
        ],
        [
          'latitude' => 44.277608,
          'longitude' => 12.351040,
        ],
        [
          'latitude' => 45.464271,
          'longitude' => 9.183970,
        ],
        [
          'latitude' => 45.463752,
          'longitude' => 9.186202,
        ],
        [
          'latitude' => 45.463224,
          'longitude' => 9.192179,
        ],
        [
          'latitude' => 40.993178,
          'longitude' => 17.223919,
        ],
        [
          'latitude' => 40.924567,
          'longitude' => 9.494172,
        ],
        [
          'latitude' => 40.921683,
          'longitude' => 9.502290,
        ],
        [
          'latitude' => 41.890659,
          'longitude' => 12.481950,
        ],
        [
          'latitude' => 41.886294,
          'longitude' => 12.470075,
        ],
        [
          'latitude' => 41.901046,
          'longitude' => 12.476729,
        ],
        [
          'latitude' => 43.467329,
          'longitude' => 11.044679,
        ],
      ];

      foreach ($geolocals as $geolocal) {
        $new_geolocals = new Geolocal();
        $new_geolocals->latitude = $geolocal['latitude'];
        $new_geolocals->longitude = $geolocal['longitude'];
        $new_geolocals->save();
      }
    }
}
