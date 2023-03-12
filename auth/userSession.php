<?php 
//creating a class user to store some information that will be used in frontend
class userSession {
    public $name;
    public $id;
    public $isAuthorized;
    
  
    function __construct($name,$isAuthorized) {
      $this->isAuthorized = $isAuthorized;
      $this->name = $name;
    }


    
  
  }
?>
