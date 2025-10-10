<?php
$db = new PDO('sqlite:database.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $db->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();

echo "Registration successful. <a href='index.php'>Login</a>";
