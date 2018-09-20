/**
 * @author Kishor Mali
 */

jQuery(document).ready(function(){
	
	jQuery(document).on("click", ".deleteMenu", function(){
		var menuId = $(this).data("menuid"),
			hitURL = baseURL + "deleteMenu",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this menu top ?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { menuId : menuId } 
			}).done(function(data){
				console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("Menu top successfully deleted"); }
				else if(data.status = false) { alert("Menu top deletion failed"); }
				else { alert("Access denied..!"); }
			});
		}
	});
	
	
	jQuery(document).on("click", ".searchList", function(){
		
	});
	
});
