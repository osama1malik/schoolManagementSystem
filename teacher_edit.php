<?php
include('utils/session.php');
if (!isset($_SESSION['login_user'])) {
    header("location: index.php"); // Redirecting To Home Page 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- MDBootstrap CDN Start -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/css/mdb.min.css" rel="stylesheet">
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/js/mdb.min.js"></script>
    <!-- MDBootstrap CDN END -->
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <?php
    require_once("utils/config.php");
    $id = $FirstName = $LastName = $DateOfBirth = $age = $cnic = $phone = $email = $photo = $presentAddress = $permanentAddress = $city = $province = $country = $regDate = $jobType = "";

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!isset($_GET['id'])) {
            echo "id is not set";
            return;
        } else if (empty($_GET['id'])) {
            echo "id is empty";
            return;
        } else {
            $teacherId = $_GET['id'];
            $connection = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
            if (mysqli_connect_error()) {
                die(mysqli_connect_error());
            }

            $sql = "SELECT * FROM teacher WHERE teacherId = $teacherId";

            $result = mysqli_query($connection, $sql);
            $row = mysqli_fetch_assoc($result);


            if (mysqli_error($connection)) {
                die("Something went wrong! Check your Database");
            }
            mysqli_close($connection);
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['FirstName'])) {
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

            $teacherId = $_POST['teacherId'];
            $connection = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
            if (mysqli_connect_error()) {
                die(mysqli_connect_error());
            }
            // echo $name . " is ready to update! with id: " . $sid;
            $sql = "UPDATE teacher SET FirstName = '$FirstName' , LastName = '$LastName', DateOfBirth = '$DateOfBirth', age = '$age' , cnic = '$cnic' , phone = '$phone' , email = '$email',
            photo = '$photo' , presentAddress = '$presentAddress' , permanentAddress = '$permanentAddress' , city = '$city', province = '$province', country='$country' , regDate = '$regDate', jobType = '$jobType' WHERE teacherId = $teacherId";
            mysqli_query($connection, $sql);
            if (mysqli_error($connection)) {
                die("Something went wrong! Check your Database");
            }
            echo "Teacher record updated successfully!";
            mysqli_close($connection);
        }
    }

    ?>
</head>

<body>
    <?php
    include("utils/header.php");
    include("utils/sidebar.php");
    ?>
    <div class="container col-md-5">

        <form action="" method="post">
            <input type="hidden" name="teacherId" value="<?= $teacherId ?>">

            <div class="form-group">
                <label for="FirstName">First Name</label>
                <input type="text" name="FirstName" class="form-control" id="FirstName" required value="<?= $FirstName ?>">
            </div>
            <div class="form-group">
                <label for="LastName">Last Name</label>
                <input type="text" name="LastName" class="form-control" id="LastName" required value="<?= $LastName ?>">
            </div>
            <div class="form-group">
                <label for="DateOfBirth">Date of Birth</label>
                <input type="date" name="DateOfBirth" class="form-control" id="DateOfBirth" required value="<?= $DateOfBirth ?>">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="int" name="age" class="form-control" id="age" required value="<?= $age ?>">
            </div>
            <div class="form-group">
                <label for="cnic">CNIC</label>
                <input type="int" name="cnic" class="form-control" id="cnic" required value="<?= $cnic ?>">
            </div>
            <div class="form-group">
                <label for="phone">Contact No.</label>
                <input type="int" name="phone" class="form-control" id="phone" required value="<?= $phone ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" required value="<?= $email ?>">
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" class="form-control-file" id="photo" required value="<?= $photo ?>">
            </div>
            <div class="form-group">
                <label for="presentAddress">Present Address</label>
                <input type="varchar" name="presentAddress" class="form-control" id="presentAddress" required value="<?= $presentAddress ?>">
            </div>
            <div class="form-group">
                <label for="permanentAddress">Permanent Address</label>
                <input type="text" name="permanentAddress" class="form-control" id="permanentAddress" required value="<?= $permanentAddress ?>">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" class="form-control" id="city" required value="<?= $city ?>">
            </div>
            <div class="form-group">
                <label for="province">Province</label>
                <input type="text" name="province" class="form-control" id="province" required value="<?= $province ?>">
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" name="country" class="form-control" id="country" required value="<?= $country ?>">
            </div>
            <div class="form-group">
                <label for="regDate">Registration Date</label>
                <input type="date" name="regDate" class="form-control" id="regDate" required value="<?= $regDate ?>">
            </div>
            <div class="form-group">
                <label for="jobType">Job Type</label>
                <input type="text" name="jobType" class="form-control" id="jobType" required value="<?= $jobType ?>">
            </div>


            <button type="submit" class="btn btn-primary"> Update Teacher </button>
        </form>
    </div>
</body>

</html>