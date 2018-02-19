<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	 crossorigin="anonymous">
	<script src="https://yastatic.net/jquery/1.6.4/jquery.min.js"></script>
</head>

<body>
	<?php
		include('session.php');
		if ($_SESSION["is_auth"]) {
    ?>
		<div class="container-fluid">
			<div class="row">
				<form class="col-md-12" id="log_out" method="POST">
					<label class="label label-success col-md-10">Добро пожаловать: <?php echo $_SESSION["login"] ?></label>
					<button class="btn btn-link col-md-1" name="log_out">Log Out</button>
				</form>
			</div>
			<div class="row">
				<div class="col">
					<form class="form-group" method="POST" action="">
						<div class="input-group input-group-lg">
							<label class=" input-group-text">ID</label>
							<div class="col-md-auto">
								<input class="form-control" type="text" id="id" name="id">
							</div>
						</div>
						<div class="input-group input-group-lg">
							<label class=" input-group-text">First Name</label>
							<div class="col-md-auto">
								<input class="form-control  " type="text" id="first_name" name="first_name">
							</div>
						</div>
						<div class="input-group input-group-lg">
							<label class=" input-group-text">Second Name</label>
							<div class="col-md-auto">
								<input class="form-control  " type="text" id="second_name" name="second_name">
							</div>
						</div>
						<div class="input-group input-group-lg">
							<label class=" input-group-text">Age</label>
							<div class="col-md-auto">
								<input class="form-control  " type="text" id="age" name="age">
							</div>
						</div>
						<div class="input-group input-group-lg">
							<label class=" input-group-text">Date of Birthday</label>
							<div class="col-md-auto">
								<input class="form-control  " type="text" id="date_of_birth" name="date_of_birth">
							</div>
						</div>
						<input class="form-control text-success" id="status" value="Status" disabled>
					</form>
					<div>
						<button class="btn btn-success " id="create">Добавить</button>
						<button class="btn btn-warning " id="update">Редактировать</button>
						<button class="btn btn-danger " id="delete">Удалить</button>
					</div>
				</div>
				<div class="col pre-scrollable col">
					<table class="table table-bordered table-striped header" id="myTable">
						<thead>
						</thead>
					</table>
				</div>
			</div>
		</div>
		<?php
			} else {
		?>
			<div class="container-fluid">
				<div class="row-col-md-offset-3 sign_in_up">
					<div class="col-md-offset-3 col-md-6">
						<form class="form-horizontal sign_in" id="sign_in" method="POST">
							<h1><span class="badge col-md-12">Sign In</span><br></h1>
							<input type="login" class="form-control label" name="inputLogin" id="inputLogin" placeholder="Login">
							<input type="password" class="form-control label" name="inputPassword" id="inputPassword" placeholder="Password">
							<button class="btn btn-primary col-md-12" name="sign_in">Sign In</button>
							<p>Not registered? <a href="#toregister">Sign Up</a> now!</p>
						</form>
					</div>
				</div>
				<div class="row-col-md-offset-3 sign_in_up">
					<div class="col-md-offset-3 col-md-6">
						<form class="form-horizontal sign_up" id="sign_up" method="POST">
							<h1><span class="badge col-md-12">Sign Up</span><br></h1>
							<input type="login" class="form-control label" name="inputLogin" id="inputLogin" placeholder="Login">
							<input type="email" class="form-control label" name="inputEmail" id="inputEmail" placeholder="Email">
							<input type="password" class="form-control label" name="inputPassword" id="inputPassword" placeholder="Password">
							<button class="btn btn-primary col-md-12" name="sign_up">Sign Up</button>
							<p>Already registered? <a href="#tologin">Sign In!</a></p>
						</form>
					</div>
					
				</div>
			</div>
			<?php
				}
			?>
			<div class="w-auto0"></div>
			<script type="text/javascript" src="main.js"></script>
	</body>

</html>