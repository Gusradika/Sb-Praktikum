<?php

// var_dump($_POST);
// die();

if (isset($_POST['portal'])) {
    if ($_POST['portal'] == 'tambahTarif') {
        $x = new  AlterTarif;
        $x->tambahTarif();
    }
};

if (isset($_POST['portal'])) {
    if ($_POST['portal'] == 'updateTarif') {
        $x = new  AlterTarif;
        $x->updateTarif();
    }
};

if (isset($_POST['portal'])) {
    if ($_POST['portal'] == 'deleteTarif') {
        $x = new  AlterTarif;
        $x->deleteTarif();
    }
};

if (isset($_POST['portal'])) {
    if ($_POST['portal'] == 'tambahTindakan') {
        $x = new  alterTindakan;
        $x->tambahTindakan();
    }
};

if (isset($_POST['portal'])) {
    if ($_POST['portal'] == 'updateTindakan') {
        $x = new  alterTindakan;
        $x->updateTindakan();
    }
};

if (isset($_POST['portal'])) {
    if ($_POST['portal'] == 'deleteTindakan') {
        $x = new  alterTindakan;
        $x->deleteTindakan();
    }
};

if (isset($_POST['portal'])) {
    if ($_POST['portal'] == 'tambahPendidikan') {
        $x = new  alterPendidikan;
        $x->tambahPendidikan();
    }
};

if (isset($_POST['portal'])) {
    if ($_POST['portal'] == 'updatePendidikan') {
        $x = new  alterPendidikan;
        $x->updatePendidikan();
    }
};

if (isset($_POST['portal'])) {
    if ($_POST['portal'] == 'deletePendidikan') {
        $x = new  alterPendidikan;
        $x->deletePendidikan();
    }
};

if (isset($_POST['portal'])) {
    if ($_POST['portal'] == 'tambahCoa') {
        $x = new  alterCoa;
        $x->tambahCoa();
    }
};

if (isset($_POST['portal'])) {
    if ($_POST['portal'] == 'updateCoa') {
        $x = new  alterCoa;
        $x->updateCoa();
    }
};

if (isset($_POST['portal'])) {
    if ($_POST['portal'] == 'deleteCoa') {
        $x = new  alterCoa;
        $x->deleteCoa();
    }
};


class AlterTarif
{
    function tambahTarif()
    {
        include './connection.php';
        $jenis = $_POST['jenis'];
        $berat = $_POST['berat'];
        $kategori = $_POST['kategori'];
        $biaya = $_POST['biaya'];

        $querySQL = "insert into tarifs (`jenis`, `beratMin`, `kategori`, `biaya`) values ('$jenis','$berat','$kategori',$biaya)";
        // $statement = $conn->prepare($querySQL);
        // $statement->bind_param($jenis, $berat, $kategori, $biaya);
        mysqli_query($conn, $querySQL);
        // exit();
        header('location: index.php');
    }

    function updateTarif()
    {

        include './connection.php';
        $id = $_POST['idTarif'];
        $jenis = $_POST['jenis'];
        $berat = $_POST['berat'];
        $kategori = $_POST['kategori'];
        $biaya = $_POST['biaya'];

        $querySQL = "update tarifs set jenis = '$jenis', beratMin = '$berat', kategori = '$kategori', biaya = '$biaya' where id = '$id'";
        mysqli_query($conn, $querySQL);
        // var_dump($_POST);
        // die();
        header('location: index.php');
    }

    function deleteTarif()
    {

        include './connection.php';
        $id = $_POST['id'];

        $querySQL = "DELETE FROM tarifs WHERE id = '$id'";
        mysqli_query($conn, $querySQL);
        // var_dump($_POST);
        // die();
        header('location: index.php');
    }
}


