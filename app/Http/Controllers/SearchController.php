<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Geolocal;


class SearchController extends Controller
{
    public function index(Request $Request) {

      $query = DB::table('geolocals')->select('*')->get();


      foreach ($query as $value) {

        $latitudeFrom = $Request->lat_search;
        $longitudeFrom = $Request->lon_search;
        $latitudeTo = $value->latitude;
        $longitudeTo = $value->longitude;
        $earthRadius = 6371000;

        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $lonDelta = $lonTo - $lonFrom;
        $a = pow(cos($latTo) * sin($lonDelta), 2) +
          pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
        $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

        $angle = atan2(sqrt($a), $b);
        $distance = $angle * $earthRadius;

        $distanza_da_modificare = Geolocal::find($value->id);
        $distanza_da_modificare->distance = $distance;
        $distanza_da_modificare->update();
      }

      $nel_raggio = DB::table('apartments')->join('services', 'services.id', '=', 'apartments.service_id')
                                           ->join('addresses', 'addresses.id', '=', 'apartments.address_id')
                                           ->join('geolocals', 'geolocals.id', '=', 'addresses.geolocal_id')
                                           ->where('distance', '<=', 20000)
                                           ->orderBy('distance', 'asc')
                                           ->get();

    $data = [
      'appartamenti' => $nel_raggio,
      'latitudine' => $Request->lat_search,
      'longitudine' => $Request->lon_search,
    ];

    return view('public.search', $data);
  }
}
