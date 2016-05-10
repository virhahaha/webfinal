<!DOCTYPE html>
<html>
<head>
    <?php require_once('includes/layouts/head.php'); ?>
</head>
<body>
     <?php require_once('includes/layouts/nav.php'); ?>
     <?php require_once('model/room.php'); ?>
    <div class="container" id="main">

		<hr />
		<hr />
		<br /> <br />

		<div class="row">
			<div class="col-sm-12">
				<hr />
				<br />
				<strong>Room Management</strong>
				<br />
				<br />
				<div>
					<table class="table table-hover table-bordered table-striped">
						<thead>
							<tr>
								<th>NO.</th>
								<th>Room Code</th>
								<th>Price</th>
								<th>Bed Type</th>
								<th>Booked</th>
								<th>Action</th>
							</tr>

						</thead>
						<tbody>
      					<?php
							$room = new Room ();
							$result = $room->getAll ();
							
							if ($result->num_rows > 0) {
								$no = 1;
								// output data of each row
								while ( $row = $result->fetch_assoc () ) {
									echo "<tr><td>" . $no . "</td>";
									$no++;
									foreach ( $row as $key => $value ) {
										if ($key == 'id') {
											$current_id = $value;
										}
										if ($key == 'booked') {
											$isBooked = $value;
										}
										if ($key == 'price') {
											echo "<td>$" . $value. "</td>";
										}
										
										if ($key != 'id' && $key != 'price') {
											echo "<td>" . $value . "</td>";
										}
									}
									if ($isBooked == 'no') {
										echo "<td><a href='reserve_room.php?room_id=" . $current_id . "' > Reserve</a></td>";
									} else {
										echo "<td><a href='controller/checkout_controller.php?room_id=" . $current_id . "' > Cancel</a></td>";
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
		<br>
		<hr>
	</div>
      <?php require_once("includes/layouts/bottom.php"); ?>
</body>
</html>