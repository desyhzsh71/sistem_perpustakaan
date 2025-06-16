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

if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $harga = $_POST['harga'];

    if($id && $judul_buku && $penulis && $penerbit && $harga){
        $sql = "insert into buku(id,judul_buku,penulis,penerbit,harga) values('$id','$judul_buku','$penulis','$penerbit','$harga')";
        $ql = mysqli_query($koneksi,$sql);
        header("Location: data.php");
        exit();
        if($sql){
            $sukses = "Berhasil menambah data baru";
        }else{
            $error = "Gagal menmbah data";
        }
    }else{
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

                Data Buku
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
                        <?php echo $error?>
                    </div>
                <?php    
                }
                ?>
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses?>
                    </div>
                <?php    
                }
                ?>
                <form action="#" class="form" method="POST">
                    <div class="input-box">
                        <label for="id" class="col-sm-2 col-form-label">ID</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Masukkan ID Buku" value="<?php echo $id ?>">
                    </div>
                    <div class="input-box">
                        <label for="judul_buku" class="col-sm-2 col-form-label">Judul Buku</label>
                        <input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku" value="<?php echo $judul_buku ?>">
                    </div>
                    <div class="input-box">
                        <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Masukkan Nama Penulis" value="<?php echo $penulis ?>">
                    </div>
                    <div class="input-box">
                        <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukkan Penerbit" value="<?php echo $penerbit ?>">
                    </div>
                    <div class="input-box">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Buku" value="<?php echo $harga ?>">
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