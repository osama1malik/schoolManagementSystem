<?php

require_once("utils/config.php");

$classID = $_POST['c'];
$subjectID = $_POST['s'];
$teacherID = $_POST['t'];

$conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);

if (mysqli_connect_error()) {
    die(mysqli_connect_error);
}

$sql = "INSERT INTO subjectperclass (subjectId, classId, teacherId) VALUES ('$subjectID', '$classID', '$teacherID')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);