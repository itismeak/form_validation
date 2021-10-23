<?php
    include "dbconn.php";
    $email= $_POST['email'];
    $sql="SELECT*FROM student WHERE email='$email'";
    $result=$conn->query($sql);
    $num_rows=$result->num_rows;

    echo $num_rows;
?>