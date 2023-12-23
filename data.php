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
    <title>Data Mahasiswa</title>
</head>
<body>
    <div class="container">
        <div class="center">
            <br>
            <h class="header"><center>DATA MAHASISWA</center></h>
            <div class="table-container">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Program Studi</th>
                    </tr>
                    </thead>
                    <?php
                    include "koneksi.php";
                    $sql = "SELECT * FROM mahasiswa ORDER BY nim ASC;";

                    $result = mysqli_query($con, $sql);
                    $no = 0;
                    while ($data = mysqli_fetch_array($result)){
                        $no++;
                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $data["nama"];?></td>
                            <td><?php echo $data["NIM"];?></td>
                            <td><?php echo $data["program_studi"];?></td>
                            <td>
                                <a href="update.php?nim=<?php echo htmlspecialchars($data['NIM']);?>&nama=<?php echo htmlspecialchars($data['nama']);?>&program_studi=<?php echo htmlspecialchars($data['program_studi']);?>" role="button"><span class="material-symbols-outlined">Edit</span></a>
                                <a href="delete.php?nim=<?php echo htmlspecialchars($data['NIM']);?>" role="button"><span class="material-symbols-outlined">Backspace</span></a>
                            </td>
                        </tr>
                        </tbody>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <button onclick="create()">Tambah Data</button>
            <button onclick="main_back()">Kembali</button>
        </div>
    </div>
    <script src="index.js"></script>
</body>
</html>
