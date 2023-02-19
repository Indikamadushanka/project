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
$offtime = "16:15:00";

$sql = "SELECT * FROM attendance WHERE id = {$id} ORDER BY date DESC LIMIT 30 ;";
$res = $conn->query($sql);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Style Sheets -->
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/fontawesome.min.css">
    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="styles/styles.css">


    <!-- bootstrap Datatble -->


    <title>Daily Attendence</title>
</head>

<body>

    <?php require 'sidebar.php' ?>
    <div id="layoutSidenav_content">



        <!-- User Details Area -->
    <div class="container">
        <div class="row">
            <h1 class="text-success text-center mt-5">EMPLOYEE INFORMATION PORTAL</h1>
            <h2 class="text-center">Zonal Education Office - ABCED</h2>
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
                    <td><h5><?php echo " " . $row1['branch_name']; ?></h5></td>
                    </tr>
                </table>            
                
            </div>
            
            
        </div>
    </div>
<!-- User Details Area -->


        </main>

       <div class="container">
<div class="row">

<h3 class="text-attend my-5">Attendence Management System</h3>


    <!-- Attendance Table -->
    <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                
                <th>Date</th>
                <th>In Time</th>
                <th>Out Time</th>
                <th>Status</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <?php while ($row = $res->fetch_assoc()) { ?>
                <tr>
                    
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['intime']; ?></td>
                    <td><?php echo $row['outtime']; ?></td>
                    <td><?php

                        if ($row['intime'] > $defulttime) {
                            echo '<p class="text-danger mb-0" >A late date!</p>';
                        };
                        if ($row['intime'] == $abtime && $row['outtime'] == $abtime) {
                            echo '<p class="text-warning mb-0" >Absent!</p>';
                        }



                        ?></td>
                    <td></td>


                </tr>
            <?php } ?>
        </tbody>

    </table>
    </section> <!-- end attendence section -->


</div>

       </div>
       
       
        <!-- Footer Aria -->

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
        <!-- Footer Aria End -->
    </div>


    
    <script>
        $(document).ready(function() {
            $('#example').DataTable();

        });
    </script>

</body>

</html>

