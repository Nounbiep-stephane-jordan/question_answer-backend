<?php 
include_once("../database/config.php");
include_once("../responseClass.php");

header("Access-Control-Allow-Origin: *"); // headers to allow cross origin request 
header("Access-Control-Allow-Headers: *");

$response = new response(null,null);

$req = json_decode( file_get_contents('php://input') );    //getting inputs from frontend
$question_id = $req->question_id;
$question = $req->question;

if($question_id == null || $question == null) {
    $response->set_err("question cannot be empty");
    echo json_encode($response);
    return null;
}

$answer = mysqli_query($conn, "UPDATE question SET question='$question' WHERE question_id='$question_id' ");
if ($answer) {
    $response->set_message("question updated sucessfully");
    echo json_encode($response);
    
}


?>