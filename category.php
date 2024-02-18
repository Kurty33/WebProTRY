<?php
    session_start();
    if (!isset($_SESSION["user"])) {
        header("location: login.php");
        exit();
    }

    $firstName = isset($_SESSION['First_Name']) ? $_SESSION['First_Name'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebPro Games</title>
    <link rel="stylesheet" href="category.css">
    
</head>

<body>

    <video autoplay loop muted plays-inline class="background-clip">
        <source src="11.mp4" type="video/mp4">
    </video>

    <div class="btn-logout">
        <a href="logout.php" class="logoutbtn" style="--clr:#0000ff" onmousedown="sound0.play()"><span>Log Out</span><i></i></a>

    </div>


    <div class="button-case">
        <h3><span style="color: #ff8c00"><?php echo htmlspecialchars($firstName); ?></span>, Choose Category</h3>
        <a href="geasy.php" class="diff" style="--clr:#1E9BFF" onmousedown="sound1.play()"><span>EASY</span><i></i></a>
        <a href="gdifficult.php" class="diff" style="--clr:#6EFF3E" onmousedown="sound2.play()"><span>DIFFICULT</span><i></i></a>
        <a href="gexpert.php" class="diff" style="--clr:#FF1867" onmousedown="sound3.play()"><span>EXPERT</span><i></i></a>
        <a href="scoreboard.php" class="diff" style="--clr:#CCAC93" onmousedown="sound4.play()"><span>SCOREBOARD</span><i></i></a>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="category.js"></script>
    <script type="text/javascript">
        var sound0 = new Audio();
        sound0.src = "click.mp3";
        var sound1 = new Audio();
        sound1.src = "gameover.mp3";
         var sound2 = new Audio();
        sound2.src = "gameover.mp3";
         var sound3 = new Audio();
        sound3.src = "gameover.mp3";
         var sound4 = new Audio();
        sound4.src = "click.mp3";
    </script>



</body>
</html>