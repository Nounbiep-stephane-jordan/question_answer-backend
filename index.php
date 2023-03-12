<?php
session_start();
include_once("./database/config.php");
include_once("./php.ini");
include_once("./auth/userSession.php");

// header('Access-Control-Allow-Origin: *');
// header("Access-Control-Allow-Headers: *");

// if(empty($_SESSION["user_name"])) {
//     $session = new userSession($_SESSION["user_name"],$_SESSION["isAuth"]);
//     echo json_encode($session);
// } else {
//     $session = new userSession("","");
//     echo json_encode($session);
// }
 

?>

