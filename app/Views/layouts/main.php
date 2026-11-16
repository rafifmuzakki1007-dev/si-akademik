<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'SI Akademik'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/mahasiswa">SI Akademik (Acara 10)</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="/mahasiswa">Data Mahasiswa</a>
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        <?php 
            if (isset($content) && file_exists($content)) {
                require_once $content;
            } else {
                echo "<div class='alert alert-danger'>File konten view tidak ditemukan!</div>";
            }
        ?>
    </div>

    <footer class="text-center py-3 text-muted border-top bg-white">
        <small>&copy; 2026 Politeknik Negeri Jember - Workshop Web Server</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>