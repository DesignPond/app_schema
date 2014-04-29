jQuery(document).ready(function() {
	
	// The url to the application
	var base_url = location.protocol + "//" + location.host+"/schemas/";

	// By default hide the selects theme ans subtheme	
	jQuery("body").on("change", "#categorie", function(){

		var $select = jQuery( "#theme" );	
		
		// Grab choosen categories
		var cat = jQuery(this).val();
		
		if(cat)
		{
			jQuery.ajax({
				 dataType: 'json',
				 success: function(data) 
				 {
				 		$select.empty();
				 		// array for options
				 		var items = [];
				 		// Loop over ajax data response
						jQuery.each(data, function(key, val) {
							items.push('<option value="' + key + '">' + val + '</option>');
						});
						// Join all html, append to select and show the select
						var all = items.join('');
						$select.append(all);
						jQuery( "#theme-label" ).show();	
				 },
				 url: base_url + 'theme/drop_theme/'+ cat
			});
		}
	});
	
	jQuery("body").on("change", "#theme", function(){
		
		var $select = jQuery( "#subtheme" ).empty();	
		// Grab choosen categories
		var theme = jQuery(this).find(":selected").val();

		if(theme)
		{
			jQuery.ajax({
				 dataType: 'json',
				 success: function(data) 
				 {
				 		$select.empty();
				 		// array for options
				 		var items = [];
				 		// Loop over ajax data response
						jQuery.each(data, function(key, val) {
							items.push('<option value="' + key + '">' + val + '</option>');
						});
						// Join all html, append to select and show the select
						var all = items.join('');
						$select.append(all);
						jQuery( "#subtheme-label" ).show();	
				 },
				 url: base_url + 'theme/drop_subtheme/'+ theme
			});
		}
	});
	
	var valueCat = jQuery( "#categorie" ).find(":selected").val();
	
	if(valueCat && (valueCat != 0) ){
		console.log('value!');
		jQuery( "#categorie" ).trigger('change');
	}

	
}); ///////////////