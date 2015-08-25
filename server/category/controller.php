<?php
include( __DIR__.'/model.php');

class CategoryController {

	public static function create($data){
		session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else if(isset($data['category_name']) && empty($data['category_name'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Category Name is required'),JSON_PRETTY_PRINT);
		}else{
			$var = [
				"category_name" => $data['category_name']
			];
			Category::create($var);
		}
	}


	public static function read(){
		session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else{
			Category::read();
		}
	}

	public static function detail($id){
		session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else{
			Category::detail($id);
		}
	}

	public static function update($id,$data){
		session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else if(isset($data['category_name']) && empty($data['category_name'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Category Name is required'),JSON_PRETTY_PRINT);
		}else{
			$var = [
				'category_name'=> $data['category_name']
			];
			Category::update($id,$var);
		}
	}

	public static function delete($id){
		session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else{
			Category::delete($id);
		}
	}
}

?>