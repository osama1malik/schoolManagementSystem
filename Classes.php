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
    <title>Classes</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <?php
    require_once("classesDataClass.php");
    $classData = new classesData();
    $classesArr = $classData->GetAllRecords();
    $i = 0;
    ?>
</head>

<body>
    <?php
    include('utils/header.php');
    require_once("utils/config.php");
    
    ?>
    <div class="d-flex" id="wrapper">
        <?php include("utils/sidebar.php") ?>
        <div id="main-content">
            <span id="msg"></span>
            <button class="btn float-right" onclick="window.location.href='addClass.php';">Add Class</button>
            <div class="container col-md-12">
                <table class="table">
                    <th>#</th>
                    <th>Class Name</th>
                    <th>Numeric Name</th>
                    <th>Section</th>
                    <th>Class Teacher</th>
                    <th>Action</th>
                    <?php
                    foreach ($classesArr as $classObj) {
                        ?>
                        <tr>
                            <td>
                                <?php
                                $i++;
                                echo $i;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $classObj->className;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $classObj->classNumericName;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $classObj->section;
                                ?>
                            </td>
                            <td>
                                <?php
                                // $sql = "SELECT teacherId, FirstName, LastName FROM teacher where teacherId = $classObj->teacherId";
                                echo $classObj->teacherName;
                                ?>
                            </td>
                            <td>
                                <button class="btn btn-primary" href="#action<?= $classObj->classId ?>" data-toggle="collapse" aria-expanded="false">Action</button>
                                <ul class="collapse list-unstyled" id="action<?= $classObj->classId ?>">
                                    <a href="classEdit.php?id=<?= $classObj->classId ?>">
                                        <button type="button" class="btn btn-primary">Edit</button>
                                    </a>
                                    <a href="classDelete.php?id=<?= $classObj->classId ?>">
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </a>
                                </ul>
                            </td>
                        </tr>
                    <?php
                }
                ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>