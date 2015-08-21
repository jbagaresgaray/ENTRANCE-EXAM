<?php
	include('../../server/cors.php');
	include( __DIR__.'/model.php');

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

			$data = [
		    	'studid' => $_REQUEST['studid'],
		    	'fname' => $_REQUEST['fname'],
		    	'lname' => $_REQUEST['lname'],
		    	'mobileno' => $_REQUEST['mobileno'],
		    	'username' => $_REQUEST['username'],
		    	'password' => $_REQUEST['password']
		    ];

			if(isset($request) && !empty($request) && $request[0] !== ''){
				$id = $request[0];
				Student::update($id,$data);
			}else{
				Student::update(null,$data);
			}
	    break;
	  case 'POST':
	    $data = [
	    	'studid' => $_POST['studid'],
	    	'fname' => $_POST['fname'],
	    	'lname' => $_POST['lname'],
	    	'mobileno' => $_POST['mobileno'],
	    	'username' => $_POST['username'],
	    	'password' => $_POST['password'],
	    	'email' => $_POST['email'],
	    	'level'=> 'student'
	    ];

	    Student::create($data);
	    break;
	  case 'GET':
	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		$id = $request[0];
	  		Student::detail($id);
	  	}else{
	  		Student::read();
	  	}
	    break;
	  case 'DELETE':
	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		$id = $request[0];
			Student::delete($id);
	  	}  
	    break;
	  default:
	    print json_encode('ENTRANCE EXAM API v.0.1 developed by: Philip Cesar B. Garay');
	    break;
	}
	exit();
	
?>
