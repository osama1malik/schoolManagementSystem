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
    $id = '';
    $class = '';
    $section = '';

    $id = $_GET['id'];
    $class = $_GET['n'];
    $tId = '';
    $section = $_GET['s'];
    $subjectId = array();
    $teacherId = array();
    ?>
    <script>
        function addSubjectInfo(){
            alert("called");
        }
    </script>
</head>

<body>
    <?php
    include('utils/header.php');
    require_once("utils/config.php");
    $connection = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
    if (mysqli_connect_error()) {
        die(mysqli_connect_error());
    } else { }
    ?>
    <div class="d-flex" id="wrapper">
        <?php include("utils/sidebar.php") ?>
        <div class="container" id="main-content">
            <div class="row">
                <div class="col-lg-4 col-md-4" id="class-area">
                    <div class="bg-light border rounded" id="sidebar-wrapper">
                        <div class="sidebar-heading h4 mx-auto">Class</div>
                        <div class="list-group list-group-flush">
                            <?php
                            $sql = "SELECT classId, className, classNumericName, section FROM classes ORDER BY classNumericName";
                            $result = mysqli_query($connection, $sql);
                            $select = "";
                            while ($row = mysqli_fetch_assoc($result)) {
                                $select .= '<a class="list-group-item list-group-item-action bg-white className" href="?id=' . $row['classId'] . '&n=' . $row["className"] . '&s=' . $row["section"] . '">' . $row['className'] . "(" . $row['classNumericName'] . ") '" . $row['section'] . "'" . '</a>';
                            }
                            echo $select;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8" id="manage-section-area">
                    <div class="border rounded" id="sidebar-wrapper">
                        <div class="sidebar-heading h4 mx-auto">Manage Subject</div>
                        <div class="classSection"><?php echo $class . " " . $section ?></div>
                        <div class="list-group list-group-flush">
                            <?php
                            $sql = "SELECT * FROM subject ORDER BY subjectName";
                            $result = mysqli_query($connection, $sql);
                            $select = "";
                            while ($row = mysqli_fetch_assoc($result)) {
                                $select .= '<div class="row"><span class="list-group-item list-group-item-action bg-white col-md-8"  >' . $row['subjectName'] . '</span>';
                                array_push($subjectId, $row['subjectId']);
                                $sql2 = "SELECT teacherId, FirstName, LastName FROM teacher";
                                $result2 = mysqli_query($connection, $sql2);
                                $select .= '<select name="teacher" class="col-md-4">';
                                array_push($teacherId, $tId);
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    $tId = $row2['teacherId'];
                                    $select .= '<option value="' . $tId . '">' . $row2['FirstName'] . ' ' . $row2['LastName'] . '</option>';
                                }
                                $select .= '</select></div>';
                                // echo $select;
                            }
                            echo $select;
                            ?>
                        </div>
                        <div>
                            <button type="submit" onclick="addSubjectInfo()" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>