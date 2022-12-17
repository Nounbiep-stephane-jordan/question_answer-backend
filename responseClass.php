<?php 
class response {
    public $message;
    public $err;

    function __construct($message,$err){
        $this->message = $message;
        $this->err = $err;
    }

    function set_err($err){
        $this->err = $err;
    }

    function set_message($message){
        $this->message = $message;
    }
}
?>