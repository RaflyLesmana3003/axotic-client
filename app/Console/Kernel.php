<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        
        
        $schedule->call(function () {
            
            $penjualan = DB::table('penjualans')->where("status","=",0)->get();
            foreach ($penjualan as $penjualans) {
                $timezone = new DateTimeZone('Asia/Jakarta');
                $date = new DateTime();
                $date->setTimeZone($timezone);
                $new_time = date($penjualans->created_at, strtotime('+3 hours'));
               
                $penjualana = DB::table('penjualans')->where('updated_at',"<",$new_time)->where("status","=",0)->get();
                foreach ($penjualana as $penjualana) {
                $product = explode(",",$penjualana->product);

                foreach ($product as $products) {
                    DB::table('products')
                    ->where('id', $products)
                    ->update(['stok' => 1]);
                }
            }
                DB::table('penjualans')
                ->where("status","=",0)->where('updated_at',"<",$new_time)
                ->delete();
                DB::table('pembayarans')
                ->where("status","=",0)->where('updated_at',"<",$new_time)
                ->delete();
            }
           
    
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
