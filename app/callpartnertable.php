<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class callpartnertable extends Model
{
    //
    protected $table='callpartnertables';

    public function OrmBusinesspartner(){
    	return $this->belongsTo('App\businesstable','business_name');
    }
}
