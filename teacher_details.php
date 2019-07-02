
<?php

require_once ("navigation.html");
require_once("config.php");

echo "Teacher Details:";
echo "<br>";
$steacherId = $_GET['teacherId'];

$connection =  mysqli_connect(DBHOST, DBUSER, DBPASSWORD , DBNAME);

if(mysqli_connect_error()) {
    die(mysqli_connect_error());
} else {
    echo "Connected Successfully!<br>";
}

$sql = "SELECT * FROM teacher WHERE teacherId = $teacherId";

$result = mysqli_query($connection, $sql);

while($row = mysqli_fetch_assoc($result)) {
    echo "Details of Teacher:<br> " . $row['FirstName'];
    echo "<br></a>";
}

?>