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
    <title>Admin</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="stylepeminjaman.css">
</head>

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

            Pengembalian Buku
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
</div>

<body><style>
</style>
    <div class="card">
        <hdr>Tambah Data Baru</hdr>
        <div class="card-body">
            <?php
            if ($error) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
            <?php
            }
            ?>
            <?php
            if ($error) {
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $sukses ?>
                </div>
            <?php
            }
            ?>
            <form action="#" class="form" method="POST">
                <div class="input-box">
                    <label for="id_anggota" class="col-sm-2 col-form-label">ID Anggota</label>
                    <input type="text" class="form-control" id="id_anggota" name="id_anggota"
                            placeholder="Masukkan ID Anggota" value="<?php echo $id_anggota ?>">
                </div>
                <div class="input-box">
                    <label for="nama_angggota" class="col-sm-2 col-form-label">Nama Anggota</label>
                    <input type="text" class="form-control" id="nama_angggota" name="nama_angggota"
                            placeholder="Masukkan Nama Anggota" value="<?php echo $nama_angggota ?>">
                </div>
                <div class="input-box">
                    <label for="judul_buku" class="col-sm-2 col-form-label">Judul Buku</label>
                    <input type="text" class="form-control" id="judul_buku" name="judul_buku"
                            placeholder="Masukkan Judul Buku" value="<?php echo $judul_buku ?>">
                </div>
                <div class="input-box">
                    <label for="tanggal_pengembalian" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                    <input type="text" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian"
                            placeholder="Masukkan Tanggal Pengembalian" value="<?php echo $tanggal_pengembalian ?>">
                </div>
                <div class="input-box">
                    <label for="tanggal_kembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                    <input type="text" class="form-control" id="tanggal_kembali" name="tanggal_kembali"
                            placeholder="Masukkan Tanggal Kembali" value="<?php echo $tanggal_kembali ?>">
                </div>
                <div class="user">
                <button <input type="submit" name="simpan" value="Simpan Data" class="button type">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>