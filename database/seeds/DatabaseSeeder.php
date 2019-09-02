<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ServicesTableSeeder::class);
        $this->call(GeolocalsTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ApartmentsTableSeeder::class);
        $this->call(RequestsTableSeeder::class);      
    }
}
