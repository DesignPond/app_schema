define([
	'jquery',
	'underscore',
	'backbone',
	'views/appBoxView',
	'views/buttonView',
	'views/appArrowView'
	],
	function($, _, Backbone, AppBoxView,ButtonsView,AppArrowView) {
		var AppRouter = Backbone.Router.extend({
			routes: {
				'': 'home',
				'projet/:id': 'projet'
			},
			initialize: function(options){
			
		    },
			projet: function(id) {

			   var default_colors = [
										['ffffff','000000','cccccc','999999','666666','a5128e', '8a386d', '996386', 'c1a5b7', 'ded1d9'],
										['ffffff','000000','cccccc','999999','666666','1961b0', '345a8c', '60799b', 'a4b1c1', 'd0d6de'],
										['ffffff','000000','cccccc','999999','666666','00ade0', '3592b9', '619fb9', 'a4c3d0', 'd0dfe5'],
										['ffffff','000000','cccccc','999999','666666','284238', '33413d', '5f6966', 'a4a8a7', 'd0d2d1'],
										['ffffff','000000','cccccc','999999','666666','00724a', '24614e', '557e72', '9fb3ad', 'cdd7d4'],
										['ffffff','000000','cccccc','999999','666666','66c54e', '5ba164', '7aa980', 'b1c8b4', 'd6e1d7'],
										['ffffff','000000','cccccc','999999','666666','efa50b', 'cb8d43', 'c39a69', 'd6c1a8', 'e8ded2'],
										['ffffff','000000','cccccc','999999','666666','f47814', 'cd6b30', 'c5845c', 'd7b6a3', 'e3d4ca'],
										['ffffff','000000','cccccc','999999','666666','cd6b30', 'c7865e', 'd7b6a3', 'e8d9cf', 'e7d8ce'],
										['ffffff','000000','cccccc','999999','666666','c64c21', 'a44d2b', 'ab715a', 'c9aca1', 'e2d4ce'],
										['ffffff','000000','cccccc','999999','666666','d20f45', 'af3738', 'b26263', 'cba3a3', 'e2cfcf']
									];
			  				
			   var base_url = location.protocol + "//" + location.host+"/api/v1/";

				$.ajax({
				   type: 'GET', // Le type de ma requete
				   async:false,
				   success: function(data) {
				   		
				   		console.log(data.items.id);
				   			
				   		data = data.items.id - 1;
					   	var colors = default_colors[data];
	
					   	$('.simple_color').simpleColor({ colors: colors , defaultColor: '#'+colors[5]});
				   },
				   url: base_url+'theme/projet/'+id
				});
				
				// extend events to pass them from views to views
				var vent = _.extend({}, Backbone.Events);
				// app box view
				var appboxview   = new AppBoxView({ refProjet: id , vent: vent });
				// app arrows view
				var apparrowview = new AppArrowView({ refProjet : id , vent: vent });
				// The menu view
				var buttonview   = new ButtonsView({ vent: vent });
				
				appboxview.render();
				apparrowview.render();
				
				$("#loader").fadeOut(800);
				
			}
		});

		var init = function() {
		
			// Emulating REST andd Json 
			Backbone.emulateJSON = true ;
			Backbone.emulateHTTP = true ;
			
			var app_router = new AppRouter();
			Backbone.history.start();
		};
		return {
			init: init
	 	}
	});