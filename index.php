<?php
include 'config.php'; // Menghubungkan ke database

// Menampilkan data dari tabel Users
$sql = "SELECT * FROM Users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Users List</h1>";
    echo "<table border='1'><tr><th>ID</th><th>Username</th><th>Email</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["user_id"]. "</td><td>" . $row["username"]. "</td><td>" . $row["email"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
