<!-- Koneksi database tabel Peminjaman -->
<?
$host = "localhost";
$username = "root";
$password = "";
$db_name = "library";

$koneksi = mysqli_connect($host, $username, $password, $db_name);
if (!$koneksi) {//cek koneksi
    die("Tidak terkoneksi ke database");
}

$id_anggota = "";
$nama_angggota = "";
$judul_buku = "";
$penulis = "";
$tanggal_peminjaman = "";
$tanggal_pengembalian = "";
$sukses = "";
$error = "";

if (isset($_POST['simpan'])) {
    $id_anggota = $_POST['id_anggota'];
    $nama_angggota = $_POST['nama_angggota'];
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];

    if ($id_anggota && $nama_angggota && $judul_buku && $penulis && $tanggal_peminjaman && $tanggal_pengembalian) {
        $sql = "insert into data(nama_angggota,judul_buku,penulis,tanggal_peminjaman,tanggal_pengembalian) values('$nama_angggota','$judul_buku','$penulis','$tanggal_peminjaman','$tanggal_pengembalian')";
        $ql = mysqli_query($koneksi, $sql);
        if ($sql) {
            $sukses = "Berhasil menambah data baru";
        } else {
            $error = "Gagal menmbah data";
        }
    } else {
        $error = "Silakan masukkan semua data";
    }

}

?>

<!-- Koneksi database tabel Pengembalian -->
<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "library";

$koneksi = mysqli_connect($host, $username, $password, $db_name);
if (!$koneksi) {//cek koneksi
    die("Tidak terkoneksi ke database");
}

$id_anggota = "";
$nama_angggota = "";
$judul_buku = "";
$tanggal_pengembalian = "";
$tanggal_kembali = "";
$sukses = "";
$error = "";

