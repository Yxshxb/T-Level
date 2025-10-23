
<?php
// ...existing code...
// Handler to process login form submissions

require_once __DIR__ . '/database.php'; // expects database.php to create $pdo or fallback will be attempted

session_start();

function err($msg){
    echo '<p>' . htmlspecialchars($msg) . '</p>';
    echo '<p><a href="login_page/login.php">Back to login</a></p>';
    exit;
}

// ensure POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login_page/login.php');
    exit;
}

$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if ($email === '' || $password === '') {
    err('Email and password are required.');
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
    $stmt = $pdo->prepare('SELECT id, password FROM users WHERE email = ? LIMIT 1');
    $stmt->execute([$email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        err('Invalid email or password.');
    }

    $hash = $row['password'];
    if (!password_verify($password, $hash)) {
        err('Invalid email or password.');
    }

    // successful login
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_email'] = $email;

    // redirect to home page
    header('Location: home_page/index.php');
    exit;

} catch (Exception $e) {
    err('Login failed. Try again later.');
}