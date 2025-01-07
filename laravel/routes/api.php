<?php

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/nim-mk', function () {
    $nim_mk = new Collection;
    $data = DB::table('respondens')
        ->where('attribute', '=', "nim")
        ->orWhere('attribute', 'nama_mk')
        ->get();

    $respondent_number = -1;
    $nim = '-';
    $nama_mk = '-';
    for($i=0;$i<count($data);$i++){
        if($data[$i]->respondent_number != $respondent_number){
            $respondent_number = $data[$i]->respondent_number;
        }
        if($data[$i]->attribute == 'nim' && $data[$i]->respondent_number == $respondent_number){
            $nim = $data[$i]->value;
        }
        if($data[$i]->attribute == 'nama_mk' && $data[$i]->respondent_number == $respondent_number){
            $nama_mk = $data[$i]->value;
            $nim_mk->push([
                'nim' => $nim,
                'nama_mk' => $nama_mk
            ]);
        }
    }

    return response()->json($nim_mk);
});
