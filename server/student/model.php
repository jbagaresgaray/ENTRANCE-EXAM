<?php
require_once '../../server/connection.php';


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

			$level = $mysqli->real_escape_string($data['level']);

			$stmt2 = $mysqli->prepare('INSERT INTO userdata(username,password,fname,lname,level) VALUES(?,?,?,?,?)');
			$stmt2->bind_param("sssss", $username,sha1($password),$fname,$lname,$level);
			$stmt2->execute();				

			if ($stmt = $mysqli->prepare('INSERT INTO student(studid,fname,lname,mobileno,username,password) VALUES(?,?,?,?,?,?)')){
				$stmt->bind_param("ssssss", $studid,$fname,$lname,$mobileno,$username,sha1($password));
				$stmt->execute();

				print json_encode(array('success' =>true,'msg' =>'Record successfully saved'),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error),JSON_PRETTY_PRINT);
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

			if ($stmt = $mysqli->prepare('UPDATE student SET studid=?,fname=?,lname=?,mobileno=? WHERE id=?')){
				$stmt->bind_param("sssss", $studid,$fname,$lname,$mobileno,$id);
				$stmt->execute();
				print json_encode(array('success' =>true,'msg' =>'Record successfully updated'),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error),JSON_PRETTY_PRINT);
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
			print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error),JSON_PRETTY_PRINT);
		}
	}
}
?>
