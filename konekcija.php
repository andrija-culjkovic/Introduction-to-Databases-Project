<?php
$conn = new mysqli("localhost", "root", "", "aftermarket");
if ($conn->connect_error) {
    die("Greška u konekciji: " . $conn->connect_error);
}
?>