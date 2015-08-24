<?php
	include('../../server/cors.php');
	include( __DIR__.'/model.php');

	$method = $_SERVER['REQUEST_METHOD'];
	$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

	switch ($method) {
	  case 'PUT':
	  		session_start();
			$headers = apache_request_headers();	
			$token = $headers['X-Auth-Token'];

  			$data=parse_str( file_get_contents( 'php://input' ), $_PUT );
			foreach ($_PUT as $key => $value){
					unset($_PUT[$key]);
					$_PUT[str_replace('amp;', '', $key)] = $value;
			}
			$_REQUEST = array_merge($_REQUEST, $_PUT);

			$data = [
				''
			];

			if(isset($request) && !empty($request) && $request[0] !== ''){
				$id = $request[0];
				Questions::update($id,$data);
			}else{
				Questions::update(null,$data);
			}
	    break;
	  case 'POST':
	  		session_start();
			$headers = apache_request_headers();	
			$token = $headers['X-Auth-Token'];

			Questions::create($_POST,$_FILES);
	    break;
	  case 'GET':
	  		session_start();
			$headers = apache_request_headers();	
			$token = $headers['X-Auth-Token'];

	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		if ($request[0] == 'category'){
	  			$id = $request[1];
	  			Questions::byCategory($id);
	  		}else if($request[0] == 'course'){
	  			$id = $request[1];
	  			Questions::byCourse($id);
	  		}else{
	  			$id = $request[0];
	  			Questions::detail($id);
	  		}
	  	}else{
	  		Questions::read();
	  	}
	    break;
	  case 'DELETE':
	  		session_start();
			$headers = apache_request_headers();	
			$token = $headers['X-Auth-Token'];

	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		$id = $request[0];
	  		Questions::delete($id);
	  	}   
	    break;
	  default:
	    print json_encode('ENTRANCE EXAM API v.0.1 developed by: Philip Cesar B. Garay');
	    break;
	}
	exit();
	
?>