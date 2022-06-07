
<!-- doctors signup page -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg" sizes="32x32" href="../images/nav-icon.png">
    <link rel="stylesheet" href="../app/style/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>doctors signup</title>
</head>
<body>


    <!--doctors signup page container -->

    <section class="signup container">

        <!-- signup page heading -->

        <div class="signup__heading">

            <h1>signup as a doctor</h1>

        </div>


    <!-- php code starts here -->

<?php
    if(isset($_REQUEST['submit']))
    {
        
        
                        
                    
        $name=$_REQUEST['doctors_name'];
        $email=$_REQUEST['doctors_email'];
        $phone=$_REQUEST['doctors_phone'];                     
        $pass=$_REQUEST['doctors_password'];

        $db=mysqli_connect("localhost","root","","doctors_document");


        
        $sql1=mysqli_query($db,"SELECT COUNT(doctors_email) FROM signup WHERE doctors_email='$email'");

        $sql2=mysqli_query($db,"SELECT COUNT(doctors_phone) FROM signup WHERE doctors_phone='$phone'");

       

        
        $row1=mysqli_fetch_array($sql1);
        $row2=mysqli_fetch_array($sql2);

        
        
        if($row1['COUNT(doctors_email)']>=1) 
        {
            ?>
            <p style="font-size: 1.375rem; color: #ff0000;text-align: center; padding: 1.25rem; margin-bottom: 2rem;">Email is already in use</p>

            <?php
            
        }
        
        elseif($row2['COUNT(doctors_phone)']>=1)
        {
            ?>
            <p style="font-size: 1.375rem; color: #ff0000;text-align: center; padding: 1.25rem; margin-bottom: 2rem;" >Phone number is already taken</p>

            <?php
                
        }
        else
        {

            session_start();

            $sql="INSERT INTO signup VALUES('$name', '$email','$phone','$pass')";
            mysqli_query($db,$sql); 
                
            header("Location: ../signin/doctors-signin.php");
            exit();
                                        
        }

        mysqli_close($db);
        
    }

            
        
    
?>



        <!-- signup page form -->

        <div class="signup__form">
            
            <form action="doctors-signup.php" method="post">

                <label for="doctors_name">Full Name</label><br>
                <input type="text" name="doctors_name" id="doctors-name" placeholder="Enter full name" required><br>

                <label for="doctors_email">Email</label><br>
                <input type="email" name="doctors_email" id="doctors-email" placeholder="Enter Your Email" required><br>

                <label for="doctors_phone">Phone</label><br>
                <input type="tel" name="doctors_phone" id="doctors-phone" placeholder="Enter Phone Number" required><br>
                <label for="doctors_password">password</label><br>
                <input type="password" name="doctors_password" id="doctors-password" placeholder="Enter Password" required><br>

                <input type="submit" value="sign up" name="submit">

            </form>
        </div>
</section>
    
</body>
</html>




