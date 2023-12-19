<?php
    session_start();
    if(!$_SESSION['username']){
        header('location: login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Add your CSS styles or link to an external stylesheet here -->
    <style>
      body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5; /* Background color for the entire page */
}

.dashboard {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff; /* Background color for the dashboard */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #333;
}

.widget {
    margin-bottom: 20px;
    background-color: #f9f9f9; /* Background color for widgets */
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

ul {
    list-style-type: none;
    padding: 0;
}

ul li {
    padding: 10px 0;
    border-bottom: 1px solid #ddd; /* Border between list items */
}

a {
    text-decoration: none;
    color: #0066cc;
    transition: color 0.3s ease; /* Smooth color transition on hover */
}

a:hover {
    color: #004080;
}

    </style>
</head>
<body>

<div class="dashboard">
    <h2>PERPUSTAKAAN</h2>

    <div class="widget">

        <ul>
            <li><a href="read.php">Daftar Buku</a></li>
            <li><a href="read_anggota.php">Anggota</a></li>
            <li><a href="read_peminjaman.php">Data Peminjaman</a></li>
            <li><a href="login.php">keluar</a></li>
            <!-- Add more links here -->
        </ul>
    </div>
</div>

</body>
</html>
