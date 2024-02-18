<?php
    session_start();
    if (isset($_SESSION["user"])) {
        header("location: category.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebPro Login</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   
</head>
<body>
    <video autoplay loop muted plays-inline class="background-clip">
        <source src="11.mp4" type="video/mp4">
        </video>
        <a class="icon" href="homepage.php" onmousedown="sound5.play()"><i class='bx bx-arrow-back'></i></i></a>
        <h1>WebPro Login</h1>
    <div class="container">
        <?php
            if(isset($_POST["login"])) {
                $email = $_POST["email"];
                $password = $_POST["password"];
                    require_once "database.php";
                    $sql = "SELECT * FROM user WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if ($user) {
                        if(password_verify($password, $user["password"])) {
                            $_SESSION["user"] = $user;
                            $_SESSION["First_Name"] = $user["First_Name"];
                            header("location: homepage2.php");
                            exit();
                        } else {
                            echo "<div class = 'alert alert-danger'> Password is incorrect or does not match </div>";
                        }

                    } else {
                        echo "<div class = 'alert alert-danger'> Email is invalid or does not match </div>";
                    }
            }

            ?>

    <form action="login.php" method="post">
        
            <div class="form-group ">
                <label for="email" class="lab">Email:</label>
                <input type="email" name="email" placeholder="Email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password" class="lab">Password:</label>
                <input type="password" name="password"  placeholder="Password" class="form-control" required>
            </div>

            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary" onmousedown="sound6.play()">
            </div>

    </form>
        <div class="click"><p> Don't Have an Account? <a href="registration.php"> Register Here</a></p></div>
    </div>

    <script type="text/javascript">
        var sound5 = new Audio();
        sound5.src = "click.mp3";
        var sound6 = new Audio();
        sound6.src = "click.mp3";
    </script>
</body>

</html>