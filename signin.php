<?php 
$page_title = 'Sign In - Bus Ticket';
include_once 'config/header.php';

// process loging in
if(isset($_POST['signIn'])){
	//array to hold errors
	$form_errors = array();
	
	//validate
	$required_fields = array('email', 'password');
	//call function to check empty fields & merge return data into $form_errors
	$form_errors = array_merge($form_errors, check_empty_fields($required_fields));
	
	//check if the error array is empty
	if(empty($form_errors)){
		//collect form data into variable
		$uname=$_POST['email'];
		$pass=$_POST['password'];
		
		//check user exist in the database
		$sqlQuery = "SELECT * FROM users WHERE usr_email = :uname";
		$stm = $db->prepare($sqlQuery);
		$stm->execute(array(':uname' => $uname));
		
		if ($stm->rowCount() < 1) {
			$result = flashMessage('Invalid username');
		} else {
			while($row = $stm->fetch()){
				$id = $row['usr_id'];
				$hashed_pass = $row['usr_pass'];
				$username = $row['usr_email'];
				$names = $row['usr_fullname'];
				
				if(password_verify($pass, $hashed_pass)){
					$_SESSION['id'] = $id;
					$_SESSION['username'] = $username;
					
					//call sweet alert
					echo $welcome="<script type=\"text/javascript\">
								swal({
								  title: \"Welcome back $names!\",
								  text: \"You are being logged in...\",
								  type: 'success',
								  timer: 3000,
								  showConfirmButton: false
								});
								setTimeout(function(){
									window.location.href = 'booking.php';
								}, 2000);
							  </script>";
					//redirectTo('index');
				}
				else {
					$result = flashMessage('Invalid password');
				}
			}
		}
	}
	else {
		if(count($form_errors)==1){
			$result = flashMessage('There was 1 error in the form');
		}
		else {
			$result = flashMessage("There were " .count($form_errors) ." errors in the form <br>");
		}
	}
}
?>	
	
<!-- Main -->
<section id="main" class="wrapper style1">
	<header class="major">
		<h2><strong>The JourneyCoach</strong></h2>
		<p>Travel in style and safely!</p>
	</header>
	
	<div class="container center" style="margin-top: -3%">
		<div class="8u">
			<section>
				<h2><strong>Login here</strong></h2>
			</section>
		</div>
		
		<div>
			<?php if(isset($result)) echo $result; ?>
			<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
		</div>
 
        <form method = "POST" action = "" autocomplete = "off" accept-charset="UTF-8">
			<div class="row">
				<div class="8u">
					<label for="username">Username / Email</label>
					<input placeholder="Enter username / Email" class="form-control form-control-md" name="email" type="email" id="username" autofocus /> 
					<label for="password">Password</label>
					<input placeholder="Enter password" class="form-control form-control-md" name="password" type="password" id="password" autofocus />		
					<br />
					<input class="button special" type="submit" name="signIn"  value="Login">
					<br />
					<p> Don't have an account? <a href="signup.php">Sign Up</a>
				</div>	
			</div>
		</form>
	</div>
</section>
	
	
<?php 
include_once 'config/footer.php'; 
?>
