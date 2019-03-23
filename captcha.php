<?php
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $secretKey = "6Lf8c2EUAAAAAMDX7UlIL-xBVHyedoLm7Vcxeri7";
        $responseKey = $_POST['g-recaptcha-response'];
        $userIP = $_SERVER['REMOTE_ADDR'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
        $response = file_get_contents($url);
        $response = json_decode($response);
        if($response->success)
        echo "Verification success. Your name is : $username";
        else
        echo "Verfication failed!";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form action="index.php" method="post">
    <input type="text" name="username" placeholder="name....">
    <input type="submit" name="submit" value="save">
    <div class="g-recaptcha" data-sitekey="6Lf8c2EUAAAAAGlSae5nssFZz_p9i3b8ZVjNwMg2"></div>
    </form>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>