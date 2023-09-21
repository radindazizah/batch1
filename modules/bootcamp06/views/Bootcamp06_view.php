<html>
<head>
<title>Bootcamp06</title>
<link href="<?=base_url()?>modules/bootcamp06/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url()?>modules/bootcamp06/css/jquery-ui.css" />
<link rel="stylesheet" href="<?=base_url()?>modules/bootcamp06/css/ui.jqgrid.css" />
<!-- <style>
	.container {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		text-align: center;
	}
	.popup {
		background: #000;	
		color: #fff;
		width: 100%;
		height: 100%;
		position: absolute;
		top: 0;
		display: flex;
		justify-content: center;
		align-items: center;
		text-align: center;
	}
	.popup-content {
		height: 250px;
		width: 500px;
		background: #fff;
		padding: 20px;
		border-radius: 5px;
		position: relative;
	}
	input {
		margin: 20px auto;
		display: block;
		width: 50%;
		padding: 8px;
		border: 1px solid black;

	}
</style> -->
</head>

<body>
<?php
echo "username : ".$user;	
?>

<br>

<div class="container">
	<center>
        <button type="button" class="text-center btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Data</button>
    </center>
	<br>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title">Add data</h4>
                </div>
                <div class="modal-body">
                    <label for="nik">NIK</label>
					<input type="text" class="form-control" placeholder="Masukkan NIK" id="nik"><br>
					<label for="nama">Nama</label>
					<input type="text" class="form-control" placeholder="Masukkan nama" id="nama"><br>
					<label for="tempatlahir">Tempat Lahir</label>
					<input type="text" class="form-control" placeholder="Masukkan tempat lahir" id="tempatlahir"><br>
					<label for="tanggallahir">Tanggal Lahir</label>
					<input type="date" class="form-control" placeholder="Masukkan tanggal lahir" id="tanggallahir"><br>
					<label for="umur">Umur</label>
					<input type="number" class="form-control" placeholder="Masukkan umur" id="umur"><br>
					<label for="alamat">Alamat</label>
					<input type="text" class="form-control" placeholder="Masukkan alamat" id="alamat"><br>
					<label for="telp">No Telepon</label>
					<input type="text" class="form-control" placeholder="Masukkan nomor telepon" id="telp"><br>
					<label for="jabatan">Jabatan</label>
					<select class="form-control" id="jabatan">
						<option selected>Pilih jabatan</option>
						<option value="1">Supervisor</option>
						<option value="2">Manager</option>
						<option value="3">Staff</option>
					</select>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>    
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
   </div>        
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>



<!-- 
<div class="popup" id="form-editdata">
	<div class="popup-content">
		<input type="text" placeholder="Username">
		<input type="text" placeholder="Password">
		<a href="#" class="button">Save</a>
		<a href="#" class="button close">Close</a>
	</div>
</div>
<script>
	document.getElementById(".buttonadd").addEventListener("click", function() {
		document.querySelector(".popup").style.display = "flex";
	})

	document.querySelector(".close").addEventListener("click", function(){
		document.querySelector(".popup").style.display = "none";
	})
</script> -->

<table id="userKaryawan"></table>
<div id="userKaryawanPager"></div>
<script type="text/javascript">
	var USER_ID='<?=$user?>';
</script>
<script src='<?=base_url()?>modules/bootcamp06/js/jquery-2.0.3.min.js'></script>
<script src="<?=base_url()?>modules/bootcamp06/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>modules/bootcamp06/js/jquery-ui.js"></script>
<script src="<?=base_url();?>modules/bootcamp06/js/jqGrid/jquery.jqGrid.js"></script>
<script src="<?=base_url();?>modules/bootcamp06/js/jqGrid/i18n/grid.locale-en.js"></script>
<script src="<?php echo base_url();?>modules/bootcamp06/js/bootcamp06.js?v=<?=rand(0,20);?>"></script>

</body>
