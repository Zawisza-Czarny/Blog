
<?php
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$email = $_POST['email'];
$komentarz = $_POST['komentarz'];

$conn = new mysqli('localhost', 'root', '','komentarze');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else {
    $stmt = $conn->prepare("insert into rejestracja(imie, nazwisko, email, komentarz) values(?,?,?,?)");
    $stmt->bind_param("ssss", $imie, $nazwisko, $email, $komentarz);
    $stmt->execute();
    echo "koemntarz dodany";
    $stmt->close();
    $conn->close();
}

?>