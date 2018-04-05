<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;


class Week extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from', 'to', 'number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];

    public function convertDateToNormal($date){
        return \DateTime::createFromFormat('Y-m-d', $date)->format('d/m/Y');
    }

    public function convertToSQL($date){
          $date = \DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d');
          return $date;
    }
}
