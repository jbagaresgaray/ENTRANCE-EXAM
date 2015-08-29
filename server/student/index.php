<?php
	include('../../server/cors.php');
	include( __DIR__.'/controller.php');

	$method = $_SERVER['REQUEST_METHOD'];
	$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

	switch ($method) {
	  	case 'PUT':
  			$data=parse_str( file_get_contents( 'php://input' ), $_PUT );
			foreach ($_PUT as $key => $value){
					unset($_PUT[$key]);
					$_PUT[str_replace('amp;', '', $key)] = $value;
			}
			$_REQUEST = array_merge($_REQUEST, $_PUT);

		
			if(isset($request) && !empty($request) && $request[0] !== ''){
				if ($request[0] == 'account'){
					
				}else if ($request[0] == 'profile'){
					
				}else{
					$id = $request[0];
					StudentController::update($id,$data);
				}
			}else{
				header('Route Not Found', true, 404);
			}
	    	break;
	  	case 'POST':
	  		if(isset($request) && !empty($request) && $request[0] !== ''){
				if ($request[0] == 'signup'){
					StudentController::signup($_POST);
				}else if($request[0] == 'auth'){
					StudentController::auth($_POST);
				}
			}else{
				StudentController::create($_POST);
			}
	    	break;
	  	case 'GET':
		  	if(isset($request) && !empty($request) && $request[0] !== ''){
		  		$id = $request[0];
		  		StudentController::detail($id);
		  	}else{
		  		StudentController::read();
		  	}
		    break;
	  	case 'DELETE':			
		  	if(isset($request) && !empty($request) && $request[0] !== ''){
		  		$id = $request[0];
				StudentController::delete($id);
		  	}  
		    break;
	  	default:
	    	print json_encode('ENTRANCE EXAM API v.0.1 developed by: Philip Cesar B. Garay');
	    	break;
	}
	exit();
	
?>
