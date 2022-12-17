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
      $not_registered_user->set_userErr('values cannot be empty');
      echo json_encode($not_registered_user);
      return null;
    }

    //verifying that password length is greather than 6
    if(strlen( $password) < 6 ) {
      $not_registered_user->set_userErr('password must be six or grether than six character length');
      echo json_encode($not_registered_user);
      return null;
    }
    

    //storring user information in database
    $result = mysqli_query($conn, "INSERT INTO user(name,password,email,profileImage) VALUE ('$name','$password','$email','$profileImage')");
    if ($result) {
        $registered_user = new user(null,true,$name);  //creating an authorized user
        echo json_encode($registered_user);

    }

?>