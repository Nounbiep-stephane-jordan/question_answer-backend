<?php 
include_once("../database/config.php");
include_once("../responseClass.php");

header("Access-Control-Allow-Origin: *"); // headers to allow cross origin request 
header("Access-Control-Allow-Headers: *");

$response = new response(null,null);
 
 $Answer = array();
 $answer = mysqli_query($conn, "SELECT answer.creation_date,question.question,answer.answer,answer.answer_id, question.question_id,question.question_author,answer.answer_author
 FROM answer
 INNER JOIN question ON answer.question_id=question.question_id");
 if ($answer) {
    $i =0;
     while($res = mysqli_fetch_assoc($answer)){
        $Answer[$i]["answer"]= $res['answer'];
        $Answer[$i]["answer_author"]= $res['answer_author'];
        $Answer[$i]["question_id"]= $res["question_id"];
        $Answer[$i]["answer_id"]= $res["answer_id"];
        $Answer[$i]["creation_date"]= $res["creation_date"];

        $i++;
      }
 }


$questions = array();
$result = mysqli_query($conn, "SELECT * FROM question");
 if ($result) {
    $i =0;
     while($res = mysqli_fetch_assoc($result)){
        $questions[$i]["question_author"]= $res['question_author'];
        $questions[$i]["questions"]= $res['question'];
        $questions[$i]["question_id"]= $res["question_id"];
        $questions[$i]["creation_date"]= $res["creation_date"];
        $questions[$i]["answers"] = $Answer;
        $i++;
      }
 }
 
  
 
 echo json_encode($questions);

?>