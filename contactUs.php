<?php 
$page_title = 'HOME - Bus Ticket';
include_once 'config/header.php';
?>

<!-- Main -->
<section id="main" class="wrapper style1" style="margin-top: -5%">
	<header class="major">
		<h2><strong>The JourneyCoach</strong></h2>
		<p>Travel in style and safely!</p>
	</header>
	<div class="container center">
		<div class="8u" style="margin-top: -3%">
			<section>
				<h2><strong>Contact Us</strong></h2>
			</section>
		</div>	
 
        <form method = "POST" action = "" autocomplete = "off" accept-charset="UTF-8">
		   <div class="row">
			<div class="8u">
				<label for="fullName">Full Name</label>
				<input placeholder="Enter your Full Name" class="form-control form-control-md" name="fullName" type="text" id="fullName" required autofocus />
				<label for="email">Email Address</label>
				<input placeholder="Enter your email" class="form-control form-control-md" name="email" type="email" id="email" required />
				<label for="subject">Subject</label>
				<input placeholder="Enter the subject" class="form-control form-control-md" name="subject" type="text" id="subject" required />
				<label for="message">Message</label>
				<textarea placeholder="Enter the message" class="form-control form-control-md" name="message" id="subject" required style="height:170px" ></textarea><br />
				<input class="button special" type="submit" name="submitmessage"  value="Submit Message">
			</div>	
			<div class="4u">
				<h3><strong>Quick contacts:</strong></h3>
				<p>Phone:Phone: (+254) (0)703-034000<br />
                   E-mail:TheJourneycoach@gmail.com<br />
				   
				   <hr /><br />
			   <h3><strong>Headquater:</strong></h3>
				Company Inc, <br />
				Nairobi,Nairobi CBD <br />
				55501 Nairobi, Ka<br />
				Phone: (+254) (0)703-034300<br />
				Email:MainNairobi@gmail.com<br />
				<hr />
			</div>
		  </div>
		</form>
	</div>
</section>	


<?php 
include_once 'config/footer.php';
?>
