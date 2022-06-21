<html>
    <head>
        <title>Dashboard</title>
        <!-- bootstrap css file -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <!-- bootstrap js file -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
        crossorigin="anonymous"></script>
        <script defer src="https://kit.fontawesome.com/e87d687bba.js"></script>
    </head>
    <body class="text-center">
        <!-- dashboard -->
        </br><h2><u>Registration Details</u></h2></br>
    </body>
    <?php  
            $host = 'localhost';  
            $user = 'root';  
            $pass = '';  
            $dbname = 'user_registration';  
            $conn = mysqli_connect($host, $user, $pass,$dbname);
            if(!$conn){
                die('Could not connect: '.mysqli_connect_error());  
            }  
            // database table
            $sql = 'SELECT * FROM user order by id';  
            $result=mysqli_query($conn, $sql);  
            echo '<table class="table table-bordered table-striped">';
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>NAME</th>";
                        echo "<th>EMAIL</th>";
                        echo "<th>ADDRESS</th>";
                        echo "<th>CLASS</th>";
                        echo "<th>PHONE NO.</th>";
                        echo "<th>ACTION</th>";
                    echo "</tr>";
                echo "</thead>";
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tbody>";
                            echo "<tr>";
                                echo "<td>".$row['id']."</td>";
                                echo "<td>".$row['name']."</td>";
                                echo "<td>".$row['email']."</td>";
                                echo "<td>".$row['address']."</td>";
                                echo "<td>".$row['class']."</td>";
                                echo"<td>".$row['phone_no']."</td>";
                                echo "<td>";
                                    // echo '<a href="read.php?read='.$row['id'].'"
                                    // <span class="fa fa-eye"></span></a>'." "; 
                                    echo '<a href="update.php?update='.$row['id'].'"
                                    <span class="fa fa-pencil"></span></a>'." ";  
                                    echo '<a href="delete.php?delete='.$row['id'].'"
                                    <span class="fa fa-trash"></span></a>'; 
                                echo "</td>";
                            echo "</tr>";
                        echo "</tbody>";
                    }
                }
                else{  
                    echo "0 results";  
                }  
            echo '</table>';
            mysqli_close($conn);  
?>  