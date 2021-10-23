<?php
    session_start();
    if(isset($_SESSION['email'])){
        include "dbconn.php";

        $sql="SELECT*FROM student";

        $result=$conn->query($sql);

        if($result->num_rows>0)
        {
        ?>
        <html>
            <head>
                <title>
                    view
                </title> 
                <!---table style jquery--->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script>
                $(document).ready(function(){
                $("tr:even").css("background-color", "orange");
                $("tr:odd").css("background-color", "transparent");
                });
                </script>
                <script>
                    function confirm(){
                        confirm(Are You Delete Data);
                    }
                </script>
                <style>
                    table {
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                    }
                    th,td {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 10px;
                    }
                    tr:nth-child(even) {
                    background-color: #dddddd;
                    }
                    .edit {
                    padding: 15px 25px;
                    font-size: 24px;
                    text-align: center;
                    cursor: pointer;
                    outline: none;
                    color: #fff;
                    background-color: #04AA6D;
                    border: none;
                    border-radius: 15px;
                    box-shadow: 0 9px #999;
                    text-decoration: none;
                    }

                    .edit:hover {background-color: #3e8e41}

                    .edit:active {
                    background-color: #3e8e41;
                    box-shadow: 0 5px #666;
                    transform: translateY(4px);
                    text-decoration: none;
                    }
                    .delete {
                    position: relative;
                    background-color: #04AA6D;
                    border: none;
                    font-size: 28px;
                    color: #FFFFFF;
                    padding: 10px;
                    width: 100px;
                    text-align: center;
                    -webkit-transition-duration: 0.4s; /* Safari */
                    transition-duration: 0.4s;
                    text-decoration: none;
                    overflow: hidden;
                    cursor: pointer;
                    text-decoration: none;
                    }

                    .delete:after {
                    content: "";
                    background: #90EE90;
                    display: block;
                    position: absolute;
                    padding-top: 300%;
                    padding-left: 350%;
                    margin-left: -20px!important;
                    margin-top: -120%;
                    opacity: 0;
                    transition: all 0.8s
                    }

                    .delete:active:after {
                    padding: 0;
                    margin: 0;
                    opacity: 1;
                    transition: 0s
                    }
                    .logout{
                        float:right;
                        padding:10px;
                        color:red;
                        background-color:transparent;
                    }
                </style>
            </head>
            <body>
                <form action="http://localhost/dashboard/examble/student/controll.php" method="post">
                    <input type="submit" class="logout" value="logout" name="logout">
                </form>
                <h2 style="text-align:center;"><b>Registered Student Details</b><h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>DOB</th>
                        <th>MAIL</th>
                        <th>PHONE.NO</th>
                        <th>GENDER</th>
                        <th>ADRESS</th>
                        <th>CITY</th>
                        <th>PINCODE</th>
                        <th>STATE</th>
                        <th>COUNTRY</th>
                        <th>HABBIES</th>
                        <th>TC</th>
                        <th>COURSE</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
        <?php 
            while($row=$result->fetch_assoc()){
        ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['lname']; ?></td>
                        <td><?php echo $row['dob']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['adress']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['pincode']; ?></td>
                        <td><?php echo $row['state']; ?></td>
                        <td><?php echo $row['country']; ?></td>
                        <td><?php echo $row['habbies']; ?></td>
                        <td><a href="http://localhost/dashboard/examble/student/uploads/<?php echo $row['tc'];?>" download><?php echo $row['tc'];?></a></td>
                        <td><?php echo $row['course']; ?></td>
                        <td><button type="button" class="edit"><a href="edit.php?id=<?php echo $row['id']; ?> ">edit</a></button></td>
                        <td><button type="button" class="delete" onclick="confirm()"><a href="delete.php?id=<?php echo $row['id'] ?>">delete</a></button></td>
                    </tr>

        <?php
            }
        ?>
                </table>
            </body>
        </html>
        <?php
      }
    }else{
        echo "<h2 style='text-align:center;margin-top:20%;'>***you are not allow to access***</h2>";
    }
?>