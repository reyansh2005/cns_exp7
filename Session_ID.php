<?php
// Session_ID.php - Secure Session Handling

// Strong session settings
ini_set('session.use_strict_mode', '1');
ini_set('session.use_only_cookies', '1');
ini_set('session.cookie_httponly', '1');
// Set to '1' in production when using HTTPS
ini_set('session.cookie_secure', '0');
ini_set('session.cookie_samesite', 'Lax');

session_start();

// Regenerate session ID after login actions
if (!isset($_SESSION['initialized'])) {
    session_regenerate_id(true);
    $_SESSION['initialized'] = true;
}

$_SESSION['message'] = "Secure Session Active!";
?>
<!DOCTYPE html>
<html>
<head><title>Secure Session ID</title></head>
<body>
<h3><?= htmlspecialchars($_SESSION['message']); ?></h3>
<p>Session ID: <?= session_id(); ?></p>
</body>
</html>
