<?php

if(isset($_GET['id']))
{
    include "dbconn.php";
    $del_id=$_GET['id'];
    $sql="DELETE FROM student WHERE id='$del_id'";
    if($conn->query($sql)){
        echo "delete record sucessfully";
    }else{
        echo "something,went wrong for delete".$conn->error;
    }
}else{
    echo "<h2 style='text-align:center;margin-top:20%;'>***you are not allow to access***</h2>";
}
?>