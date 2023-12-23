<?php
    include "koneksi.php";

    if (isset($_GET['nim'])) {
        $nim = htmlspecialchars($_GET["nim"]);
        $sql = "DELETE FROM mahasiswa WHERE NIM = '$nim' ";
        $result = mysqli_query($con, $sql);

        if ($result){
            header("Location:data.php");
        }
        else{
            echo "<div> Data Gagal dihapus.</div>";
        }
    }
?>


