<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public $timestamps = false;
   	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'market_id', 'week_id', 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function market()
    {
        return $this->belongsTo(Market::class);
    }
    public function week()
    {
        return $this->belongsTo(Week::class);
    }

    public function hour($id)
    {
        return Hour::find($id);
    }
    public function showHour($id)
    {
    	$hour = Hour::find($id);
    	$from = $hour->convertTimeToNormal($hour->from);
    	$to = $hour->convertTimeToNormal($hour->to);
        if ($from == '12:00 AM' && $to == '12:00 PM') {
            return "Libre";
        }
        return "$from--$to";
    }


    public function setClass($id)
    {
        $hour = $this->hour($id);
        if (isset($hour)) {
            switch ($hour->color) {
                case '#769fd1':
                   return  'style=background-color:#769fd1;color:white;' ;
                    break;
                case '#eb6a3b':
                   return 'style=background-color:#eb6a3b;color:white;';
                    break;
                case '#f6e455':
                   return 'style=background-color:#f6e455;color:black;';
                    break;
                case '#ffffff':
                   return 'style=background-color:#ffffff;color:black;';
                    break;
                case '#80e455':
                   return 'style=background-color:#80e455;color:white;';
                    break;
                case '#d1d7c0':
                   return 'style=background-color:#d1d7c0;color:black;';
                    break;
                default:
                   return "";
                    break;
            }
        }else
        {
            return "";
        }
    }

    
}
