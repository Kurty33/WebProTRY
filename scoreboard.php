<?php
    session_start();
    if (!isset($_SESSION["user"])) {
        header("location: login.php");
        exit();
    }

    // Assuming you store game points in a session variable named 'game_points'
    $score_x = isset($_SESSION['game_points']) ? $_SESSION['game_points'] : 0;
    $firstName = isset($_SESSION['First_Name']) ? $_SESSION['First_Name'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WebPro Score Board</title>
  <link rel="stylesheet" href="scoreboard.css">
</head>
<body>
  <div class="leaderboard">
    <h1>SCOREBOARD</h1>
    <div class="header">
      <h3>USERNAME</h3>
      <h3>DATE</h3>
      <h3>POINTS</h3>
    </div>
    <ol>
      <li>
        <span class="username"><?php echo $firstName; ?></span>
        <span class="date">2024-02-18</span>
        <span class="Player Won">10</span>
      </li>
   
      <!-- End of additional leaderboard entries -->
    </ol>
    <a href="category.php" style="text-decoration: none" onmousedown="sound19.play()"><button>Back</button></a>
  </div>

   <script type="text/javascript">
        var sound19 = new Audio();
        sound19.src = "click.mp3";
      </script>
</body>
</html>