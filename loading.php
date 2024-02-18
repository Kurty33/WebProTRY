<!DOCTYPE html>
<html lang="en" style="font-family: 'Space-Mono'; overflow-x: hidden; margin: 0; padding: 0;">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WebPro Games</title>
<style>

body {
    margin: 0;
    padding: 0;
    overflow: hidden;
    }

video {
    width: 100%;
    height: 99.5vh;
    object-fit: cover;
        }

</style>



</head>

<body>
    <video id="loadingVideo" autoplay muted onended="redirectToGamepage()">
        <source src="LOADING PAGE.mp4" type="video/mp4">
    </video>

<script>
    function redirectToGamepage() {
        window.location.href = 'login.php';
    }
    
</script>

</body>

</html>