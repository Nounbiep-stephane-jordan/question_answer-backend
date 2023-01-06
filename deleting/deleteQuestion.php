<?php 
include_once("../database/config.php");
include_once("../responseClass.php");

header("Access-Control-Allow-Origin: *"); // headers to allow cross origin request 
header("Access-Control-Allow-Headers: *");

$req = json_decode( file_get_contents('php://input') );    //getting inputs from frontend
$question_id = $req->question_id;

$response = new response(null,null);


if($question_id == null) {
    $response->set_err("question cannot be empty");
    echo json_encode($response);
    return null;
}

 //storring post information in database
 $result = mysqli_query($conn, "DELETE FROM question WHERE question_id='$question_id'");
 if ($result) {
     $response->set_message("question deleted sucessfully");
     echo json_encode($response);
     
 }

?>