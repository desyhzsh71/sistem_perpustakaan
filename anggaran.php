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
        $sql = "insert into anggaran(id_anggaran,uraian,volume_satuan,biaya_unit) values('$id_anggaran','$uraian','$volume_satuan','$biaya_unit')";
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

            Anggaran Perpustakaan
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

<body>
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
                    <label for="id_anggaran" class="col-sm-2 col-form-label">ID Anggaran</label>
                    <input type="text" class="form-control" id="id_anggaran" name="id_anggaran"
                        placeholder="Masukkan ID Anggaran" value="<?php echo $id_anggaran ?>">
                </div>
                <div class="input-box">
                    <label for="uraian" class="col-sm-2 col-form-label">Uraian</label>
                    <input type="text" class="form-control" id="uraian" name="uraian"
                        placeholder="Masukkan Data Uraian" value="<?php echo $uraian ?>">
                </div>
                <div class="input-box">
                    <label for="volume_satuan" class="col-sm-2 col-form-label">Volume/satuan</label>
                    <input type="int" class="form-control" id="volume_satuan" name="volume_satuan"
                        placeholder="Masukkan Volume/satuan" value="<?php echo $volume_satuan ?>">
                </div>
                <div class="input-box">
                    <label for="biaya_unit" class="col-sm-2 col-form-label">Biaya/unit</label>
                    <input type="varchar" class="form-control" id="biaya_unit" name="biaya_unit" 
                       placeholder="Masukkan Biaya/unit" value="<?php echo $biaya_unit ?>">
                </div>
                <div class="user">
                    <button <input type="submit" name="simpan" value="Simpan Data" class="button type">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>

</html>