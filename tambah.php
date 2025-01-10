<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama_pakaian'];  // Sesuaikan dengan name input
    $ukuran = $_POST['ukuran'];
    $harga = $_POST['harga'];
    $kondisi = $_POST['kondisi'];

    // Ubah nama kolom di database menjadi nama yang benar (nama_pakaian)
    $sql = "INSERT INTO pakaian (nama_pakaian, ukuran, harga, kondisi) VALUES ('$nama', '$ukuran', '$harga', '$kondisi')";
    
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
    <title>Tambah Pakaian</title>
    <style>
        /* CSS yang sudah ada */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 500px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="number"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .btn-back {
            background-color: #2196f3;
        }

        .btn-back:hover {
            background-color: #1e87d8;
        }

        @media (max-width: 600px) {
            .btn-group {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Pakaian</h1>
        <form action="" method="POST">
            <label for="nama_pakaian">Nama Pakaian:</label>
            <input type="text" name="nama_pakaian" id="nama_pakaian" placeholder="Masukkan nama pakaian" required>

            <label for="ukuran">Ukuran:</label>
            <input type="text" name="ukuran" id="ukuran" placeholder="Masukkan ukuran pakaian" required>

            <label for="harga">Harga:</label>
            <input type="number" name="harga" id="harga" placeholder="Masukkan harga pakaian" required>

            <label for="kondisi">Kondisi:</label>
            <input type="text" name="kondisi" id="kondisi" placeholder="Masukkan kondisi pakaian" required>

            <div class="btn-group">
                <button type="submit">Tambah Pakaian</button>
                <a href="index.php">
                    <button type="button" class="btn-back">Kembali</button>
                </a>
            </div>
        </form>
    </div>
</body>
</html>


