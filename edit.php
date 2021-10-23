<?php

    if(isset($_GET['id'])) 
    { 
        $edit_id=$_GET['id'];
        include "dbconn.php";

        //student db
          $sql="SELECT*FROM student WHERE id='$edit_id'";
                    $result=$conn->query($sql); 
                    $row=$result->fetch_assoc();
                    $habbies=explode(",",$row["habbies"]);
                    $user_selected_country=$row['country'];
?>
<html>
    <head>
        <title>
            Edit Page
        </title>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
            $(".input").focus(function(){
                $(this).css("background-color","#f28f38");
            });
            $(".input").blur(function(){
                $(this).css("background-color","#eb60ca");
            });
        });
        </script>
        <style>
            .input{
               display:block;  
            }
            .head{
                background-color:#e8be74;
                color:#fffefc;
                text-align:center;
                border: 3px solid #0d0d0c; 
                padding: 35px;
            }
            .order1{
                margin-left:40%;
            }
            .order{
                border: 2px solid #0d0d0c;
                background-color:blue;
            }
            label{
                color:black;
            }
            .specific{
                color:black;
            }
            .submit{
                margin-left:40%;
            }
            .reset{
                margin-left:4%;
            }
            .submit {
            background-color: #37e02b;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            }
            
        </style>

    </head>
    <body>
        <form method="post" action="controll.php" enctype="multipart/form-data">
            <h1 class="head"><i><b>student registeration</b></i></h1>
            <div class="order">
            </br>
            <div class="order1">
            <label>FIRST NAME</lable>
            <input type="text" name="fname" class="input"  maxlength="30" value="<?php echo $row['fname']; ?>">
            </br></br>
            <label>LAST NAME</label>
            <input type="text" name="lname" class="input" maxlength="30" value="<?php echo $row['lname']; ?>">
            </br></br>
            <label>DOB</label>
            <input type="date" name="dob" class="input" value="<?php echo $row['dob']; ?>">
            </br></br>
            <label>GENDER</label>
            </br>
            <label class="specific">Male</label>
            <input type="radio" name="gender" value="male" <?php if($row['gender']=="male"){ echo "checked"; }?>>
            <label class="specific">Female</label>
            <input type="radio" name="gender" value="female" <?php if($row['gender']=="female"){ echo "checked"; }?>>
            <label class="specific">Others</label>
            <input type="radio" name="gender" value="others" <?php if($row['gender']=="others"){ echo "checked"; }?>>
            </br></br>
            <label>EMAIL</label>
            <input type="email" name="email" class="input" value="<?php echo $row['email']; ?>">
            </br></br>
            <label>PHONE NO</label>
            <input type="tel" name="phone" pattern="[789][0-9]{9}" class="input" value="<?php echo $row['phone']; ?>">
            </br></br>
             <label>COUNTRY</label>
            <select name="country" class="input">
                
            <?php 
                  $sql_country="SELECT*FROM countries";
                    $result_country=$conn->query($sql_country);
                    $country=$result_country->fetch_all();
             
               foreach ($country as $key => $countries) { ?>
                <option value="<?php echo $countries['0']; ?>" <?php echo $countries['0'] ==  $user_selected_country ? 'selected' : ''; ?>><?php echo $countries['2']; ?></option>
            <?php } ?>
            </select>
            </br></br>
           <label>STATE</label>
            <select name="state" class="input" >
                <option value="">--select your state--</option>
                <option value="Andhra Pradesh" <?php if($row["state"]=="Andhra Pradesh"){ echo "selected"; } ?>>Andhra Pradesh</option>
                <option value="Arunachal Pradesh" <?php if($row["state"]=="Arunachal Pradesh"){ echo "selected"; } ?>>Arunachal Pradesh</option>
                <option value="Assam" <?php if($row["state"]=="Assam"){ echo "selected"; } ?>>Assam</option>
                <option value="Bihar" <?php if($row["state"]=="Bihar"){ echo "selected"; } ?>>Bihar</option>
                <option value="Chhattisgarh" <?php if($row["state"]=="Chhattisgarh"){ echo "selected"; } ?>>Chhattisgarh</option>
                <option value="Goa" <?php if($row["state"]=="Goa"){ echo "selected"; } ?>>Goa </option>
                <option value="Gujarat" <?php if($row["state"]=="Gujarat"){ echo "selected"; } ?>>Gujarat</option>
                <option value="Haryana" <?php if($row["state"]=="Haryana"){ echo "selected"; } ?>>Haryana </option>
                <option value="Himachal Pradesh" <?php if($row["state"]=="Himachal Pradesh"){ echo "selected"; } ?>>Himachal Pradesh </option>
                <option value="Jharkhand" <?php if($row["state"]=="Jharkhand"){ echo "selected"; } ?>>Jharkhand</option>
                <option value="Karnataka"> <?php if($row["state"]=="Karnataka"){ echo "selected"; } ?>Karnataka</option>
                <option value="Kerala" <?php if($row["state"]=="Kerala"){ echo "selected"; } ?>>Kerala</option>
                <option value="Madhya Pradesh" <?php if($row["state"]=="Madhya Pradesh"){ echo "selected"; } ?>>Madhya Pradesh</option>
                <option value="Maharashtra" <?php if($row["state"]=="Maharashtra"){ echo "selected"; } ?>>Maharashtra</option>
                <option value="Manipur" <?php if($row["state"]=="Manipur"){ echo "selected"; } ?>>Manipur</option>
                <option value="Meghalaya" <?php if($row["state"]=="Meghalaya"){ echo "selected"; } ?>>Meghalaya</option>
                <option value="Mizoram " <?php if($row["state"]=="Mizoram"){ echo "selected"; } ?>>Mizoram </option>
                <option value="Nagaland" <?php if($row["state"]=="Nagaland"){ echo "selected"; } ?>>Nagaland</option>
                <option value="Odisha" <?php if($row["state"]=="Odisha"){ echo "selected"; } ?>>Odisha</option>
                <option value="Punjab " <?php if($row["state"]=="Punjab"){ echo "selected"; } ?>>Punjab </option>
                <option value="Rajasthan" <?php if($row["state"]=="Rajasthan"){ echo "selected"; } ?>>Rajasthan</option>
                <option value="Sikkim" <?php if($row["state"]=="Sikkim"){ echo "selected"; } ?>>Sikkim</option>
                <option value="Tamil Nadu" <?php if($row["state"]=="Tamil Nadu"){ echo "selected"; } ?>>Tamil Nadu</option>
                <option value="Telangana" <?php if($row["state"]=="Telangana"){ echo "selected"; } ?>>Telangana</option>
                <option value="Tripura" <?php if($row["state"]=="Tripura"){ echo "selected"; } ?>>Tripura</option>
                <option value="Uttar Pradesh" <?php if($row["state"]=="Uttar Pradesh"){ echo "selected"; } ?>>Uttar Pradesh</option>
                <option value="Uttarakhand" <?php if($row["state"]=="Uttarakhand"){ echo "selected"; } ?>>Uttarakhand</option>
                <option value="West Bengal" <?php if($row["state"]=="West Bengal"){ echo "selected"; } ?>>West Bengal</option>
            </select>
            </br></br>
             <label>CITY</label>
            <input type="text" name="city" class="input" maxlength="30" value="<?php echo $row['city']; ?>">
            </br></br>
            <label>ADRESS</label>
            <textarea name="adress" rows="5" cols="50"  class="input"><?php echo $row['adress']; ?></textarea >
            </br></br>
            <label>PINCODE</label>
            <input type="text" name="pincode" class="input" pattern="[0-9]{6}" maxlength="6" value="<?php echo $row['pincode']; ?>">
            </br></br>
            </select>
            </br></br>
            <label>HABBIES</label>
            </br>
            <label class="specific">Dancing</label>
            <input type="checkbox" name="habbies[]" value="dancing" <?php if(in_array("dancing",$habbies)) { echo "checked"; } ?>>
            <label class="specific">Drawing</label>
            <input type="checkbox" name="habbies[]" value="drawing" <?php if(in_array("drawing",$habbies)) { echo "checked"; } ?>>
            <label class="specific">Singing</label>
            <input type="checkbox" name="habbies[]" value="singing" <?php if(in_array("singing",$habbies)) { echo "checked"; } ?>>
            <label class="specific">Sports</label>
            <input type="checkbox" name="habbies[]" value="sports" <?php if(in_array("sports",$habbies)) { echo "checked"; } ?>>
            <label class="specific">Others</label>
            <input type="checkbox" name="habbies[]" value="others" <?php if(in_array("others",$habbies)) { echo "checked"; } ?>>
            </br></br>
            <label>TC</label>
            <input type="file" name=tc >
            <?php echo $row['tc']; ?>
            </br></br>
            <label>COURSE</label>
            <select name="course" class="input">
               <option value="">--select course--</option>
               <option value="Engineering" <?php if($row["course"]=="Engineering"){ echo "selected"; } ?>>Engineering</option>
               <option value="Arts" <?php if($row["course"]=="Arts"){ echo "selected"; } ?>>Arts</option>
               <option value="Science" <?php if($row["course"]=="Science"){ echo "selected"; } ?>>Science</S></option>
               <option value="Medicine" <?php if($row["course"]=="Medicine"){ echo "selected"; } ?>>Medicine</option> 
            </select>
            </br>
            </div>
            </div>
            </br>
            <input type="hidden" value="<?php echo $edit_id; ?>" name="hidden">
            <input type="submit" class="submit" value="update" name="update">
        </form> 
    </body>
</html>

<?php
        
        
    }else
    {
        echo "<h2 style='text-align:center;margin-top:20%;'>***you are not allow to access***</h2>";
    }
?>