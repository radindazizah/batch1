$("#btncheck").click(function(){
	console.log("btncheck telah di click");
	
	$.ajax({
		type: 'POST',
		url: SITE_URL+"/bootcamp01/checkdata",
		data: $("#formcheck").serialize(),
		success: function(response) {
			var val = JSON.parse(response);
			
			alert(val.message);
			
					
		},
		error:function(){
			alert("akses controller gagal");
		}
	});
});