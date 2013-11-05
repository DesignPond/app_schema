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
				this.refProjet = options.refProjet;	
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
				this.refProjet = options.refProjet;	
			},
			url: function () {
            	return base_url+'boxes/ref/' + this.refProjet + '/format/json';
            }
	});
	
	// !TODO refProjet from collections to model
	
	// Arrow model
	Arrow = Backbone.Model.extend({
			//Create a model to hold box atribute and set defaults
			defaults: {id: null, couleurBg_arrow : null, leftCoord_arrow:0, topCoord_arrow: 0 , no_arrow:0 ,refProjet :this.refProjet  ,position :'' },
			initialize: function (models, options) {
				options || (options = {});
				// Pass the projet id to the querie of the collection
				this.refProjet = options.refProjet;	
			},
			url: function(){ 
				return base_url+'arrow/id/' + this.get('id') + '/format/json';
	  		}		 
	});
	
	// Arrows collection	
	Arrows = Backbone.Collection.extend({
			//This is our Boxes collection and holds our Boxes models
			model: Arrow,
			initialize: function (models, options) {
				options || (options = {});
				// Pass the projet id to the querie of the collection
				this.refProjet = options.refProjet;	
			},
			url: function () {
            	return base_url+'arrows/ref/' + this.refProjet + '/format/json';
            }
	});
		
	//////////// VIEWS /////////////
	
	AppBoxView = Backbone.View.extend({
		el: $("#content"),
		initialize: function (options) {
			
			// Keep this as the main view
			_.bindAll(this, "addBox", "updateBox","deleteAll");
			
			// Bind add button event from menu to view and update to drag event
			options.vent.bind("addBox", this.addBox);
			options.vent.bind("updateBox", this.updateBox);
			options.vent.bind("deleteAll", this.deleteAll);
			
			this.vent = options.vent;
			
			this.refProjet = options.refProjet;
			
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
				},
				error: function (errorResponse) {
					 console.log(errorResponse); 
					 $('#emptyProjet').show();
				}
			});
		},
		deleteAll: function(){
			
			// Keep view reference
			var self   = this;
			// Confirmation
			var answer = confirm("Voulez-vous vraiment tout effacer?");
				 
			if (answer)
			{ 
				$.ajax({
					 type: "POST",
					 url: url+"deleteAll",
					 data: { refProjet:this.refProjet },
					 success: function(msg)
					 {	
						self.collection.reset(null);
							
						$(".box").remove();
						$(".arrows").remove();
					 }
				});
			}
		},
		events: {
			"click #ouvrir"    : "showTextarea",
			"click .ok"        : "addText",
			"mouseenter .box"  : "showDelete",
			"mouseleave .box"  : "hideDelete",
			"click #fermer"    : "removeBox"
		},
		showDelete: function(e) {
			
			// Get the box hover id
		    var box = $(e.currentTarget).attr("id");

			$("div#" + box + " div.btn-group").addClass('btnHover');
			$("div#" + box).addClass('box-hover');
			
	    },
		hideDelete: function(e) {
			
			// Get the box hover id
		    var box = $(e.currentTarget).attr("id");

			$("div#" + box + " div.btn-group").removeClass('btnHover');
			$("div#" + box).removeClass('box-hover');
			
	    }, 
	    showTextarea: function(e) {
	    	
	    	// Current div, get id
		    var that = $(e.currentTarget);
		    var box  = $(e.currentTarget).parent().parent().attr("id");	
		    
		    // Show textarea and disable draggable
		    that.parent().parent().find('span.textarea').show();
		    $( "#"+box ).draggable( "disable" );
		    
	    },
	    addText: function(e) {
	    
	    	// Get current target, get div and hide the span textarea
		    var that = $(e.currentTarget);	
			var div  = that.closest('div')
			var span = that.parent().hide();
			
			// Get the textarea, grab the text and put it in the inner div	  
			var textarea = span.find('textarea');
			var text = textarea.val();
			div.find('div.inner').html(text);
			
			// Get the id of the box and reenable the dragging
			var id = $(e.currentTarget).parent().parent().attr("id");
			$( "#"+id ).draggable( "enable" );
			
			// Get the model from id
			var box = this.collection.get(id);
			
			// Save new values and update the model
	        box.save({"text": text });

	    },
	    removeBox: function(e) {
	    
	    	var answer = confirm("Voulez-vous vraiment effacer?");
				 
			if (answer){ 
		        // Keep view reference
		       	var self  = this;       	
		       	// Get box div refrence, id and model 
			    var box   = $(e.currentTarget).parent().parent();	
			    var id    = box.attr("id");
				var model = this.collection.get(id);
				
				console.log(box); 
				// Destroy model, delet it from server and remove it from the view
				model.destroy({
					success: function(model, response) { 
						if(response.message === true)
						{
							self.collection.remove(model);
							box.remove();
							
							var nbr  = $("#content > div.box").size();
							if( nbr === 0 ){
								$('#emptyProjet').show();
								$('#content').css('height', 60 );
							}
						}
					}
				});
			}
	    },
	    updateBox : function(el){
	    	
	    	// Get the id of the box moved or resized
	    	var id   = el.attr('id');
			// Get the model from id
			var box = this.collection.get(id);
			// Get the new values
	        var position  =  el.position();
	        var width     =  el.width();
	        var height    =  el.height();
			
			// Save new values and update the model
	        box.save({"leftCoord_node": position.left , "topCoord_node" : position.top , "width_node" : width , "height_node" : height });

		},
		addBox:function(){
			
			// Keep view reference
			var self   = this;
			
			var nbr    = $("#content > div.box").size();		
			var newNbr = nbr + 1;
			
			if( newNbr == 1 )
			{
				 $('#emptyProjet').hide(); 
				 $('#content').css('height', 210 );
			}
			
			// Get color choosen and create new box model with it 
			var colorPicker = $("#colorPicker").val();
			var box         = new Box({ refProjet:self.refProjet , couleurBg_node: colorPicker , no_node: newNbr ,width_node:120, height_node:120 ,leftCoord_node:40, topCoord_node:40  });

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
			var boxview = new BoxView({ model:model , vent: this.vent});
			// Append to the view
			this.$el.append(boxview.render().el);
			// Bind redactor
			var button = ['bold', '|', 'italic' , '|', 'fontcolor'];
			$('.redactor').redactor({ focus: true, buttons: button });

		},
		render : function(){
			// Render each box in view
			this.collection.forEach(this.createBox, this);
			// Bind redactor
			var button = ['bold', '|', 'italic' , '|', 'fontcolor'];
			$('.redactor').redactor({ focus: true, buttons: button });

			// Set the container to correct height
			var big = 0;
			var h   = 0;
			
			$('.box').each(function(){	
				 var position = $(this).position();
				 var height   = $(this).height();
				 var top = position.top;
				 if(top > big){
				 	 h   = height;
					 big = top;
				 } 
			});

			$('#content').css('height', big+h+60 );
		}
	});
	
	// View for one box
	BoxView = Backbone.View.extend({
		tagName   : 'div',
		className : 'box resize',
		initialize: function (options) {
			options || (options = {});
			this.vent = options.vent;
		},
		update : function(el){
			this.vent.trigger("updateBox",el);
		},
		render : function(){
		
			// Keep view reference
			var self   = this;
			// Set id from model to box div
			this.el.id = this.model.get('id');
			var id     = this.model.get('id');
			// Get text
			var text   = this.model.get('text');
			
			// Adding elements: textarea inner div and button
			var elements  = '<div class="inner">' +text+ '</div>';
				elements += '<div class="btn-group"><a class="btn btn-default btn-xs" id="ouvrir" href="#">Edit</a>';
				elements += '<a href="#" class="btn btn-danger btn-xs" id="fermer">Remove</a></div>';
				elements += '<span class="textarea"><textarea name="text' +id+ '" class="redactor">' +text+ '</textarea><button class="ok button buttonOk">ok</button></span>';
			
			// Set the the css infos from model to the div and bind draggable and resizable then append the elements to it.
			this.$el.css({ 
						'background-color' : this.model.get('couleurBg_node'),
						'position' : 'absolute',
						'width'    : this.model.get('width_node') +'px',
						'height'   : this.model.get('height_node') +'px',
						'top'      : this.model.get('topCoord_node') +'px',
						'left'     : this.model.get('leftCoord_node') +'px'
					})
					.draggable({ 
						grid: [ 20,20 ], 
						containment: $('#all'), 
						start: function() 
						{
							$('.box').css('z-index',55);
							$(this).css('z-index',65);
						}, 
						drag: function( event, ui ) 
						{
						
							var boxPosition = 0;
							var boxHeight   = 0;
							var boxOffset   = 0;
							
							boxPosition = ui.position.top;
							boxHeight   = $(this).height();
							
							var boxOffset   = boxPosition + boxHeight + 2;
							
							var posContent = $('#content').height();
							
							if(boxOffset > posContent){
								var newPos = posContent + 40;
								$('#content').css('height', newPos);
							}

						},
						stop: function() 
						{ 
							self.update($(this));
						} 
					})
					.resizable({grid: 20 , containment: $('#content'), stop: function() { self.update($(this)) } })
					.append(elements);
			
			return this;		
		}
	});

	// Menu view
	ButtonsView = Backbone.View.extend({
		el: $("#menuButtons"),
		initialize: function (options) {
			this.vent = options.vent;
		},
		events: {
			// Event from the menu
			"click #add"       : "addBox",
			"click .arrow"     : "addArrow",
			"click #deleteAll" : "deleteAll"
		},
		deleteAll : function(){
			this.vent.trigger("deleteAll");
		},
		addBox : function(){
			this.vent.trigger("addBox");
		},
		addArrow : function(e){
			var position = $(e.currentTarget).data("position");
			this.vent.trigger("addArrow" , position);
		}
	});
	
	// Arrows view
	AppArrowView = Backbone.View.extend({
		el: $("#content"),
		initialize: function (options) {
			
			// Keep this as the main view
			_.bindAll(this, "addArrow", "updateArrow", "dropped","deleteAll");
			
			// Bind add button event from menu to view and update to drag event
			options.vent.bind("addArrow", this.addArrow);
			options.vent.bind("dropped", this.dropped);
			options.vent.bind("updateArrow", this.updateArrow);
			options.vent.bind("deleteAll", this.deleteAll);
			
			this.vent = options.vent;
			
			this.refProjet = options.refProjet;
			
			// Create new collection and bind events to rerender on reset and add
			this.collection = new Arrows(null,{ refProjet:this.refProjet, view: this });
			
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
					// if the fetching is done, render the view
					self.render();
				},
				error: function (errorResponse) { console.log(errorResponse); }
			});
			
		},
		deleteAll: function(){
		
			this.collection.reset(null);	
			
		},
		events: {
			"mouseenter .arrows" : "hover",
			"mouseleave .arrows" : "hover",
		},
		hover: function(e){
		
			// Get the box hover id
		    var arrow = $(e.currentTarget).attr("id");

			$("p#" + arrow).toggleClass('arrow-hover');
		},
		dropped:function(ui){
		
			var answer = confirm("Voulez-vous vraiment effacer?");
				 
			if (answer){ 
				
				// Keep view reference
		       	var self  = this;
		       	// Get arrow div refrence, id and model 
		       	var id    = ui.draggable.attr("id");
		       	var arrow = $('#'+id);
				var model = this.collection.get(id);
	
				// Destroy model, delet it from server and remove it from the view
				model.destroy({
					success: function(model, response) { 
						if(response.message === true)
						{
							self.collection.remove(model);
							arrow.remove();
						}
					}
				});
			}
		},
	    updateArrow : function(el){
	    	
	    	// Get the id of the box moved or resized
	    	var id   = el.attr('id');
			// Get the model from id
			var arrow = this.collection.get(id);
			// Get the new values
	        var position  =  el.position();
			// Save new values and update the model
	        arrow.save({"leftCoord_arrow": position.left , "topCoord_arrow" : position.top });

		},
		addArrow:function(position){
			
			// Keep view reference
			var self = this;

			// Get color choosen and create new box model with it 
			var colorPicker = $("#colorPicker").val();
			var arrow       = new Arrow({ refProjet:self.refProjet , couleurBg_arrow: colorPicker ,topCoord_arrow:0, leftCoord_arrow:20 , position: position });

			// Save the new model
			arrow.save({},
	        {
	            success: function (model, response) {
	            
	            	// Get new id created and set to the model
	            	arrow.set('id', response.id);
	            	// Create new box in the view
	            	self.createArrow(arrow);
	            	// Addd to collection
					self.collection.add(arrow);
	            },
	            error: function (model, response) {
	                console.log(response)
	            }
	        });

		},
		createArrow: function(model){
		
			// Create instance of box view
			var arrowview = new ArrowView({ model:model , vent: this.vent});
			// Append to the view
			this.$el.append(arrowview.render().el);

		},
		render : function(){
			// Render each box in view
			this.collection.forEach(this.createArrow, this);
			
			var dropview  = new DropView({ vent: this.vent });
			this.$el.append(dropview.render().el);
		}
	});
	
	ArrowView = Backbone.View.extend({
		tagName   : 'p',
		className : function(){ return "icon-large arrows icon-caret-" + this.model.get('position'); },
		initialize: function (options) {
			options || (options = {});
			this.vent = options.vent;
		},
		update : function(el){
			this.vent.trigger("updateArrow",el);
		},
		render : function(){
			
			// Keep view reference
			var self     = this;		
			//The parameter passed is a reference to the model that was added
			var colorPicker = $("#colorPicker").val();
			var nbr         = $("#content > div.arrows").size();
			var newNbr      = nbr + 1;
			var position    = this.model.get('position');
			
			// Set id from model to box div
			this.el.id = this.model.get('id');

			this.$el.css({ 
						'color' : this.model.get('couleurBg_arrow'),
						'position' : 'absolute',
						'top'      : this.model.get('topCoord_arrow') +'px',
						'left'     : this.model.get('leftCoord_arrow') +'px'
					}).draggable({ 
						grid: [ 10,10 ], 
						containment: $('#all') , 
						stop: function(event, ui ) { 
							var drop = ui.helper.data('dropped');
							if(drop != true){ self.update($(this));  }
						} });
			return this;		
		}
	});
	
	// Delete the arrows view
	
	DropView = Backbone.View.extend({
	   el: $("#trash"),
	   initialize: function (options) {
		   options || (options = {});
		   this.vent = options.vent;
	   },
	   update : function(ui){
			this.vent.trigger("dropped",ui);
	   },
	   render: function() {
	   		var self = this;
	        this.$el.droppable({
	             hoverClass: "trash-highlight",
	             drop: function( event, ui ) 
	             {
	             	 ui.draggable.data('dropped', true);
		             self.update(ui);
	             }
	        });
	        return this;
	   }
	});
	
	MainView = Backbone.View.extend({
	   el: $("#all"),
	   initialize: function (options) {
		   options || (options = {});
		   this.render();
	   },
	   render: function() {
	   
	        // Get projet id
			var refProjet = $("#main").data("projet");
				 	
			// The events to bind/pass to the views
			var vent  = _.extend({}, Backbone.Events);
			
			// The view box  #content
			var appboxview   = new AppBoxView({ refProjet : refProjet , vent: vent  });
			var apparrowview = new AppArrowView({ refProjet : refProjet , vent: vent });
			
			// The menu view
			var buttons = new ButtonsView({vent: vent});
			
			$("#all").fadeIn(2000);
	   }
	});


	var main = new MainView();


})(jQuery);

