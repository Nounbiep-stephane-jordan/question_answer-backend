<?php 
include_once("../database/config.php");
include_once("../responseClass.php");

header("Access-Control-Allow-Origin: *"); // headers to allow cross origin request 
header("Access-Control-Allow-Headers: *");

$response = new response(null,null);

$req = json_decode( file_get_contents('php://input') );    //getting inputs from frontend
$answer_id = $req->answer_id;
$answer = $req->answer;

if($answer_id == null || $answer == null) {
    $response->set_err("answer cannot be empty");
    echo json_encode($response);
    return null;
}

$answer = mysqli_query($conn, "UPDATE answer SET answer='$answer' WHERE answer_id='$answer_id' ");
if ($answer) {
    $response->set_message("answer updated sucessfully");
    echo json_encode($response);
    
}


?>