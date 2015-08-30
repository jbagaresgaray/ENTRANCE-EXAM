<?php
require_once '../../server/connection.php';
include('../../server/pagination.php');

class Quiz {

	function __construct(){
    }

	public function submitQuiz($data){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
		    return;
		}else{
			$c = isset($data['question']) ? json_decode($data['question']) : 0;
			$category_id = $data['category_id'];
			$student_id = $_SESSION['entrance_student']['studid'];
			$questions = json_decode($data['question']);
            $row = count($c);
			$score = 0;
			$var = array();
            for($i = $row; $i > 0; $i--){
                $ans = isset($data['ans'.$i]) ? $data['ans'.$i] : 'null';
                $ques = $questions[$i-1];
				$result = $mysqli->query("SELECT * FROM choice c WHERE c.id=$ans and choice='yes';");
				if($result->num_rows == 1){
                    $score++;   
                }
                $mysqli->query("INSERT INTO status VALUES (null,'$student_id',$ques,$category_id,$ans,1)");
            }
            $mysqli->query("INSERT INTO result VALUES (null,'$student_id',$category_id,$score,$row,NOW())");

			print_r(json_encode(array('success' =>true,'status'=>200,'category_id'=>$category_id,'result'=>$score,'msg'=>'Thank you for participating the examination'),JSON_PRETTY_PRINT));
		}        
	}

	public function getQuestionsByCategory($id){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    return print json_encode(array('success' =>false,'status'=>400,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
		    die();
		}else{
			$data = array();
			$query ="SELECT * FROM question c WHERE c.category_id=$id;";
			$result = $mysqli->query($query);
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$data1 = array();
				$query1 ="SELECT * FROM choice c WHERE c.questionid=".$row['id'];
				$result1 = $mysqli->query($query1);
				while($row1 = $result1->fetch_array(MYSQLI_ASSOC)){
					array_push($data1,$row1);
					shuffle($data1);
				}				
				$row['choices'] = $data1;
				array_push($data,$row);			
			}
			print json_encode(array('success' =>true,'status'=>200,'category'=>$id,'quiz' =>$data),JSON_PRETTY_PRINT);
		}
	}

	public function getQuestionDetail($id){
		$config= new Config();
		$mysqli = new mysqli($config->host, $config->user, $config->pass, $config->db);
		if ($mysqli->connect_errno) {
		    print json_encode(array('success' =>false,'msg' =>"Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error));
		    return;
		}else{
			
		}
	}

}
?>