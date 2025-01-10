<?php
session_start();

// Jika session username tidak ada, arahkan ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>thrifting shop</title>
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

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, #4a90e2, #50c9c3);
            color: white;
            padding: 40px 20px;
            text-align: center;
            border-bottom: 5px solid #3578e5;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            margin: 0;
            font-size: 2.5rem;
            font-weight: bold;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
        }

        .header p {
            margin: 10px 0 0;
            font-size: 1.2rem;
            font-weight: 300;
        }

        a {
            color: #4a90e2;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4a90e2;
            color: white;
        }

        .btn-logout {
            display: block;
            width: 200px;
            margin: 30px auto;
            padding: 12px;
            background-color: #ff69b4;
            color: white;
            text-align: center;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-logout:hover {
            background-color: #ff1493;
        }

        .actions a {
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>thrifting shop</h1>
    <p>Selamat datang, <?php echo $_SESSION['username']; ?>!</p>
</div>

<div class="container">
    <h2>Daftar pakaian</h2>
    <a href="tambah.php">Tambah pakaian</a>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama pakaian</th>
                <th>ukuran</th>
                <th>harga</th>
                <th>kondisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include 'db.php';
            $result = $conn->query("SELECT * FROM pakaian");
            $no = 1; 
            while ($row = $result->fetch_assoc()): 
                $formatted_harga = "$" . number_format($row['harga'], 2, '.', ',');
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama_pakaian'] ?></td>
                    <td><?= $row['ukuran'] ?></td>
                    <td><?= $formatted_harga ?></td>
                    <td><?= $row['kondisi'] ?></td>
                    <td class="actions">
                        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> | 
                        <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Tombol logout di bawah -->
    <a href="logout.php">
        <button class="btn-logout">Logout</button>
    </a>
</div>

</body>
</html>
