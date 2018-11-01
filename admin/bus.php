<?php 
$page_title = 'ADMIN - Manage Bus Schedules';
include_once 'config/header.php';

try {
	//check user exist in the database
	$sqlQuery = "SELECT * FROM buses";
	$stm = $db->prepare($sqlQuery);
	$stm->execute();
} catch (PDOException $ex) {
	$result = flashMessage("An error occured: ".$ex->getMessage());
}

?>
	
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8">
                    <h1 class="page-header">Buses</h1>
                </div>
				<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <a href="new-bus.php" class="page-header btn btn-primary btn-lg">
                        New Bus
                    </a>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of buses and their details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Bus Id</th>
                                        <th>Plate Number</th>
										<th>Bus Type</th>
										<th>No. of Seats</th>
                                        <th>Details</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
									while($row = $stm->fetch()){
										$id = $row['bus_id'];
										$plate = $row['bus_plate'];
										$seats = $row['bus_seats'];
										$type = $row['bus_type'];
										$details = $row['bus_details'];
										?>
										
										<tr class="odd gradeX">
											<td class="center"><?php echo $id ?></td>
											<td><?php echo $plate ?></td>
											<td><?php echo $type ?></td>
											<td class="center"><?php echo $seats ?></td>
											<td><?php echo $details ?></td>
											<td class="center">
												<!-- edit button -->
												<a href="#" type="button" class="btn btn-success btn-circle" title="Edit bus">
													<i class="fa fa-check"></i>
												</a>
												<!-- delete button -->
												<a href="#" type="button" class="btn btn-danger btn-circle" title="Delete Bus">
													<i class="fa fa-times"></i>
												</a>
											</td>
										</tr>
									<?php
									}
									?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <p>Muko saa fou</p>
                            </div>
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
