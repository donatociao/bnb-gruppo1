<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $services = ['0','1'];

      for($i=0; $i<20; $i++) {
        $new_service = new Service();
        $new_service->wifi = array_rand($services, 1);
        $new_service->parking = array_rand($services, 1);
        $new_service->pool = array_rand($services, 1);
        $new_service->reception = array_rand($services, 1);
        $new_service->spa = array_rand($services, 1);
        $new_service->sea_view = array_rand($services, 1);
        $new_service->save();
      }
    }
}
