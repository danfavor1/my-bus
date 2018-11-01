<?php 
$page_title = 'ADMIN - Manage Bus Schedules';
include_once 'config/header.php';

// processing of signup
if(isset($_POST['btnNewBus'])){
	
	$form_errors = array(); //initialize array
	
	//field validation
	$required_fields = array('plate', 'seats', 'type');
	//call function to check empty fields & merge return data into $form_errors
	$form_errors = array_merge($form_errors, check_empty_fields($required_fields));
	
	//collect form data into variable
	$plate=$_POST['plate'];
	$seats=$_POST['seats'];
	$type=$_POST['type'];
	$details=$_POST['details'];
	
	//check error array is empty
	if (empty($form_errors)){
		try {
			$sqlinsert = 'INSERT INTO buses (bus_plate, bus_seats, bus_type, bus_details) 
					VALUES (:plate, :seats, :type, :details)';
			//PDO prepared statement: sanitize data		
			$stm = $db->prepare($sqlinsert);
			$stm->execute(array(':plate'=>$plate, ':seats'=>$seats, ':type'=>$type, ':details'=>$details)); //insert data into table
			
			//Check input was succesful: One raw created
			if($stm->rowCount()==1){
				//call sweet alert
				echo $welcome="<script type=\"text/javascript\">
								swal({
								  title: \"Success!\",
								  text: \"New bus added to the database\",
								  type: 'success',
								  timer: 3000,
								  showConfirmButton: false
								});
								setTimeout(function(){
									window.location.href = 'bus.php';
								}, 2000);
							  </script>";
				//redirectTo('index');
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
	
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
                    <h1 class="page-header">Register New Bus</h1>
                </div>
				<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <!-- Button trigger modal -->
                    <a href="bus.php" class="page-header btn btn-primary btn-lg">
                        Go Back
                    </a>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row"><br>
				<div class="col-lg-11">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            List of buses and their details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<!-- Form errors -->
							<div>
								<?php if(isset($result)) echo $result; ?>
								<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
							</div>
							
							<!-- Form to insert new bus -->
							<form action="" method="post">
									
									<div class="form-group">
										<label>Bus Plate Number</label>
										<input type="text" name="plate" class="form-control" placeholder="Enter plate number">
									</div>
									<div class="form-group">
										<label>Number of Seats</label>
										<input type="number" name="seats" class="form-control" placeholder="Enter number of seats">
									</div>
									<div class="form-group">
										<label>Bus Type</label>
										<select class="form-control" name="type">
											<option value="">Select Bus Type</option>
											<option value="Coach">Coach</option>
											<option value="Mini Bus">Mini Bus</option>
											<option value="Other type">Other</option>
										</select>
									</div>
									<div class="form-group">
										<label>Other Details</label>
										<textarea name="details" class="form-control" rows="3" placeholder="Enter other details: e.g. color, year of manufacturing, model..."></textarea>
									</div>
								
									<div class="modal-footer">
										<button type="submit" name="btnNewBus" class="btn btn-primary">Save Bus</button>
									</div>
							</form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
			</div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->
		
<?php 
include_once 'config/footer.php';
?>
