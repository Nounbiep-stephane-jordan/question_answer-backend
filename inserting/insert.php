<?php 
include_once("../database/config.php");
include_once("../responseClass.php");
header("Access-Control-Allow-Origin: *"); // headers to allow cross origin request 
header("Access-Control-Allow-Headers: *");
     
$req = json_decode( file_get_contents('php://input') );    //getting inputs from frontend
$question = $req->question;
$author = $req->author;

$response = new response(null,null);


if($question == null || $author == null ) {
    $response->set_err("question cannot be empty");
    echo json_encode($response);
    return null;
}

 //storring post information in database
 $result = mysqli_query($conn, "INSERT INTO question(question,question_author) VALUE ('$question','$author')");
 if ($result) {
     $response->set_message("question sucessfully stored");
     echo json_encode($response);
     
 }

?>