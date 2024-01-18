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
$_SESSION = array();
session_destroy();
?>
<a href="post.php">Do formularza</a>
</body>
</html>