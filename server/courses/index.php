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
		    	'coursename' => $_REQUEST['coursename'],
		    	'passing_score' => $_REQUEST['passing_score']
		    ];

			if(isset($request) && !empty($request) && $request[0] !== ''){
				$id = $request[0];
				Courses::update($id,$data);
			}else{
				Courses::update(null,$data);
			}
	    break;
	  case 'POST':
	  		session_start();
			$headers = apache_request_headers();	
			$token = $headers['X-Auth-Token'];

	    	$data = [
		    	'coursename' => $_POST['coursename'],
		    	'passing_score' => $_POST['passing_score']
		    ];
		    Courses::create($data);
	    break;
	  case 'GET':
	  		session_start();
			$headers = apache_request_headers();	
			$token = $headers['X-Auth-Token'];
		  	if(isset($request) && !empty($request) && $request[0] !== ''){
		  		$id = $request[0];
		  		Courses::detail($id);
		  	}else{
		  		Courses::read();
		  	}
		    break;
	  case 'DELETE':
	  		session_start();
			$headers = apache_request_headers();	
			$token = $headers['X-Auth-Token'];
	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		$id = $request[0];
	  		Courses::delete($id);
	  	}	   
	    break;
	  default:
	    print json_encode('ENTRANCE EXAM API v.0.1 developed by: Philip Cesar B. Garay');
	    break;
	}
	exit();
	
?>