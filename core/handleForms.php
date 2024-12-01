<?php  

require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertNewUserBtn'])) {
	$username = trim($_POST['username']);
	$firstname = trim($_POST['firstname']);
	$lastname = trim($_POST['lastname']);
	$password = trim($_POST['password']);
	$confirm_password = trim($_POST['confirm_password']);

	if (!empty($username) && !empty($firstname) && !empty($lastname) && 
		!empty($password) && !empty($confirm_password)) {

		if ($password == $confirm_password) {

			$insertQuery = insertNewUser($pdo, $username, $firstname, $lastname, 
				password_hash($password, PASSWORD_DEFAULT));

			if ($insertQuery['status'] == '200') {
				$_SESSION['message'] = $insertQuery['message'];
				$_SESSION['status'] = $insertQuery['status'];
				header("Location: ../login.php");
			}

			else {
				$_SESSION['message'] = $insertQuery['message'];
				$_SESSION['status'] = $insertQuery['status'];
				header("Location: ../register.php");
			}

		}
		else {
			$_SESSION['message'] = "Please make sure both passwords are equal";
			$_SESSION['status'] = "400";
			header("Location: ../register.php");
		}

	}

	else {
		$_SESSION['message'] = "Please make sure there are no empty input fields";
		$_SESSION['status'] = "400";
		header("Location: ../register.php");
	}
}

if (isset($_POST['loginUserBtn'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if (!empty($username) && !empty($password)) {

		$loginQuery = checkIfUserExists($pdo, $username);

		if ($loginQuery['status'] == '200') {
			$usernameFromDB = $loginQuery['userInfoArray']['username'];
			$passwordFromDB = $loginQuery['userInfoArray']['password'];

			if (password_verify($password, $passwordFromDB)) {
				$_SESSION['username'] = $usernameFromDB;
				header("Location: ../index.php");
			}
		}

		else {
			$_SESSION['message'] = $loginQuery['message'];
			$_SESSION['status'] = $loginQuery['status'];
			header("Location: ../login.php");
		}
	}

	else {
		$_SESSION['message'] = "Please make sure no input fields are empty";
		$_SESSION['status'] = "400";
		header("Location: ../login.php");
	}
}

if (isset($_GET['logoutUserBtn'])) {
	unset($_SESSION['username']);
	header("Location: ../login.php");
}



if (isset($_POST['insertGameDevBtn'])) {
    $created_by = $_SESSION['username'];
    $insertUser = insertNewGameDev(
        $pdo, $_POST['firstname'], $_POST['lastname'], $_POST['email'], 
        $_POST['phonenumber'], $_POST['role'], $_POST['years_of_exp'], 
        $_POST['skills'], $_POST['pref_game_genre'], $created_by
    );

    if ($insertUser) {
        $_SESSION['message'] = "Successfully inserted!";
        header("Location: ../index.php");
    }
}



if (isset($_POST['editGameDevBtn'])) {
    $updated_by = $_SESSION['username'];
    $editUser = editGameDev(
        $pdo, $_POST['firstname'], $_POST['lastname'], $_POST['email'], 
        $_POST['phonenumber'], $_POST['role'], $_POST['years_of_exp'], 
        $_POST['skills'], $_POST['pref_game_genre'], $_GET['developer_id'], $updated_by
    );

    if ($editUser) {
        $_SESSION['message'] = "Successfully edited!";
        header("Location: ../index.php");
    }
}


if (isset($_POST['deleteGameDevBtn'])) {
	$deleteUser = deleteGameDev($pdo,$_GET['developer_id']);

	if ($deleteUser) {
		$_SESSION['message'] = "Successfully deleted!";
		header("Location: ../index.php");
	}
}

if (isset($_GET['searchBtn'])) {
	$searchForAUser = searchForAGameDev($pdo, $_GET['searchInput']);
	foreach ($searchForAUser as $row) {
		echo "<tr> 
				<td>{$row['developer_id']}</td>
				<td>{$row['firstname']}</td>
				<td>{$row['lastname']}</td>
				<td>{$row['email']}</td>
				<td>{$row['phonenumber']}</td>
				<td>{$row['role']}</td>
				<td>{$row['years_of_exp']}</td>
				<td>{$row['skills']}</td>
				<td>{$row['pref_game_genre']}</td>
			  </tr>";
	}
}

?>