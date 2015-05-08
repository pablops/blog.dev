<?php 

use Carbon\Carbon;
use Esensi\Model\Model;

class BaseModel extends Eloquent {
	public function getCreatedAtAttribute($value)
	{
    	$utc = Carbon::createFromFormat($this->getDateFormat(), $value);
    	return $utc->setTimezone('America/Chicago');
	}

	public function getUpdatedAtAttribute($value)
	{
    	$utc = Carbon::createFromFormat($this->getDateFormat(), $value);
    	return $utc->setTimezone('America/Chicago');
	}


}

 ?>

