<!DOCTYPE html>
<html>
<body>
         <div class="1" >
	    <br />
         <br />

		<div class="row">
			<div class="2">
			
				<br />
			
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
						while ( $row = $result->fetch_assoc () ) {
							foreach ( $row as $key => $value ) {
								if ($key != 'id' && $key != 'password') {
									echo "<div>" . $key_array [$key] .  
 $value . "</div>";
								}
							}
							echo "</tr>";
						}
					} 
				?>
			</div>
		</div>
		<br/>
	
	</div>
      </body>
</html>