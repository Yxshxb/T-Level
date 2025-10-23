<?php
// ...existing code...
// Handler to process signup form submissions

require_once __DIR__ . '/database.php';

function err($msg){
    echo '<p>' . htmlspecialchars($msg) . '</p>';
    echo '<p><a href="signup_page/signup.php">Back to sign up</a></p>';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: signup_page/signup.php');
    exit;
}

$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if ($email === '' || $password === '') {
    err('Email and password are required.');
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    err('Invalid email address.');
}
if (strlen($password) < 6) {
    err('Password must be at least 6 characters.');
}

// get PDO from database.php or try opening local sqlite database
if (!isset($pdo) || !($pdo instanceof PDO)) {
    $dbfile = __DIR__ . '/database.db';
    if (file_exists($dbfile)) {
        try {
            $pdo = new PDO('sqlite:' . $dbfile);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            err('Database connection failed.');
        }
    } else {
        err('No database connection available.');
    }
}

try {
    // check existing email
    $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
    $stmt->execute([$email]);
    if ($stmt->fetch(PDO::FETCH_ASSOC)) {
        err('Email is already registered.');
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $ins = $pdo->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
    $ins->execute([$email, $hash]);

    // registration success -> redirect to login
    header('Location: login_page/login.php');
    exit;

} catch (Exception $e) {
    err('Registration failed. Try again later.');
}