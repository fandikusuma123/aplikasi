<?php
include 'koneksi.php';
$id = $_GET['id']; // ID dari buku yang akan diupdate
$sql = "SELECT * FROM buku WHERE buku_id=$id";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
?>
<form action="update.php" method="POST">
Judul: <input type="text" name="judul" value="<?php echo $row['judul']; ?>"><br>
Pengarang: <input type="text" name="pengarang" value="<?php echo $row['pengarang'];
?>"><br>
Penerbit: <input type="text" name="penerbit" value="<?php echo $row['penerbit']; ?>"><br>
Tahun Terbit: <input type="text" name="tahun_terbit" value="<?php echo
$row['tahun_terbit']; ?>"><br>
<input type="hidden" name="id" value="<?php echo $row['buku_id']; ?>">
<input type="submit" value="Update">
</form>
<?php
} else {
echo "Data tidak ditemukan.";
}
$mysqli->close();
?>