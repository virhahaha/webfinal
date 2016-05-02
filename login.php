<!DOCTYPE html>
<html>
<head>
    <!-- require header.php-->  
</head>

<body>
    <!-- require page head: navigation.php (hotel reversesation, login/logout logol)--> 
	<div class="container">
    	    <div class="login_page" id="sumbit">
		<div class="submit-body">
		    <div class="row">
			<form class="form-horizontal" action="controller/login_controller.php"  method="post">
			      
			    <div class="submitForm">
				<label class="login formLabel" for="username"> User name: </label>
				<div class="login">
				    <input class="user_input" name="username" id="username" placeholder="username" type="text">
				</div>
			    </div>
					    
			    <div class="submitForm">
				<label class="login formLabel" for="password"> Password: </label>
				<div class="login">
				    <input class="pw_input" name="password" id="password" placeholder="Password" type="password">
				</div>
			    </div>
			    
			    <label class="login"></label>
			    <div class="submitForm">
				<button type="submit" class="btn btn-primary" name="submit" value="submit"> Sign in </button>
				<button type="submit" class="btn btn-primary" name="register" value="register"> Register </button>
				<button type="reset" class="btn btn-danger"> Reset </button>
			    </div>
			</form>
		    </div>
	        </div>
            </div>
	</div>
    <!-- require page footer.php--> 
</body>	
</html>
