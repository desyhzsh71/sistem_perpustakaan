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

<!-- Koneksi database tabel Anggota -->
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
$email = "";
$sukses = "";
$error = "";

if (isset($_POST['simpan'])) {
    $id_anggota = $_POST['id_anggota'];
    $nama_angggota = $_POST['nama_angggota'];
    $email = $_POST['email'];

    if ($id_anggota && $nama_angggota && $email) {
        $sql = "insert into anggota(nama_angggota,email) values('$nama_angggota','$email')";
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

<!-- Koneksi database tabel Peminjaman Anggota -->
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

if (isset($_POST['simpan'])) {
    $id_anggota = $_POST['id_anggota'];
    $nama_angggota = $_POST['nama_angggota'];
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];

    if ($id_anggota && $nama_angggota && $judul_buku && $penulis && $tanggal_peminjaman) {
        $sql = "insert into pinjam(nama_angggota,judul_buku,penulis,tanggal_peminjaman) values('$nama_angggota','$judul_buku','$penulis','$tanggal_peminjaman')";
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

<!-- Halaman Data -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="styledata.css">
</head>

<body>

    <!-- sidebar untuk kolom yang berada di sebelah kiri -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <h1><span class="las la-book"></span>iPerpus</h1>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="btn"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="data.php" class="btn"><span class="las la-clipboard-list"></span>
                        <span>Data</span></a>
                </li>
                <li>
                    <a href="peminjaman.php" class="btn"><span class="las la-book"></span>
                        <span>Peminjaman Buku</span></a>
                </li>
                <li>
                    <a href="pengembalian.php" class="btn"><span class="las la-receipt"></span>
                        <span>Pengembalian Buku</span></a>
                </li>
                <li>
                    <a href="anggaran.php" class="btn"><span class="las la-wallet"></span>
                        <span>Anggaran</span></a>
                </li>
                <li>
                    <a href="relasi.php" class="btn"><span class="las la-table"></span>
                        <span>Relasi</span></a>
                </li>
                <li>
                    <a href="form_book.php" class="btn"><span class="las la-bookmark"></span>
                        <span>Book</span></a>
                </li>
                <li>
                    <a href="" class="btn"><span class="las la-user-circle"></span>
                        <span>Akun</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h1>
                <label for="">
                    <span class="las la-bars"></span>
                </label>

                Data
            </h1>

            <form method="GET" action="">
                <span class="las la-search"></span>
                <input type="text" name="cari" placeholder="Search here..." />
                <button type="submit">Search</button>
            </form>

            <div class="user-wrapper">
                <img src="dist/css/img/sunwoo.jpg" width="30px" height="30px" alt="">
                <div>
                    <h4>Sunwoo</h4>
                    <small>admin</small>
                </div>
            </div>
        </header>

        <div class="recent-grid">
            <div class="data">
                <div class="card">

                    <div class="card-header">
                        <h2>Data Anggota</h2>
                    </div>

                    <div class="card-body">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>ID Anggota</td>
                                    <td>Nama Anggota</td>
                                    <td>Email</td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Script Untuk Mencari Data -->
                                <?php
                                $q2 = mysqli_query($koneksi, "SELECT * FROM anggota");
                                $urutan = 1;

                                if (isset($_GET['cari'])) {
                                    $cari = $_GET['cari'];
                                    $q2 = mysqli_query($koneksi, "SELECT * FROM anggota WHERE nama_angggota LIKE '%" . $cari . "%'");
                                }

                                while ($r2 = mysqli_fetch_array($q2)) {
                                    $id_anggota = $r2['id_anggota'];
                                    $nama_angggota = $r2['nama_angggota'];
                                    $email = $r2['email'];

                                    ?>
                                    <tr>
                                        <td><?php echo $urutan++ ?></td>
                                        <td><?php echo $id_anggota ?></td>
                                        <td><?php echo $nama_angggota ?></td>
                                        <td><?php echo $email ?></td>
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

                    <div class="card-header">
                        <h2>Data Buku Anggota</h2>
                    </div>

                    <div class="card-body">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama Anggota</td>
                                    <td>Judul Buku</td>
                                    <td>Penulis</td>
                                    <td>Tanggal Peminjaman</td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Script php untuk menampilkan data peminjaman buku -->
                                <?php

                                $batas = 5; // Jumlah data per halaman
                                $halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
                                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                // Menghitung jumlah data keseluruhan
                                $data = mysqli_query($koneksi, "SELECT * FROM pinjam");
                                $jumlah_data = mysqli_num_rows($data);
                                $total_halaman = ceil($jumlah_data / $batas);

                                // Query data dengan limit dan offset sesuai halaman
                                $q2 = mysqli_query($koneksi, "SELECT * FROM pinjam LIMIT $halaman_awal, $batas");
                                $urutan = $halaman_awal + 1;

                                // Mencari Data
                                if (isset($_GET['cari'])) {
                                    $cari = $_GET['cari'];
                                    $q2 = mysqli_query($koneksi, "SELECT * FROM pinjam WHERE nama_angggota LIKE '%" . $cari . "%' ORDER BY tanggal_peminjaman ASC");
                                }

                                // Menampilkan data
                                while ($r2 = mysqli_fetch_array($q2)) {
                                    $nama_angggota = $r2['nama_angggota'];
                                    $judul_buku = $r2['judul_buku'];
                                    $penulis = $r2['penulis'];
                                    $tanggal_peminjaman = $r2['tanggal_peminjaman'];

                                    ?>
                                    <tr>
                                        <td><?php echo $urutan++ ?></td>
                                        <td><?php echo $nama_angggota ?></td>
                                        <td><?php echo $judul_buku ?></td>
                                        <td><?php echo $penulis ?></td>
                                        <td><?php echo $tanggal_peminjaman ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- Pagination Links -->
                        <ul class="pagination">
                            <li><a href="?halaman=<?php echo ($halaman > 1) ? ($halaman - 1) : 1; ?>">Previous</a></li>
                            <li><a
                                    href="?halaman=<?php echo ($halaman < $total_halaman) ? ($halaman + 1) : $total_halaman; ?>">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>