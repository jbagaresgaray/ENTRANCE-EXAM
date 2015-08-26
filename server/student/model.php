<?php
require_once '../../server/connection.php';
require_once '../../server/sms/model.php';

class Student {

	function __construct(){
    }

	public function create($data){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
		    return;
		}else{
			$studid = $mysqli->real_escape_string($data['studid']);
			$fname = $mysqli->real_escape_string($data['fname']);
			$lname = $mysqli->real_escape_string($data['lname']);
			$mobileno = $mysqli->real_escape_string($data['mobileno']);
			$username = $mysqli->real_escape_string($data['username']);
			$password = $mysqli->real_escape_string($data['password']);
			$email = $mysqli->real_escape_string($data['email']);
			$level = $mysqli->real_escape_string($data['level']);

			$stmt2 = $mysqli->prepare('INSERT INTO userdata(username,password,fname,lname,email,mobileno,level) VALUES(?,?,?,?,?,?,?)');
			$stmt2->bind_param("sssssss", $username,sha1($password),$fname,$lname,$email,$mobileno,$level);
			$stmt2->execute();				

			if ($stmt = $mysqli->prepare('INSERT INTO student(studid,fname,lname,mobileno,email) VALUES(?,?,?,?,?)')){
				$stmt->bind_param("sssss", $studid,$fname,$lname,$mobileno,$email);
				$stmt->execute();

				print json_encode(array('success' =>true,'msg' =>'Record successfully saved'),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'msg' =>"Error message: %s\n" . $mysqli->error),JSON_PRETTY_PRINT);
			}
		}        
	}

	public function read(){
		$limit = 10;
		$adjacent = 3;
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
		    return;
		}else{

			$query1 ="SELECT * FROM student c;";
			$result1 = $mysqli->query($query1);
			$data = array();
			while($row = $result1->fetch_array(MYSQLI_ASSOC)){
				array_push($data,$row);
			}
			
			print json_encode(['success' =>true,'student' =>$data],JSON_PRETTY_PRINT);
		}
	}

	public function detail($id){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
		    return;
		}else{
			$query ="SELECT * FROM student c WHERE id=$id LIMIT 1;";
			$mysqli->set_charset("utf8");
			$result = $mysqli->query($query);
			if($row = $result->fetch_array(MYSQLI_ASSOC)){
				print json_encode(array('success' =>true,'student' =>$row),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'msg' =>"No record found!"),JSON_PRETTY_PRINT);
			}
		}
	}

	public function checkID($studentID){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
		    return;
		}else{
			$query ="SELECT * FROM student c WHERE studid=$studentID LIMIT 1;";
			$mysqli->set_charset("utf8");
			$result = $mysqli->query($query);
			if($row = $result->fetch_array(MYSQLI_ASSOC)){
				print json_encode(array('success' =>true,'msg' =>'Student already existed'),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'msg' =>"No record found!"),JSON_PRETTY_PRINT);
			}
		}
	}

	public function update($id,$data){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
		    return;
		}else{
			$studid = $mysqli->real_escape_string($data['studid']);
			$fname = $mysqli->real_escape_string($data['fname']);
			$lname = $mysqli->real_escape_string($data['lname']);
			$mobileno = $mysqli->real_escape_string($data['mobileno']);
			$email = $mysqli->real_escape_string($data['email']);

			if ($stmt = $mysqli->prepare('UPDATE student SET studid=?,fname=?,lname=?,mobileno=?,email=? WHERE id=?')){
				$stmt->bind_param("ssssss", $studid,$fname,$lname,$mobileno,$email,$id);
				$stmt->execute();
				print json_encode(array('success' =>true,'msg' =>'Profile successfully updated'),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'msg' =>"Error message: %s\n". $mysqli->error),JSON_PRETTY_PRINT);
			}
		}
	}

	public function updateAccount($id,$data){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
		    return;
		}else{
			$username = $mysqli->real_escape_string($data['username']);
			$password = $mysqli->real_escape_string($data['password']);

			if ($stmt = $mysqli->prepare('UPDATE student SET username=?,password=? WHERE id=?')){
				$stmt->bind_param("sss", $username,$password,$id);
				$stmt->execute();
				print json_encode(array('success' =>true,'msg' =>'Account successfully updated'),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'msg' =>"Error message: %s\n". $mysqli->error),JSON_PRETTY_PRINT);
			}
		}
	}

	public function updateProfile($id,$data){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
		    return;
		}else{
			$fname = $mysqli->real_escape_string($data['fname']);
			$lname = $mysqli->real_escape_string($data['lname']);
			$mobileno = $mysqli->real_escape_string($data['mobileno']);
			$email = $mysqli->real_escape_string($data['email']);

			if ($stmt = $mysqli->prepare('UPDATE student SET username=?,password=? WHERE id=?')){
				$stmt->bind_param("sss", $username,$password,$id);
				$stmt->execute();
				print json_encode(array('success' =>true,'msg' =>'Account successfully updated'),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'msg' =>"Error message: %s\n". $mysqli->error),JSON_PRETTY_PRINT);
			}
		}
	}

	public function delete($id){
		$config= new Config();		
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if($stmt = $mysqli->prepare("DELETE FROM student WHERE id =?")){
			$stmt->bind_param("s", $id);
			$stmt->execute();
			$stmt->close();
			print json_encode(array('success' =>true,'msg' =>'Record successfully deleted'),JSON_PRETTY_PRINT);
		}else{
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n". $mysqli->error),JSON_PRETTY_PRINT);
		}
	}
}
?>
