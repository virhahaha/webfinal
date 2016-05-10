<!DOCTYPE html>
<html>
<head>
    <?php require_once('includes/layouts/head.php'); ?>
</head>
<body>
     <?php require_once('includes/layouts/nav.php'); ?>
		<div class="container">
		<div class=" col-6 panel panel-default" id="panel">
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-6" class="">
						<strong>Reservation deatil:</strong>
					</div>
					<div class="col-sm-4"></div>
				</div>
				<br />
				<div class="row">
					<form class="form-horizontal" action="controller/reservation_controller.php" method="post">

						<input type="hidden" name="room_id"
							value="<?php echo $_GET['room_id']; ?>" />

						<div class="form-group">

							<label class="col-lg-4 control-label" for="name">Name: </label>
							<div class="col-lg-4">
								<input class="form-control" name="name" id="name"
									placeholder="full name" type="text">
							</div>
						</div>

						<div class="form-group">

							<label class="col-lg-4 control-label" for="address">Address: </label>
							<div class="col-lg-4">
								<input class="form-control" name="address" id="address"
									placeholder="address" type="text">
							</div>
						</div>
						<div class="form-group">

							<label class="col-lg-4 control-label" for="contact">Contact: </label>
							<div class="col-lg-4">
								<input class="form-control" name="contact" id="contact"
									placeholder="contact" type="text">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-4 control-label" for="checkin_date">Check-In Date: </label>
							<div class="col-lg-4">
								<input class="form-control" name="checkin_date"
									id="checkin_date" placeholder="Check-In Date" type="date">
							</div>
						</div>

						<div class="form-group">

							<label class="col-lg-4 control-label" for="checkout_date">Check-Out Date: </label>
							<div class="col-lg-4">
								<input class="form-control" name="checkout_date"
									id="checkout_date" placeholder="Check-Out Date:" type="date">
							</div>
						</div>
						<div class="form-group">

							<label class="col-lg-4 control-label" for="reservation_date">Reservation Date: </label>
							<div class="col-lg-4">
								<input class="form-control" name="reservation_date"
									id="reservation_date" placeholder="Reservation Date"
									type="date">
							</div>
						</div>
						<label class="col-lg-4"></label>
						<div class="col-lg-8">
							<button type="submit" class="btn btn-primary" value="Reserve">Reserve</button>
							<a href="index.html" target="_blank"><button
									class="btn btn-danger" data-dismiss="modal" type="reset">Reset</button></a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	     <?php require_once("includes/layouts/bottom.php"); ?>
	</body>

</html>
