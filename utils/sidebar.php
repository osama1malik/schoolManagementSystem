<nav id="sidebar">
    <ul class="list-unstyled components">
        <li>
            <a href="#classSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Class</a>
            <ul class="collapse list-unstyled" id="classSubmenu">
                <li>
                    <a href="./Classes.php">Manage Class</a>
                </li>
                </li>
                <li>
                    <a href="./ClassSubjects.php">Manage Subject</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#studentsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Students</a>
            <ul class="collapse list-unstyled" id="studentsSubmenu">
                <li>
                    <a href="#">Add Students</a>
                </li>
                <li>
                    <a href="#">Manage Students</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#teacherSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Teacher</a>
            <ul class="collapse list-unstyled" id="teacherSubmenu">
                <li>
                    <a href="#">Add Teacher</a>
                </li>
                <li>
                    <a href="#">Manage Teacher</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#attendanceSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Attendance</a>
            <ul class="collapse list-unstyled" id="attendanceSubmenu">
                <li>
                    <a href="#">Take Attendance</a>
                </li>
                <li>
                    <a href="#">Attendance Report</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#marksheetSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Marksheet</a>
            <ul class="collapse list-unstyled" id="marksheetSubmenu">
                <li>
                    <a href="#">Manage Marksheet</a>
                </li>
                <li>
                    <a href="#">Manage Marks</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#accountingSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Accounting</a>
            <ul class="collapse list-unstyled" id="accountingSubmenu">
                <li>
                    <a href="#">Student Payment</a>
                </li>
                <li>
                    <a href="#">Manage Payment</a>
                </li>
                <li>
                    <a href="#">Expenses</a>
                </li>
                <li>
                    <a href="#">Income</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>

<!-- <header class="navbar navbar-light">
  <button class="navbar-toggler sidebar-toggler" type="button" data-toggle="sidebar" data-target="#sidebar">
    <span class="navbar-toggler-icon"></span>
  </button>
</header> -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<script>
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
</script>