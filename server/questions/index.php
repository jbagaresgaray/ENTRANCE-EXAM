<?php
	include('../../server/cors.php');
	include( __DIR__.'/controller.php');

	$method = $_SERVER['REQUEST_METHOD'];
	$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

	switch ($method) {
	  case 'PUT':
  			/*$data=parse_str( file_get_contents( 'php://input' ), $_PUT );
			foreach ($_PUT as $key => $value){
					unset($_PUT[$key]);
					$_PUT[str_replace('amp;', '', $key)] = $value;
			}
			$_REQUEST = array_merge($_REQUEST, $_PUT);
			if(isset($request) && !empty($request) && $request[0] !== ''){
				$id = $request[0];
				QuestionsController::update($id,$_REQUEST);
			}else{
				header('Route Not Found', true, 404);
			}*/
	    break;
	  case 'POST':
	  		if(isset($request) && !empty($request) && $request[0] !== ''){
				if ($request[0] == 'update'){
					// return print_r(json_encode($_POST));
	  				// return print_r(json_encode($_FILES));
					QuestionsController::update($_POST,$_FILES);
				}else if ($request[0] == 'check'){
					$field = $_POST['field'];
					$value = $_POST['value'];
		  			QuestionsController::check($field,$value);
				}
			}else{
				// return print_r(json_encode($_POST));
	  			// return print_r(json_encode($_FILES));
	  			QuestionsController::create($_POST,$_FILES);
			}
	    break;
	  case 'GET':
	  	if(isset($request) && !empty($request) && $request[0] !== ''){
			$id = $request[0];
			QuestionsController::detail($id);
	  	}else{
	  		QuestionsController::read();
	  	}
	    break;
	  case 'DELETE':
	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		if ($request[0] == 'file'){
				$id = $request[1];
				$file = $request[2];
				QuestionsController::deleteQuestionFile($id,$file);
			}else if ($request[0] == 'question'){
				$id = $request[1];
				$file = $request[2];
				QuestionsController::deleteChoiceFile($id,$file);
			}else{
		  		$id = $request[0];
		  		QuestionsController::delete($id);
		  	}
	  	}   
	    break;
	  default:
	    print json_encode('ENTRANCE EXAM API v.0.1 developed by: Philip Cesar B. Garay');
	    break;
	}
	exit();
	
?>