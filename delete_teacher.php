<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
<?php
    
require_once("utils/config.php");
$steacherId = $_GET['id'];

$connection =  mysqli_connect(DBHOST, DBUSER, DBPASSWORD , DBNAME);

if(mysqli_connect_error()) {
    die(mysqli_connect_error());
} 
$query1 = "SELECT * from teacher where teacherId= $steacherId";
$record = mysqli_query($connection, $query1);
$sql = "DELETE FROM teacher WHERE teacherId = $steacherId";



$result = mysqli_query($connection, $sql);
   
    ?>

</head>
<body>

<div class="container col-md-5">

<?php 
    if($result) echo '<p>';?> 
    <?php 
    
while($row = mysqli_fetch_assoc($record)) {
    echo "FirstName: " . $row['FirstName'] . ", under Email: " . $row['Email']." has been deleted";
    echo "<br>";
}
    ?>

    <?= '</p>' ?> 
    
</div>
       
</div>
</body>
</html>