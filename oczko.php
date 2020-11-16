<html lang="pl">
<head>
    <meta charset="UTF-8"
    <link href="https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Noto+Serif|Tangerine" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <title>Mateusz Blog</title>

</head>
<body>
<header>
    <div class="container">
        <img src="zdjecia/LOGOSs.png" alt="logo" class="logo">

        <nav>
            <ul>
                <li><a href="#">Strona Główna</a></li>
                <li><a href="omnie.php">Komentarze</a></li>
                <li><a href="#">Moje Hobby</a></li>
                <li><a href="#">Kontakt</a></li>
                <li><a href="#">programowanie</a></li>
                <li><a href="paginacja.php">paginacja</a></li>
            </ul>
        </nav>
    </div>



</header>


<footer>
    <ul>
        <li><a href="#">Autor:Mateusz Tomczyk</a> </li>
    </ul>

</footer>
<?php
Class rozdanie
{
    private static $kolory = array("Pik", "Kier", "trefl", "karo");
    private static $numery = array('2', '3', '4', '5', '6', '7', '8', '9', '10', "A", "J", "Q", "K", "A");




    public static function shuffle()
    {
        $talia = array();


        foreach (static::$kolory as $kolor) {
            foreach (static::$numery as $numer) {

                $talia[] = $kolor.'-'.$numer;
                }
            }
        shuffle($talia);


        return $talia;
        }


              public static function ciagnij(array &$talia, &$numery)
              {
                  $numer = array_shift($talia);
                  $numery[] = $numer;
              }
              }
class obliczenie
{
    public static function calculateResult(array $numery)
    {
        $total = 0;
        foreach ($numery as $numer) {
            $wartosc = explode('-', $numer)[1];
            if (is_numeric($wartosc)) {
                $total += $wartosc;
            }
            else {
                $total += 10;
            }
    }
        return $total;
    }

}




session_start();

if (!isset($_GET['akcja'])) {
$_SESSION['talia'] = rozdanie::shuffle();
$_SESSION['gracz'] = array();
$_SESSION['rozdajacy'] = array();

rozdanie::ciagnij($_SESSION['talia'], $_SESSION['gracz']);
rozdanie::ciagnij($_SESSION['talia'], $_SESSION['rozdajacy']);

}
elseif (isset($_GET['akcja']) && $_GET['akcja'] == 'ciagnij')
{
rozdanie::ciagnij($_SESSION['talia'], $_SESSION['gracz']);
}

elseif (isset($_GET['akcja']) && $_GET['akcja'] == 'stop' && obliczenie::calculateResult($_SESSION['gracz']) >= 14)
{
    while (obliczenie::calculateResult($_SESSION['rozdajacy']) < 18)
    {
       rozdanie::ciagnij($_SESSION['talia'], $_SESSION['rozdajacy']);

    }

    $gracz = obliczenie::calculateResult($_SESSION['gracz']);
    $rozdajacy = obliczenie::calculateResult($_SESSION['rozdajacy']);
    $wygrany = 'rozdajacy';
    $graczprzegral = false;
    $rozdajacyprzegral = false;

    if ($gracz > 21) {
        $graczprzegral = true;
    }
    if ($rozdajacy > 21) {
        $rozdajacyprzegral = true;
    }

    if ($graczprzegral && $rozdajacyprzegral) {
        $wygrany = 'nikt';

    } elseif ((!$graczprzegral && $gracz > $rozdajacy) || $rozdajacyprzegral)
    {
        $wygrany = 'gracz';
    }

    print $wygrany.' - <a href="?">Restart</a><br/>';
    print 'Gracz: '.$gracz.', Rozdajacy: '.$rozdajacy. '<br/>';
    print 'Karty rozdającego: - '.implode(', ', $_SESSION['rozdajacy']).'<br/>';
}





?>

Karty gracza: <?= implode(', ', $_SESSION['gracz']) ?><br/>
<?php if (!isset($winner)) { ?>
    <a href="?akcja=ciagnij">ciagnij</a> - <a href="?akcja=stop">stop</a><br/>
<?php } ?>
</body>
</html>