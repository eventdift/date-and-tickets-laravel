<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datechecker extends Model
{
    protected $fillable = array('TicketNo','Day');
    public $table = 'ticketdates';

    public function checker($date){

    	$exist = self::where('Day', $date)->count();
        $value = self::where('Day', $date)->get();
    	if($exist>0){
    		$value[0]['TicketNo'] += 1 ;
    		$value[0]->save();
    		return sprintf("%04d", $value[0]['TicketNo']);;
    	}
    	else{
    		$this->Day = $date;
    		$this->TicketNo = 1;
    		$this->save();
    		return sprintf("%04d",$this->TicketNo);
    	}
    }
}
