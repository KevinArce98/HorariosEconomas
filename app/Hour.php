<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Hour extends Model
{
	public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from', 'to'
    ];

    public function validateHours($from, $to)
    {
    	$from = Carbon::createFromFormat('h:i A', $from);
    	$to = Carbon::createFromFormat('h:i A', $to);
    	return $from->diffInHours($to, false); 
    }
    public function convertTimeToNormal($time){
    	$from = Carbon::createFromFormat('H:i:s', $time)->format('h:i A');
        return $from ;
    }

    public static function convertToSQLTime($time){
         $from = Carbon::createFromFormat('h:i A', $time);
    	$from = "$from->hour:$from->minute";
        return $from ;
    }
}
