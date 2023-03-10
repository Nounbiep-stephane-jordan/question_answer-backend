<?php

include_once("../database/config.php");
include_once("./userClass.php");
header('Access-Control-Allow-Origin: *'); // headers to allow cross origin request 
header("Access-Control-Allow-Headers: *");
     

    $not_registered_user = new user(0,false,null);  //creating a default unathorized user
    $req = json_decode( file_get_contents('php://input') );    //getting inputs from frontend
    $name = $req->name;  //extracting the inputs values from the req object
    $password = $req->password;
    $email = $req->email;
    $profileImage = $req->profileImage;
    
    //stopping auth if any value is null
    if($name==null || $email==null || $profileImage==null || $password==null) {
      $not_registered_user->set_errType("all");
      $not_registered_user->set_userErr('values cannot be empty');
      echo json_encode($not_registered_user);
      return null;
    }

    //verifying that password length is greather than 6
    if(strlen( $password) < 6 ) {
      $not_registered_user->set_errType("password");
      $not_registered_user->set_userErr('password must be six or grether than six character length');
      echo json_encode($not_registered_user);
      return null;
    }
    

    //hashing password
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    //storring user information in database
   if($hashed){
    $result = mysqli_query($conn, "INSERT INTO user(name,password,email,profileImage) VALUE ('$name','$hashed','$email','$profileImage')");
    if ($result) {
      // session_start();
      // $_SESSION["user_name"] = $name;
      // $_SESSION["isAuth"] = true;
      $registered_user = new user(null,true,$name);  //creating an authorized user
      echo json_encode($registered_user);

    }
   }

?>