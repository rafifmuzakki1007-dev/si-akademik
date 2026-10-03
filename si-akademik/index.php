<?php
// File: index.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI Akademik</title>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 30px;
        }
        .container {
            max-width: 650px;
            margin: auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        h1 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-top: 0;
        }
        .section {
            background: #fafafa;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 20px;
        }
        h3 {
            margin-top: 0;
            color: #34495e;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }
        button {
            background-color: #3498db;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background-color: #2980b9;
        }
        .result {
            background-color: #e8f4f8;
            padding: 10px;
            border-left: 4px solid #3498db;
            margin-top: 10px;
            word-break: break-all;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Menampilkan "Selamat datang di SI Akademik" -->
    <h1>Selamat datang di SI Akademik</h1>

    <!-- Form Pencarian (GET) -->
    <div class="section">
        <h3>1. Form Pencarian (Method GET)</h3>
        <form action="index.php" method="GET">
            <label for="keyword">Cari Data Mahasiswa/Matkul:</label>
            <input type="text" id="keyword" name="keyword" placeholder="Masukkan kata kunci...">
            <button type="submit">Cari</button>
        </form>

        <?php if (isset($_GET['keyword'])): ?>
            <div class="result">
                <strong>Hasil Pencarian GET:</strong> Kata kunci "<u><?= htmlspecialchars($_GET['keyword']) ?></u>" terdeteksi di URL query parameter.
            </div>
        <?php endif; ?>
    </div>

    <!-- Form Login Sederhana (POST) -->
    <div class="section">
        <h3>2. Form Login (Method POST)</h3>
        <form action="index.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Masukkan username..." required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password..." required>

            <button type="submit">Login</button>
        </form>

        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <div class="result">
                <strong>Status Login POST:</strong> Data login disubmit menggunakan method POST. Perhatikan bahwa username dan password <u>tidak muncul</u> pada URL browser.
            </div>
        <?php endif; ?>
    </div>
</div>

</body>
</html>