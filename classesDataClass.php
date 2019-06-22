<?php
require_once("utils/config.php");

class classesData
{
    // public $id, $EmpID, $FullName, $Designation, $TaskCode, $TaskDescription;
    public $classId, $className, $classNumericName, $teacherId, $section, $teacherName;
    private $pdo;

    public function __construct($classId = null, $className = null, $classNumericName = null, $teacherId = null, $section = null, $teacherName = null)
    {
        $connString = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
        $this->pdo = new PDO($connString, DBUSER, DBPASSWORD);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($classId != null) {
            $this->classId = $classId;
            $this->className = $className;
            $this->classNumericName = $classNumericName;
            $this->teacherId = $teacherId;
            $this->section = $section;
            $this->teacherName = $teacherName;
        }
    }

    /*
     * Function takes classes attributes to insert into database
     * Function returns true on successful insertion, otherwise false
     */
    public function Insert($className, $classNumericName, $teacherId, $section)
    {
        // TODO: Write Definition to insert record into database
        $sql = "INSERT INTO classes (classId, className, classNumericName, teacherId, section) VALUES (NULL, '$className', '$classNumericName', '$teacherId', '$section')";
        // $sql = "INSERT INTO classes (classId, className, classNumericName, teacherId, section) VALUES (NULL, '$className', '$classNumericName', '$teacherId','$section')";
        $count = $this->pdo->exec($sql);
        if ($count > 0)
            header("location: classes.php");
        return false;
    }

    /*
     * Function takes classes attributes to update record in database
     * Function returns true on successful update otherwise false
     */
    public function Update($classId, $className, $classNumericName, $teacherId, $section)
    {
        // TODO: Write Definition of this method
        $sql = "UPDATE classes SET className = '$className', classNumericName = '$classNumericName', teacherId = '$teacherId', section = '$section' WHERE classId = $classId";
        $count = $this->pdo->exec($sql);
        if ($this->pdo->query($sql) === false) {
            return false;
        } else {
            header("Location: Classes.php");
        }
    }

    /*
     * This function returns classes objects Array
     */
    public function GetAllRecords()
    {
        // $sql = "select * from classes ORDER BY classNumericName";
        $sql = "select c.classId, c.className, c.classNumericName, c.teacherId, c.section, teacher.FirstName, teacher.LastName\n"
            . "from classes c\n"
            . "INNER JOIN teacher ON c.teacherId = teacher.teacherId  ORDER BY c.classNumericName";
        $result = $this->pdo->query($sql);
        $classesArr = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $teacherName = $row['FirstName'] . " " . $row['LastName'];
            $classesArr[$i] = new classesData($row['classId'], $row['className'], $row['classNumericName'], $row['teacherId'], $row['section'], $teacherName);
            $i++;
        }
        return $classesArr;
    }

    /*
     * This function returns single Object of this class
     * Search Criteria: id
     */
    public function GetSingleRecord($id)
    {
        // TODO: Write definition of this method
        $sql = "select * from classes WHERE classId = $id";
        $result = $this->pdo->query($sql);
        $classData = null;
        while ($row = $result->fetch()) {
            $classData = new classesData($row['classId'], $row['className'], $row['classNumericName'], $row['teacherId'], $row['section']);
        }
        return $classData;
    }

    /*
     * This function returns tasks of classes
     * Search Criteria: id
     */
    public function GetEmployeeTasks($id)
    {
        // TODO: Write definition of this method
        $sql = "SELECT e.id, e.EmpID, e.FullName, e.Designation, task.TaskCode, task.TaskDescription\n"
            . "FROM employee e\n"
            . "INNER JOIN employeetasks ON e.id = employeetasks.eid\n"
            . "INNER JOIN task ON employeetasks.tid = task.id\n"
            . "WHERE e.id = $id";
        $result = $this->pdo->query($sql);
        $empObj = null;
        while ($row = $result->fetch()) {
            $empObj = new Employee($row['id'], $row['EmpID'], $row['FullName'], $row['Designation'], $row['TaskCode'], $row['TaskDescription']);
        }
        return $empObj;
    }

    /*
     * Delete single Record
     */
    public function Delete($id)
    {
        // TODO: Write Definition of this method
        $sql = "DELETE from classes WHERE classId = $id";
        $count = $this->pdo->exec($sql);
        if ($count > 0)
            return true;
        return false;
    }
}
