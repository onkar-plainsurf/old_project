<?php


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

$sql = "delete FROM contact WHERE id = '$_GET[id]'";

if(mysqli_query($conn, $sql)){
    header("refresh:1;url=contactlist.php");
}

else{
    echo"not deleted";
}

?>

