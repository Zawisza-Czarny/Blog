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

$_SESSION['tresc'] = $_POST['tresc'];
$doZmiany = $_SESSION['tresc'];
$coZmienic = array('[b]', '[/b]','[u]','[/u]', '[i]', '[/i]', '[s]', '[/s]');
$naCo = array('<strong>', '</strong>', '<u>','</u>','<i>', '</i>', '<s>', '</s>');
$nowaTresc = str_replace($coZmienic, $naCo, $doZmiany);

echo ('
<p>' . $nowaTresc . '</p>
<a href="post.php">Wstecz</a>
<a href="dodaj.php">Dodaj do bazy</a>
');
?>
</body>
</html>