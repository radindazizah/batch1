<html>
<head>
<title>Bootcamp09</title>
<link href="<?=base_url()?>modules/bootcamp09/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url()?>modules/bootcamp09/css/jquery-ui.css" />
<link rel="stylesheet" href="<?=base_url()?>modules/bootcamp09/css/ui.jqgrid.css" />
</head>
<body>

<?php
echo "username : ".$user;
?>
<a href="ajaxform/?id=<?=$user?>" style="position:relative;float:right;margin-right:20px;">ajax form</a>
<table id="userKaryawan"></table>
<?php print_r($user);?>
<div id="userKaryawanPager"></div>

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tambah Data</button>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Karyawan</h4>
      </div>
      <div class="modal-body">
	  <div class="form-group">
		<label for="exampleInputEmail1">NIK</label>
		<input type="text" class="form-control" id="nik" aria-describedby="nik" placeholder="Masukkan NIK">
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Nama</label>
		<input type="text" class="form-control" id="nama" aria-describedby="nama" placeholder="Masukkan Nama Lengkap">
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Tempat Lahir</label>
		<input type="text" class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir" placeholder="Masukkan Tempat Lahir">
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Tanggal Lahir</label>
		<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="tanggal_lahir" placeholder="Masukkan Tanggal Lahir">
		<small id="tanggal_lahir" class="form-text text-muted">Contoh: 2023-09-02 / tahun-bulan-hari</small>
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Tempat Lahir</label>
		<input type="text" class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir" placeholder="Masukkan Tempat Lahir">
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Umur</label>
		<input type="text" class="form-control" id="umur" aria-describedby="umur" placeholder="Masukkan Umur">
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Alamat</label>
		<input type="text" class="form-control" id="alamat" aria-describedby="alamat" placeholder="Masukkan Alamat">
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Telepon</label>
		<input type="text" class="form-control" id="telepon" aria-describedby="telepon" placeholder="Masukkan Nomor Telepon">
		<small id="telepon" class="form-text text-muted">Contoh: 0813xxxxxxxx</small>
	</div>
    <div class="form-group">
      <label for="jabatan">Jabatan</label>
      <select id="jabatan" class="form-control">
        <option selected>Staff</option>
		<option>Manager</option>
		<option>Supervisor</option>
      </select>
	  <small id="jabatan" class="form-text text-muted">Klik pada pilihan untuk memilih jabatan</small>
    </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" data-dismiss="modal">Tambah</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
	var USER_ID='<?=$user?>';
	var BASE_URL='<?=base_url()?>';
</script>
<script src='<?=base_url()?>modules/bootcamp09/js/jquery-2.0.3.min.js'></script>
<script src="<?=base_url()?>modules/bootcamp09/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>modules/bootcamp09/js/jquery-ui.js"></script>
<script src="<?=base_url();?>modules/bootcamp09/js/jqGrid/jquery.jqGrid.js"></script>
<script src="<?=base_url();?>modules/bootcamp09/js/jqGrid/i18n/grid.locale-en.js"></script>
<script src="<?php echo base_url();?>modules/bootcamp09/js/Bootcamp09.js?v=<?=rand(0,20);?>"></script>
</body>
</body>
