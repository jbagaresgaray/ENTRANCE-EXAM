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
				"category_name" => $_REQUEST['category_name']
			];

			if(isset($request) && !empty($request) && $request[0] !== ''){
				$id = $request[0];
				Category::update($id,$data);
			}else{
				Category::update(null,$data);
			}
			break;
	  	case 'POST':
		  	if(isset($_POST['category_id'])&&!empty($_POST['category_id'])){
		  		
		  	}else{
		  		$data = [
					"category_name" => $_POST['category_name']
				];
				Category::create($data);
		  	}
		    break;
	  	case 'GET':
		  	if(isset($request) && !empty($request) && $request[0] !== ''){
		  		$id = $request[0];
		  		Category::detail($id);
		  	}else{
				Category::read();
		  	}
		    break;
	  	case 'DELETE':
		  	if(isset($request) && !empty($request) && $request[0] !== ''){
		  		$id = $request[0];
		  		Category::delete($id);
		  	}   
		    break;
	  	default:
	    	print json_encode('ENTRANCE EXAM API v.0.1 developed by: Philip Cesar B. Garay');
	    	break;
	}
	exit();
	
?>