<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['anggota_id'])) {
    $anggota_id = $_POST['anggota_id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    // Perform the update query
    $sql = "UPDATE anggota SET
            nama = '$nama',
            alamat = '$alamat',
            email = '$email',
            telepon = '$telepon'
            WHERE anggota_id = $anggota_id";

    try {
        $result = $mysqli->query($sql);

        if ($result) {
            header("Location: read_anggota.php");
            exit;
        } else {
            echo "Error updating record: " . $mysqli->error;
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }

    $mysqli->close();
} else {
    // Fetch the existing data to pre-fill the form
    if (isset($_GET['anggota_id'])) {
        $anggota_id = $_GET['anggota_id'];

        $fetch_sql = "SELECT * FROM anggota WHERE anggota_id = $anggota_id";
        $fetch_result = $mysqli->query($fetch_sql);

        if ($fetch_result) {
            if ($fetch_result->num_rows > 0) {
                $row = $fetch_result->fetch_assoc();
            } else {
                echo "Data tidak ditemukan.";
                $mysqli->close();
                exit;
            }
        } else {
            echo "Error fetching data: " . $mysqli->error;
            $mysqli->close();
            exit;
        }
    } else {
        echo "Invalid request. Missing anggota_id.";
        $mysqli->close();
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Anggota</title>
</head>
<body>

<form action="update_anggota.php" method="POST">
    Nama: <input type="text" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>"><br>
    Alamat: <input type="text" name="alamat" value="<?php echo htmlspecialchars($row['alamat']); ?>"><br>
    Email: <input type="text" name="email" value="<?php echo htmlspecialchars($row['email']); ?>"><br>
    Telepon: <input type="text" name="telepon" value="<?php echo htmlspecialchars($row['telepon']); ?>"><br>
    <input type="hidden" name="anggota_id" value="<?php echo $row['anggota_id']; ?>">
    <input type="submit" value="Update">
</form>

</body>
</html>
