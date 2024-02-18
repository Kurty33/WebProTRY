<?php
    session_start();
    if (!isset($_SESSION["user"])) {
        header("location: login.php");
        exit();
    }

    // Assuming you set $firstName somewhere in your code, include it here
    $firstName = isset($_SESSION['First_Name']) ? $_SESSION['First_Name'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBPRO TicTacToe (Difficult)</title>
    <link rel="stylesheet" href="gexpert.css">
</head>

<body>  
    <h1 id="title">X-O DIFFICULT MODE</h1>
    <video autoplay loop muted>
      <source src="gdiffbg.mp4" class="video" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    <div class="container">
      <div class="main-container">
        <div class="main-grid">
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
            <div class="box align"></div>
          </div>
        </div>    
        <div class="turn-container">
              <h3>Turn For</h3>
              <div class="turn-box align">X</div>
              <div class="turn-box align">O</div>
              <div class="bg"></div>
        </div>
        <div class="scoreboard">
          <div id="player-x-score">
            <span class="label"><?php echo htmlspecialchars($firstName); ?></span>
            <span id="player-x-count" class="score">0</span>
          </div>
          <div id="player-o-score">
            <span class="label">Player O:</span>
            <span id="player-o-count" class="score">0</span>
          </div>
        </div>
        <div class="opponent-toggle">
          <a href="category.php" style="text-decoration: none" onmousedown="sound13.play()"><button>Back</button></a>
          <button id="choosePlayer" class="active" onmousedown="sound14.play()">Another Player</button>
          <button id="chooseAI"  onmousedown="sound15.play()">AI (DIFFICULT)</button>
        </div>  
        </div>

            <h2 id="results"></h2>
        <button id="play-again">Play Again</button>

    <div class="leaderboard">
        <h1>SCOREBOARD</h1>
        <div class="header">
            <h3>USERNAME</h3>
            <h3>POINTS</h3>
        </div>
        <ol>
        <li>
                <span class="username"><?php echo $firstName;?><span>            (Player Won)</span></span>
                <span class="Player Won">3</span>
                <!-- Assuming you have a variable for points, you can include it here -->
            </li>
        </ol>
    
    </div>

    <script src="gdifficult.js"></script>
    <script type="text/javascript">
        var sound13 = new Audio();
        sound13.src = "click.mp3";
        var sound14 = new Audio();
        sound14.src = "sword.mp3";
        var sound15 = new Audio();
        sound15.src = "AI.mp3";
    </script>
</body>
</html>