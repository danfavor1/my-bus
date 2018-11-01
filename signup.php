<?php 
$page_title = 'Sign Up - Bus Ticket';
include_once 'config/header.php';

// processing of signup
if(isset($_POST['signUp'])){
	
	$form_errors = array(); //initialize array
	
	//field validation
	$required_fields = array('name', 'email', 'password');
	//call function to check empty fields & merge return data into $form_errors
	$form_errors = array_merge($form_errors, check_empty_fields($required_fields));
	
	//check for minimum length
	$fields_to_check_length = array('email' => 4, 'password' => 4);
	//call function to check min lenght
	$form_errors = array_merge($form_errors, check_min_lenght($fields_to_check_length));
	
	// email validation
	// $form_errors = array_merge($form_errors, check_mail($_POST[]));
	
	
	//collect form data into variable
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pass=$_POST['password'];
	
	//check email is available
	if(checkDuplicateEntries('users', 'email', $email, $db)){
		$result = flashMessage('Email already in use, please try another email address');
	}
		
	//check error array is empty
	else if (empty($form_errors)){
		//hashing password
		$hash_pass = password_hash($pass, PASSWORD_DEFAULT);

		try {
			$sqlinsert = 'INSERT INTO users (usr_fullname, usr_email, usr_pass) 
					VALUES (:name, :email, :pass)';
			//PDO prepared statement: sanitize data		
			$stm = $db->prepare($sqlinsert);
			$stm->execute(array(':name'=>$name, ':email'=>$email, ':pass'=>$hash_pass)); //insert data into table
			
			//Check input was succesful: One raw created
			if($stm->rowCount()==1){
				//call sweet alert
				echo $result="<script type=\"text/javascript\">
							swal({
							  title: \"Congratulations $name!\",
							  text: \"Registration Completed Successfully\",
							  type: 'success',
							  confirmButtonText: \"Thank You!\"
							}, function() {
								window.location.href = 'signin.php';
							});
						  </script>";
				//$result = flashMessage("Registration Successful", "Pass");
				// redirectTo('signin');
			}			
		} catch (PDOException $ex) {
			$result = flashMessage("An error occured: ".$ex->getMessage());
		}
	}
	else {
		if(count($form_errors)==1){
			$result = flashMessage('There was 1 error in the form <br>');
		}
		else {
			$result = flashMessage('There were ' .count($form_errors) .' errors in the form <br>');
		}
	}
}
?>
<!-- Main -->
<section id="main" class="wrapper style1">
	<!--<header class="major">
		<h2><strong>The JourneyCoach</strong></h2>
		<p>Travel in style and safely!</p>
	</header>-->
	
	<div class="container center" style="margin-top: -5%">
		<div class="8u">
			<section>
				<h2><strong>Sign Up Here</strong></h2>
			</section>
		</div>	
 
		<div>
			<?php if(isset($result)) echo $result; ?>
			<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
		</div>
		
		<form method = "POST" action = "" autocomplete = "off" accept-charset="UTF-8">
			<div class="row">
				<div class="8u">
					<label for="Name">Name</label>
					<input placeholder="Enter Full Names" class="form-control form-control-md" name="name" type="text" id="Name" required autofocus /><br>
					<label for="Username">Username / Email</label>
					<input placeholder="Enter Email" class="form-control form-control-md" name="email" type="text" id="username" required autofocus /><br>
					<label for="password">Password</label>
					<input placeholder="Enter password" class="form-control form-control-md" name="password" type="password" id="password" required autofocus /><br>	
					<label for="confirm_password">Confirm Password</label>
					<input placeholder="Enter password" class="form-control form-control-md" name="password2" type="password" id="password" required autofocus />				
					<br />
					<input class="button special" type="submit" name="signUp"  value="Sign Up">
				</div>
			</div>
		</form>
	</div>
</section>
	
<?php 
include_once 'config/footer.php'; 
?>
