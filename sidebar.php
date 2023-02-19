<?php

include 'dp.php';
error_reporting(0);
session_start();

if (!isset($_SESSION['user_id'])) {
    header("location:login.php");
}

$sql1 = "SELECT user_id, first_name, last_name, branches.branch_name FROM users INNER JOIN branches ON branches.branch_ID = users.branch_ID WHERE user_id ={$id};";
$res1 = $conn->query($sql1);
$row1 = $res1->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">ZEO - Elpitiya</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                <h6 class="text-light mx-2 pt-2"><?php echo " " . strtoupper($row1['first_name']) . " " . strtoupper($row1['last_name']); ?></h6>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img id="user_img" class="rounded-circle user_img" src="img/profile/<?php echo  $_SESSION['profileimg']; ?>" alt="" width="50px" height="50px"></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Profile</a></li>
                    <li><a class="dropdown-item" href="login.php">Login</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a id="attend" class="nav-link" href="attendence.php">
                            <div class="sb-nav-link-icon"><i class="fa-regular fa-calendar-days"></i></div>
                            Attendence
                        </a>
                        <a id="boards" class="nav-link" href="boardos.php">
                            <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-list-check"></i></div>
                            Board of Survey
                        </a>
                        <a id="boards" class="nav-link" href="boardos.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-print"></i></div>
                            Audit Queries
                        </a>
                        <a id="boards" class="nav-link" href="boardos.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-computer"></i></div>
                            Inventory Items
                        </a>

                        

                        <div class="sb-sidenav-menu-heading">Settings</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-pen"></i></div>
                            Edit Profile
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-key"></i></div>
                            Change Password
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-trash-can"></i></div>
                            Remove Account
                        </a>

<div id="role6" class="d-none ">
<div class="sb-sidenav-menu-heading text-danger">Admin Menu</div>
                        <a class="nav-link" href="adboard.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user-pen"></i></div>
                            Survey Board Information
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-key"></i></div>
                            Modify Employee
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-trash-can"></i></div>
                            Attendence Settings
                        </a>

</div>


                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php echo " " . $row1['first_name'] . " " . $row1['last_name']; ?>
                </div>
            </nav>
        </div>
        <!-- Java Scripts -->
        <script src="js/scripts.js"></script>
        <script src="js/fontawesome.min.js" crossorigin="anonymous"></script>
        <script src="js/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery-3.6.3.min.js" crossorigin="anonymous"></script>


        <!-- bootstrap datatable js -->
        <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>


        <script>

// get drop down list
$( document ).ready(function() {
    var roleID = "<?php echo $_SESSION['role_id'] ; ?>";
    //Attendence Panel Active
    if(roleID == 6){
        $('#role6').removeClass('d-none');
    }

});
</script>

</body>

</html>