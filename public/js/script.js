(function ($) {
	
	// The url to the application
	var base = location.protocol + "//" + location.host+"/api/v1/";
	
	// By default hide the selects theme ans subtheme	
	$("body").on("change", "#categorie", function(){

		var $select = $( "#theme" );	
		// Grab choosen categories
		var cat = $(this).val();
		
		if(cat)
		{
			$.ajax({
				 dataType: 'json',
				 success: function(data) 
				 {
				 		// array for options
				 		var items = [];
				 		// Loop over ajax data response
						$.each(data.themes, function(key, val) {
							items.push('<option value="' + key + '">' + val + '</option>');
						});
						// Join all html, append to select and show the select
						var all = items.join('');
						$select.append(all);
						$( "#theme-label" ).show();	
				 },
				 url: base_url + 'theme/drop/'+ cat
			});
		}
	});
	
	$("body").on("change", "#theme", function(){
		
		var $select = $( "#subtheme" ).empty();	
		// Grab choosen categories
		var theme = $(this).find(":selected").val();

		if(theme)
		{
			$.ajax({
				 dataType: 'json',
				 success: function(data) 
				 {
				 		// array for options
				 		var items = [];
				 		// Loop over ajax data response
						$.each(data.subthemes, function(key, val) {
							items.push('<option value="' + key + '">' + val + '</option>');
						});
						// Join all html, append to select and show the select
						var all = items.join('');
						$select.append(all);
						$( "#subtheme-label" ).show();	
				 },
				 url: base + 'subtheme/drop/'+ theme
			});
		}
	});
	
	var valueCat = $( "#categorie" ).find(":selected").val();
	
	if(valueCat){
		console.log('value!');
		$( "#categorie" ).trigger('change');
	}
	
	
})(jQuery);