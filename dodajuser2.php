<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie z wykorzystaniem SQL</title>
</head>
<body>
    <form action="dodajuser2.php" method="POST">
        Login<input type="text" name='login'>
        Hasło<input type="password" name='haslo'>
        <input type="submit" name="logowanie" value="dodaj">
    </form> 
    <br>

    <?php
    if(isset($_POST['login']) && isset($_POST['haslo'])) {
        $login = trim($_POST['login']);
        $haslo = trim($_POST['haslo']);

        if(empty($login) || empty($haslo)) {
            echo 'Brak loginu lub hasla';
            exit;
        }

        $lacz = mysqli_connect('localhost', 'root', '', 'ludzie');
        if(!$lacz) {
            echo 'Brak połączenia z bazą';
            exit;
        }

        $haslo = sha1($haslo);
        $zapytanie = "INSERT INTO `uzytkownicy`(`login`, `haslo`) VALUES ('$login','$haslo')";
        $wynik = mysqli_query($lacz, $zapytanie);

        if($wynik) {
            echo "Dodano uzytkownika";
        } else {
            echo "Błąd podczas dodawania użytkownika";
        }

        mysqli_close($lacz);
    }
    ?>
</body>
</html>