<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportSchedule;
use App\Models\Schedule;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::post('/image/upload/store', function (Request $request) {
        $file = $request->file('file');        
        //$imported  = Excel::import(new ImportSchedule,$file);
        //Log::info(print_r($imported, true));
        $arr = Excel::toArray(new ImportSchedule,$file);
        
        // arr[0] = sheet 1, arr[1] = sheet2, arr[2] = sheet3
        foreach($arr[0] as $row) {
            //1 date,5 title,8 zaalwacht
            //replace this with a user search option
            if($row[8] == "Kora Lamerichhs") {
                //take excel date string eg 44108 and turn into datetime object, then into carbon object and format to display day of week
                //$date = Carbon::instance(ExcelDate::excelToDateTimeObject($row[1]))->format('l jS \of F Y A');
                $date = Carbon::instance(ExcelDate::excelToDateTimeObject($row[1]));
                if(Schedule::where('filmtitel', '=', $row[5])->first()){
                    $msg = 'movie already exists in database';
                } else {
                    $schedule = new Schedule();
                    $schedule->datum = $date;
                    $schedule->zaalwacht = $row[8];
                    $schedule->filmtitel = $row[5];
                    $schedule->save();
                    $msg = 'movies stored in db.';
                }     
            }            
        }
	
	    return response()->json([
            'success'=>'file has been imported',
            'msg' => $msg ?? 'no errors'
        ]);

    });
});
