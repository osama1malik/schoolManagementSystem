<?php
require_once("classesDataClass.php");
$classData = new classesData();
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    if ($classData->Delete($_GET["id"])) {
        echo "Record has been deleted successfully!";
        header("Location: Classes.php");
        return;
    }
    echo "Something went wrong! Record has not been deleted!";
} else {
    echo "Specify Class id";
}
