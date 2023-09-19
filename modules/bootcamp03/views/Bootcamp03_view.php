<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootcamp 03</title>
    <link href="<?= base_url() ?>modules/bootcamp03/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>modules/bootcamp03/css/jquery-ui.css" />
    <link rel="stylesheet" href="<?= base_url() ?>modules/bootcamp03/css/ui.jqgrid.css" />
    <link rel="stylesheet" href="<?= base_url() ?>modules/bootcamp03/css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <?php
        echo "<p>Username : " . $user . "</p>";
        ?>

        <table id="userKaryawan"></table>
        <div id="userKaryawanPager"></div>

        <div class="button-wrapper">
            <button type="button" class="btn btn-primary" id="show-add">Add</button>
            <button type="button" class="btn btn-warning">Edit</button>
            <button type="button" class="btn btn-danger">Delete</button>
        </div>

        <div class="row form-wrapper">
            <div class="col-lg-3 add-form-wrapper">
                <form>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control" id="nik" placeholder="NIK">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="tempat-lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat-lahir" placeholder="Tempat Lahir">
                    </div>
                    <div class="form-group">
                        <label for="umur">Umur</label>
                        <input type="number" class="form-control" id="umur" placeholder="Umur">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label for="telp">Telp</label>
                        <input type="text" class="form-control" id="telp" placeholder="No. Telepon">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" placeholder="Jabatan">
                    </div>
                    <div class="btn-submit-wrapper">
                        <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>


    </div>

    <script type="text/javascript">
        var USER_ID = '<?= $user ?>';

        $(document).ready(function() {
            $(".add-form-wrapper").hide();
            $("#show-add").click(function() {
                $(".add-form-wrapper").show();
            });
        });
    </script>

    <script src='<?= base_url() ?>modules/bootcamp03/js/jquery-2.0.3.min.js'></script>
    <script src="<?= base_url() ?>modules/bootcamp03/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>modules/bootcamp03/js/jquery-ui.js"></script>
    <script src="<?= base_url(); ?>modules/bootcamp03/js/jqGrid/jquery.jqGrid.js"></script>
    <script src="<?= base_url(); ?>modules/bootcamp03/js/jqGrid/i18n/grid.locale-en.js"></script>
    <script src="<?php echo base_url(); ?>modules/bootcamp03/js/Bootcamp03.js?v=<?= rand(0, 20); ?>"></script>
</body>

</html>