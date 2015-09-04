<?php
	include('../../server/cors.php');
	include( __DIR__.'/controller.php');

	$method = $_SERVER['REQUEST_METHOD'];
	$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

	switch ($method) {
	  case 'GET':
	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		if ($request[0] == 'results'){
	  			$studentid = $request[1];
				ResultsController::getResultsSummary($studentid);
			}else if ($request[0] == 'passers'){
				if (isset($request) && !empty($request) && isset($request[1])){
					$course_id = $request[1];
					ResultsController::getPassersByCourse($course_id);
				}else{
					ResultsController::getPassers();
				}
			}else{
				return print json_encode('ENTRANCE EXAM API v.0.1 developed by: Philip Cesar B. Garay');
				die();
			}
	  	}else{
	  		return print json_encode('ENTRANCE EXAM API v.0.1 developed by: Philip Cesar B. Garay');
	  		die();
	  	}
	    break;
	  default:
	    print json_encode('ENTRANCE EXAM API v.0.1 developed by: Philip Cesar B. Garay');
	    break;
	}
	exit();
	
?>