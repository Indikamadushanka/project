<?php
include 'dp.php';
error_reporting(0);
session_start();

if (!isset($_SESSION['user_id'])) {
    header("location:login.php");
}
$id = $_SESSION['user_id'];

date_default_timezone_set("Asia/colombo");
$defulttime = "08:30:00";
$abtime = "00:00:00";
$h = date('G');
$event = "";

if ($h >= 5 && $h <= 11) {
    $event .= "Good morning";
} else if ($h >= 12 && $h <= 15) {
    $event .= "Good afternoon";
} else {
    $event .= "Good evening";
}

$sql1 = "SELECT user_id, first_name, last_name, branches.branch_name FROM users INNER JOIN branches ON branches.branch_ID = users.branch_ID WHERE user_id ={$id};";
$res1 = $conn->query($sql1);
$row1 = $res1->fetch_assoc();







?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>User Dashboard</title>
    <!-- jquery -->
<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet">

    <link href="styles/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<?php require 'sidebar.php' ?>

<div id="layoutSidenav_content">
   

<!-- User Details Area -->
    <div class="container">
        <div class="row">
            
            <h1 class="text-success text-center mt-5">EMPLOYEE INFORMATION PORTAL</h1>
            <img src="img/profile/" alt="">
            <h2 class="text-center">Zonal Education Office - ABCDE</h2>
            
            <div class="container bg-light text-secondary p-3 my-3 ">
            
                <h3 class="my-2 text-dark">Employee Details</h3>
                
                <table>
                    <tr>
                        <th class="pe-3"><h5 class="ms-5">Employee Number</h5></th>
                        <td class="pe-3">:</td>
                        <td><h5><?php echo " " . $id; ?></h5></td>
                        
                    </tr>
                    <tr>
                    <th class="pe-3"><h5 class="ms-5">Employee Name</h5></th>
                    <td class="pe-3">:</td>
                    <td><h5><?php echo " " . $row1['first_name'] . " " . $row1['last_name']; ?></h5></td>
                    </tr>
                    <tr>
                    <th class="pe-3"><h5 class="ms-5">Branch/ Section</h5></th>
                    <td class="pe-3">:</td>
                    <td><h5><?php echo " " . $row1['branch_name'] ; ?></h5></td>
                    </tr>
                </table>            
                
            </div>
            
            
        </div>
    </div>
<!-- User Details Area -->

    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; 2022 :: Developed by Indika Madushanka</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>

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