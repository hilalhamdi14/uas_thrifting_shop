<?php
include 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM pakaian WHERE id=$id";

if ($conn->query($sql)) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}
?>
