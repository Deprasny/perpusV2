<?
require "functions.php";

// ambli data di url
$id = $_GET["kode_buku"];

// query data mahasiswa berdasarkan id
$buku = query("SELECT * FROM buku WHERE kode_buku=$id")[0];

// check button sudah di tekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil di ubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah');
                document.location.href = 'index.php';
             </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah Data Buku</title>
</head>

<body>
    <h1>Ubah data Mahasiswa</h1>
    <br>
    <form action=" " method="POST">
        <input type="hidden" name="id" value="<?= $buku["kode_buku"]; ?>">
        <ul>
            <li>
                <label for="nama_buku">Nama Buku : </label>
                <input type="text" name="nama_buku" id="nama_buku" required value="<?= $buku["nama_buku"] ?>">
            </li>
            <li>
                <label for="pengarang">Pengarang : </label>
                <input type="text" name="pengarang" id="pengarang" required value="<?= $buku["pengarang"] ?>">
            </li>
            <li>
                <label for="penerbit">Penerbit : </label>
                <input type="text" name="penerbit" id="penerbit" required value="<?= $buku["penerbit"] ?>">
            </li>
            <li>
                <label for="gambar">gambar : </label>
                <input type="text" name="gambar" id="gambar" required value="<?= $buku["gambar"] ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>

    </form>
</body>

</html>