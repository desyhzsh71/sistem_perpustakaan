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
        $sql = "insert into data(id_anggota,nama_angggota,judul_buku,penulis,tanggal_peminjaman,tanggal_pengembalian) values('$id_anggota','$nama_angggota','$judul_buku','$penulis','$tanggal_peminjaman','$tanggal_pengembalian')";
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

<!-- Koneksi database tabel Anggaran -->
<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "library";

$koneksi = mysqli_connect($host, $username, $password, $db_name);
if (!$koneksi) {//cek koneksi
    die("Tidak terkoneksi ke database");
}

$id_anggaran = "";
$uraian = "";
$volume_satuan = "";
$biaya_unit = "";
$sukses = "";
$error = "";

if (isset($_POST['simpan'])) {
    $id_anggaran = $_POST['id_anggaran'];
    $uraian = $_POST['uraian'];
    $volume_satuan = $_POST['volume_satuan'];
    $biaya_unit = $_POST['biaya_unit'];

    if ($id_anggaran && $uraian && $volume_satuan && $biaya_unit) {
        $sql = "insert into anggaran(id_angggaran,uraian,volume_satuan,biaya_unit) values ('$id_anggaran','$uraian','$volume_satuan','$biaya_unit')";
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


<!-- Halaman Data -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
                        <h2>Data Peminjaman Buku</h2>
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
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Script php untuk menampilkan data peminjaman buku -->
                                <?php

                                $batas = 5; // Jumlah data per halaman
                                $halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
                                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                // Menghitung jumlah data keseluruhan
                                $data = mysqli_query($koneksi, "SELECT * FROM data");
                                $jumlah_data = mysqli_num_rows($data);
                                $total_halaman = ceil($jumlah_data / $batas);

                                // Query data dengan limit dan offset sesuai halaman
                                $q2 = mysqli_query($koneksi, "SELECT * FROM data LIMIT $halaman_awal, $batas");
                                $urutan = $halaman_awal + 1;

                                // Mencari Data
                                if (isset($_GET['cari'])) {
                                    $cari = $_GET['cari'];
                                    $q2 = mysqli_query($koneksi, "SELECT * FROM data WHERE nama_angggota LIKE '%" . $cari . "%' ORDER BY tanggal_peminjaman ASC");
                                }

                                // Menampilkan data
                                while ($r2 = mysqli_fetch_array($q2)) {
                                    $id_anggota = $r2['id_anggota'];
                                    $nama_angggota = $r2['nama_angggota'];
                                    $judul_buku = $r2['judul_buku'];
                                    $penulis = $r2['penulis'];
                                    $tanggal_peminjaman = $r2['tanggal_peminjaman'];
                                    $tanggal_pengembalian = $r2['tanggal_pengembalian'];

                                    ?>
                                    <tr>
                                        <td><?php echo $urutan++ ?></td>
                                        <td><?php echo $id_anggota ?></td>
                                        <td><?php echo $nama_angggota ?></td>
                                        <td><?php echo $judul_buku ?></td>
                                        <td><?php echo $penulis ?></td>
                                        <td><?php echo $tanggal_peminjaman ?></td>
                                        <td><?php echo $tanggal_pengembalian ?></td>
                                        <td>
                                            <a href="editpeminjaman.php?hal=edit&id_anggota=<?php echo $id_anggota ?>"><button>Edit
                                                    <span class="las la-edit"></span></button></a>
                                        </td>
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

                    <div class="card-header">
                        <h2>Data Pengembalian Buku</h2>
                    </div>

                    <div class="card-body">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>ID Anggota</td>
                                    <td>Nama Anggota</td>
                                    <td>Judul Buku</td>
                                    <td>Tanggal Pengembalian</td>
                                    <td>Tanggal Kembali</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Script php untuk menampilkan data pengembalian buku -->
                                <?php

                                $batas = 5; // Jumlah data per halaman
                                $halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
                                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                                // Menghitung jumlah data keseluruhan
                                $data = mysqli_query($koneksi, "SELECT * FROM denda");
                                $jumlah_data = mysqli_num_rows($data);
                                $total_halaman = ceil($jumlah_data / $batas);

                                // Query data dengan limit dan offset sesuai halaman
                                $q2 = mysqli_query($koneksi, "SELECT * FROM denda LIMIT $halaman_awal, $batas");
                                $urutan = $halaman_awal + 1;

                                // Mencari Data
                                if (isset($_GET['cari'])) {
                                    $cari = $_GET['cari'];
                                    $q2 = mysqli_query($koneksi, "SELECT * FROM denda WHERE nama_angggota LIKE '%" . $cari . "%' ORDER BY id_anggota ASC");
                                }

                                // Menampilkan data
                                while ($r2 = mysqli_fetch_array($q2)) {
                                    $id_anggota = $r2['id_anggota'];
                                    $nama_angggota = $r2['nama_angggota'];
                                    $judul_buku = $r2['judul_buku'];
                                    $tanggal_pengembalian = $r2['tanggal_pengembalian'];
                                    $tanggal_kembali = $r2['tanggal_kembali'];

                                    ?>
                                    <tr>
                                        <td><?php echo $urutan++ ?></td>
                                        <td><?php echo $id_anggota ?></td>
                                        <td><?php echo $nama_angggota ?></td>
                                        <td><?php echo $judul_buku ?></td>
                                        <td><?php echo $tanggal_pengembalian ?></td>
                                        <td><?php echo $tanggal_kembali ?></td>
                                        <td>
                                            <a href="editpengembalian.php?hal=edit&id_anggota=<?php echo $id_anggota ?>"><button>Edit
                                                    <span class="las la-edit"></span></button></a>
                                        </td>
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
                                        <!-- Menampilkan denda keterlambatan -->
                                        <td><?php echo "Rp. " . number_format($denda_keterlambatan, 0, ',', '.') ?></td>
                                    </tr>

                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-header">
                        <h2>Rencana Anggaran Perpustakaan</h2>
                    </div>

                    <div class="card-body">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>ID Anggaran</td>
                                    <td>Uraian</td>
                                    <td>Volume/satuan</td>
                                    <td>Biaya/unit</td>
                                    <td>Jumlah</td> <!-- Kolom baru untuk menampilkan hasil jumlah -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql3 = "SELECT * FROM anggaran";
                                $q3 = mysqli_query($koneksi, $sql3);
                                $urut = 1;
                                while ($r3 = mysqli_fetch_array($q3)) {
                                    $id_anggaran = $r3['id_anggaran'];
                                    $uraian = $r3['uraian'];
                                    $volume_satuan = $r3['volume_satuan'];
                                    $biaya_unit = $r3['biaya_unit'];

                                    // Menghitung nilai jumlah anggaran
                                    $volume_satuan = intval($volume_satuan); // Konversi ke numerik
                                    $biaya_unit = floatval($biaya_unit); // Konversi ke numerik
                                    $jumlah = $volume_satuan * $biaya_unit;

                                    ?>
                                    <tr>
                                        <td><?php echo $urut++ ?></td>
                                        <td><?php echo $id_anggaran ?></td>
                                        <td><?php echo $uraian ?></td>
                                        <td><?php echo $volume_satuan ?></td>
                                        <td><?php echo "Rp. " . number_format($biaya_unit, 0, ',', '.') ?></td>
                                        <!-- Menampilkan nilai jumlah anggaran -->
                                        <td><?php echo "Rp. " . number_format($jumlah, 0, ',', '.') ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>

                        </table>

                        <!-- Tabel total keseluruhan -->
                        <table width="100%">
                            <thead>
                                <tr>
                                    <td>Total Keseluruhan</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <?php
                                        // Menghitung total jumlah anggaran
                                        $sql4 = "SELECT SUM(volume_satuan * biaya_unit) AS total FROM anggaran";
                                        $q4 = mysqli_query($koneksi, $sql4);
                                        $r4 = mysqli_fetch_array($q4);
                                        $total = $r4['total'];
                                        echo "Rp. " . number_format($total, 0, ',', '.');
                                        ?>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>