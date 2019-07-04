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
    if (isset($_GET['id']) == null || $_GET['n'] == null || $_GET['s'] == null) {
        $id = '';
        $class = '';
        $section = '';
    } else {
        $id = $_GET['id'];
        $class = $_GET['n'];
        $section = $_GET['s'];
    }
    require_once("classesDataClass.php");
    $classData = new classesData();
    $classesArr = $classData->GetAllRecords();
    $tId = '';
    $subjectId = array();
    $teacherId = array();
    ?>
    <script>
        $().ready(function() {
            $('.addSubject').click(function() {
                var subject = document.getElementById("subject");
                var teacher = document.getElementById("teacher");
                var subjectId = subject.options[subject.selectedIndex].value;
                var teacherId = teacher.options[teacher.selectedIndex].value;
                var classId = <?= $id ?>;
                $.ajax({
                    url: './addSubjectDB.php',
                    method: 'POST',
                    data: {
                        c: classId,
                        s: subjectId,
                        t: teacherId
                    },
                    success: function(data) {
                        $('#msg')
                            .html("Added successfully!")
                            .attr('class', 'alert alert-success');
                            location.reload();
                    },
                    error: function(data) {
                        $('#msg')
                            .html("Already Exist!")
                            .attr('class', 'alert alert-danger');
                    }
                });
            });
        });
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
    <div class="container d-flex" id="wrapper">
        <?php include("utils/sidebar.php") ?>
        <div class="container">
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
                        <div class="row mt-5">
                            <div class="col-md-4 text-center">
                                <span class="h3">Class:  <b><?php echo $class . " " . $section ?></b> </span>
                            </div>
                            <div class="col-md-8 text-right">
                                <!-- <a class="btn btn-primary" id="addSubject">Add Subject</a> -->
                                <!-- <a class="btn btn-primary" id="addSubject" data-target="#addSubject" href="./addSubject.php?id=<?= $id ?>&class=<?= $class . ' ' . $section ?>">Add Subject</a> -->
                                <button class="btn btn-primary" data-toggle="modal" data-target="#addSubject">Add Subject</button>
                                <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#editSubject">Edit Subject</button> -->
                            </div>
                        </div>
                        <div class="list-group-flush container">
                            <div class="sidebar-heading h2 mb-4 text-center"><b>MANAGE SUBJECTS</b></div>
                            <?php
                            $sql = "select subject.subjectName, teacher.FirstName, teacher.LastName, sc.classId, sc.subjectId, sc.teacherId\n"
                                . "from subjectperclass sc\n"
                                . "INNER JOIN teacher ON sc.teacherId = teacher.teacherId\n"
                                . "INNER JOIN subject ON sc.subjectId = subject.subjectId WHERE sc.classId = " . $id . " ORDER BY subject.subjectName";

                            $result = mysqli_query($connection, $sql);
                            $select = "";
                            if ($result != null) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $select .= '<div class="row"><span class="list-group-item list-group-item-action bg-white col-md-4 text-center">' . $row['subjectName'] . '</span>';
                                    array_push($subjectId, $row['subjectId']);
                                    array_push($teacherId, $tId);
                                    $select .= '<span class="list-group-item list-group-item-action bg-white col-md-4 text-center">' . $row['FirstName'] . ' ' . $row['LastName'] . '</span>';
                                    $select .= '<a class="underline list-group-item list-group-item-action bg-white col-md-3 text-center mx-auto" data-toggle="modal" data-target="#editSubject">Edit Subject</a></div>';
                                    $select .= '';
                                }
                            }
                            echo $select;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Subject Modal -->
    <div class="modal fade" id="addSubject" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Add Subject</h4>
                </div>
                <div class="modal-body">
                    <div class="container" id="main-content">
                        <div class="text-center mb-5">
                            <span class="h3">CLASS: <?= $class ?></span>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <?php
                                $select = "";
                                $sql = "SELECT * FROM subject";
                                $result = mysqli_query($connection, $sql);
                                $select .= '<div class="h6 mx-auto text-center">Select Subject Name</div><select id="subject" name="teacher" class="mx-auto list-group-item list-group-item-action col-md-8">';
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $sId = $row['subjectId'];
                                    $select .= '<option id="subjectId" value="' . $sId . '">' . $row['subjectName'] . '</option>';
                                }
                                $select .= '</select>';
                                echo $select;
                                ?>
                            </div>
                            <div class="col-md-4">
                                <?php
                                $select = "";
                                $sql = "SELECT * FROM teacher";
                                $result = mysqli_query($connection, $sql);
                                $select .= '<div class="h6 mx-auto text-center">Select Teacher Name</div><select id="teacher" name="teacher" class="mx-auto list-group-item list-group-item-action col-md-8">';
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $tId = $row['teacherId'];
                                    $select .= '<option id="teacherId" value="' . $tId . '">' . $row['FirstName'] . ' ' . $row['LastName'] . '</option>';
                                }
                                $select .= '</select>';
                                echo $select;
                                ?>
                            </div>
                            <div class="col-md-12 text-center mt-5">
                                <label id="msg" class=""></label>
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary w-50 mt-5 addSubject">Add Subject</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Subject Model -->
    <div class="modal fade" id="editSubject" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <h4 class="modal-title text-center">Edit Subject</h4>
                </div>
                <div class="modal-body">
                    <div class="container" id="main-content">
                        <div class="text-center mb-5">
                            <span class="h3">CLASS: <?= $class ?></span>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                $select = "";
                                $sql = "SELECT * FROM subject";
                                $result = mysqli_query($connection, $sql);
                                $select .= '<div class="h6 mx-auto text-center">Select Subject Name</div><select id="subject" name="teacher" class="mx-auto list-group-item list-group-item-action col-md-8">';
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $sId = $row['subjectId'];
                                    $select .= '<option id="subjectId" value="' . $sId . '">' . $row['subjectName'] . '</option>';
                                }
                                $select .= '</select>';
                                echo $select;
                                ?>
                            </div>
                            <div class="col-md-6">
                                <?php
                                $select = "";
                                $sql = "SELECT * FROM teacher";
                                $result = mysqli_query($connection, $sql);
                                $select .= '<div class="h6 mx-auto text-center">Select Teacher Name</div><select id="teacher" name="teacher" class="mx-auto list-group-item list-group-item-action col-md-8">';
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $tId = $row['teacherId'];
                                    $select .= '<option id="teacherId" value="' . $tId . '">' . $row['FirstName'] . ' ' . $row['LastName'] . '</option>';
                                }
                                $select .= '</select>';
                                echo $select;
                                ?>
                            </div>
                            <div class="col-md-12 text-center mt-5">
                                <label id="msg" class=""></label>
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary w-50 mt-5 addSubject">Edit Subject</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End edit subject modal -->
</body>

</html>