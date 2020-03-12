<?php
	include 'conn.php';

	if (isset($_GET['changePassword'])) 
	{
		$oldPassword_err = $password_match_err  = $passwordSuccessMsg = "";
		if ($_POST['check_old_password'] == $_POST['old_password']) {
			if ($_POST['new_password'] == $_POST['confirm_new_password']) 
			{
				$newSetPassword = $_POST['confirm_new_password'];
				$id = $_SESSION['id'];
				$sql = "UPDATE user_accounts SET password='$newSetPassword' WHERE id='$id'";
				if (mysqli_query($conn, $sql)) 
				{
					$passwordSuccessMsg = "Your password successfully has been changed. Thank You";
					header("Location: ../../dashboard.php?passwordSuccessMsg=".$passwordSuccessMsg);
					exit();
				}
			}else{
				$password_match_err = "Doesn't matched new password and confirm password";
				header("Location: ../../dashboard.php?password_match_err=".$password_match_err);
				exit();
			}
		}else{
			$oldPassword_err = "Invalid old password";
			header("Location: ../../dashboard.php?oldPassword_err=".$oldPassword_err);
			exit();
		}
	}

?>