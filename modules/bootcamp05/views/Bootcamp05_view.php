<html>
<head>
<title>Bootcamp05</title>
<link href="<?=base_url()?>modules/bootcamp05/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url()?>modules/bootcamp05/css/jquery-ui.css" />
<link rel="stylesheet" href="<?=base_url()?>modules/bootcamp05/css/ui.jqgrid.css" />
<link rel="stylesheet" href="<?= base_url() ?>modules/bootcamp05/css/style.css" />
<style>
body {font-family: Arial, Helvetica, sans-serif;}

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
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4);
}


.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
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
h1 {
  margin-left: 20px;
}
.button-container {
  text-align: right;
  margin-bottom: 10px;
}

.button-container button {
  margin-right: 15px;
}
</style>
</head>
<body>
<h1> Data Karyawan </h1>
<?php
echo "username : ".$user;
?>
<div class="button-container">
    <button id="myBtn" class="btn btn-primary">Tambah Data</button>
</div>

<div id="myModal" class="modal">

  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Tambah Data</h2>
    <form id="addDataForm">
      <div class="form-group">
        <label for="nik">NIK:</label>
        <input type="text" id="nik" name="nik" class="form-control" placeholder="Masukkan NIK" required>
      </div>
      
      <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama" required>
      </div>
      
      <div class="form-group">
        <label for="tempat_lahir">Tempat Lahir:</label>
        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" required>
      </div>
      
      <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
      </div>
      
      <div class="form-group">
        <label for="umur">Umur:</label>
        <input type="number" id="umur" name="umur" class="form-control" placeholder="Masukkan Umur" required>
      </div>
      
      <div class="form-group">
        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
      </div>
      
      <div class="form-group">
        <label for="telp">Telepon:</label>
        <input type="text" id="telp" name="telp" class="form-control" placeholder="Masukkan Nomor Telepon" required>
      </div>
      
      <div class="form-group">
        <label for="jabatan">Jabatan:</label>
        <select id="jabatan" name="jabatan" class="form-control" placeholder="Pilih Jabatan" required>
          <option value="Option 1">Manager</option>
          <option value="Option 2">Staff</option>
          <option value="Option 3">Supervisor</option>
        </select>
      </div>
      
      <div class="form-group">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Masukkan Nama lengkap"required>
      </div>
      
      <div class="form-group">
        <label for="created_time">Created Time:</label>
        <input type="datetime-local" id="created_time" name="created_time" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<script>
var modal = document.getElementById("myModal");

var btn = document.getElementById("myBtn");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
      modal.style.display = "block";
      btn.style.backgroundColor = "green";
    }

span.onclick = function() {
	modal.style.display = "none";
    btn.style.backgroundColor = "";
}

    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
        btn.style.backgroundColor = "";
      }
    }
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var createdTimeInput = document.getElementById("created_time");

    var currentDateTime = new Date().toLocaleString("en-US", {
      timeZone: "Asia/Jakarta",
    });
	
    var formattedDateTime = currentDateTime.slice(0, 16).replace(/,/, "T");
    createdTimeInput.value = formattedDateTime;
  });
</script>


<table id="userKaryawan"></table>
<div id="userKaryawanPager"></div>
<script type="text/javascript">
	var USER_ID='<?=$user?>';
</script>
<script src="<?=base_url()?>modules/bootcamp05/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>modules/bootcamp05/js/jquery-ui.js"></script>
<script src="<?=base_url();?>modules/bootcamp05/js/jqGrid/jquery.jqGrid.js"></script>
<script src="<?=base_url();?>modules/bootcamp05/js/jqGrid/i18n/grid.locale-en.js"></script>
<script src="<?php echo base_url();?>modules/bootcamp05/js/Bootcamp05.js?v=<?=rand(0,20);?>"></script>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
      var grid_selector = $("#userKaryawan");
      grid_selector.on("click", ".edit-button", function () {
        var rowId = $(this).data("id");
        if (confirm("Are you sure you want to edit this item?")) {
          console.log("Edit button clicked for row with ID: " + rowId);
        }
      });
      grid_selector.on("click", ".delete-button", function () {
        var rowId = $(this).data("id");
        if (confirm("Are you sure you want to delete this item?")) {
          console.log("Delete button clicked for row with ID: " + rowId);
        }
      });
    });
  </script>
		
		
</body>
</body>
