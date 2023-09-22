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
        $('#editKaryawan').attr({
            'data-toggle': "modal",
            'data-target': "#editKaryawanModal"
        });

        $.ajax({
            type: 'POST',
            url: SITE_URL + "/bootcamp03/editKaryawan/" + celValue,
            data: { nik: celValue },
            success: function (response) {
                var val = JSON.parse(response);
                alert(val.message);
                console.log(val.data[0].nik);
                console.log(val.data[0].nama);
                console.log(val.data[0].tempat_lahir);
                console.log(val.data[0].tanggal_lahir);
                console.log(val.data[0].alamat);
                console.log(val.data[0].telp);
                console.log(val.data[0].jabatan);

                
            },
            error: function () {
                alert("akses controller gagal");
            }
        });
    } else {
        alert('No rows are selected');
    }

});


// $('#editKaryawan').click(function () {
//     var selRowId = grid_selector.jqGrid('getGridParam', 'selrow');
//     var celValue = grid_selector.jqGrid('getCell', selRowId, 'nik');

//     if (selRowId) {
//         $.ajax({
//             type: 'POST',
//             url: SITE_URL + "/bootcamp03/editKaryawan/" + celValue,
//             data: { nik: celValue },
//             success: function (response) {
//                 var val = JSON.parse(response);
//                 // alert(val.message);
//                 console.log(val.data[0].nik);
//                 console.log(val.data[0].nama);
//                 console.log(val.data[0].tempat_lahir);

//                 // $('#nik').val('tessss');

//                 dialog = $("#dialog-form").dialog({
//                     autoOpen: false,
//                     height: 400,
//                     width: 350,
//                     modal: true,
//                     buttons: {
//                         "Edit data karyawan": function () {
//                             window.location = "delKaryawan/" + celValue;
//                             $(this).dialog("close");
//                         },
//                         Cancel: function () {
//                             dialog.dialog("close");
//                         }
//                     },
//                     close: function () {
//                         form[0].reset();
//                         $(this).dialog("close");
//                         // allFields.removeClass("ui-state-error");
//                     }
//                 });

//                 form = dialog.find("form").on("submit", function (event) {
//                     event.preventDefault();
//                     addUser();
//                 });

//                 dialog.dialog("open");

//                 $('#nik').val('tessss');
//             },
//             error: function () {
//                 alert("akses controller gagal");
//             }
//         });
//     } else {
//         alert('No rows are selected');
//     }

// });