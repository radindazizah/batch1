<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Bootcamp04</title>
    <link href="<?= base_url() ?>modules/bootcamp04/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>modules/bootcamp04/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>modules/bootcamp04/css/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url() ?>modules/bootcamp04/css/ui.jqgrid.css">
    <link rel="stylesheet" href="<?= base_url() ?>modules/bootcamp04/css/add.css" />
    <!-- Add any additional CSS here -->
	
</head>
<body>
    <div id="content">
        <?php echo "Username: " . $user; ?>
		<div class="button-wrapper">
			<!-- <button type="button" class="btn btn-primary" id="show-add">Add</button>
            <button type="button" class="btn btn-warning">Edit</button>-->
			<button type="button" class="btn btn-danger">Delete</button>
		</div>
		
        <div class="form-wrapper">
            <form class="add-form-wrapper" action="<?php echo base_url() ?>index.php/bootcamp04/addKaryawan/?id=<?php echo $user ?>" method="POST">
                <h2 class="card-title">Tambah Data Karyawan</h2>
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <?php echo form_error('nik'); ?>
                    <input type="number" class="form-control" id="nik" name="nik" placeholder="Nomor NIK">
                </div>
                <div class="form-group">
                    <label for="nik">Nama</label>
                    <?php echo form_error('nama'); ?>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                </div>
                <div class="form-group">
                    <label for="tempat-lahir">Tempat Lahir</label>
                    <?php echo form_error('tempat_lahir'); ?>
                    <input type="text" class="form-control" id="tempat-lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                </div>
                <div class="form-group">
                    <label for="tanggal-lahir">Tanggal Lahir</label>
                    <?php echo form_error('tanggal_lahir'); ?>
                    <input type="date" class="form-control" id="tanggal-lahir" name="tanggal_lahir" placeholder="Tanggal Lahir">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <?php echo form_error('alamat'); ?>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat"></textarea>
                </div>
                <div class="form-group">
                    <label for="telp">Telp</label>
                    <?php echo form_error('telp'); ?>
                    <input type="text" class="form-control" id="telp" name="telp" placeholder="No. Telepon">
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <?php echo form_error('jabatan'); ?>
                    <select class="form-control" id="jabatan" name="jabatan">
                        <option>manager</option>
                        <option>supervisor</option>
                        <option>staff</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary btn-submit" name="submit" value="Submit"></input>
            </form>
        </div>
       
        <table id="userKaryawan"></table>
        <div id="userKaryawanPager"></div>
    </div>

    <script type="text/javascript">
        var USER_ID = '<?= $user ?>';
        // $(document).ready(function() {
        //     $(".add-form-wrapper").hide();
        //     $("#show-add").click(function() {
        //         $(".add-form-wrapper").show();
        //     });
        // });
    </script>
    
    <!-- Load JavaScript from external files -->
    <script src="https://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?= base_url() ?>modules/bootcamp04/js/jqGrid/jquery.jqGrid.js"></script>
    <script src="<?= base_url() ?>modules/bootcamp04/js/jqGrid/i18n/grid.locale-en.js"></script>
    <script src="<?= base_url() ?>modules/bootcamp04/js/Bootcamp04.js?v=<?= time(); ?>"></script>
	
    <!-- Add any additional JavaScript files here -->
</body>
</html>
