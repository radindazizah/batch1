<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Data karyawan</h1>
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
        <tbody>
            <?php
            $no = 1;
            foreach ($karyawan as $k) :
            ?>
                <tr>
                    <td><?= $k['nik'] ?></td>
                    <td><?= $k['nama'] ?></td>
                    <td><?= $k['tempat_lahir'] ?></td>
                    <td><?= $k['tanggal_lahir'] ?></td>
                    <td><?= $k['umur'] ?></td>
                    <td><?= $k['alamat'] ?></td>
                    <td><?= $k['telp'] ?></td>
                    <td><?= $k['jabatan'] ?></td>
                    <td><?= $k['created_by'] ?></td>
                    <td><?= $k['created_time'] ?></td>
                    <td><a href="" class="btn btn-success">Add</a>
                        <a href="" class="btn btn-warning">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</body>

</html>