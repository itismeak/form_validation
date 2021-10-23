<?php
     session_start();
     if(isset($_SESSION['email']))
     {
         include "../dbconn.php";
        $email=$_SESSION['email'];
        $id=$_SESSION['id'];
    
        $sql="SELECT*FROM student WHERE id='$id'";
        $result=$conn->query($sql);
        $data=$result->fetch_assoc();

        if($data['role']=='admin')
        {
           header("location:http://localhost/dashboard/examble/student/view.php");
        }

         echo "welcome"." ".$data['fname']."<br><br>";
?>
<button><a href="http://localhost/dashboard/examble/student/edit.php?id=<?php echo $id; ?>">edit</a></button></br></br>
<form action="http://localhost/dashboard/examble/student/controll.php" method='POST'>
    <input type="submit" name="logout" value="logout">
</form>
<?php

     }else{
         echo "<h2 style='text-align:center;margin-top:20%;'>***you are not allow to access***</h2>";
     }
?>
