<!DOCTYPE html>
<html>
<head>
    <?php require_once('includes/layouts/head.php'); ?>
</head>
<body>
     <?php require_once('includes/layouts/nav.php'); ?>
     <?php require_once('model/room.php'); ?>
     <?php require_once('model/reservation.php'); ?>
     
     <div class="container" id="main">
		<hr />
		<hr />
		<br /> <br />
		<div class="row">
			<div class="col-sm-4">
				<strong>
				<?php if( isset($_POST['room_code']) ){ ?>Search Results<?php
					$reservation = new Reservation();
					//$result = $reservation->getPoint($_SESSION ['id']);
					$room = new Room();
					$result=$room->getAll();
									} else {
					echo "Please type on top search bar for searching room.";
				}
				?>
                
            </strong>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 feature">
				<div>
					<table class="table table-hover table-bordered table-striped">
						<thead>
					    <?php if( isset($_POST['room_code']) ){ ?>
					    <tr>
							<th>NO.</th>
							<th>Room Code</th>
							<th>Price</th>
							<th>Bed Type</th>
							<th>Booked</th>
							<th>Action</th>
						</tr>
					    <?php } ?>
					    </thead>
						<tbody>
						<?php
						if (isset ( $_POST ['room_code'] )) {
							
							$room_code = $_POST ['room_code'];
							$bed = $_POST ['bed'];
							$booked = $_POST ['booked'];
							
							$room = new Room ();
							$result = $room->query ( $room_code, $bed, $booked );
							
							if ($result->num_rows > 0) {
								$no = 1;
								// output data of each row
								while ( $row = $result->fetch_assoc()) {
									echo "<tr><td>" . $no . "</td>";
									$no++;
									foreach ( $row as $key => $value ) {
										if ($key == 'id') {
											$current_id = $value;
										}
										if ($key == 'booked') {
											$isBooked = $value;
										}
										
																				
										if ($key != 'id' && $key != 'price') {
											echo "<td>" . $value . "</td>";
										}
									}
									if ($isBooked == 'no') {
										echo "<td><a href='reserve_room.php?room_id=" . $current_id . "' > Reserve</a></td>";
									} else {
										echo "<td><a href='controller/checkout_controller.php?room_id=" . $current_id . "' > Checkout</a></td>";
									}
									echo "</tr>";
								}
							} else if ($result->num_rows == 0) {
								echo "0 results";
							}
						}
						?>
	    				</tbody>
					</table>
				</div>
			</div>
		</div>
		<hr>
		
		<div class="row">
			<div class="col-sm-4">
				<strong>
				<?php echo "Current Booking:";?>
            </strong>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 feature">
				<div>
					<table class="table table-hover table-bordered table-striped">
						<thead>
					    <tr>
							<th>NO.</th>
							<th>Room Code</th>
							<th>Original Price</th>
							<th>Bed Type</th>
							<th>Checkin date</th>
							<th>Checkout date</th>
							<th>Reservation date</th>
							<th>Action</th>
						</tr>
					    </thead>
						<tbody>
						<?php
						$reservation = new Reservation ();
						$result = $reservation->querycurrent ( $_SESSION ['id'] );
						
						if ($result->num_rows > 0) {
							$no = 1;
							// output data of each row
							while ( $row = $result->fetch_assoc()) {
								echo "<tr><td>" . $no . "</td>";
								$no++;
								foreach ( $row as $key => $value ) {
									if ($key == 'price') {
										echo "<td>$" . $value. "</td>";

									}
									if ($key != 'id' && $key != 'price') {
										echo "<td>" . $value . "</td>";
									}
								}
								echo "<td>Contact to make change</td>";
								echo "</tr>";
							}
						} else if ($result->num_rows == 0) {
							echo "0 results";
						}
						?>
	    				</tbody>
					</table>
				</div>
			</div>
		</div>
		
		<br>
		<hr>
		
		<div class="row">
			<div class="col-sm-4">
				<strong>
				<?php echo "Booking History:";?>
            </strong>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 feature">
				<div>
					<table class="table table-hover table-bordered table-striped">
						<thead>
					    <tr>
							<th>NO.</th>
							<th>Room Code</th>
							<th>Original Price</th>
							<th>Bed Type</th>
							<th>Checkin date</th>
							<th>Checkout date</th>
							<th>Reservation date</th>
						</tr>
					    </thead>
						<tbody>
						<?php
						$reservation = new Reservation ();
						$result = $reservation->query ( $_SESSION ['id'] );
						
						if ($result->num_rows > 0) {
							$no = 1;
							// output data of each row
							while ( $row = $result->fetch_assoc()) {
								echo "<tr><td>" . $no . "</td>";
								$no++;
								foreach ( $row as $key => $value ) {
									if ($key == 'price') {
										echo "<td>$" . $value. "</td>";
									}
									if ($key != 'id' && $key != 'price') {
										echo "<td>" . $value . "</td>";
									}
								}
								echo "</tr>";
							}
						} else if ($result->num_rows == 0) {
							echo "0 results";
						}
						?>
	    				</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
      <?php require_once("includes/layouts/bottom.php"); ?>
</body>
</html>