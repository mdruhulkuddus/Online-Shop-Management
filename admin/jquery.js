function selectCategory(){
	var itemname = $("#item").val();
	$.ajax({
		url: "ajaxCategory.php",
		type: "POST",
		data: {itemname:itemname},
		success:function(data){
			$("#category").html(data);
		}
	});
}