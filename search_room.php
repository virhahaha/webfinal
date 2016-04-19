<!DOCTYPE html>
<html>
<body>
		<?php if( isset($_POST['room_code']) ){
				} else {
					echo "Please type on top search bar for searching room.";
				}
				?>
		  
		  <?php if( isset($_POST['room_code']) ){ ?>
					    <tr>
							<th>NO.</th>
							<th>Room Code</th>
							<th>Price</th>
							<th>Bed Type</th>
							<th>Booked</th>
							<th>Action</th>
						</tr>
					    
						
		  <?php if (isset ( $_POST ['room_code'] )) {
							
							$room_code = $_POST ['room_code'];
							$bed = $_POST ['bed'];
							$booked = $_POST ['booked'];
							
							$room = new Room ();
							$result = $room->query ( $room_code, $bed, $booked );
							
							if ($result->num_rows > 0) {
								$sno = 1;
								// output data of each row
								while ( $row = $result->fetch_assoc () ) {
									echo "<tr><td>" . $sno . "</td>";
									$sno ++;
									foreach ( $row as $key => $value ) {
										if ($key == 'id') {
											$current_id = $value;
										}
										if ($key == 'booked') {
											$isBooked = $value;
										}
										
										if ($key != 'id') {
											echo "<td>" . $value . "</td>";
										}
									}
									if ($isBooked == 'no') {
										echo "<td><a href='reserve_room.php?room_id=" . $current_id . "' > Reserve</a></td>";
									} else {
										echo "<td><a href='checkout_room.php?room_id=" . $current_id . "' > Check-Out</a></td>";
									}
									echo "</tr>";
								}
							} else if ($result->num_rows == 0) {
								echo "0 results";
							}
						}
						?>
	 </body>
</html>