<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Journal</title>
    <link rel="stylesheet" href="tugas3.css">
</head>

<body>

<div class="container">

    <div class="profile">
        <img src="kg.jpg" alt="profile">
        <h1>Dwita Hadi</h1>
        <p>Personal Habit & Mood Tracker</p>
    </div>

    <div class="form-box">
        <form action="tambah.php" method="POST">
            <input type="date" name="tanggal" required>
            <input type="text" name="aktivitas" placeholder="Aktivitas hari ini" required>

            <select name="mood" required>
                <option value="">Pilih Mood</option>
                <option value="Senang">Senang</option>
                <option value="Biasa">Biasa</option>
                <option value="Capek">Capek</option>
                <option value="Produktif">Produktif</option>
            </select>

            <textarea name="catatan" placeholder="Catatan singkat"></textarea>

            <button type="submit">Tambah</button>
        </form>
    </div>

    <table>
        <tr>
            <th>Tanggal</th>
            <th>Aktivitas</th>
            <th>Mood</th>
            <th>Catatan</th>
            <th>Aksi</th>
        </tr>

        <?php
        $data = mysqli_query($conn, "SELECT * FROM jurnal ORDER BY id DESC");
        while ($row = mysqli_fetch_assoc($data)) {
        ?>
        <tr>
            <td><?= $row['tanggal'] ?></td>
            <td><?= $row['aktivitas'] ?></td>
            <td><?= $row['mood'] ?></td>
            <td><?= $row['catatan'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus data?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</div>

</body>
</html>