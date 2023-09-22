$("#nikcheck").click(function () {

    $.ajax({
        type: 'POST',
        url: SITE_URL + "/bootcamp03/nikCheck",
        data: { nik: $("#nik").val() },
        success: function (response) {
            var val = JSON.parse(response);
            alert(val.message);
        },
        error: function () {
            alert("akses controller gagal");
        }
    });

});

$('#editKaryawan').click(function () {
    var selRowId = grid_selector.jqGrid('getGridParam', 'selrow');
    var celValue = grid_selector.jqGrid('getCell', selRowId, 'nik');

    if (selRowId) {

        $.ajax({
            type: 'POST',
            url: SITE_URL + "/bootcamp03/editKaryawan/" + celValue,
            data: { nik: celValue },
            success: function (response) {
                var val = JSON.parse(response);
                console.log(val.data[0].nik);
                console.log(val.data[0].nama);
                console.log(val.data[0].tempat_lahir);
                console.log(val.data[0].tanggal_lahir);
                console.log(val.data[0].alamat);
                console.log(val.data[0].telp);
                console.log(val.data[0].jabatan);

                var labelNik = "";
                var labelNama = "";
                var labelTempatLahir = "";
                var labelTanggalLahir = "";
                var labelAlamat = "";
                var labelTelp = "";
                var labelJabatan = "";

                var nik = "";
                var nama = "";
                var tempatLahir = "";
                var tanggalLahir = "";
                var alamat = "";
                var telp = "";
                var jabatan = "";
                $('#modalBody').empty();

                $.each(val.data, function (key, value) {
                    labelNik += '<label for="nik">NIK</label>';
                    labelNama += '<label for="nama">Nama</label>';
                    labelTempatLahir += '<label for="tempatLahir">Tempat Lahir</label>';
                    labelTanggalLahir += '<label for="tanggalLahir">Tanggal Lahir</label>';
                    labelAlamat += '<label for="alamat">Alamat</label>';
                    labelTelp += '<label for="telp">Telp</label>';
                    labelJabatan += '<label for="jabatan">Jabatan</label>';

                    nik += '<input type="number" class="form-control" id="nik" name="nik" value="' + value.nik + '" placeholder="Nomor NIK">';
                    nama += '<input type="text" class="form-control" id="nama" name="nama" value="' + value.nama + '" placeholder="Nama">';
                    tempatLahir += '<input type="text" class="form-control" id="tempatLahir" name="tempatLahir" value="' + value.tempat_lahir + '" placeholder="Tempat Lahir">';
                    tanggalLahir += '<input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" value="' + value.tanggal_lahir + '" placeholder="Tanggal Lahir">';
                    alamat += '<input type="text" class="form-control" id="alamat" name="alamat" value="' + value.alamat + '" placeholder="Alamat">';
                    telp += '<input type="number" class="form-control" id="telp" name="telp" value="' + value.telp + '" placeholder="Telepon">';
                    jabatan += '<div class="#selectJabatan"><select class="form-control" id="jabatan" name="jabatan"><option value="manager">manager</option><option value="staff">staff</option><option value="supervisor">supervisor</option></select></div>';
                    console.log(value.jabatan);
                    // $("#selectJabatan select").val(value.jabatan).change();
                    // $("$selectJabatan").val(value.jabatan).change();
                    // $('#selectJabatan option[value='+ value.jabatan +']').attr("selected",true);
                    // $("div.id_100 select").val(value.jabatan).change();
                });

                $('#modalBody').append(labelNik);
                $('#modalBody').append(nik);
                $('#modalBody').append(labelNama);
                $('#modalBody').append(nama);
                $('#modalBody').append(labelTempatLahir);
                $('#modalBody').append(tempatLahir);
                $('#modalBody').append(labelTanggalLahir);
                $('#modalBody').append(tanggalLahir);
                $('#modalBody').append(labelAlamat);
                $('#modalBody').append(alamat);
                $('#modalBody').append(labelTelp);
                $('#modalBody').append(telp);
                $('#modalBody').append(labelJabatan);
                $('#modalBody').append(jabatan);
            },
            error: function () {
                alert("akses controller gagal");
            }
        });

        $('#editKaryawan').attr({
            'data-toggle': "modal",
            'data-target': "#editKaryawanModal"
        });

    } else {
        alert('No rows are selected');
    }

});

$("#saveKaryawan").click(function(){
	console.log("Save karyawan telah di click");
	
	$.ajax({
		type: 'POST',
		url: SITE_URL+"/bootcamp03/saveKaryawan",
        data : $("#formEdit").serialize(),
		success: function(response) {
			var val = JSON.parse(response);
            alert(val.message);
            grid_selector.trigger( 'reloadGrid' );
            $('#editKaryawanModal').modal('hide');
		},
		error:function(){
			alert("akses controller gagal");
		}
	});
});