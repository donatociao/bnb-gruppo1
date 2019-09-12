<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Apartment;
use Illuminate\Support\Facades\DB;



class ApartmentsController extends Controller
{
  public function index(Request $request) {

    if (is_null($request->km)) {
      $request->km = 20000;
    }else {
      $request->km = $request->km * 1000;
    };

    $query = DB::table('geolocals')->select('*')->get();
    $ok =[];
    $i = 0;

    foreach ($query as $value) {

      $latitudeFrom = $request->lat_search;
      $longitudeFrom = $request->lon_search;
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
      if ($distance <= $request->km) {
        $ok[$i] = $value->id;
        $i++;
      }
    }


    if (is_null($request->rooms_number)) {
      $request->rooms_number = -1;
    };
    if (is_null($request->host_number)) {
      $request->host_number = -1;
    };
    if (is_null($request->wc_number)) {
      $request->wc_number = -1;
    };
    if (is_null($request->mq)) {
      $request->mq = -1;
    };
    if (is_null($request->wifi)) {
      $request->wifi = -1;
    };
    if (is_null($request->parking)) {
      $request->parking = -1;
    };
    if (is_null($request->pool)) {
      $request->pool = -1;
    };
    if (is_null($request->reception)) {
      $request->reception = -1;
    };
    if (is_null($request->spa)) {
      $request->spa = -1;
    };
    if (is_null($request->sea_view)) {
      $request->sea_view = -1;
    };

    $apartments =  DB::table('apartments')->join('services', 'services.id', '=', 'apartments.service_id')
                                          ->join('addresses', 'addresses.id', '=', 'apartments.address_id')
                                          ->join('geolocals', 'geolocals.id', '=', 'addresses.geolocal_id')
                                          ->whereIn('geolocal_id', $ok)
                                          ->where([
                                              ['rooms_number', '>=', $request->rooms_number],
                                              ['host_number', '>=', $request->host_number],
                                              ['wc_number', '>=', $request->wc_number],
                                              ['mq', '>=', $request->mq],
                                              ['wifi', '>=', $request->wifi],
                                              ['parking', '>=', $request->parking],
                                              ['pool', '>=', $request->pool],
                                              ['reception', '>=', $request->reception],
                                              ['spa', '>=', $request->spa],
                                              ['sea_view', '>=', $request->sea_view]
                                            ])->get();

    return response()->json([
        'success' => true,
        'result' => $apartments
    ]);
  }
}
