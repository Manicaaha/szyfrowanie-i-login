<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie z wykorzystaniem MySQL</title>
</head>
<body>
    <form action = "loguj2.php" method="post">
        Login<input type="text" name="login"/>
        Hasło<input type="password" name="haslo"/>
        <input type="submit" name="logowanie" value="zaloguj"/>
</form>
<br>
<?php
if(!isset($_POST['login']) || !isset($_POST['haslo'])) exit;
$login = trim($_POST['login']);
$haslo = trim($_POST['haslo']);
if(empty($login) || empty($haslo))
{
    echo 'Brak loginu lub hasła!';
    exit;
}
$mysqli = mysqli_connect('localhost','root','','ludzie');
$haslo = sha1($haslo);
$zapytanie = "SELECT count(*) FROM `uzytkownicy` WHERE `login` = '$login' and `haslo` = '$haslo';";
$wynik = mysqli_query($mysqli, $zapytanie);
$wiersz = mysqli_fetch_row($wynik);
$ile_znaleziono = $wiersz[0];
if($ile_znaleziono>0) echo 'Jestes zalogwany';
else echo 'Podałeś błędny login lub hasło';
?>
    
</body>
</html>