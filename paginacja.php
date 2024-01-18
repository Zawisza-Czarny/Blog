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
$mysqli = new mysqli('localhost', 'root', '','paginacja');
if($mysqli->connect_error) {
    die('Connection Failed : ' . $mysqli->connect_error);
}
    $rpp = 2;
    isset ($_GET['page']) ? $page = $_GET['page'] : $page = 0;

    if ($page > 1) {
        $start = ($page * $rpp) - $rpp;

    } else {
        $start = 0;
    }

    $resultSet = $mysqli->query("SELECT id FROM numery ");
    $numRows = $resultSet->num_rows;
    $totalPages = $numRows / $rpp;
    $resultSet = $mysqli->query("SELECT * FROM numery LIMIT $start, $rpp");

    echo "<table>";
    while ($rows = $resultSet->fetch_assoc()) {
        $imie = $rows['imie'];
        $nazwisko = $rows ['nazwisko'];
        echo "<tr><td><td>$imie</td><td>$nazwisko</td></tr>";
    }
    echo "</table>";
for ($x = 1; $x <= $totalPages; $x++)
{
    echo "<a href='?page=$x'>$x</a>";
}
?>
</body>
</html>