<?php
include( __DIR__.'/model.php');

class StudentController {

	public static function create($data){
		session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else if(isset($data['studid']) && empty($data['studid'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Student ID is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['fname']) && empty($data['fname'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Student Firstname is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['lname']) && empty($data['lname'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Student Lastname is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['mobileno']) && empty($data['mobileno'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Mobile No. is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['email']) && empty($data['email'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Email Address is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['username']) && empty($data['username'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Username is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['password']) && empty($data['password'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Password is required'),JSON_PRETTY_PRINT);
		}else{
			$var = [
		    	'studid' => $data['studid'],
		    	'fname' => $data['fname'],
		    	'lname' => $data['lname'],
		    	'mobileno' => $data['mobileno'],
		    	'username' => $data['username'],
		    	'password' => $data['password'],
		    	'email' => $data['email'],
		    	'level'=> 'Student'
		    ];
			Student::create($var);
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
			Student::read();
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
			Student::detail($id);
		}
	}

	public static function update($id,$data){
		session_start();
		$headers = apache_request_headers();	
		$token = $headers['X-Auth-Token'];

		if($token != $_SESSION['form_token']){
			header('Invalid CSRF Token', true, 401);
			return print json_encode(array('success'=>false,'status'=>400,'msg'=>'Invalid CSRF Token / Bad Request / Unauthorized ... Please Login again'),JSON_PRETTY_PRINT);
		}else if(isset($data['studid']) && empty($data['studid'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Student ID is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['fname']) && empty($data['fname'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Student Firstname is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['lname']) && empty($data['lname'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Student Lastname is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['mobileno']) && empty($data['mobileno'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Mobile No. is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['email']) && empty($data['email'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Email Address is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['username']) && empty($data['username'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Username is required'),JSON_PRETTY_PRINT);
		}else if(isset($data['password']) && empty($data['password'])){
			return print json_encode(array('success'=>false,'status'=>200,'msg'=>'Password is required'),JSON_PRETTY_PRINT);
		}else{
			$var = [
		    	'studid' => $data['studid'],
		    	'fname' => $data['fname'],
		    	'lname' => $data['lname'],
		    	'mobileno' => $data['mobileno'],
		    	'username' => $data['username'],
		    	'password' => $data['password'],
		    	'email' => $data['email']
		    ];
			Student::update($id,$var);
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
			Student::delete($id);
		}
	}
}

?>