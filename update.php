<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Iceberg&family=Metal+Mania&family=Open+Sans:wght@500&family=Poppins:wght@400;500;600&family=Roboto+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <title>Pembaruan Data Mahasiswa</title>
</head>
<body>
<div class="container">
    <?php
    include "koneksi.php";

    function input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (isset($_GET['nim'])){
        $nim = input($_GET["nim"]);
        $nama = input($_GET["nama"]);
        $prodi = input($_GET["program_studi"]);
        $sql = "SELECT * FROM mahasiswa WHERE NIM = $nim";
        $result = mysqli_query($con, $sql);
        $data = mysqli_fetch_assoc($result);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $id_nim = htmlspecialchars($_POST["id_nim"]);
        $nim = input($_POST["nim"]);
        $nama = input($_POST["nama"]);
        $prodi = input($_POST["program_studi"]);

        $sql = "UPDATE mahasiswa SET NIM = '$nim', nama = '$nama', program_studi = '$prodi' WHERE NIM = $id_nim";
        $result = mysqli_query($con, $sql);

        if ($result){
            header("Location:data.php");
        }
        else{
            echo '<script>alert("Data Gagal Disimpan, Pastikan Data Valid!");</script>';
        }
    }
    ?>

    <div class="center">
        <h class="header"><center>EDIT DATA</center></h>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <table class="input-table">
                <div>
                    <tr>
                        <td><label>NIM</label></td>
                        <td><input type="text" name="nim" value="<?php echo htmlspecialchars($nim);?>" placeholder="NIM" required/></td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <td><label>Nama</label></td>
                        <td><input type="text" name="nama" value="<?php echo htmlspecialchars($nama);?>" placeholder="Nama" required/></td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <td><label>Program Studi</label></td>
                        <td><input type="text" name="program_studi" value="<?php echo htmlspecialchars($prodi);?>" required/></td>
                    </tr>
                </div>
                <input type="hidden" name="id_nim" value="<?php echo $data['NIM']; ?>" />
            </table>
            <button type="submit" name="submit">Submit</button>
            <button onclick="back()">Kembali</button>
        </form>
    </div>
</div>
<script src="index.js"></script>
</body>
</html>