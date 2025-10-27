<?php
// SQL_Injection.php - Secure SQL Query using Prepared Statements

// Database connection
$pdo = new PDO("mysql:host=localhost;dbname=dvwa;charset=utf8mb4", "root", "");

// Validate ID
$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

// Prepared statement (Prevents SQL Injection)
$stmt = $pdo->prepare("SELECT username, email FROM users WHERE id = :id LIMIT 1");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head><title>SQL Injection Fix</title></head>
<body>
<form method="post">
    Enter User ID: <input type="number" name="id" required>
    <button type="submit">Search</button>
</form>

<?php if ($data): ?>
    <h3>User Details</h3>
    Username: <?= htmlspecialchars($data['username']); ?><br>
    Email: <?= htmlspecialchars($data['email']); ?>
<?php endif; ?>
</body>
</html>
