<!doctype html>

<head>
	<!-- Basics -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Login Tatuis</title>
	<!-- CSS -->
	<link rel="stylesheet" href="assets/login/css/reset.css">
	<link rel="stylesheet" href="assets/login/css/animate.css">
	<link rel="stylesheet" href="assets/login/css/styles.css">
</head>
<!-- Main HTML -->
<body>
<!-- Begin Page Content -->
	<div id="container">
		<img src="assets/login/img/text.png" style="margin-top:-60px;position:absolute;margin-left:70px;">
		<div id="a"></div>
		<div id="b">
			<form action="proses.php" method="post">
				<label for="name">Username:</label>
				<input type="name" name="username">
				<label for="username">Password:</label>
				<input type="password" name="password">
				<div id="lower">
					<input type="checkbox"><label class="check" for="checkbox">
						Keep me logged in
					</label>
					<input type="submit" value="Login" name="submit">
				</div>
			</form>
		</div>
		
	</div>
<!-- End Page Content -->
</body>

</html>
	
	
	
	
	
		
	