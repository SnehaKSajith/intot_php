        <!-- delete -->
        <?php  
            $host = 'localhost';  
            $user = 'root';  
            $pass = '';  
            $dbname = 'user_registration';  
            $conn = mysqli_connect($host, $user, $pass,$dbname);
            if(!$conn){
                die('Could not connect: '.mysqli_connect_error());  
            }  
            if (isset($_GET['delete'])){
                $id=$_GET['delete'];
                $sql = "delete from user where id=$id"; 
                if(mysqli_query($conn, $sql)){   
                    echo '<script>';
                    echo 'alert("Record deleted successfully!!!");';
                    echo 'window.location.href = "admin_login.php";';
                    echo '</script>';
                }else{  
                    echo "<script>alert('Could not delete record:');</script>";
                    mysqli_error($conn);  
                }  
            }
        ?>  
