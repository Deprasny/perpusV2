<?
//koneksi database
$conn = mysqli_connect('localhost', 'root', '', 'perpustakaan');

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    $nama_buku = htmlspecialchars($data["nama_buku"]);
    $pengarang = htmlspecialchars($data["pengarang"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // query
    $sql = "INSERT INTO buku (nama_buku, pengarang, penerbit, gambar) VALUES ('$nama_buku','$pengarang', '$penerbit', '$gambar')";
    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM buku WHERE kode_buku= $id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    $id = $data["id"];
    $nama_buku = htmlspecialchars($data["nama_buku"]);
    $pengarang = htmlspecialchars($data["pengarang"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // query
    $sql = "UPDATE buku SET nama_buku = '$nama_buku', pengarang = '$pengarang', penerbit = '$penerbit', gambar = '$gambar' WHERE kode_buku=$id";
    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM buku WHERE nama_buku LIKE '%$keyword%' OR pengarang LIKE '%$keyword%' OR penerbit LIKE '%$keyword%'";
    return (query($query));
}
