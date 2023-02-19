<?php
include 'dp.php';
error_reporting(0);
session_start();


$id = $_SESSION['user_id'];


$sql3 = "SELECT institute.ins_id, institute.ins_name, suboffice.sub_office_name, boardos.chairman, boardos.Action FROM (((boardos INNER JOIN institute ON boardos.ins_id = institute.ins_id) INNER JOIN users ON users.user_id = boardos.chairman) INNER JOIN suboffice ON suboffice.sub_office_id = institute.sub_office_id) WHERE chairman = {$id} OR member1 = {$id} OR member2 = {$id} OR member3 = {$id} AND Action= 1 ORDER BY suboffice.sub_office_id;";
$res3 = $conn->query($sql3);





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

    <title>Board of Survey</title>
</head>

<body>


    <?php require 'sidebar.php' ?>

    <div id="layoutSidenav_content">
        <!-- User Details Area -->
    <div class="container">
        <div class="row">
            <h1 class="text-success text-center mt-5">EMPLOYEE INFORMATION PORTAL</h1>
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
                <h3 class="text-attend my-5">Annual Board of Survey</h3>
                <table id="example1" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Institute Id</th>
                            <th>Institute</th>
                            <th>Position</th>
                            <th>Divisional Office</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row3 = $res3->fetch_assoc()) { ?>

                            <tr>
                                <td><?php echo $row3['ins_id']; ?></td>
                                <td><?php echo $row3['ins_name']; ?></td>
                                <td><?php echo $row3['chairman'] == $id ? 'Chairman' : 'Member'; ?></td>
                                <td><?php echo $row3['sub_office_name']; ?></td>
                                <td><?php echo $row3['Action']; ?></td>
                            </tr>

                        <?php } ?>
                    <tbody>

                </table>

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
            $('#example1').DataTable();

        });
    </script>

</body>

</html>