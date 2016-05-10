<!DOCTYPE html>
<html>
<head>
    <?php require_once('includes/layouts/head.php'); ?>
</head>

<body>
     <?php require_once('includes/layouts/nav.php') ?>
		<div class="container">
		    <div class=" col-6 panel panel-default" id="panel">
		    <div class="panel-body">
		    <div class="row">
					<form class="form-horizontal" action="controller/login_controller.php"  method="post">
				  
				    <div class="form-group">
					    <label class="col-lg-4 control-label" for="username">User name: </label>
					 	 <div class="col-lg-4">
						<input class="form-control" name="username" id="username" placeholder="username" type="text">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-4 control-label" for="password">Password: </label>
						<div class="col-lg-4">
						<input class="form-control" name="password" id="password" placeholder="Password" type="password">
					    </div>
					</div>
					
					<label class="col-lg-4"></label>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="submit" value="submit">Sign in</button>
						<button type="submit" class="btn btn-primary" name="register" value="register">Register</button>
						<button type="reset" class="btn btn-danger">Reset</button></a>
				    </div>
		            </form>
	        </div>
	        </div>
            </div>
		</div>
	    <?php require_once("includes/layouts/bottom.php"); ?>
	</body>
	
</html>
