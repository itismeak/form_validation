<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST")
{
    include "dbconn.php";
    //Registered Data
    if(isset($_POST['register']))
    {
       //get input from user
       $fname=$_POST['fname'];
       $lname=$_POST['lname'];
       $dob=$_POST['dob'];
       $email=$_POST['email'];
       $psw=md5($_POST['psw']);
       $phone=$_POST['phone'];
       $gender=isset($_POST['gender']) ? $_POST['gender'] : '';
       $adress=$_POST['adress'];
       $city=$_POST['city'];
       $pincode=$_POST['pincode'];
       $state=$_POST['state'];
       $country=$_POST['country'];
       $habbies=isset($_POST['habbies']) ? implode(",",$_POST['habbies']) : '';
       $tc= $_FILES["file"]["name"];
       $course=$_POST['course'];
       $tc=time()."_".str_replace(' ','_',$tc);
       $target_dir="uploads/";
       $target_file=$target_dir.basename($tc);
       $success='';
       
       

        //file validation
        if(!empty($tc))
        {
            if ($_FILES["file"]["size"] < 2000000)
            {
               move_uploaded_file($_FILES["file"]["tmp_name"],$target_file);
            }else
            {
                die("Sorry, only allow below 2mb file.");
            } 
        }
        
        //create table
        // $sql="CREATE TABLE student(
        //     id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        //     fname VARCHAR(150),
        //     lname VARCHAR(150),
        //     dob DATE,
        //     email VARCHAR(150),
        //     phone VARCHAR(150),
        //     gender VARCHAR(10),
        //     adress VARCHAR(250),
        //     city VARCHAR(150),
        //     pincode INT(15),
        //     state VARCHAR(150),
        //     country VARCHAR(100),
        //     habbies VARCHAR(150),
        //     tc VARCHAR(150),
        //     course VARCHAR(150),
        //     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
        //     updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        // )";

        //insert value into table
        $sql="INSERT INTO student(fname,lname,dob,email,psw,phone,gender,adress,city,pincode,state,country,
        habbies,tc,course)VALUES('$fname','$lname','$dob','$email','$psw','$phone',
        '$gender','$adress','$city','$pincode','$state','$country','$habbies','$tc','$course')";

        if($conn->query($sql))
        {
            echo "<h2 style=text-align:center;margit-top:10%;><b>submit sucessfully</b></h2>";
            $conn->close();
            //header("Location: register.php");
            //exit; 
        }else
        {
            echo "<h2 style=text-align:center;margit-top:10%;>something wrong<h2>".$conn->error;
        }

    }

    //Updated data
    if(isset($_POST['update']))
    {
       $update_id=$_POST['hidden'];
       $fname=$_POST['fname'];
       $lname=$_POST['lname'];
       $dob=$_POST['dob'];
       $email=$_POST['email'];
       $phone=$_POST['phone'];
       $gender=isset($_POST['gender']) ? $_POST['gender'] : '';
       $adress=$_POST['adress'];
       $city=$_POST['city'];
       $pincode=$_POST['pincode'];
       $state=$_POST['state'];
       $country=$_POST['country'];
       $habbies=isset($_POST['habbies']) ? implode(",",$_POST['habbies']) : '';
       $course=$_POST['course'];
       $tc=$_FILES["tc"]["name"];
       //file validate
       if(empty($tc))
       {
            $sql="SELECT*FROM student WHERE id='$update_id'";
            $result=$conn->query($sql);
            $fetch_data=$result->fetch_assoc();
            $tc=$fetch_data['tc'];
            echo "k";   
       }else
       {
            $tc=time()."_".str_replace(' ','_',$tc);
            $file_des_folder="uploads/";
            $file_way=$file_des_folder.basename($tc);
            move_uploaded_file($_FILES['tc']['tmp_name'],$file_way);
            echo "f";
       }
    
        $sql="UPDATE student SET fname='$fname',lname='$lname',dob='$dob',email='$email',phone='$phone',gender='$gender',adress='$adress',city='$city',
        pincode='$pincode',state='$state',country='$country',habbies='$habbies',tc='$tc',course='$course' WHERE id='$update_id'";
    
        if($conn->query($sql))
        {
            echo "Updated Sucessfully";
        }else{
            echo "Something, Went Wrong for Update";
        }
    }

    //login 
    if(isset($_POST['login'])){
        
        $email=$_POST['email'];
        $psw=md5($_POST['psw']);

        // $sql="SELECT*FROM student WHERE email='$email'";
        // $result=$conn->query($sql);
        // $data=$result->fetch_assoc();
        // print_r($data);
        // echo in_array($email,$data)?"s":"no";
        $sql="SELECT*FROM student WHERE email='$email' and psw='$psw'";
        
        $result=$conn->query($sql);
        $data=$result->fetch_assoc();
        if(empty($data))
        {
            echo "<h2 style='text-align:center;margin-top:20%;'>invalid mail or password</h2>";
        }else{
        $_SESSION['email']=$data['email'];
        $_SESSION['id']=$data['id'];
        header("location:http://localhost/dashboard/examble/student/user_id/welcome.php");
        }

    }

    //logout
    if(isset($_POST['logout'])){
        session_start();
        session_destroy();
        header("location:http://localhost/dashboard/examble/student/user_id/log_in.php");
    }
}else
{
    echo "<h2 style='text-align:center;margin-top:20%;'>***you are not allow to access***</h2>";
}
?>