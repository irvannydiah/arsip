<?php
include 'db.php';
include 'config.php';

if (!isLoggedIn()) {
    redirectTo('login.php');
}

echo "halo teman!!";
?>

<a href="upload_document.php">Upload Document</a>
<a href="view_documents.php">View Documents</a>
<a href="logout.php">Logout</a>

?>
