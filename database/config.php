<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "question_answer_db";

$conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn) {
        echo "could not connect to database";
    }
    ?>
