<?php
	include 'conn.php';

	if (isset($_POST['username']) && isset($_POST['password'])) {

		$username = $_POST['username'];
		$password = $_POST['password'];
		$username_err = $password_err  = $login_err = "";

		// Check if username is empty
	    if(empty(trim($_POST["username"]))){
	        $username_err = "Please enter username.";
	        header("Location: ../../index.php?username_err=".$username_err);
	        exit();
	    } else{
	        $username = trim($_POST["username"]);
	    }

	    if(empty(trim($_POST["password"]))){
	        $password_err = "Please enter password.";
	        header("Location: ../../index.php?password_err=".$password_err);
	        exit();
	    } else{
	        $password = trim($_POST["password"]);
	    }

	    if(empty($username_err) && empty($password_err)){
	    	$sql = "SELECT user_accounts.id, user_accounts.employee_id, user_accounts.email, user_accounts.password, user_accounts.status, user_accounts.employee_name, division.division_id, department.department_id, division.division_name, department.department_name, unit.unit_name, designation.designation_id,  designation.designation_name, access_level.access_id, access_level.access_name FROM user_accounts, division, department, unit, designation, access_level WHERE user_accounts.division_id=division.division_id AND user_accounts.department_id=department.department_id AND user_accounts.unit_id=unit.unit_id AND user_accounts.designation_id=designation.designation_id AND user_accounts.access_level_id=access_level.access_id AND user_accounts.employee_id='$username' AND user_accounts.password='$password' AND user_accounts.status = 1";

	    	$result = mysqli_query($conn, $sql);

	    	if($row1 = mysqli_fetch_assoc($result))
	    	{
			   	if ($row1['employee_id'] == $username && $row1['password'] == $password) 
			   	{
                    // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $row1['id'];
                    $_SESSION["employee_id"] = $row1['employee_id'];
                    $_SESSION["password"] = $row1['password'];
                    $_SESSION["employee_name"] = $row1['employee_name'];
                    $_SESSION["email"] = $row1['email'];
                    $_SESSION["passowrd"] = $row1['passowrd'];
                    $_SESSION["division_id"] = $row1['division_id'];
                    $_SESSION["division_name"] = $row1['division_name'];
                    $_SESSION["department_id"] = $row1['department_id'];
                    $_SESSION["department_name"] = $row1['department_name'];
                    $_SESSION["unit_id"] = $row1['unit_id'];
                    $_SESSION["unit_name"] = $row1['unit_name'];
                    $_SESSION["designation_id"] = $row1['designation_id'];
                    $_SESSION["designation_name"] = $row1['designation_name'];
                    $_SESSION["access_level_id"] = $row1['access_level_id'];
                    $_SESSION["access_level_id"] = $row1['access_id'];
                    $_SESSION["access_id"] = $row1['access_id'];
                    $_SESSION["access_permission"] = $row1['access_name'];
                    $_SESSION["status"] = $row1['status'];

                    // Redirect user to welcome page
                    header("location: ../../dashboard.php");
			   	}else{
			   		$login_err = "Your login credentials is Invalid";
			        header("Location: ../../index.php?login_err=".$login_err);
			        exit();
			   	}
			}else{
				$login_err = "Your login credentials is Invalid";
		        header("Location: ../../index.php?login_err=".$login_err);
		        exit();
			}





	    }
	}


?>