if (isset($_POST['simpan'])) {
    $id_anggota = $_POST['id_anggota'];
    $nama_angggota = $_POST['nama_angggota'];
    $judul_buku = $_POST['judul_buku'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    if ($id_anggota && $nama_angggota && $judul_buku && $tanggal_pengembalian && $tanggal_kembali) {
        $sql = "insert into denda(id_anggota,nama_angggota,judul_buku,tanggal_pengembalian,tanggal_kembali) values('$id_anggota','$nama_angggota','$judul_buku','$tanggal_pengembalian','$tanggal_kembali')";
        $ql = mysqli_query($koneksi, $sql);
        if ($sql) {
            $sukses = "Berhasil menambah data baru";
        } else {
            $error = "Gagal menmbah data";
        }
    } else {
        $error = "Silakan masukkan semua data";
    }

}

?>

<!-- Koneksi database book -->
<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "library";

$koneksi = mysqli_connect($host, $username, $password, $db_name);
if (!$koneksi) {//cek koneksi
    die("Tidak terkoneksi ke database");
}

$id = "";
$judul_buku = "";
$penulis = "";
$penerbit = "";
$harga = "";
$sukses = "";
$error = "";

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $harga = $_POST['harga'];

    if ($id && $judul_buku && $penulis && $penerbit && $harga) {
        $sql = "insert into buku(id,judul_buku,penulis,penerbit,harga) values('$id','$judul_buku','$penulis','$penerbit','$harga')";
        $ql = mysqli_query($koneksi, $sql);
        header("Location: data.php");
        exit();
        if ($sql) {
            $sukses = "Berhasil menambah data baru";
        } else {
            $error = "Gagal menmbah data";
        }
    } else {
        $error = "Silakan masukkan semua data";
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="stylebook.css">
</head>

<body>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", "sans-serif";
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url(book.png) no-repeat;
            background-size: cover;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px 100px;
            background: #fbcab3;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 99;
        }

        .logo {
            font-size: 2em;
            color: #333;
            user-select: none;
        }

        .navigation a {
            position: relative;
            font-size: 1.1em;
            color: #333;
            text-decoration: none;
            font-weight: 500;
            margin-left: 40px;
        }

        .navigation .btnLogin-popup {
            width: 400px;
            height: 300px;
            background: transparent;
            border: 2px solid #333;
            outline: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.1em;
            color: #333;
            font-weight: 500;
            margin-left: 40px;
            transition: .5s;
        }

        .navigation .btnLogin-popup:hover {
            background: #333;
            color: aliceblue;
        }
    </style>
    <header>
        <h2 class="logo">iPustaka</h2>
        <nav class="navigation">
            <a href="hal_user.php">Home</a>
            <a href="#">Category</a>
            <a href="#">Data</a>
            <a href="book.php">Book</a>
            <a href="login.php" button class="btnLogin-popup">Logout</button></a>
        </nav>
    </header>

    <div class="recent-grid">
        <div class="data">
            <div class="card">
                <div class="card-header">
                    <h2>Data Keterlambatan</h2>
                </div>

                <div class="card-body">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>ID Anggota</td>
                                <td>Nama Anggota</td>
                                <td>Judul Buku</td>
                                <td>Penulis</td>
                                <td>Tanggal Peminjaman</td>
                                <td>Tanggal Pengembalian</td>
                                <td>Tanggal Kembali</td>
                                <td>Hari Terlambat</td> <!-- Kolom baru untuk menampilkan hari terlambat -->
                                <td>Denda Keterlambatan</td> <!-- Kolom baru untuk menampilkan denda -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ambildata = mysqli_query($koneksi, "SELECT * FROM data 
                                INNER JOIN denda ON data.id_anggota = denda.id_anggota")
                                or die(mysqli_error($koneksi));
                            $urutan = 1;
                            while ($r2 = mysqli_fetch_array($ambildata)) {
                                $id_anggota = $r2['id_anggota'];
                                $nama_angggota = $r2['nama_angggota'];
                                $judul_buku = $r2['judul_buku'];
                                $penulis = $r2['penulis'];
                                $tanggal_peminjaman = $r2['tanggal_peminjaman'];
                                $tanggal_pengembalian = $r2['tanggal_pengembalian'];
                                $tanggal_kembali = $r2['tanggal_kembali'];

                                // Menghitung hari terlambat
                                $tanggal_pengembalian_obj = new DateTime($tanggal_pengembalian);
                                $tanggal_kembali_obj = new DateTime($tanggal_kembali);
                                $hari_terlambat = $tanggal_pengembalian_obj->diff($tanggal_kembali_obj)->days;

                                // Menghitung denda keterlambatan
                                $selisih_hari = $tanggal_pengembalian_obj->diff($tanggal_kembali_obj)->days;
                                $denda_per_hari = 1000; // Denda per hari Rp. 1.000
                                $denda_keterlambatan = $denda_per_hari * $selisih_hari;

                                ?>
                                <tr>
                                    <td><?php echo $urutan++ ?></td>
                                    <td><?php echo $id_anggota ?></td>
                                    <td><?php echo $nama_angggota ?></td>
                                    <td><?php echo $judul_buku ?></td>
                                    <td><?php echo $penulis ?></td>
                                    <td><?php echo $tanggal_peminjaman ?></td>
                                    <td><?php echo $tanggal_pengembalian ?></td>
                                    <td><?php echo $tanggal_kembali ?></td>
                                    <td><?php echo $hari_terlambat ?></td>
                                    <td><?php echo "Rp. " . number_format($denda_keterlambatan, 0, ',', '.') ?></td>
                                    <!-- Menampilkan denda keterlambatan -->
                                </tr>

                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="card-header">
                    <h2>Data Buku</h2>
                </div>

                <div class="card-body">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>ID Buku</td>
                                <td>Judul Buku</td>
                                <td>Penulis</td>
                                <td>Penerbit</td>
                                <td>Harga</td>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Script php untuk menampilkan data buku -->
                            <?php
                            $sql2 = "SELECT * FROM buku";
                            $q2 = mysqli_query($koneksi, $sql2);
                            $urutan = 1;
                            while ($r2 = mysqli_fetch_array($q2)) {
                                $id = $r2['id'];
                                $judul_buku = $r2['judul_buku'];
                                $penulis = $r2['penulis'];
                                $penerbit = $r2['penerbit'];
                                $harga = $r2['harga'];

                                ?>
                                <tr>
                                    <td><?php echo $urutan++ ?></td>
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $judul_buku ?></td>
                                    <td><?php echo $penulis ?></td>
                                    <td><?php echo $penerbit ?></td>
                                    <td><?php echo "Rp. " . number_format($harga, 0, ',', '.') ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>