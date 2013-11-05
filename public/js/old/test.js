(function ($) {

	// The url to the application
	var base_url = location.protocol + "//" + location.host+"/api/";
	var url      = location.protocol + "//" + location.host+"/schema/";	

	// Emulating REST andd Json 
	Backbone.emulateJSON = true ;
	Backbone.emulateHTTP = true ;
	
	//////////// Models and Collections /////////////	
	
	// Box model
	Box = Backbone.Model.extend({
			//Create a model to hold box atribute and set defaults
			defaults: {id: null,no_node: 0, couleurBg_node : null, leftCoord_node:60, topCoord_node:60, width_node:150, height_node:150 ,refProjet :this.refProjet ,text :''},
			initialize: function (models, options) {
				options || (options = {});
				// Pass the projet id to the querie of the collection
				this.refProjet = 1;	
			},
			url: function(){ 
				return base_url+'box/id/' + this.get('id') + '/format/json';
	  		}		 
	});
	
	// Boxes collection	
	Boxes = Backbone.Collection.extend({
			//This is our Boxes collection and holds our Boxes models
			model: Box,
			initialize: function (models, options) {
				options || (options = {});
				// Pass the projet id to the querie of the collection
				this.refProjet = 1;	
			},
			url: function () {
            	return base_url+'boxes/ref/' + this.refProjet + '/format/json';
            }
	});
	
	// View for one box
	BoxView = Backbone.View.extend({
		tagName   : 'div',
		initialize: function (options) {
		},
		template:$("#boxTemplate").html(),
		render : function(){
		
			// Keep view reference
			var self     = this;
			
			// Set id from model to box div
			var id     = this.model.get('id');
			
			var tmpl = _.template(this.template); //tmpl is a function that takes a JSON object and returns html

            this.$el.html(tmpl(this.model.toJSON()));
			// Set the the css infos from model to the div and bind draggable and resizable then append the elements to it.
			this.$el.draggable({  grid: [ 20,20 ], containment: $('#content') });
			console.log(this.$el);		
			this.$el.resizable({grid: 20 , containment: $('#content') });
			
			return this;		
		}
	});

	AppBoxView = Backbone.View.extend({
		el: $("#content"),
		initialize: function (options) {

			this.refProjet = 1;
			
			// Create new collection and bind events to rerender on reset and add
			this.collection = new Boxes(null,{ refProjet:this.refProjet, view: this });
			
			this.collection.on('add',   this.render() , this);
			this.collection.on('reset', this.render() , this);
			
			this.update();
			
		},
		update: function(){
			
			// Keep view reference
			var self = this;
			
			// Fetch collection from server
			this.collection.fetch({
				success: function(response,xhr) 
				{
					console.log(response);
					$('#emptyProjet').hide();
					// if the fetching is done, render the view
					self.render();
				}
			});
			
		},
		addBox:function(){
			
			// Keep view reference
			var self   = this;
			var newNbr = 1;
			
			// Get color choosen and create new box model with it 
			var box  = new Box({ refProjet:self.refProjet, no_node: newNbr ,width_node:120, height_node:120 ,leftCoord_node:40, topCoord_node:40  });

			// Save the new model
			box.save({},
	        {
	            success: function (model, response) {
	            
	            	// Get new id created and set to the model
	            	box.set('id', response.id);
	            	// Addd to collection
					self.collection.add(box);
	            	// Create new box in the view
	            	self.createBox(box);
	            },
	            error: function (model, response) {
	                console.log(response)
	            }
	        });

		},
		createBox: function(model){
		
			// Create instance of box view
			var boxview = new BoxView({ model:model });
			
			// Append to the view
			this.$el.append(boxview.render().el);

		},
		render : function(){
			// Render each box in view
			this.collection.forEach(this.createBox, this);
		}
	});

	
	MainView = Backbone.View.extend({
	   el: $("body"),
	   initialize: function (options) {
		   this.render();
	   },
	   render: function() {
			// The view box  #content
			var appboxview   = new AppBoxView({ });
	   }
	});


	var main = new MainView();


})(jQuery);

