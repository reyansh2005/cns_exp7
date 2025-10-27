<?php
// XSS.php - Safe Output Encoding + CSP Header

header("Content-Security-Policy: script-src 'self'");

function safe($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$input = "";
if (!empty($_GET['msg'])) {
    $input = safe($_GET['msg']);
}
?>
<!DOCTYPE html>
<html>
<head><title>XSS Fix</title></head>
<body>
<form method="get">
    Enter Text: <input type="text" name="msg">
    <button type="submit">Submit</button>
</form>

<p>Output: <?= $input ?></p>

</body>
</html>
