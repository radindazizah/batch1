$("#btncheck").click(function(){
	console.log("btncheck telah di click");
	
	$.ajax({
		type: 'POST',
		url: SITE_URL+"/bootcamp01/checkdata",
		data: $("#formcheck").serialize(),
		success: function(response) {
			var val = JSON.parse(response);
			
			alert(val.message);
			
			var tampil="";
			$("#tampilan_data").empty();
			
			$.each(val.data, function(val,text){
					tampil+=text.nama+" - "+text.alamat+"<br>";
			});
			
			$("#tampilan_data").append(tampil);
					
		},
		error:function(){
			alert("akses controller gagal");
		}
	});
});