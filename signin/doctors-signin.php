
<!-- doctors signin page -->

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
    
    <title>doctors sign in</title>

</head>




<body>
    
    <!-- page container -->

    <section class="signin container">


        <!-- signin page heading -->


        <div class="signin__heading">

            <h1>sign in as a doctor</h1>

        </div>




        <!-- php code here -->


        <?php
        if(isset($_REQUEST['submit']))
        {
            $email=$_REQUEST['doctors_email'];
            $pass=$_REQUEST['doctors_password'];

            //connnect to database
            $db=mysqli_connect("localhost","root","","doctors_document");

            $query=mysqli_query($db,"SELECT doctors_email, doctors_password FROM signup WHERE doctors_email='$email' AND doctors_password='$pass' ");
            $row=mysqli_fetch_array($query);
            if($row==null)
            {
                ?>
                <p style="font-size: 1.375rem; color: #ff0000;text-align: center; padding: 1.25rem; margin-bottom: 2rem;" >Invalid Password or Email</p>
                
                
            <?php 
            }


            else
            {
                $email_input=$row['doctors_email'];
                $pass_input=$row['doctors_password'];
                
                if($email_input==$email && $pass_input==$pass)
                {
                    session_start();
                    
                    header("Location: ../dashboard/doctors_dashboard.php");
                    exit();
                }
             
            }
        }
    ?>




        <!-- sign in page form -->


        <div class="signin__form">


            <form action="doctors-signin.php" method="post">

                <label for="doctors_email">Email</label><br>

                <input type="email" name="doctors_email" id="doctors-email" placeholder="Enter your Email" required>
                
                <br>


                <label for="doctors_password">Password</label>
                <br>

                <input type="password" name="doctors_password" id="doctors-password" placeholder="Enter your password" required>
                <br>

                <input type="submit" value="sign in" name="submit">
                

            </form>



            <!-- create new account link -->
            don't have an account?

            <a href="../signup/doctors-signup.php" class="signin__link">create an account</a>

        </div>
        
    </section>
    
</body>
</html>


























