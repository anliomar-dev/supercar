<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demande d'éssai</title>
</head>
<body>
    <h1>Bonjour <?php echo $_SESSION["username"]; ?></h1>
    <form action="/supercar/logout" method="POST">
        <button class="btn">logout</button>
    </form>
</body>
</html>
