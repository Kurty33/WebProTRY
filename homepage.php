<!DOCTYPE html>
<html lang="en" style="font-family: 'Space-Mono'; overflow-x: hidden; margin: 0; padding: 0;">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WebPro Games</title>
    <link href='https://fonts.googleapis.com/css?family=Space Mono' rel='stylesheet'>
    <link rel="stylesheet" href="homepage.css">
    

</head>

<body>

    <section class="tictactoe-first-page">
        <div class="content-first">
            <video autoplay loop muted plays-inline class="background-clip">
            <source src="11.mp4" type="video/mp4">
            </video>
            <div class="content-first">

                <h1>WEBPRO TAC TOE </h1>

                <h3>WELCOME TO TIC TAC TOE GAME</h3>
                <br>
                
                <a href="loading.php" onmousedown="sound.play()"><button class="start" style="--clr: #F88017"><span>Start Game</span><i></i></button></a>


                <h5>WEBPROG GROUP:</h5>

                <p>
                    Hernaez, Adrian 
                    Oteyza, Kurt 
                    Ramirez, Mae 
                    Rogel, Ian 
                    Sanchez, Aldrich
                </p>

            </div>
        </div>

    </section>

    <script type="text/javascript">
        var sound = new Audio();
        sound.src = "click.mp3";
    </script>

</body>

</html>