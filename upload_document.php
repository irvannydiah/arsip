<?php
include 'db.php';
include 'config.php';

if (!isLoggedIn()) {
    redirectTo('login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];
    
    // Handle file upload
    $file = $_FILES['file'];
    $filePath = 'uploads/' . basename($file['name']);
    move_uploaded_file($file['tmp_name'], $filePath);

    $stmt = $conn->prepare("INSERT INTO Documents (title, description, file_path, user_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $description, $filePath, $user_id]);

    echo "Document uploaded successfully!";
}

?>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Document Title" required>
    <textarea name="description" placeholder="Document Description"></textarea>
    <input type="file" name="file" required>
    <button type="submit">Upload</button>
</form>
