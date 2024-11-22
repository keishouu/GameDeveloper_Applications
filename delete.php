<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
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
	<img class="top del" src="assets\sidedesign5.png" alt="">
		<img class="bling" src="assets\sidedesign1.png" alt="">
		<img class="bling1" src="assets\sidedesign4.png" alt="">
		<img class="bling2" src="assets\sidedesign1.png" alt="">
		<img class="bling3" src="assets\sidedesign4.png" alt="">
	<h1>Are you sure you want to delete this user?</h1>
	<div class="userdetails">
		<?php $getUserByDeveloper_id = getUserByDeveloper_id($pdo, $_GET['developer_id']); ?>
			<h2>First Name: <?php echo $getUserByDeveloper_id['firstname']; ?></h2>
			<h2>Last Name: <?php echo $getUserByDeveloper_id['lastname']; ?></h2>
			<h2>Email: <?php echo $getUserByDeveloper_id['email']; ?></h2>
			<h2>Phone Number: <?php echo $getUserByDeveloper_id['phonenumber']; ?></h2>
			<h2>Role: <?php echo $getUserByDeveloper_id['role']; ?></h2>
			<h2>years of Experience: <?php echo $getUserByDeveloper_id['years_of_exp']; ?></h2>
			<h2>Skills: <?php echo $getUserByDeveloper_id['skills']; ?></h2>
			<h2>Preferred Game Genre: <?php echo $getUserByDeveloper_id['pref_game_genre']; ?></h2>
		</div>
		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?developer_id=<?php echo $_GET['developer_id']; ?>" method="POST">
				<button class="delete" type="submit" name="deleteGameDevBtn">Delete</button>
			</form>			
		</div>	
		<button class="homebtn" onclick="window.location.href='index.php';"><i class="fa-solid fa-house"></i></button>
	</div>
</body>
</html>