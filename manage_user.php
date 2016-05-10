<!DOCTYPE html>
<html>
<head>
    <?php require_once('includes/layouts/head.php'); ?>
</head>
<body>
     <?php require_once('includes/layouts/nav.php'); ?>
     <?php require_once('model/user.php'); ?>
    <div class="container" id="main">
		<hr />
		<hr />
		<br /> <br />

		<div class="row">
			<div class="col-sm-12">
				<hr />
				<br />
				<strong>User Management</strong>
				<br />
				<br />
				<div>
					<table class="table table-hover table-bordered table-striped">
						<thead>
							<tr>
								<th>NO.</th>
								<th>Name</th>
								<th>Contact</th>
								<th>Address</th>
								<th>User name</th>
								<th>Type</th>
								<th>Email</th>
							</tr>
						</thead>
						<tbody>
						    <?php
								$user = new User ();
								$result = $user->getAll ();
								
								if ($result->num_rows > 0) {
									$no = 1;
									// output data of each row
									while ( $row = $result->fetch_assoc () ) {
										echo "<tr><td>" . $no . "</td>";
										$no ++;
										foreach ( $row as $key => $value ) {
											if ($key == 'id') {
												$current_id = $value;
											}
											if ($key != 'password' && $key != 'id') {
												echo "<td>" . $value . "</td>";
											}
										}
									}
								} else {
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