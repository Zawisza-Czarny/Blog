<?php
    define('SITE_KEY', '6Lf2hd4ZAAAAAB2ohLAmMPhgoDNcLqkirXN67Kom');
    define('SECRET_KEY', '6Lf2hd4ZAAAAAKhoJwNx0B4ZBnEnHYgEWqinETqC');
if($_POST){
    function getCaptcha($SecretKey){
        $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$SecretKey}");
        $Return = json_decode($Response);
    return $Return;
    }
    $Return = getCaptcha($_POST['g-recaptcha-response']);
    if($Return->success == true && $Return->score > 0.5){
        echo "Jesteś człowiekiem!";
    }else{
        echo "Jesteś robotem!";
    }
}
?>
<html lang="pl" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8"
    <link href="https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Noto+Serif|Tangerine" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <title>Mateusz Blog</title>
    <script src="https://www.google.com/recaptcha/api.js?render=6Lf2hd4ZAAAAAB2ohLAmMPhgoDNcLqkirXN67Kom
"></script>
</head>
<body>
<header>
    <?php include("menu.php"); ?>
</header>
<h1>Zostaw tu swój komentarz</h1>
<?php include("footer.php"); ?>
<form action="" method="POST">

    <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" /><br >
    <input type="submit" value="Kliknij aby potwierdzić, że jesteś człowiekiem" />
</form>

<form action="connect.php" method="post">

    <div>

        Imię:<br />

        <input name="imie" value="" /><br />

        Nazwisko:<br />

        <input name="nazwisko" value="" /><br />



        Adres e-mail:<br />

        <input name="email" value="" /><br />

        Komentarz:<br />

        <textarea name="komentarz" value="" cols="22" rows="5" /></textarea><br />


        <input type="submit" value="Wyślij" name="submit" />


    </div>
    <?php


    $conn = new mysqli('localhost', 'root', '','komentarze');
    $sql = "SELECT imie, nazwisko, email, komentarz From rejestracja";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    echo  nl2br("\n Imie "  . $row["imie"].  " \n Nazwisko " . $row["nazwisko"]. "\n Adres e-mail " . $row["email"]. "\n Komentarz " . $row["komentarz"] );

  }
  }
   else {
  echo "brak komentarzy";
  }
    ?>

</form>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'homepage'})
            .then(function(token) {
                console.log(token);
                document.getElementById('g-recaptcha-response').value=token;
            });
    });
</script>
</body>
</html>