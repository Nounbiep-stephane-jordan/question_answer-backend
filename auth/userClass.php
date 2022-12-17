<?php 
//creating a class user to store some information that will be used in frontend
class user {
    public $name;
    public $id;
    public $isAuthorized;
    public $userErr;
  
    function __construct($id,$isAuthorized,$name) {
      $this->id = $id;
      $this->isAuthorized = $isAuthorized;
      $this->name = $name;
    }
  
    function set_userErr($err) {
      $this->userErr = $err;
    }

    
  
  }
?>
