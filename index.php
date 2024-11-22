<?php 

require_once 'core/dbConfig.php'; 
require_once 'core/models.php'; 

if (!isset($_SESSION['username'])) {
	header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/cd3bff5ff2.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
	<div class="header">
        <h1>Hello, <?php echo ($_SESSION['username']); ?>!</h1>
        <form action="core/handleForms.php" method="GET">
			<button type="submit" name="logoutUserBtn">Logout</button>
		</form>

    </div>
	<div class="container">
		<img class="magnifying" src="assets\sidedesign7.png" alt="">
		<img class="bling" src="assets\sidedesign4.png" alt="">
		<img class="bling1" src="assets\sidedesign1.png" alt="">
		<img class="bling2" src="assets\sidedesign1.png" alt="">
		<img class="bling3" src="assets\sidedesign4.png" alt="">
		<div class="titlecontainer">
			<div class="titletext">
				<h3>Game Developers</h3>
				<p class="titledesc">Get to know the Game Developer Applicants! </p>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
					<input type="text" name="searchInput" placeholder="Search here">
					<button type="submit" name="searchBtn">
						<i class="fa-solid fa-magnifying-glass"></i>
					</button>
				</form>
				<button class="addnew" onclick="window.location.href='insert.php';"><i class="fa-solid fa-user-plus"></i></button>
			</div>
			<div class="titleimage">
				<div class="shape"></div>
				<div class="jinximg">
					<img src="assets\designjinx.png" alt="">
				</div>
				<div class="viimg">
					<img src="assets\designvi.png" alt="">
				</div>
			</div>
		</div>
		<?php if (isset($_SESSION['message'])) { ?>
			<h1 style="color: #424154; text-align: center; background-color: ghostwhite; border-style: solid; padding: 2vh 2vw; width: 30vw; margin: 0 auto;border-radius: 25px">	
				<?php echo $_SESSION['message']; ?>
			</h1>
		<?php } unset($_SESSION['message']); ?>
		
		<div class="holder">
			<h3 class="discover">Discover</h3>
			<button class="clear" onclick="window.location.href='index.php';">Clear</button>
		</div>
		<div class="tablecontainer">
			
			<table>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th class="email">Email</th>
					<th class="phone">Phone Number</th>
					<th>Role</th>
					<th>Years of Experience</th>
					<th>Skills</th>
					<th>Preferred Game Genre</th>
					<th>Date Added</th>
					<th>Action</th>
				</tr>

				<?php if (!isset($_GET['searchBtn'])) { ?>
					<?php $getAllGameDevs = getAllGameDevs($pdo); ?>
						<?php foreach ($getAllGameDevs as $row) { ?>
							<tr>
								<td><?php echo $row['firstname']; ?></td>
								<td><?php echo $row['lastname']; ?></td>
								<td class="email"><?php echo $row['email']; ?></td>
								<td class="phone"><?php echo $row['phonenumber']; ?></td>
								<td><?php echo $row['role']; ?></td>
								<td><?php echo $row['years_of_exp']; ?></td>
								<td><?php echo $row['skills']; ?></td>
								<td><?php echo $row['pref_game_genre']; ?></td>
								<td><?php echo $row['date_added']; ?></td>
								<td style="text-align: center;">
									<a style="color:#5898D3;" href="edit.php?developer_id=<?php echo $row['developer_id']; ?>">Edit</a>
									<a style="color:#D3585A;" href="delete.php?developer_id=<?php echo $row['developer_id']; ?>">Delete</a>
								</td>
							</tr>
					<?php } ?>
					
				<?php } else { ?>
					<?php $searchForAGameDev =  searchForAGameDev($pdo, $_GET['searchInput']); ?>
						<?php foreach ($searchForAGameDev as $row) { ?>
							<tr class="tbody">
								<td><?php echo $row['firstname']; ?></td>
								<td><?php echo $row['lastname']; ?></td>
								<td class="email"><?php echo $row['email']; ?></td>
								<td class="phone"><?php echo $row['phonenumber']; ?></td>
								<td><?php echo $row['role']; ?></td>
								<td><?php echo $row['years_of_exp']; ?></td>
								<td><?php echo $row['skills']; ?></td>
								<td><?php echo $row['pref_game_genre']; ?></td>
								<td><?php echo $row['date_added']; ?></td>
								<td style="text-align: center;">
									<a style="color:#5898D3;" href="edit.php?developer_id=<?php echo $row['developer_id']; ?>">Edit</a>
									<a style="color:#D3585A;" href="delete.php?developer_id=<?php echo $row['developer_id']; ?>">Delete</a>
								</td>
							</tr>
						<?php } ?>
				<?php } ?>	
			</table>
		</div>
		
	</div>
	<img class="console" src="assets\sidedesign2.png" alt="">
</body>
</html>