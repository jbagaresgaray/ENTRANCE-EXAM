<?php

class Config {

    public $host  ='localhost';
    public $user ='root';
    public $pass  = '';
    public $db  ='entrance';


    public $sms_api_code='09394049310J2P9XQZ4';
    
    // API will return the following strings
    public $sms_response = [
    	"1" => "Invalid Number.",
		"2" => "Number not Supported.",
		"3" => "Invalid or EXPIRED APICODE.",
		"4" => "Maximum Message per day reached. This will be reset every 12MN.",
		"5" => "Maximum allowed characters for message reached.",
		"6" => "System OFFLINE.",
		"7" => "Database Connection Error.",
		"8" => "Database Error.",
		"9" => "Invalid Function Parameters.",
		"10" => "Recipient's number is blocked due to FLOODING, message was ignored.",
		"0" => "MESSAGE SENT!"
    ];
}

?>
