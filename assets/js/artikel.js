/**
 * @author Kishor Mali
 */


jQuery(document).ready(function(){
	
	jQuery(document).on("click", ".deleteArtikel", function(){
		var artikelId = $(this).data("artikelid"),
			hitURL = baseURL + "deleteArtikel",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this artikel ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { artikelId : artikelId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Artikel successfully deleted"); }
				else if(data.status = false) { alert("Artikel deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	
});
