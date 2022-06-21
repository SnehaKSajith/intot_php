<html>
    <head>
    <title>Registration</title>
    <!-- internel css -->
        <style>
            body{
                background-color: #20c997;
                margin-left: 0px;
                margin-right: 0px;
                padding-left: 0px;
                padding: 0 30px;
            }
            .logform h1{
                color: #6c757d;
                align-items: center; 
            }
            .heading{
                padding: 40px 100px 0 100px;
            }
            .logform label{
                display: flex;
                flex-direction: column;
                color: #6c757d;
                margin-bottom: 5px;
            }
            .inputbox{
                width: 100%;
                border-radius: 25px;
            }
            input[type=submit]{
                background-color: #797879;
                border: none ;
                color: white;
                padding: 12px 45px;
                font-size: 14px;
                border-radius: 25px;
                margin: 2rem;
            }
        </style>
    </head>
    <!-- log body -->
    <body class="logform">
        <!-- reg form -->
        <form action="" method="post">   
            <div>
                <div><h1 class="heading">Admin Login Form!!!<h1></div>
                <div><label>Email : </label>
                     <input type="text" name="email" required class="inputbox"/></div></br>
                <div><label>Password : </label>
                    <input type="password" name="password" required class="inputbox"/></div></br>  
                <div class="button-box"><input type="submit" name="login" value="Login"/></div> 
            </div>  
        </form>   
    </body>
</html>
<!-- sql connection -->
<?php  
            if (isset($_POST['login'])){
            $host = 'localhost';  
            $user = 'root';  
            $pass = '';
            $dbname = 'user_registration';
            $conn = mysqli_connect($host, $user, $pass, $dbname);  
            if(! $conn ){  
                die('Could not connect: ' . mysqli_error());  
            }
                error_reporting(0);
                $email = $_POST['email'];  
                $password = $_POST['password'];  
                //to prevent from mysqli injection  
                $email = stripcslashes($email);  
                $password = stripcslashes($password);  
                $email = mysqli_real_escape_string($conn, $email);  
                $password = mysqli_real_escape_string($conn, $password);  
                $sql = "select * from admin where email = '$email' and password = '$password'";  
                $result = mysqli_query($conn, $sql);  
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                $count = mysqli_num_rows($result);  
                if($count == 1){  
                    // $alert = "<script>alert('Login successful!!');</script>";
                    // echo "$alert";  
                    // header("Location:dashboard.php");
                    // exit();
                    echo '<script>';
                    echo 'alert("Login successful!!");';
                    echo 'window.location.href = "admin_login.php";';
                    echo '</script>';
                }  
                else{  
                    $alert = "<script>alert('Enter valid email or password.');</script>";
                    echo "$alert"; 
                }     
            mysqli_close($conn);  
            }
        ?>