<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "test123";
$dbname = "form";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}
echo 'connection Successfull ';

if (isset($_POST['submit'])) {

    $uname = $_POST['uname'];
    $password = $_POST['password'];
    //$lname = $_POST['lname'];
    //$email = $_POST['email'];
    //$details = $_POST['details'];
    //$opt = $_POST['opt'];

    $query = "SELECT uname, password FROM login WHERE uname='$uname' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    if ($row) {
        if ($row['uname' == $uname]) {
            $COOKIE_name="uname";
            $COOKIE_value="$uname";
            setcookie($COOKIE_name,$COOKIE_value,  time() + (86400 * 30),"/");
            $_SESSION['uname'] = '$uname';
            header("location:/contactlist.php", 301);
            
        
    } 
    }
    else {
        
        header("location:/index.php", 301);
}

    }
    
?>
