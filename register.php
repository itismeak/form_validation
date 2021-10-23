<?php
    include "dbconn.php";
    $sql="SELECT*FROM countries";
     $result=$conn->query($sql);
     $country=$result->fetch_all();
?>
<html>
    <head>
        <title>
            student registeration
        </title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="http://localhost/dashboard/examble/student/assets/main.js"></script>
        <style>
            .input{
               display:block;  
            }
            .head{
                background-color:#e8be74;
                color:red;
                text-align:center;
                border: 3px solid #0d0d0c; 
                padding: 35px;
            }
            .order1{
                margin-left:40%;
            }
            .order{
                border: 2px solid black;
                background-color:#c6c8cc;
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
            .reset{
            background-color: #eb432d;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            float:right;
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
        <form method="post" action="controll.php" id="form_register" class="form" enctype="multipart/form-data">
            <h1 class="head"><i><b>student registeration</b></i></h1>
            <div class="order">
            </br>
            <div class="order1">
            <label>FIRST NAME</lable>
            <input type="text" name="fname" class="input" id="fname"  maxlength="30">
            <span class="fname_error"></span>
            </br></br>
            <label>LAST NAME</label>
            <input type="text" name="lname" class="input" id="lname" maxlength="30" >
            <span class="lname_error"></span>
            </br></br>
            <label>DOB</label>
            <input type="date" id="dob" name="dob" class="input">
             <span class="dob_error"></span>
            </br></br>
             <label>GENDER</label>
            </br>
            <div class="gender">
            <label class="specific">Male</label>
            <input type="radio" name="gender" value="male" >
            <label class="specific">Female</label>
            <input type="radio" name="gender" value="female" >
            <label class="specific">Others</label>
            <input type="radio" name="gender" value="others"><br>
            <span class="gender_error"></span>
            </div>
            </br></br>
            <label>EMAIL</label>
            <input type="email" name="email" class="input">
            <span class="email_error"></span>
            </br></br>
            <label>PASSWORD</label>
            <input type="password" name="psw" class="input">
            <span class="psw_error"></span>
            </br>
            <div id="re_enter_psw" style="display:none;">
            <label>RE-ENTER PASSWORD</label>
            <input type="password" name="new_psw"  class="input">
            <span class="new_psw_error"></span><br>
            </div>
            </br></br>
            <label>PHONE NO</label>
            <input type="tel" name="phone"  class="input" >
            <span class="phone_error"></span>
            </br></br>
            
            <label>COUNTRY</label>
            <select id="country" name="country" class="input">
            <option value="">--select country--</option>
            <?php foreach ($country as $key => $countryname) {?>
                <option value="<?php echo $countryname['0']; ?>"><?php echo $countryname['2']; ?></option>
            <?php } ?>
            </select>
            <span class="country_error"></span>
            </br></br>
            <label>STATE</label >
            <select name="state" id="state" class="input" >
                <option value="">--select your state--</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Goa ">Goa </option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana ">Haryana </option>
                <option value="Himachal Pradesh ">Himachal Pradesh </option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram ">Mizoram </option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Punjab ">Punjab </option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
            </select>
            <span class='state_error'></span>
            </br></br>
            <label>CITY</label>
            <input type="text" name="city" class="input" maxlength="30" >
            <span class="city_error"></span>
            </br></br>
            <label>ADRESS</label>
            <textarea name="adress" rows="5" cols="50"  class="input"></textarea >
            <span class="adress_error"></span>
            </br></br>
            <label>PINCODE</label>
            <input type="text" name="pincode" class="input">
            <span class="pincode_error"></span>
            </br></br>
            <label>HABBIES</label>
            </br>
            <div class="habbies">
            <label class="specific">Dancing</label>
            <input type="checkbox" name="habbies[]" value="dancing">
            <label class="specific">Drawing</label>
            <input type="checkbox" name="habbies[]" value="drawing">
            <label class="specific">Singing</label>
            <input type="checkbox" name="habbies[]" value="singing">
            <label class="specific">Sports</label>
            <input type="checkbox" name="habbies[]" value="sports">
            <label class="specific">Others</label>
            <input type="checkbox" name="habbies[]" value="others"><br>
            <span class="habbies_error"></span>
            </div>
            </br></br>
            <label>TC</label>
            <input type="file" name="file"><br>
            <span class="tc_error"></span>
            </br></br>
            <label>COURSE</label>
            <select name="course" class="course" class="input">
               <option value="">--select course--</option>
               <option value="Engineering">Engineering</option>
               <option value="Arts">Arts</option>
               <option value="Science">Science</S></option>
               <option value="Medicine">Medicine</option> 
            </select>
            <span class="course_error"></span>
            </br></br>
            </div>
            </div>
            </br>
            <input type="submit"   name="register" value="Submit" class="submit"> 
            <input type="reset" value="Reset" class="reset">
        </form> 

        <script>
            // $(document).ready(function() {
            // $("#form_register").validate({
            //     // Specify validation rules
            //     rules: {
            //     fname: "required",
            //     lname: "required",
            //     gender: "required",
            //     email: {
            //         required: true,
            //         email: true
            //     },
            //     password: {
            //         required: true,
            //         minlength: 5
            //     }
            //     },
            //     // Specify validation error messages
            //     messages: {
            //     fname: "Please enter your firstname",
            //     lname: "Please enter your lastname",
            //     gender: "required gender",
            //     password: {
            //         required: "Please provide a password",
            //         minlength: "Your password must be at least 5 characters long"
            //     },
            //     email: "Please enter a valid email address"
            //     },
            //     // Make sure the form is submitted to the destination defined
            //     // in the "action" attribute of the form when valid
            //     submitHandler: function(form) {
            //     form.submit();
            //     }
            // });
            // });


            



            // $(document).ready(function(){
            //     $("#form_register").click(function(){
            //         var fname = $("input[name='fname']").val();
            //         if( fname == ''){
            //             $('.fname_error').text('Name is requires');
            //              $('.fname_error').css('color', 'red');
            //             return false;
            //         }
            //     });
            // });
        </script>
    </body>
</html>