<?php
session_start();

// Generate Token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Validate form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("CSRF Validation Failed!");
    }
    echo "Action Successfully Performed!";
}
?>
<!DOCTYPE html>
<html>
<head><title>CSRF Fix</title></head>
<body>

<form method="post">
    Enter Email: <input type="email" name="email" required>
    <input type="hidden" name="csrf_token"
        value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">
    <button type="submit">Submit</button>
</form>

</body>
</html>
