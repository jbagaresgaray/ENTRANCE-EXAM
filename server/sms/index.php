<?php
	include('../../server/cors.php');
	include( __DIR__.'/model.php');

	$method = $_SERVER['REQUEST_METHOD'];
	$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

	switch ($method) {
	  case 'POST':
	     SMS::itexmo($_POST['number'],$_POST['message']);
	    break;
	  case 'GET':
	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		$id = $request[0];
	  		
	  	}else{
	  		
	  	}
	    break;
	  case 'DELETE':
	  	if(isset($request) && !empty($request)){
	  		$id = $request[0];
	  		
	  	}else{
	  		
	  	}	   
	    break;
	  default:
	    print json_encode('ENTRANCE EXAM API v.0.1 developed by: Philip Cesar B. Garay');
	    break;
	}
	exit();
	
?>