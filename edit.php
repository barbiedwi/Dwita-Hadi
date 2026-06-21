<?php
include "koneksi.php";

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM jurnal WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>

<form method="POST">
    <input type="date" name="tanggal" value="<?= $row['tanggal'] ?>">
    <input type="text" name="aktivitas" value="<?= $row['aktivitas'] ?>">

    <select name="mood">
        <option <?= $row['mood']=="Senang"?"selected":"" ?>>Senang</option>
        <option <?= $row['mood']=="Biasa"?"selected":"" ?>>Biasa</option>
        <option <?= $row['mood']=="Capek"?"selected":"" ?>>Capek</option>
        <option <?= $row['mood']=="Produktif"?"selected":"" ?>>Produktif</option>
    </select>

    <textarea name="catatan"><?= $row['catatan'] ?></textarea>

    <button type="submit" name="update">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE jurnal SET 
        tanggal='$_POST[tanggal]',
        aktivitas='$_POST[aktivitas]',
        mood='$_POST[mood]',
        catatan='$_POST[catatan]'
        WHERE id='$id'
    ");

    header("Location: index.php");
}
?>