<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Apartment;
use Illuminate\Support\Facades\DB;



class ApartmentsController extends Controller
{
  public function index(Request $request) {

    if (is_null($request->rooms_number)) {
      $request->rooms_number = -1;
    };
    if (is_null($request->host_number)) {
      $request->host_number = -1;
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
                                          ->where([
                                              ['rooms_number', '>=', $request->rooms_number],
                                              ['host_number', '>=', $request->host_number],
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
