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
    <title>Add Teacher</title>
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
</head>

<body>
    <?php
    include("utils/header.php");
    include("utils/sidebar.php");
    ?>
    <div class="container col-md-5">
        <form action="teacher_addaction.php" method="post">
            <div class="form-group">
                <label for="FirstName">First Name</label>
                <input type="text" name="FirstName" class="form-control" id="FirstName" required>
            </div>
            <div class="form-group">
                <label for="LastName">Last Name</label>
                <input type="text" name="LastName" class="form-control" id="LastName" required>
            </div>
            <div class="form-group">
                <label for="DateOfBirth">Date of Birth</label>
                <input type="date" name="DateOfBirth" class="form-control" id="DateOfBirth" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="int" name="age" class="form-control" id="age" required>
            </div>
            <div class="form-group">
                <label for="cnic">CNIC</label>
                <input type="int" name="cnic" class="form-control" id="cnic" required>
            </div>
            <div class="form-group">
                <label for="phone">Contact No.</label>
                <input type="tel" name="phone" class="form-control" id="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <label for="photo">Picture: </label>
                <input type="file" name="photo" class="form-control-file" id="photo" required>
            </div>
            <div class="form-group">
                <label for="presentAddress">Present Address</label>
                <input type="varchar" name="presentAddress" class="form-control" id="presentAddress" required>
            </div>
            <div class="form-group">
                <label for="permanentAddress">Permanent Address</label>
                <input type="text" name="permanentAddress" class="form-control" id="permanentAddress" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" class="form-control" id="city" required>
            </div>
            <div class="form-group">
                <label for="province">Province</label>
                <input type="text" name="province" class="form-control" id="province" required>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" name="country" class="form-control" id="country" required>
            </div>
            <div class="form-group">
                <label for="regDate">Registration Date</label>
                <input type="date" name="regDate" class="form-control" id="regDate" required>
            </div>
            <div class="form-group">
                <label for="jobType">Job Type</label>
                <input type="text" name="jobType" class="form-control" id="jobType" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Teacher</button>
        </form>
    </div>
</body>

</html>