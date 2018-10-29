<?php
include_once "config/session.php";
include_once 'config/database.php';
include_once 'config/functions.php';

if(isset($_SESSION['username'])){
	$sqlQuery = "SELECT * FROM users WHERE usr_email = :uname";
	$stm = $db->prepare($sqlQuery);
	$stm->execute(array(':uname' => $_SESSION['username']));
	while($row = $stm->fetch()){
		$name = $row['usr_fullname'];
	}
}
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title><?php if(isset($page_title)) echo $page_title; ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		
		
		<!-- style sheets -->
		<link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/skel.css" />
		<link rel="stylesheet" href="assets/css/style-xlarge.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="stylesheet" href="assets/css/style2.css" />
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
		
		<!-- SweetAlert -->
		<script src="assets/js/sweetalert.min.js"></script>
		<link href="assets/css/sweetalert.css" rel="stylesheet">
	</head>
	<body id="top">		
			<header id="header" class="skel-layers-fixed">
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="aboutUs.php">About Us</a></li>
						<li><a href="services.php">Services</a></li>
						<li><a href="booking.php">Book</a></li>
						<li><a href="contactUs.php">Contact Us</a></li>
						
						<?php if(!isset($_SESSION['username'])): ?>
							<li><a href="signup.php" class="button special">Sign Up</a></li>
							<li><a href="signin.php" class="button special">Login</a></li>
						<?php else: ?>
							<li><b><?php echo $name; ?></b></li>
							<li><a href="signout.php" class="button special">Sign Out</a></li>
						<?php endif ?>
					</ul>
				</nav>
			</header>

