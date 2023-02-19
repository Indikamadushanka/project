<?php
include 'dp.php';
error_reporting();
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 6)    {
    header("location:login.php");
}
$userlist = '<option value="">Please Select..</option>';
$sql5 = "SELECT ins_id, ins_name FROM institute WHERE is_Active = 1";
$res5 = $conn->query($sql5);

$sql6 = "SELECT user_id, first_name, Last_name FROM `employees` WHERE is_active=1";
$res7 = $conn->query($sql6);
while ($row7 = $res7->fetch_assoc()) {;
    $userlist .= "<option value=\"{$row7['user_id']}\">" . $row7['first_name'] . $row7['Last_name'] . "</option>";
}

if(isset($_POST['submit'])){
    if(isset($_POST['chairman']) && (isset($_POST['member1'])) && (!empty($_POST['chairman'])) && (!empty($_POST['member1']))){
        $insid = $_POST['ins_id'];
        $chairman = $_POST['chairman'];
        $member1 = $_POST['member1'];
        $member2 = $_POST['member2'];
        $member3 = $_POST['member3'];

        echo $insert = "INSERT INTO boardos (ins_id,chairman,member1,member2,member3,Action) VALUES ('$insid','$chairman','$member1','$member2','$member3','1');";
        $resultset = $conn->query($insert);
    }  
}





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


    <?php //require 'sidebar.php' 
    ?>
    <div id="layoutSidenav_content">

        <!--  -->




        <div class="container">
            <div class="row">

                <h3 class="text-attend my-5">Add Members</h3>



                <table id="example1" class="table table-striped table-bordered nowrap" style="width:100%">
                
                    <thead>
                        <tr>

                            <th>Ins. ID</th>
                            <th>Institute</th>
                            <th>Chairman</th>
                            <th>Member 1</th>
                            <th>Member 2</th>
                            <th>Member 3</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    
                    <tbody>
                    
                        <?php
                        while ($row5 = $res5->fetch_assoc()) {
                        ?>
                        
                            <tr>
                            <form action="" method="POST">
                                <td><?php echo $row5['ins_id']; ?></td>
                                <td><input type="hidden" name="ins_id" id="ins_id" value="<?php echo $row5['ins_id']; ?>">
                                    <?php echo $row5['ins_name']; ?></td>
                                
                                <td><select class="btn bg-light-subtle" name="chairman" id="chairman">
                                        <?php echo $userlist; ?>
                                    </select></td>
                                <td><select class="btn bg-light-subtle" name="member1" id="member1">
                                        <?php echo $userlist; ?>
                                    </select></td>
                                <td><select class="btn bg-light-subtle" name="member2" id="member2">
                                        <?php echo $userlist; ?>
                                    </select></td>
                                    <td><select class="btn bg-light-subtle" name="member3" id="member3">
                                        <?php echo $userlist; ?>
                                    </select></td>
<td><input type="submit" name="submit" value="Update"></td>
</form>
                            </tr>
                        <?php } ?>
                        
                    </tbody>

                </table>
                </section>


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



    <!-- Java Scripts -->
    <script src="js/scripts.js"></script>
    <script src="js/fontawesome.min.js" crossorigin="anonymous"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.6.3.min.js" crossorigin="anonymous"></script>


    <!-- bootstrap datatable js -->
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example1').DataTable();

        });
    </script>

</body>

</html>