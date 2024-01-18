<html lang="pl">
<head>
    <meta charset="UTF-8"
    <link href="https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Noto+Serif|Tangerine" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <title>Mateusz Blog</title>

</head>
<body>
<header>
    <?php include("menu.php"); ?>
</header>
<?php include("footer.php"); ?>
<?php
session_start();
echo ('
<form action="sprawdz.php" method="post">
<input type="text" name="tresc" value="');
if (isset($_SESSION['tresc']))
echo $_SESSION['tresc'];
echo('"> <input type="submit" value="Dalej>
</form>
');
?>
</body>
</html>