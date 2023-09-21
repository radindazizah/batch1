<html>
<head>
<title>Bootcamp07</title>
<link href="<?=base_url()?>modules/bootcamp07/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url()?>modules/bootcamp07/css/jquery-ui.css" />
<link rel="stylesheet" href="<?=base_url()?>modules/bootcamp07/css/ui.jqgrid.css" /> 
<style>
	#addbtn {
		margin: 1em;
		border-radius: 10px;
	}
	.modal {
	  display: none; 
	  position: fixed;
	  z-index: 1; 
	  padding-top: 100px; 
	  left: 0;
	  top: 0;
	  width: 100%; 
	  height: 100%; 
	  overflow: auto; 
	}
	.modal-content {
	  background-color: #fefefe;
	  margin: auto;
	  padding: 20px;
	  border: 1px solid #888;
	  width: 80%;
	}
	.close {
	  color: #aaaaaa;
	  float: right;
	  font-size: 28px;
	  font-weight: bold;
	}
	.close:hover,
	.close:focus {
	  color: #000;
	  text-decoration: none;
	  cursor: pointer;
	}
</style>
</head>
<body>
<?php
echo "username : ".$user;
?>
<br>
<div class="add">
<button class="btn btn-primary" id="addbtn">Tambah Data Karyawan</button>
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <form id="form-input">
	<div class="form-group">
	<label for="nik">NIK</label>
    <input type="text" class="form-control" id="nik" name="nik" placeholder="Input NIK" required>
    </div>
	<div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama" required>
    </div>
    <div class="form-group">
    <label for="tempatlahir">Tempat Lahir</label>
    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" placeholder="Input Tempat Lahir" required>
    </div>
	<div class="form-group">
    <label for="tanggallahir">Tanggal Lahir</label>
    <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" placeholder="Input Tanggal Lahir" required>
    </div>
	<div class="form-group">
    <label for="umur">Umur</label>
    <input type="text" class="form-control" id="umur" name="umur" placeholder="Input Umur" required>
    </div>
	<div class="form-group">
    <label for="alamat">Alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Input Alamat" required>
    </div>
	<div class="form-group">
    <label for="telp">Nomor Telepon</label>
    <input type="text" class="form-control" id="telp" name="telp" placeholder="Input Nomor Telepon" required>
    </div>
	<div class="form-group">
	<label for="jabatan">Jabatan</label>
    <select name="jabatan" class="form-control" id="jabatan" required>
    <option value="staff">Staff</option>
    <option value="supervisor">Supervisor</option>
	<option value="manager">Manager</option>
    </select>
    </div>    
	<div class="form-group">
    <label for="createtime">Created Time</label>
    <input type="datetime-local" class="form-control" id="created_time" name="created_time" required>
    </div>
	<script>
	document.addEventListener("DOMContentLoaded", function () {
	var createdTimeInput = document.getElementById("created_time");
	var currentDateTime = new Date().toISOString("en-US", {
      timeZone: "Asia/Jakarta",
    });
    createdTimeInput.value = currentDateTime;
	});
	</script>
	<button type="submit" id="simpan" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
<script>
var modal = document.getElementById("myModal");
var btn = document.getElementById("addbtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<table id="userKaryawan"></table>
<div id="userKaryawanPager"></div>
<script type="text/javascript">
	var USER_ID='<?=$user?>';
</script>
<script src='<?=base_url()?>modules/bootcamp07/js/jquery-2.0.3.min.js'></script>
<script src="<?=base_url()?>modules/bootcamp07/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>modules/bootcamp07/js/jquery-ui.js"></script>
<script src="<?=base_url();?>modules/bootcamp07/js/jqGrid/jquery.jqGrid.js"></script>
<script src="<?=base_url();?>modules/bootcamp07/js/jqGrid/i18n/grid.locale-en.js"></script>
<script src="<?php echo base_url();?>modules/bootcamp07/js/bootcamp07.js?v=<?=rand(0,20);?>"></script>
</body>