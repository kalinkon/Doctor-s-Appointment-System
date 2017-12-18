<?php

namespace App\SMS;

use Nexmo\Laravel\Facade\Nexmo;

class SMSManager
{

	public function sendSMS($to, $body){

		Nexmo::message()->send([
	    	'to'   => '+88'.$to,
	    	'from' => 'DAS',
	    	'text' => $body
		]);
	}

}

?>
