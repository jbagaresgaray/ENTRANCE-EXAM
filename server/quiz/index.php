<?php
	include('../../server/cors.php');
	include( __DIR__.'/controller.php');

	$method = $_SERVER['REQUEST_METHOD'];
	$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

	switch ($method) {
	  case 'POST':
	    	QuizController::submitQuiz($_POST);
	    break;
	  case 'GET':
	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		if ($request[0] == 'exam'){
				$id = $request[1];
				QuizController::getQuestionsByCategory($id);
			}else{
				$id = $request[0];
				QuizController::getQuestionDetail($id);
			}
	  	}else{
	  		print json_encode('ENTRANCE EXAM API v.0.1 developed by: Philip Cesar B. Garay');
	  	}
	    break;

	  default:
	    print json_encode('ENTRANCE EXAM API v.0.1 developed by: Philip Cesar B. Garay');
	    break;
	}
	exit();
	
?>