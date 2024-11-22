<?php  
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="loginstyle.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="contentcontainer">
            <div class="imagecontainer">
                <div class="shapetwo"></div>
                <img class="designpageone" src="assets\design1.png" alt="">
            </div>
            <div class="formcontainer">
                <h1>Code Quest</h1>
                <form action="core/handleForms.php" method="POST">
                    <p>
                        <label for="username">Username</label>
                        <input type="text" name="username">
                    </p>
                    <p>
                        <label for="username">First Name</label>
                        <input type="text" name="firstname">
                    </p>
                    <p>
                        <label for="username">Last Name</label>
                        <input type="text" name="lastname">
                    </p>
                    <p>
                        <label for="username">Password</label>
                        <input type="password" name="password">
                    </p>
                    <p>
                        <label for="username">Confirm Password</label>
                        <input type="password" name="confirm_password">
                    </p>
                    <input type="submit" name="insertNewUserBtn">
                    <p class="register">Already have an Account? Login <a href="login.php">here</a></p>
                    <?php  
                        if (isset($_SESSION['message']) && isset($_SESSION['status'])) {

                            if ($_SESSION['status'] == "200") {
                                echo "<p style='color: white; text-align: center; background-color: #58D360; padding: 1vh;'>{$_SESSION['message']}</p>";
                            }

                            else {
                                echo "<p style='color: white; text-align: center; background-color: #D3585A; padding: 1vh;'>{$_SESSION['message']}</p>";	
                            }

                        }
                        unset($_SESSION['message']);
                        unset($_SESSION['status']);
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>