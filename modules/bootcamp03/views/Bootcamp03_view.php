<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // print_r($karyawan);
    echo "username : " . $user;
    ?>
    
    <h1>Data Karyawan</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Nik</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Jabatan</th>
                <th>Created By</th>
                <th>Created Time</th>
            </tr>
        </thead>
        <?php

        if ($user == "hendri") {
            echo "<tbody>";
            $no = 1;
            foreach ($karyawan as $k) :
            echo "<tr>";
            echo "<td>" . $k ['nik'] . "</td>";
            echo "<td>" . $k ['nama'] . "</td>";
            echo "<td>" . $k ['tempat_lahir'] . "</td>";
            echo "<td>" . $k ['tanggal_lahir'] . "</td>";
            echo "<td>" . $k ['umur'] . "</td>";
            echo "<td>" . $k ['alamat'] . "</td>";
            echo "<td>" . $k ['telp'] . "</td>";
            echo "<td>" . $k ['jabatan'] . "</td>";
            echo "<td>" . $k ['created_by'] . "</td>";
            echo "<td>" . $k ['created_time'] . "</td>";
            echo "<td>
                    <a href='#' class='btn btn-success'>Add</a>
                    <a href='#' class='btn btn-warning'>Edit</a>
                    <a href='#' class='btn btn-danger'>Delete</a>
                </td>";
            echo "</tr>";
            endforeach;
            echo "</tbody>";
        } else {
            echo "<tbody>";
            echo "</tbody>";
        }

        ?>  
    </table>
</body>

</html>