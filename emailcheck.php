<?php

//error_reporting(0);


require 'dp.php';


if (isset($_REQUEST['email'])) {
    $email = trim($_REQUEST['email']);
    
    $sql = "SELECT email FROM users WHERE is_active=1 AND email = '$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        echo "email success";
                  
    } else {
        echo "Invalid user name or Password";
    }
}




?>