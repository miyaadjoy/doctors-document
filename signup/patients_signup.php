<!-- patients signup form -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>patients signup</title>
    <link rel="icon" type="image/svg" sizes="32x32" href="../images/nav-icon.png">
    <link rel="stylesheet" href="../app/style/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>

    <!-- patients signup page container -->

    <section class="patients-signup container">


    <!-- patients signup page heading -->

        <div class="patients-signup__heading">
            <h1>register a new patient</h1>
        </div>

<?php

    if(isset($_REQUEST['submit']))
    {
        
        
        
                        
                    
        $name=$_REQUEST['patients_name'];
        $email=$_REQUEST['patients_email'];
        $phone=$_REQUEST['patients_phone'];
        $age=$_REQUEST['patients_age'];  
        $gender=$_REQUEST['patients_gender'];
        $address=$_REQUEST['patients_address'];
        $height=$_REQUEST['patients_height'];
        $weight=$_REQUEST['patients_weight'];    
        $pass=$_REQUEST['patients_password'];

        $db=mysqli_connect("localhost","root","","doctors_document");


        $sql1=mysqli_query($db,"SELECT COUNT(patients_email) FROM patientssignup WHERE patients_email='$email'");

        $sql2=mysqli_query($db,"SELECT COUNT(patients_phone) FROM patientssignup
         WHERE patients_phone='$phone'");

       

        
        $row1=mysqli_fetch_array($sql1);
        $row2=mysqli_fetch_array($sql2);

        
        
        if($row1['COUNT(patients_email)']>=1) 
        {
            ?>
            <p style="font-size: 1.375rem; color: #ff0000;text-align: center; padding: 1.25rem; margin-bottom: 2rem;">Email is already in use</p>

            <?php
            
        }
        
        elseif($row2['COUNT(patients_phone)']>=1)
        {
            ?>
            <p style="font-size: 1.375rem; color: #ff0000;text-align: center; padding: 1.25rem; margin-bottom: 2rem;" >Phone number is already taken</p>

            <?php
                
        }
        else
        {
            session_start();
            
            $sql="INSERT INTO patientssignup VALUES('$name', '$email','$phone','$age','$gender','$address','$height', '$weight', '$pass')";
            
            

            mysqli_query($db,$sql); 

            
                
            header("Location: ../dashboard/doctors_dashboard.php");
            exit();

        

            
                                        
        }


        mysqli_close($db);


        
        
        
    }

            
        
    
?>


    <!-- patients signup page form -->


        <div class="patients-signup__form">
            <form action="" method="post">


                <label for="patients_name">patient's name</label><br>

                <input type="text" name="patients_name" id="patients_name"><br>

                
                <label for="patients_email">patient's email</label><br>

                <input type="email" name="patients_email" id="patients_email"><br>


                <label for="patients_phone">patient's phone</label><br>

                <input type="tel" name="patients_phone" id="patients_phone">


                <label for="patients_age">patien's age</label>

                <input type="text" name="patients_age" id="patients_age"><br><br>
                


                gender <br><br>
                
                <input type="radio" name="patients_gender" id="male" value="male">

                <label for="patients_gender">male</label><br>

                
                <input type="radio" name="patients_gender" id="female" value="female">

                <label for="patients_gender">female</label><br>


                <input type="radio" name="patients_gender" id="others" value="others">

                <label for="patients_gender">others</label><br><br><br>


                <label for="patients_address">patient's address</label><br>

                <textarea name="patients_address" id="pateints_address" rows="3"></textarea><br>


                <label for="patients_height">patient's height(in cm)</label><br>

                <input type="text" name="patients_height" id="patients_height"><br>


                <label for="patients_weight">patient's weight(in kg)</label><br>

                <input type="text" name="patients_weight" id="patients_weight">

                
                <label for="patients_password">password</label><br>

                <input type="password" name="patients_password" id="patients_password">


                <input type="submit" value="register" name="submit">
                



            </form>
        </div>
    </section>


    
</body>
</html>