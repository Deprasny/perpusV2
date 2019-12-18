<?
require 'functions.php';

$buku = query("SELECT * FROM buku");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $buku = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Admin</title>
    <style>
        body {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Daftar Buku</h1>
    <br>
    <a href="tambah.php">Tambah Data Buku</a>
    <br>
    <br>
    <form action="" method="POST">
        <input type="text" name="keyword" size="40" autofocus placeholder="masukan Keyword Pencarian ..." autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
    <br>
    <table border="1" cellpadding="10" cellspacing="0" align="center">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>nama Buku</th>
            <th>pengarang</th>
            <th>penerbit</th>
        </tr>
        <? $i = 1; ?>
        <? foreach ($buku as $bk) : ?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="ubah.php?kode_buku=<?= $bk["kode_buku"]; ?>">Ubah</a> |
                    <a href="hapus.php?kode_buku=<?= $bk["kode_buku"]; ?>" onclick="return confirm('Yakin Dihapus ?')">Hapus</a>
                </td>
                <td><img src="img/<?= $bk["gambar"]; ?>" alt="" width="100px"></td>
                <td><?= $bk["nama_buku"]; ?></td>
                <td><?= $bk["pengarang"]; ?></td>
                <td><?= $bk["penerbit"]; ?></td>
            </tr>
            <? $i++ ?>
        <? endforeach; ?>



    </table>
</body>

</html>