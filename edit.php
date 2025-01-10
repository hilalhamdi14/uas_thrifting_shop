<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM karyawan WHERE id=$id");
$karyawan = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_pakaian = $_POST['nama pakaian'];
    $ukuran = $_POST['ukuran'];
    $harga = $_POST['harga'];
    $kondisi = $_POST['kondisi'];

    $sql = "UPDATE pakaian SET nama_pakaian='$nama_pakaian', ukuran='$ukuran', harga='$harga', kondisi='$kondisi' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit pakaian</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #4a90e2;
        }

        label {
            font-size: 1.1rem;
            margin: 10px 0;
            display: inline-block;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        input[type="text"]:focus, input[type="number"]:focus {
            border-color: #8a2be2; /* Ungu pada saat fokus */
        }

        button {
            background-color: #ff69b4; /* Pink */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ff1493; /* Warna pink lebih gelap saat hover */
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 1rem;
        }

        .back-link a {
            color: #8a2be2; /* Ungu */
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit pakaian</h1>
    <form action="" method="POST">
        <label for="nama pakaian">Nama pakaian:</label>
        <input type="text" name="nama pakaian" id="nama pakaian" value="<?= htmlspecialchars($pakaian['nama_pakaian']) ?>" required><br>

        <label for="ukuran">Ukuran:</label>
        <input type="text" name="ukuran" id="ukuran" value="<?= htmlspecialchars($pakaian['ukuran']) ?>" required><br>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" id="harga" value="<?= htmlspecialchars($pakaian['haga']) ?>" required><br>

        <label for="kondisi">Kondisi:</label>
        <input type="text" name="kondisi" id="kondisi" value="<?= htmlspecialchars($pakaian['kondisi']) ?>" required><br>

        <button type="submit">Simpan</button>
    </form>

    <!-- Link Kembali ke Index -->
    <div class="back-link">
        <a href="index.php">Kembali ke Daftar pakaian</a>
    </div>
</div>

</body>
</html>
