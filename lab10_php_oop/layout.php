<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Abu-abu muda clean */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .sidebar {
            height: 100vh;
            background: #2c3e50; /* Warna biru gelap profesional */
            color: white;
            padding-top: 20px;
            position: fixed;
            width: 250px;
        }
        .sidebar a {
            color: #bdc3c7;
            text-decoration: none;
            display: block;
            padding: 15px 20px;
            border-bottom: 1px solid #34495e;
            transition: 0.3s;
        }
        .sidebar a:hover {
            background-color: #34495e;
            color: white;
            padding-left: 25px; /* Efek geser saat hover */
        }
        .content {
            margin-left: 250px;
            padding: 30px;
        }
        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .navbar-custom {
            background-color: #3498db; /* Biru terang */
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h4 class="text-center mb-4 fw-bold">🚀 Kampus App</h4>
    <a href="dashboard.php">Dashboard</a>
    <a href="list_mahasiswa.php">Data Mahasiswa</a>
    <a href="form_input.php">Tambah Data</a>
    <a href="mobil.php">Latihan OOP (Mobil)</a>
</div>

<div class="content">
    <nav class="navbar navbar-light bg-white mb-4 shadow-sm rounded p-3">
        <span class="navbar-brand mb-0 h1">Pemrograman Web 2</span>
    </nav>
    
    <?php echo $content; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>