<?php
	include('../../server/cors.php');
	include( __DIR__.'/model.php');

	$method = $_SERVER['REQUEST_METHOD'];
	$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

	switch ($method) {
	  case 'PUT':
	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		$id = $request[0];
	  		Category::update($data);
	  	}else{
	  		$data = [
				"category_name" => $_POST['category_name'],
				"id" => $request
			];
			Category::update($data);
	  	}
	    break;
	  case 'POST':
	    $data = [
			"category_name" => $_POST['category_name']
		];
		Category::create($data);
	    break;
	  case 'GET':
	  	if(isset($request) && !empty($request) && $request[0] !== ''){
	  		$id = $request[0];
	  		Category::detail($id);
	  	}else{
	  		$search = isset($_GET['search']) ? $_GET['search']: null;
			$page = isset($_GET['page']) ? $_GET['page']: 1;
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