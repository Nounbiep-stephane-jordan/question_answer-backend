<?php 
include_once("../database/config.php");
include_once("../responseClass.php");

header("Access-Control-Allow-Origin: *"); // headers to allow cross origin request 
header("Access-Control-Allow-Headers: *");

$response = new response(null,null);
$questions = array();
$result = mysqli_query($conn, "SELECT * FROM question");
 if ($result) {
    $i =0;
     while($res = mysqli_fetch_assoc($result)){
        $questions[$i]["question_author"]= $res['question_author'];
        $questions[$i]["questions"]= $res['question'];
        $i++;
      }
 }
 
 $answer = mysqli_query($conn, " SELECT * FROM answer");
 if ($answer) {
    $i =0;
     while($res = mysqli_fetch_assoc($answer)){
        $questions[$i]["answer"]= $res['answer'];
        $questions[$i]["answer_author"]= $res['answer_author'];
        $i++;
      }
 }



 echo json_encode($questions);

?>