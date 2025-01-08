<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="/supercar/assets/css/styles.css">
    <title>Demande d'éssai</title>
</head>
<body>
    <h1>Bonjour <?php echo $_SESSION["username"]; ?></h1>
	<h2><?php if(isset($ui)){ echo $ui;} ?></h2>
    <form action="/supercar/authentication/logout" method="POST">
        <button class="btn">logout</button>
    </form>
</body>
</html>
