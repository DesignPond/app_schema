define(["jquery", "backbone","models/arrow"],

   function($, Backbone, Arrow) 
   {
   		var base_url = location.protocol + "//" + location.host+"/api/v1/";
		// Arrows collection	
		Arrows = Backbone.Collection.extend({
				//This is our Boxes collection and holds our Boxes models
				model: Arrow,
				parse: function(response) {
				    return response.items;
				},
				initialize: function (models, options) {
					options || (options = {});
					// Pass the projet id to the querie of the collection
					this.refProjet = options.refProjet;	
				},
				url: function () {
	            	return base_url+'arrow/projet/' + this.refProjet + '';
	            }
		});

		
		return Arrows;
	}
);