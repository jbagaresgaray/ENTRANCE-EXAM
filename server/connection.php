<?php

class Config {

    public $host  ='localhost';
    public $user ='root';
    public $pass  = '';
    public $db  ='entrance';


    public $sms_api_code='09394049310J2P9XQZ4';
    
    // API will return the following strings
    public function sms_response($number){
    	switch ($number) {
    		case 1:
    			return "Invalid Number.";
    			break;
    		case 2:
    			return "Number not Supported.";
    			break;
    		case 3:
    			return "Invalid or EXPIRED APICODE.";
    			break;
    		case 4:
    			return "Maximum Message per day reached. This will be reset every 12MN.";
    			break;
    		case 5:
    			return "Maximum allowed characters for message reached.";
    			break;
    		case 6:
    			return "System OFFLINE.";
    			break;
    		case 7:
    			return "Database Connection Error.";
    			break;
    		case 8:
    			return "Database Error.";
    			break;
    		case 9:
    			return "Invalid Function Parameters.";
    			break;
    		case 10:
    			return "Recipient's number is blocked due to FLOODING, message was ignored.";
    			break;
    		default:
    			return "MESSAGE SENT!";
    			break;
    	}
    	exit(0);
    }
}
?>
