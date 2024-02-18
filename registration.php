<?php
    session_start();
    if (isset($_SESSION["user"])) {
        header("location: category.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebPro Registration</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
   
</head>
<body>
	<video autoplay loop muted plays-inline class="background-clip">
        <source src="11.mp4" type="video/mp4">
    	</video>
		<a class="icon" href="homepage.php" onmousedown="sound7.play()"><i class='bx bx-arrow-back'></i></i></a>
		<h1>WebPro Registration</h1>
    <div class="container">
        <?php
        if (isset($_POST["Register"])) {
            $lastName = $_POST["LastName"];
            $firstName = $_POST["FirstName"];
            $email = $_POST["Email"];
            $password = $_POST["Password"];
            $repeatPassword = $_POST["repeat_password"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $errors = array();
 
            if (empty($lastName) || empty($firstName) || empty($email) || empty($password) || empty($repeatPassword)) {
                array_push($errors, "All fields are required");
        	}
 
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
            }
 
            if (strlen($password)<8) {
                array_push($errors, "Password must be at least 8 characters long");
            }
 
            if ($password != $repeatPassword) {
                array_push($errors, "Password does not match");
            }
            require_once "database.php";
            $sql = "SELECT * FROM user WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount > 0) {
                array_push($errors,"Email Already Exist!");
            }

            if (count($errors)>0) {
                foreach ($errors as $error) {
                    echo "<div class = 'alert alert-danger'>$error</div>";
            		}
        		} else {
                    $sql = "INSERT INTO user (Last_Name, First_Name, email, password) VALUES (?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    $preparestmt = mysqli_stmt_prepare($stmt,"$sql");
                    if ($preparestmt) {
                        mysqli_stmt_bind_param($stmt, "ssss", $lastName, $firstName, $email, $passwordHash);
                        mysqli_stmt_execute($stmt);
                        echo "<div class = 'alert alert-success'> You are registered Successfully! </div>";
                    } else {
                        die("Something went wrong");
                    }
        		}
 
        	}
        ?>

        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control"  name="LastName" placeholder="Last Name">
            </div>
 
            <div class="form-group">
                <input type="text" class="form-control" name="FirstName" placeholder="First Name">
            </div>
 
            <div class="form-group">
                <input type="email" class="form-control" name="Email" placeholder="Email">
            </div>
 
            <div class="form-group">
                <input type="password" class="form-control" name="Password" placeholder="Password">
            </div>
 
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password ">
            </div>
 
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" name="Register" value="Register" id="Register" onmousedown="sound8.play()">
            </div>

        </form>
        <div class="click"><p> Already Have an Account? <a href="login.php"> Login Here</a></p></div>
    </div>
 
    <script type="text/javascript">
        var sound7 = new Audio();
        sound7.src = "click.mp3";
        var sound8 = new Audio();
        sound8.src = "click.mp3";
    </script>
 
   
   
</body>
</html>