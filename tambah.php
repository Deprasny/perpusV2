<?
require "functions.php";

// check button sudah di tekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
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
    <title>Tambah Data Buku</title>
</head>

<body>
    <h1>Tambah data Mahasiswa</h1>
    <br>
    <form action=" " method="POST">
        <ul>
            <li>
                <label for="nama_buku">Nama Buku : </label>
                <input type="text" name="nama_buku" id="nama_buku" required>
            </li>
            <li>
                <label for="pengarang">Pengarang : </label>
                <input type="text" name="pengarang" id="pengarang" required>
            </li>
            <li>
                <label for="penerbit">Penerbit : </label>
                <input type="text" name="penerbit" id="penerbit" required>
            </li>
            <li>
                <label for="gambar">gambar : </label>
                <input type="text" name="gambar" id="gambar" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>

    </form>
</body>

</html>