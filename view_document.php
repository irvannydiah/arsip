<?php
include 'db.php';
include 'config.php';

if (!isLoggedIn()) {
    redirectTo('login.php');
}

$stmt = $conn->prepare("SELECT * FROM Documents WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$documents = $stmt->fetchAll();

foreach ($documents as $doc) {
    echo "<h2>" . $doc['title'] . "</h2>";
    echo "<p>" . $doc['description'] . "</p>";
    echo "<a href='" . $doc['file_path'] . "'>Download</a>";
    echo "<hr>";
}
?>
