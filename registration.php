<?php

	include('config/db_connect.php');

	$email = $userName = $password = '';
	$errors = array('email' => '', 'userName' => '', 'password' => '');

	if(isset($_POST['submit'])){

		// check email
		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email must be a valid email address';
			}
		}

		// check title
		if(empty($_POST['userName'])){
			$errors['userName'] = 'An user name is required';
		} else{
			$userName = $_POST['userName'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $userName)){
				$errors['userName'] = 'user name must be letters and spaces only';
			}
		}

		// check ingredients
		if(empty($_POST['password'])){
			$errors['password'] = 'Password is missing';
		} else{
			$password = $_POST['password'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $password)){
				$errors['password'] = 'invalid password';
			}
		}

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$userName = mysqli_real_escape_string($conn, $_POST['userName']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);

			// create sql
      $s="SELECT  * FROM userLogin where email='$email' ";
      $r= mysqli_query($conn,$s);
      $num=mysqli_num_rows($r);
      if($num==1){
        $errors['email'] = 'this email is already taken';

      }else{
        $sql = "INSERT INTO userLogin(userName,email,password) VALUES('$userName','$email','$password')";

        // save to db and check
        if(mysqli_query($conn, $sql)){
          // success
          header('Location: index.php');
        } else {
          echo 'query error: '. mysqli_error($conn);
        }

      }


		}

	} // end POST check

?>

<!DOCTYPE html>
<html>

	<?php include('templates/header11.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Create Your Account</h4>
		<form class="white" action="registration.php" method="POST">
      <label>User Name </label>
      <input type="text" name="userName" value="<?php echo htmlspecialchars($userName) ?>" required>
      <div class="red-text"><?php echo $errors['userName']; ?></div>
			<label>Your Email</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>" required>
			<div class="red-text"><?php echo $errors['email']; ?></div>
			<label>Your Password</label>
			<input type="password" name="password" value="<?php echo htmlspecialchars($password) ?>" required>
			<div class="red-text"><?php echo $errors['password']; ?></div>
			<div class="center">
        <a href="login.php">i have an account</a>
        <br>
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>
