<?php
include('utils/session.php');
if (!isset($_SESSION['login_user'])) {
    header("location: index.php"); // Redirecting To Home Page 
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title>Dashboard</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <?php
    ?>
</head>

<body>
    <?php include('utils/header.php') ?>
    <?php include('utils/sidebar.php') ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 mt-5">
                <span class="bg-info p-4 rounded">
                    Total Student:
                    <?php

                    ?>
                </span>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 mt-5">
                <span class="bg-light p-4 rounded">
                    Total Teacher:
                    <?php

                    ?>
                </span>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 mt-5">
                <span class="bg-warning p-4 rounded">
                    Total Class:
                    <?php

                    ?>
                </span>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 mt-5">
                <span class="bg-secondary p-4 rounded">
                    Total Marksheet:
                    <?php

                    ?>
                </span>
            </div>
        </div>
    </div>
</body>

</html>