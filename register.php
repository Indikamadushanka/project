<?php
error_reporting();
require 'dp.php';

  /* 
    $sql = "SELECT sub_office_id, sub_office_name FROM `suboffice`;";
    $res = $conn->query($sql);
    $sub_office_list = "";
    while ($row = $res->fetch_assoc()){
        $sub_office_list .= "<option value=\"{$row['sub_office_id']}\"> {$row['sub_office_name']}</option>";
             
    }; */
    
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
    <link rel="stylesheet" href="styles/main.css">

    <!-- Java Scripts -->
    <script src="js/popper.min.js"></script>
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/fontawesome.min.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.3.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   


    <title>Register</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-5 mx-auto">
            <h2 class="mt-5">User Registration</h2>
                <form action="" id="regform" method="POST" class="mt-3" enctype="multipart/form-data">
                <div class="form-group">
                        <label for="empno"><b>Emp. No:</b></label>
                        <input type="text" name="empno" class="form-control" id="empno">
                        <p id="emp_msg" class="text-secondary mb-1">(According to the attendance register)</p>
                        
                    </div>
                    <div class="form-group">
                        <label for="first_name"><b>First Name:</b></label>
                        <input type="text" name="first_name" class="form-control" id="first_name" value="">
                        <p id="ch_first" class="text-danger mx-1"></p>
                    </div>
                    <div class="form-group mt-3">
                        <label for="last_name"><b>Last Name:</b></label>
                        <input type="text" name="last_name" class="form-control" id="last_name" value="">
                        <div id="alert" class=""></div>
                    </div>
                   

                      <div class="form-group mt-3 ">
                        <label for="eduoffice"><b>Select the Education Office you work for:</b></label></br>
                        <select class="btn bg-success-subtle" name="eduoffice" id="eduoffice">
                        <option value="" selected disabled>Please Select!</option>
                        <option value="1">Zonal Office Elpitiya</option>
                        <option value="2">Divisional Office Elpitiya</option>
                        <option value="3">Divisional Office Karandeniya</option>
                        <option value="4">Divisional Office Niyagama</option>
                        <option value="5">Divisional Office Benthota</option>
                        <option value="6">Divisional Office Welivitiya</option>
                        </select>
                    </div>
                    <div class="form-group mt-3" id="branch_sec">
                        <label for="branch"><b>Select the branch or school to which you are attached:</b></label></br>
                        <select class="btn bg-success-subtle" name="branch" id="branch">
                            <?php    echo $subofficedata; ?>
                        </select>
                    </div>
              
                    <div class="form-group mt-3">
                        <label for="contact_no"><b>Contact Number (Optional)</b></label>
                        <input type="text" name="contact_no" class="form-control" id="contact_no">
                    </div>
                    <div class="form-group mt-3">
                        <label for="email"><b>Email:</b></label>
                        <input type="text" name="email" class="form-control" id="email">
                        <p class="text-secondary">(This email address is considered your username)</p>
                    </div>
                    <div class="form-group mt-3">
                        <label for="password"><b>Passowrd:</b></label>
                        <input type="password" name="password" class="form-control" id="password">
                        <p id="ch_pw" class="text-danger mx-1"></p>
                    </div>
                    <div class="form-group mt-3">
                        <label for="re_password"><b>Re-Password:</b></label>
                        <input type="password" name="re_password" class="form-control" id="re_password">
                        
                    </div>
                    <lable for="fileupload" class="form-label"><b>Profile Picture</b></lable>
                    <input type="file" class="form-control" id="file" name="profile" ><br>

                    <input class="btn btn-primary mt-3" id="submit" type="submit" name="submit" value="Submit">




                </form>
                    

            </div> <!-- col-md-6 -->
        </div> <!-- row -->
    </div> <!-- container -->

<!-- 
    <div class="container">
		<div class="row">
			<div class="col-md-5 offset-md-5 mx-auto" id="form-login">
				<form class="form-horizontal well mt-5 mb-5" action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">
					<fieldset>
						<legend>Import CSV/Excel file</legend>
						<div class="control-group">
							<div class="control-label">
								<label>CSV/Excel File:</label>
							</div>
							<div class="controls">
								<input type="file" name="file" id="file" class="input-large mt-2">
							</div>
						</div>
 
						<div class="control-group">
							<div class="controls">
							<button type="submit" id="submit" name="Import" class="btn btn-success button-loading mt-2" data-loading-text="Loading...">Upload</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
 -->

<script>

// get drop down list
$( document ).ready(function() {
    $('#branch_sec').hide();
    $('#droplist').hide();
       
    $("#eduoffice").change(function(){
              var subOffice = $('#eduoffice').serialize();
        $.post( "getbranches.php", subOffice, function( data, status ) {
            if(data){
                $('#branch_sec').show();
                $("#branch").html(data);
            }else{
                $('#branch_sec').hide();
            }
});
});

// submit Form

$("#regform").on('submit', function(e){
            event.preventDefault();
        
          $.ajax({
            type: 'POST',
            data : new FormData(this),
            url: 'process.php',
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,

            beforeSend: function(){
                $('#submit').attr("disabled","disabled");
                $('#regform').css("opacity",".5");
                console.log(FormData);
            },
            success: function(response){
                $('.statusMsg').html('');
                if(response.status == 1){
                    $('#fupForm')[0].reset();
                    $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
                }else{
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#fupForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });


    
});


$("#first_name").focusin(function(event){
            event.preventDefault();
          var  empData = $("#empno").serialize();
                   
          $.ajax({
    type: 'POST',
data : empData,
    url: 'process.php',
    success: function(data) {
        var empjs = JSON.parse(data);
        $("#first_name").val(empjs.fname);
        $("#last_name").val(empjs.laname);
        
        
        


    }
});       

   
});



});



    </script>





</body>

</html>