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
        //$arr[0][1][7] and [8] is jaar en weeknummer
        $year = $arr[0][1][7];
        $week = $arr[0][1][8];       
        if(!Schedule::where('week', '=', $week)->exists()){
            Log:info(print_r($arr[0], true));
            foreach($arr[0] as $key => $row) {
                Log::info(print_r(gettype($row[1]),true));
                //1 date,5 title,8 zaalwacht                
                //take excel date string eg 44108 and turn into datetime object, then into carbon object and format to display day of week
                //$date = Carbon::instance(ExcelDate::excelToDateTimeObject($row[1]))->format('l jS \of F Y A');
                if((is_double($row[1]) || is_int($row[1])) && is_double($row[3]) && is_double($row[6])) {
                    //if a movie has no zaalwacht name, take the name from the previous row
                    if(empty($row[8])){
                        $zaalwacht =$arr[0][$key-1][8];                       
                    }
                    $date = Carbon::instance(ExcelDate::excelToDateTimeObject($row[1]));
                    // Log::info(print_r($date,true));
                    $start = Carbon::instance(ExcelDate::excelToDateTimeObject($row[3]));
                    $end = Carbon::instance(ExcelDate::excelToDateTimeObject($row[6]));
                    $schedule = new Schedule();
                    $schedule->datum = $date;
                    $schedule->zaalwacht = empty($row[8]) ? $zaalwacht : $row[8];
                    $schedule->filmtitel = $row[5];
                    $schedule->start = $start;
                    $schedule->end = $end;
                    $schedule->year = $year;
                    $schedule->week = $week;
                    $schedule->save();                    
                    // $msg = 'movies stored in db.';
                }
               
            }
        }
	    return response()->json([
            'success'=>'file has been imported',
            'msg' => $msg ?? 'no errors'
        ]);
    });
});
