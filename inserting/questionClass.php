<?php 
class question{
    public $quest;
    public $author;
    public $answer;
    public $mesage;

    function __construct($quest,$author,$answer){
      $this->quest = $quest;
      $this->author = $author;
      $this->answer = $answer;
    }

    function set_Err($mesage){
        $this->$mesage = $mesage;
    }
}
?>