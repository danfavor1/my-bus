<?php 
$page_title = 'HOME - Bus Ticket';
include_once 'config/header.php';
?>
	
<section id="banner">
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
						<div class="booking-cta"><p></p>
						<p><hr/></p>
							<h1>Welcome to The JourneyCoach!</h1>
							<p>We are the best bus travel agency. Book your ticket now, our satisfaction comes after yours...
							</p><hr />
						</div>
					</div>
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
							<form>
								<div class="form-group">
									<span class="form-label">Your Destination:</span>
									<input class="form-control" type="text" placeholder="Enter your destination here">
								</div>
								<div class="form-group">
											<span class="form-label">Departure day:</span>
											<input class="form-control" type="date" required>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<span class="form-label">Sits:</span>
											<select class="form-control">
												<option>0</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<span class="form-label">Adults:</span>
											<select class="form-control">
												<option>0</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<span class="form-label">Children:</span>
											<select class="form-control">
												<option>0</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
								</div>
								<div class="form-btn">
									<button class="submit-btn">Check tickets availability</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
			
<!-- One -->
<section id="one" class="wrapper style1">
		<header class="major">
			<h2><strong>Our Services</strong></h2><br />
			<p>Travel in style and safely!</p>
		</header>
		<div class="container">
					<div class="row">
						<div class="4u">
							<section class="special box")>
								<i class="icon fa-area-chart major"></i>
								<h3>Booking service</h3>
								<a href="services.php" class="button special">Read more</a>
							</section>
						</div>
						<div class="4u">
							<section class="special box">
								<i class="icon fa-refresh major"></i>
								<h3>Payment service</h3>
								<a href="services.php" class="button special">Read more</a>
							</section>
						</div>
						<div class="4u">
							<section class="special box">
								<i class="icon fa-cog major"></i>
								<h3>Hotel service</h3>
								<a href="services.php" class="button special">Read more</a>
							</section>
						</div>
					</div>
		</div>
</section>
			
<!-- Two -->
<section id="two" class="wrapper style2">
		<header class="major">
			<h2>The JourneyCoach</h2><br />
			<p>Travel in style and safely!</p>
		</header>
		<div class="container">
					<div class="row">
						<div class="6u">
							<section class="special">
								<a href="#" class="image fit"><img src="assets/images/int.jpg" alt="" /></a>
								<h3>Interior View</h3>
								
								<ul class="actions">
									
								</ul>
							</section>
						</div>
						<div class="6u">
							<section class="special">
								<a href="#" class="image fit"><img src="assets/images/ext.jpg" alt="" /></a>
								<h3>Exterior View</h3>
								
								<ul class="actions">
									
								</ul>
							</section>
						</div>
					</div>
		</div>
</section>
		
<?php 
include_once 'config/footer.php';
?>
