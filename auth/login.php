<?php

include_once("../database/config.php");
include_once("./userClass.php");

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
    

    $notloggedinUser = new user(0,false,null);  //creating a default unathorized user
    $req = json_decode( file_get_contents('php://input') );  //getting inputs from frontend
    $name = $req->name;  //extracting the inputs values from the req object
    $password = $req->password;
    
    //stopping auth if any value is null
    if($name==null || $password==null) {
      $notloggedinUser->set_errType("all");
      $notloggedinUser->set_userErr('values cannot be null');
      echo json_encode($notloggedinUser);
      return null;
    }

     
      //finding if there is any user with the name recieved in database
      $result = mysqli_query($conn, "SELECT * from user WHERE name='$name'");
      if($result) {
        header("Content-Type:JSON");
        while($res = mysqli_fetch_assoc($result)){
          $existingPassword = $res['password'];
          $existingid = $res['userid']; 
          $existingname = $res['name'];
          
          //checking if password recieved from the form match the one in the database
           
          if(!password_verify($password,$existingPassword)) {
            $notloggedinUser->set_errType("password");
            $notloggedinUser->set_userErr('password do not match');
            echo json_encode($notloggedinUser);
            return null;
        } else {
          // session_start();
          // $_SESSION["user_name"] = $name;
          // $_SESSION["isAuth"] = true;
          
          $loggedinUser = new user($existingid,true,$name);
          echo json_encode($loggedinUser);
          return;
        }
    
        }
      }
      
      
        // if the execution recheases this level then there was no user found 
        $notloggedinUser->set_errType("name");
        $notloggedinUser->set_userErr('no user with this name');
        echo json_encode($notloggedinUser);
        return  null;


 
   
    
    





?>