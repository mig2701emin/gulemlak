$(function(){
	$("#il").change(function(){
		document.getElementById("ilce").style.visibility = "visible";
		var id=$(this).val();
		$.ajax({
			type:"post",
			url:"data.php",
			data:{"id":id},
			dataType:"json",
			success:function(fur){
				$("#ilce").html("<option value='0'>İlçe Seçiniz</option>"+fur.basari);
			}
		})
	})
})

$(function(){
	$("#ilce").change(function(){
		document.getElementById("semt").style.visibility = "visible";
		var id=$(this).val();
		$.ajax({
			type:"post",
			url:"data.php",
			data:{"mah":id},
			dataType:"json",
			success:function(fur){
				$("#semt").html("<option value='0'>Mahalle-Köy Seçiniz</option>"+fur.basari);
			}
		})
	})
})


$(function(){
	$("#sahip_isim").change(function(){
		document.getElementById("sahip_numara").style.visibility = "visible";
		var id=$(this).val();
		$.ajax({
			type:"post",
			url:"data.php",
			data:{"sahip":id},
			dataType:"json",
			success:function(fur){
				$("#sahip_numara").val(fur.basari);
			}
		})
	})
})


$(document).ready(function () {
	$('#tikla').click(function () {
		$('#Menuiki').toggle('medium');
	});
});







