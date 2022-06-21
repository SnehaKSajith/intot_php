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
        <!-- sql connection -->
<?php
            $host = 'localhost';  
            $user = 'root';  
            $pass = '';  
            $dbname = 'user_registration';  
            $conn = mysqli_connect($host, $user, $pass,$dbname);  
            if(!$conn){  
            die('Could not connect: '.mysqli_connect_error());  
            }
            $id = $_GET['update'];
            $sql = "SELECT * from user where id=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $address = $row['address'];
            $class = $row['class'];
            $phone_no = $row['phone_no'];

            if (isset($_POST['register'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $class = $_POST['class'];
            $phone_no = $_POST['phone_no'];
            $password = $_POST['password'];
            $sql = "UPDATE user SET id=$id, name='$name', email='$email', address='$address', class='$class', 
            phone_no='$phone_no', password='$password' where id=$id";  
            if(mysqli_query($conn, $sql)){  
                echo '<script>';
                echo 'alert("Record updated successfully!!!");';
                echo 'window.location.href = "admin_login.php";';
                echo '</script>'; 
            }else{  
                echo "<script>alert('Could not update record:');</script>";
                mysqli_error($conn);  
            }  
            mysqli_close($conn);
        }
        ?>
        <!-- reg form -->
        <form action="" method="post">   
            <div>
                <div><h1 class="heading">Updation Form!!!<h1></div>
                <div><label>Id : </label>
                     <input type="text" name="id" required class="inputbox" value="<?php echo $row['id']?>"/></div></br>
                <div><label>Name : </label>
                     <input type="text" name="name" required class="inputbox" value="<?php echo $row['name'] ?>"/></div></br> 
                <div><label>Email : </label>
                     <input type="text" name="email" required class="inputbox" value="<?php echo $row['email'] ?>"/></div></br>
                <div><label>Address : </label>
                     <input type="text" name="address" required class="inputbox" value="<?php echo $row['address'] ?>"/></div></br>
                <div><label>Class : </label>
                     <!-- <input type="number" name="class" required class="inputbox"/></div></br> -->
                     <select type="number" name="class" required class="inputbox" value="<?php echo $row['class'] ?>" >
                        <option>10</option>
                        <option>9</option>
                        <option>8</option>
                     </select></div></br>
                <div><label>Phone no. : </label>
                     <input type="number" name="phone_no" required class="inputbox" value="<?php echo $row['phone_no'] ?>"/></div></br>
                <div class="button-box"><input type="submit" name="register" value="Update"/></div> 
            </div>  
        </form>   
    </body>
</html>