<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Teacher</title>
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

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['FirstName'])) {
            $FirstName = $_POST['FirstName'];
            $LastName = $_POST['LastName'];
            $DateOfBirth = $_POST['DateOfBirth'];
            $age = $_POST['age'];
            $cnic = $_POST['cnic'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $photo = $_POST['photo'];
            $presentAddress = $_POST['presentAddress'];
            $permanentAddress =  $_POST['permanentAddress'];
            $city = $_POST['city'];
            $province = $_POST['province'];
            $country = $_POST['country'];
            $regDate = $_POST['regDate'];
            $jobType = $_POST['jobType'];

            $connection = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
            if (mysqli_connect_error()) {
                die(mysqli_connect_error());
            }

            $sql = "INSERT INTO teacher (FirstName, LastName, DateOfBirth, age, cnic,phone ,email ,photo,presentAddress,permanentAddress,city,province,country,regDate,jobType) VALUES ('$FirstName', '$LastName', '$DateOfBirth', '$age', '$cnic','$phone' ,'$email' ,'$photo','$presentAddress','$permanentAddress','$city','$province','$country','$regDate','$jobType')";
            mysqli_query($connection, $sql);
            if(mysqli_error($connection)) {
                die("Something went wrong! Check your Database");
            }
            mysqli_close($connection);
        }
    }
    ?>

</head>
<body>

<div class="container col-md-5">
    <p>
        New Teacher Record has been Added into the database!
    </p>
</div>
</body>
</html>