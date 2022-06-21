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
            .regform h1{
                color: #6c757d;
                align-items: center; 
            }
            .heading{
                padding: 40px 100px 0 100px;
            }
            .regform label{
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
    <!-- reg body -->
    <body class="regform">
        <!-- reg form -->
        <form action="" method="post">   
            <div>
                <div><h1 class="heading">Registration Form!!!<h1></div>
                <div><label>Id : </label>
                     <input type="text" name="id" required class="inputbox"/></div></br>
                <div><label>Name : </label>
                     <input type="text" name="name" required class="inputbox"/></div></br> 
                <div><label>Email : </label>
                     <input type="text" name="email" required class="inputbox"/></div></br>
                <div><label>Address : </label>
                     <input type="text" name="address" required class="inputbox"/></div></br>
                <div><label>Class : </label>
                     <!-- <input type="number" name="class" required class="inputbox"/></div></br> -->
                     <select type="number" name="class" required class="inputbox">
                        <option>10</option>
                        <option>9</option>
                        <option>8</option>
                     </select></div></br>
                <div><label>Phone no. : </label>
                     <input type="number" name="phone_no" required class="inputbox"/></div></br>
                <div><label>Password : </label>
                    <input type="password" name="password" required class="inputbox"/></div></br>  
                <div class="button-box"><input type="submit" name="register" value="Register"/></div> 
            </div>  
        </form>   
    </body>
</html>
<!-- sql connection -->
<?php
        if (isset($_POST['register'])){
            $host = 'localhost';  
            $user = 'root';  
            $pass = '';  
            $dbname = 'user_registration';  
            $conn = mysqli_connect($host, $user, $pass,$dbname);  
            if(!$conn){  
            die('Could not connect: '.mysqli_connect_error());  
            }    
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            $email = $_REQUEST['email'];
            $address = $_REQUEST['address'];
            $class = $_REQUEST['class'];
            $phone_no = $_REQUEST['phone_no'];
            $password = $_REQUEST['password'];
            $sql = "INSERT INTO user VALUES ('$id', '$name','$email','$address','$class','$phone_no','$password')";  
            if(mysqli_query($conn, $sql)){ 
                echo '<script>';
                    echo 'alert("Record inserted successfully!!");';
                    echo 'window.location.href = "index.html";';
                    echo '</script>'; 
            }else{  
                $alert = "<script>alert('Could not insert record: ''. mysqli_error($conn));</script>";
                echo "$alert";  
            }  
            mysqli_close($conn);
        }
        ?>