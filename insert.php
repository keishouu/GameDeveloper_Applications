<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="userstyle.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/cd3bff5ff2.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
	<img class="top console" src="assets\sidedesign2.png" alt="">
		<img class="bling" src="assets\sidedesign1.png" alt="">
		<img class="bling1" src="assets\sidedesign4.png" alt="">
		<img class="bling2" src="assets\sidedesign1.png" alt="">
		<img class="bling3" src="assets\sidedesign4.png" alt="">
	<h1>Insert New Game Developer!</h1>
	<form action="core/handleForms.php" method="POST">
        <div class="formsections">
			<div class="formone">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstname">
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastname">
		</p>
		<p>
			<label for="email">Email</label> 
			<input type="text" name="email">
		</p>
		<p>
			<label for="phoneNumber">Phone Number</label> 
			<input type="text" name="phonenumber">
		</p>
		</div>
		<div class="formtwo">
		<p>
			<label for="role">Role</label> 
			<input type="text" name="role">
		</p>
		<p>
			<label for="years_of_exp">Years of Experience</label> 
			<input type="text" name="years_of_exp">
		</p>
		<p>
			<label for="skills">Skills</label> 
			<input type="text" name="skills">
		</p>
		<p>
			<label for="pref_game_genre">Preferred Game Genre</label> 
			<input type="text" name="pref_game_genre">
			
		</p>
		</div>
		<button class="submit" type="submit" name="insertGameDevBtn">Save</button>
		</div>
	</form>
	<button class="homebtn" onclick="window.location.href='index.php';"><i class="fa-solid fa-house"></i></button>
	</div>
</body>
</html>