class alterTindakan
{
    function tambahTindakan()
    {
        include './connection.php';
        $departement = $_POST['departement'];
        $perawatan = $_POST['perawatan'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $biaya = $_POST['biaya'];
        $kode = $_POST['kode'];
        $keterangan = $_POST['keterangan'];
        $aktif = $_POST['aktif'];

        $querySQL = "INSERT INTO tindakans (`departement`, `perawatan`, `nama`, `harga`, `biaya`, `kode`,`keterangan`, `aktif`) values ('$departement','$perawatan','$nama',$harga, $biaya, '$kode', '$keterangan', '$aktif')";
        // $statement = $conn->prepare($querySQL);
        // $statement->bind_param($jenis, $berat, $kategori, $biaya);
        mysqli_query($conn, $querySQL);
        // exit();
        header('location: index.php');
    }

    function updateTindakan()
    {
        include './connection.php';
        $id = $_POST['id'];
        $departement = $_POST['departement'];
        $perawatan = $_POST['perawatan'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $biaya = $_POST['biaya'];
        $kode = $_POST['kode'];
        $keterangan = $_POST['keterangan'];
        $aktif = $_POST['aktif'];

        $querySQL = "UPDATE tindakans SET departement = '$departement', perawatan = '$perawatan', nama = '$nama', harga = '$harga', biaya = '$biaya', kode = '$kode', keterangan = '$keterangan', aktif = '$aktif' where id = '$id'";
        mysqli_query($conn, $querySQL);
        // var_dump($_POST);
        // die();

        header('location: index.php');
    }

    function deleteTindakan()
    {
        include './connection.php';
        $id = $_POST['id'];

        $querySQL = "DELETE FROM tindakans WHERE id = '$id'";
        mysqli_query($conn, $querySQL);
        // var_dump($_POST);
        // die();
        header('location: index.php');
    }
}

class alterPendidikan
{
    function tambahPendidikan()
    {
        include './connection.php';
        $pendidikan = $_POST['pendidikan'];
        $aktif = $_POST['aktif'];

        $querySQL = "INSERT INTO pendidikans (`pendidikan`, `aktif`) values ('$pendidikan', '$aktif')";
        // $statement = $conn->prepare($querySQL);
        // $statement->bind_param($jenis, $berat, $kategori, $biaya);
        mysqli_query($conn, $querySQL);
        // exit();
        header('location: index.php');
    }

    function updatePendidikan()
    {
        include './connection.php';
        $id = $_POST['id'];
        $pendidikan = $_POST['pendidikan'];
        $aktif = $_POST['aktif'];

        $querySQL = "UPDATE pendidikans SET pendidikan = '$pendidikan', aktif = '$aktif' where id = '$id'";
        mysqli_query($conn, $querySQL);
        // var_dump($_POST);
        // die();

        header('location: index.php');
    }

    function deletePendidikan()
    {
        include './connection.php';
        $id = $_POST['id'];

        $querySQL = "DELETE FROM pendidikans WHERE id = '$id'";
        mysqli_query($conn, $querySQL);
        // var_dump($_POST);
        // die();
        header('location: index.php');
    }
}


class alterCoa
{
    function tambahCoa()
    {
        include './connection.php';
        $kode = $_POST['kode'];
        $induk = $_POST['induk'];
        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $header = $_POST['header'];
        $aktif = $_POST['aktif'];

        $querySQL = "INSERT INTO coas (`kode`, `induk`, `nama`, `jenis`,`header`, `aktif`) values ('$kode', '$induk', '$nama', '$jenis', '$header', '$aktif')";
        // $statement = $conn->prepare($querySQL);
        // $statement->bind_param($jenis, $berat, $kategori, $biaya);
        mysqli_query($conn, $querySQL);
        // exit();
        header('location: index.php');
    }

    function updateCoa()
    {
        include './connection.php';
        $id = $_POST['id'];
        $kode = $_POST['kode'];
        $induk = $_POST['induk'];
        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $header = $_POST['header'];
        $aktif = $_POST['aktif'];

        $querySQL = "UPDATE coas SET kode = '$kode', induk = '$induk', nama = '$nama', jenis = '$jenis' , header = '$header' , aktif = '$aktif' where id = '$id'";
        mysqli_query($conn, $querySQL);
        // var_dump($_POST);
        // die();

        header('location: index.php');
    }

    function deleteCoa()
    {
        include './connection.php';
        $id = $_POST['id'];

        $querySQL = "DELETE FROM coas WHERE id = '$id'";
        mysqli_query($conn, $querySQL);
        // var_dump($_POST);
        // die();
        header('location: index.php');
    }
}




// $kode = $_POST['kode_karyawan'];
// $nama = $_POST['nama'];
// $jabatan = $_POST['jabatan'];
// $telepon = $_POST['telepon'];
// $email = $_POST['email'];
// $password = $_POST['password'];

// // without using prepared statement
// // $querySQL = "insert into karyawan values ('$kode','$nama','$jabatan','$telepon','$email','$password')";
// // mysqli_query($conn, $querySQL);

// // using prepare statement
// $querySQL = "insert into karyawan (`kode_karyawan`, `nama`, `jabatan`, `telepon`, `email`, `password`) values (?,?,?,?,?,?)";
// $stmt = $conn->prepare($querySQL);
// $stmt->bind_param('ssssss', $kode, $nama, $jabatan, $telepon, $email, $password);
// $stmt->execute();
