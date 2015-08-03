<?php
	include('../../server/cors.php');
	include( __DIR__.'/controller.php');

	$method = $_SERVER['REQUEST_METHOD'];
	$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

	switch ($method) {
	  case 'PUT':
  		$data = [
			"category_name" => $_POST['category_name'],
			"id" => $request
		];
		Category::update($data);
	    break;
	  case 'POST':
	    $data = [
			"category_name" => $_POST['category_name']
		];
		Category::create($data);
	    break;
	  case 'GET':
	  	if(isset($request) && !empty($request)){
	  		print json_encode($request);
	  		// Category::detail($request);
	  	}else{
	  		$search = isset($_POST['search']) ? $_POST['search']: null;
			$page = isset($_POST['page']) ? $_POST['page']: 1;
			Category::read($page,$search);
	  	}
	    break;
	  case 'DELETE':
	  	if(isset($request) && !empty($request)){
	  		Category::delete($request);
	  	}else{
	  		Category::delete($_POST['id']);
	  	}	   
	    break;
	  default:
	    print json_encode('ENTRANCE EXAM API v.0.1 developed by: Philip Cesar B. Garay');
	    break;
	}
	exit();
	
?>