<?php 
session_start();

if (isset($_SESSION['userID']) && isset($_SESSION['accountName'])) {

    include "connect_db.php";

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    if(empty($op)){
      header("Location: change-password.php?error=Old Password is required");
	  exit();
    }else if(empty($np)){
      header("Location: change-password.php?error=New Password is required");
	  exit();
    }else if($np !== $c_np){
      header("Location: change-password.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
    	$op = md5($op);
    	$np = md5($np);
        $id = $_SESSION['userID'];

        $sql = "SELECT accountPassword
                FROM users WHERE 
                userID='$id' AND accountPassword='$op'";
		$result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE users SET accountPassword='$np' WHERE userID='$id'";
        	mysqli_query($con, $sql_2);
            $_SESSION['changep'] = "ok";
        	header("Location: user-web.php?id=$id");
	        exit();

        }else {
        	header("Location: change-password.php?error=Incorrect password");
	        exit();
        }
    }
}else{
	header("Location: change-password.php");
	exit();
}

}else{
     header("Location: login.php");
     exit();
}
