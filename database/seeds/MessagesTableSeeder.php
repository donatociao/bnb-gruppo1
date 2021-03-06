<?php

use App\Message;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();

      for ($i=0; $i < 20; $i++) {
        $new_request = new Message();
        $new_request->message = $faker->text(rand(35,400));
        $new_request->email_req = $faker->email();
        $new_request->user_id = rand(1,4);
        $new_request->apartment_id = rand(1,10);
        $new_request->save();
      }
    }
}
