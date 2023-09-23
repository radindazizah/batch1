<html>

<head>
    <title>Bootcamp08</title>
    <link href="<?=base_url()?>modules/bootcamp08/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?=base_url()?>modules/bootcamp08/css/jquery-ui.css" />
    <link rel="stylesheet" href="<?=base_url()?>modules/bootcamp08/css/ui.jqgrid.css" />
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box;
    }
    </style>
</head>

<body>
    <h1>Data Karyawan</h1>
    <?php
echo "username : ".$user;
?>
    <br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
        Tambah Data
    </button>
    <table id="userKaryawan"></table>
    <div id="userKaryawanPager"></div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <form action="<?php echo site_url(). '/bootcamp08/tambah_aksi'; ?>" method="post" class="form-container">
            <div class=" modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle">Tambah Data</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="nik"><b>NIK</b></label><br>
                        <input type="text" class="form-control" placeholder="Masukkan NIK" name="nik" required><br>

                        <label for="nama"><b>Nama</b></label><br>
                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" required><br>

                        <label for="tmplahir"><b>Tempat Lahir</b></label><br>
                        <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" name="tempat_lahir"
                            required><br>

                        <label for="tgllahir"><b>Tanggal Lahir</b></label><br>
                        <input type="date" class="form-control" placeholder="Masukkan Tanggal Lahir"
                            name="tanggal_lahir" required><br>

                        <label for="umur"><b>Umur</b></label><br>
                        <input type="text" class="form-control" placeholder="Masukkan umur" name="umur" required><br>

                        <label for="alamat"><b>Alamat</b></label><br>
                        <input type="text" class="form-control" placeholder="Masukkan alamat" name="alamat"
                            required><br>

                        <label for="notelp"><b>Telp</b></label><br>
                        <input type="text" class="form-control" placeholder="Masukkan no. telepon" name="telp"
                            class="form-control" required><br>

                        <label for="jabatan"><b>Jabatan</b></label><br>
                        <select id="jabatan" name="jabatan" class="form-control" placeholder="Pilih Jabatan" required>
                            <option value="Option 1">Manager</option>
                            <option value="Option 2">Staff</option>
                            <option value="Option 3">Supervisor</option>
                        </select> <br>

                        <label for="created_by"><b>Created By</b></label><br>
                        <input type="text" class="form-control" placeholder="Masukkan nama karyawan" name="created_by"
                            class="form-control" required><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
    var USER_ID = '<?=$user?>';
    </script>
    <script src='<?=base_url()?>modules/bootcamp08/js/jquery-2.0.3.min.js'></script>
    <script src=" <?=base_url()?>modules/bootcamp08/js/bootstrap.min.js">
    </script>
    <script src="<?=base_url()?>modules/bootcamp08/js/jquery-ui.js"></script>
    <script src="<?=base_url();?>modules/bootcamp08/js/jqGrid/jquery.jqGrid.js"></script>
    <script src="<?=base_url();?>modules/bootcamp08/js/jqGrid/i18n/grid.locale-en.js"></script>
    <script src="<?php echo base_url();?>modules/bootcamp08/js/Bootcamp08.js?v=<?=rand(0,20);?>"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <br>
</body>
</body>