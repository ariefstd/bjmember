/**
 * @author Kishor Mali
 */


jQuery(document).ready(function(){
	
	jQuery(document).on("click", ".deleteGalery", function(){
		var gallId = $(this).data("galleryid"),
			hitURL = baseURL + "deleteGallery",
			currentRow = $(this);
		
		var confirmation = confirm("Anda yakin mau menghapus gambar ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { gallId : gallId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Gambar sudah berhasil dihapus"); }
				else if(data.status = false) { alert("Gambar gagal dihapus"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	
});
