$("#nikcheck").click(function () {
    console.log("Button telah di klik");

    $.ajax({
        type: 'POST',
        url: SITE_URL + "/bootcamp03/nikCheck",
        data: {nik: $("#nik").val()},
        success: function (response) {
            var val = JSON.parse(response);
            alert(val.message);
        },
        error: function () {
            alert("akses controller gagal");
        }
    });
});