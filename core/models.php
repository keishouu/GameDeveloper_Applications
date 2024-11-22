<?php  

function checkIfUserExists($pdo, $username) {
	$response = array();
	$sql = "SELECT * FROM user_accounts WHERE username = ?";
	$stmt = $pdo->prepare($sql);

	if ($stmt->execute([$username])) {

		$userInfoArray = $stmt->fetch();

		if ($stmt->rowCount() > 0) {
			$response = array(
				"result"=> true,
				"status" => "200",
				"userInfoArray" => $userInfoArray
			);
		}

		else {
			$response = array(
				"result"=> false,
				"status" => "400",
				"message"=> "User doesn't exist from the database"
			);
		}
	}

	return $response;

}

require_once 'dbConfig.php';

function insertNewUser($pdo, $username, $firstname, $lastname, $password) {
	$response = array();
	$checkIfUserExists = checkIfUserExists($pdo, $username); 

	if (!$checkIfUserExists['result']) {

		$sql = "INSERT INTO user_accounts (username, firstname, lastname, password) 
		VALUES (?,?,?,?)";

		$stmt = $pdo->prepare($sql);

		if ($stmt->execute([$username, $firstname, $lastname, $password])) {
			$response = array(
				"status" => "200",
				"message" => "User successfully inserted!"
			);
		}

		else {
			$response = array(
				"status" => "400",
				"message" => "An error occured with the query!"
			);
		}
	}

	else {
		$response = array(
			"status" => "400",
			"message" => "User already exists!"
		);
	}

	return $response;
}


function getAllGameDevs($pdo) {
	$sql = "SELECT * FROM game_developers 
			ORDER BY firstname ASC";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getUserByDeveloper_id($pdo, $developer_id) {
	$sql = "SELECT * from game_developers WHERE developer_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$developer_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function searchForAGameDev($pdo, $searchQuery) {
	
	$sql = "SELECT * FROM game_developers WHERE 
			CONCAT(firstname,lastname,email,phonenumber,
				role,years_of_exp,skills,pref_game_genre,date_added) 
			LIKE ?";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute(["%".$searchQuery."%"]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}


function insertNewGameDev($pdo, $firstname, $lastname, $email, 
    $phonenumber, $role, $years_of_exp, $skills, $pref_game_genre) {

    $sql = "INSERT INTO game_developers 
            (
                firstname,
                lastname,
                email,
                phonenumber,
                role,
                years_of_exp,
                skills,
                pref_game_genre,
                date_added
            )
            VALUES (?,?,?,?,?,?,?,?, CURRENT_TIMESTAMP)";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([
        $firstname, $lastname, $email, 
        $phonenumber, $role, $years_of_exp, 
        $skills, $pref_game_genre
    ]);

    return $executeQuery;
}



function editGameDev($pdo, $firstname, $lastname, $email, $phonenumber, 
	$role, $years_of_exp, $skills, $pref_game_genre, $developer_id) {

	$sql = "UPDATE game_developers
				SET firstname = ?,
					lastname = ?,
					email = ?,
					phonenumber = ?,
					role = ?,
					years_of_exp = ?,
					skills = ?,
					pref_game_genre = ?
				WHERE developer_id = ? 
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$firstname, $lastname, $email, $phonenumber, 
		$role, $years_of_exp, $skills,$pref_game_genre, $developer_id]);

	if ($executeQuery) {
		return true;
	}

}


function deleteGameDev($pdo, $developer_id) {
	$sql = "DELETE FROM game_developers 
			WHERE developer_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$developer_id]);

	if ($executeQuery) {
		return true;
	}
}




?>