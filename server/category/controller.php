<?php
require('../../server/connection.php');
include('../../server/pagination.php');

class Category extends Config{


	function __construct(){
    }

	public function create($data){
		$mysqli = new mysqli("localhost", "root", "", "entance");
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
		    return;
		}else{
			$data = $mysqli->real_escape_string($data['category_name']);
			if ($stmt = $mysqli->prepare('INSERT INTO category(name) VALUES(?)')){
				$stmt->bind_param("s", $data);
				$stmt->execute();
				print json_encode(array('success' =>true,'msg' =>'Record successfully saved'),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error),JSON_PRETTY_PRINT);
			}
		}        
	}

	public function read($page,$search){

		$limit = 10;
		$adjacent = 3;

		$mysqli = new mysqli($this->host, $this->user, "", "entance");
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
		    return;
		}else{

			if($page==1){
			   $start = 0;
			}else{
			  $start = ($page-1)*$limit;
			}

			$query1 ="SELECT * FROM category c;";
			$result1 = $mysqli->query($query1);
			$rows = $result1->num_rows;

			$query ="SELECT * FROM category c WHERE name LIKE '%$search%' order by name asc LIMIT $start, $limit;";
			$mysqli->set_charset("utf8");
			$result = $mysqli->query($query);
			$data = array();
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				array_push($data,$row);
			}

			$paging = pagination($limit,$adjacent,$rows,$page);
			print json_encode(['success' =>true,'category' =>$data,'pagination'=>$paging],JSON_PRETTY_PRINT);
		}
	}

	public function update($data){
		$mysqli = new mysqli("localhost", "root", "", "entance");
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
		    return;
		}else{
			$category_name = $mysqli->real_escape_string($data['category_name']);
			if ($stmt = $mysqli->prepare('UPDATE category SET name=? WHERE id=?')){
				$stmt->bind_param("ss", $category_name,$data['id']);
				$stmt->execute();
				print json_encode(array('success' =>true,'msg' =>'Record successfully updated'),JSON_PRETTY_PRINT);
			}else{
				print json_encode(array('success' =>false,'msg' =>"Error message: %s\n", $mysqli->error),JSON_PRETTY_PRINT);
			}
		}
	}

	public function delete($id){
		if($stmt = $mysqli->prepare("DELETE FROM category WHERE id =?")){
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