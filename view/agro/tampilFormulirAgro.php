<?php
include "../temp.php";
$user_id = $_SESSION['id_agro'];

if(!isset($user_id)){
   header('location:loginAgro.php');
};

class FormulirAgro {

    private $conn;
    private $user_id;

    public function __construct($koneksi) {
        $this->conn = $koneksi;
        $this->user_id = $_SESSION['id_Agro'];
    }

    public function get_produk($kata_cari = null) {
        $query = "SELECT * FROM formulir where id_Agro = 3";

        if ($kata_cari) {
            $query .= " WHERE nama like '%".$kata_cari."%'";
        }

        $query .= " ORDER BY id_form ASC";

        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            die("Query Error : ".mysqli_errno($this->conn)." - ".mysqli_error($this->conn));
        }

        $data = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }
}

// Membuat koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'ppl');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$produk = new FormulirAgro($koneksi);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_form = $_POST['id_form'];
    $setuju = $_POST['setuju'];

    $query = "UPDATE formulir SET tglsetuju = $setuju WHERE id_form = $id_form";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>PENCARIAN GILACODING</title>
    <style type="text/css">
        * {
            font-family: "Trebuchet MS";
        }
        h1 {
            text-transform: uppercase;
            color: salmon;
        }
        table {
            border: 1px solid #ddeeee;
            border-collapse: collapse;
            border-spacing: 0;
            width: 70%;
            margin: 10px auto 10px auto;
        }
        th, td {
            border: 1px solid #ddeeee;
            padding: 20px;
            text-align: left;
        }
    </style>
</head>
<body >
    <div style="margin: auto;width: 50%;margin-top:5%">
    <center><h3>Cari Formulir Kemitraan</h3></center>
    <form method="GET" action="cariAgro.php" style="text-align: center;">
        <label>Nama : </label>
        <input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>"  />
        <button type="submit">Cari</button>
    </form>
    <table class="">
        <thead class="">
            <tr>
                <th>No</th>
                <th>Nama Pengaju</th>
                <th>Detail</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $kata_cari = isset($_GET['kata_cari']) ? $_GET['kata_cari'] : null;
            $data = $produk->get_produk($kata_cari);

            foreach ($data as $row) {
            ?>
            <?php $i = 0; ?>
            <tr>
                <td><?php echo $row['id_Agro']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><a href="formFormulir.php?id=<?php echo $row['id_form'];?>" >
            Detail
            </a></td>
        
                
                <td><?php if($row['tglsetuju'] == 0){
                    echo('Belum Disetujui');
                }
                elseif($row['tglsetuju'] == 1){
                    echo('Telah Disetujui');
                }
                elseif($row['tglsetuju'] == 2){
                    echo('Ditolak');
                }
                    ; ?></td>
                
                    <td><form method="POST">
                <input type="hidden" name="id_form" value="<?php echo $row['id_form']; ?>">
                <button type="submit" name="setuju" value="1">Terima</button>
                <button type="submit" name="setuju" value="2">Tolak</button>
            </form></td>
                </form>
            </td>
            </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
    <a href="homeAgro.php" class="delete-btn">go back</a>
    </div>
    
</body>
</html>

