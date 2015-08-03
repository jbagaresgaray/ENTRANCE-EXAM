<?php
	include('../../server/cors.php');
	include( __DIR__.'/controller.php'); 

	switch ($_POST['command']) {
		case 'create_category':
			$data = [
				"category_name" => $_POST['category_name']
			];
			Category::create($data);
			break;
		case 'read_category':
			$search = isset($_POST['search']) ? $_POST['search']: null;
			$page = isset($_POST['page']) ? $_POST['page']: 1;
			Category::read($page,$search);
			break;
		case 'update_category':
			$data = [
				"category_name" => $_POST['category_name'],
				"id" => $_POST['id']
			];
			Category::update($data);
			break;
		case 'delete_category':
			Category::delete($_POST['id']);
			break;
		default:	
			echo 'ENTRANCE EXAM API v.0.1 developed by: Philip Cesar B. Garay';
			break;
	}
	exit();
	
?>