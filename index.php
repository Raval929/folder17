<?php

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

$email = filter_var($email, FILTER_SANITIZE_EMAIL);

$db = new mysqli("localhost", "root", "", "auth");
//
//$q = "SELECT * FROM user WHERE email = '$email'";
//echo $q
//$db->query($q);

//prepared statements
$q = $db->prepare("SELECT * FROM user WHERE email = ? LIMIT 1");

$q->bind_param("s", $email);

$q->execute();
$result = $q->get_result();
//$d = mysqli_connect("localhost", "root", "", "auth");
//mysqli_query($d, "SELECT * FROM user");




?>
<form action="index.php" method="get">
    <label for="emailInput">Email:</label>
    <input type="email" name="email" id="emailInput">
    <label for="password Input">Hasło: </label>
    <input type="password" name="password" id="passwordInput">
    <input type="submit" value="Zaloguj">
</form>