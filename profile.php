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
		<br />
        <br />

		<div class="row">
			<div class="col-sm-12">
				<hr />
				<br />
				<div>
			      <?php
					$user = new User ();
					$result = $user->getByID ( $_SESSION ['id'] );
					
					$key_array = array (
							"name" => "Name:",
							"contact" => "Contact:",
							"address" => "Address:",
							"username" => "Username:",
							"type" => "Type:",
							"email" => "Email:" 
					);
					
					if ($result->num_rows > 0) {
						// output data of each row
						while ( $row = $result->fetch_assoc()) {
							foreach ( $row as $key => $value ) {
								if ($key != 'id' && $key != 'password') {
									echo "<div>" . $key_array [$key] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $value . "</div>";
								}
							}
							echo "</tr>";
						}
					} else {
						echo "0 results";
					}
				?>
              </div>
			</div>
		</div>
		<br>
		<hr>
	</div>
      <?php require_once("includes/layouts/bottom.php"); ?>
</body>
</html>