jQuery(document).ready(function() {
	// --------------------------------------------------
	// change menu on mobile version
	// --------------------------------------------------
	domready(function(){
		selectnav('mainmenu', {
			label: 'Menu',
			nested: true,
			indent: '-'
		});
	});
	
	
	// --------------------------------------------------
	// paralax background
	// --------------------------------------------------
	$window = jQuery(window);
   	jQuery('section[data-type="background"]').each(function(){
    var $bgobj = jQuery(this); // assigning the object
                    
    jQuery(window).scroll(function() {
	var yPos = -($window.scrollTop() / $bgobj.data('speed')); 
	var coords = '50% '+ yPos + 'px';
	$bgobj.css({ backgroundPosition: coords });
		
	});
 	});
	document.createElement("article");
	document.createElement("section");
	
	
	// --------------------------------------------------
	// sticky header
	// --------------------------------------------------
	jQuery(window).scroll(function(){ 
	  if (jQuery(this).scrollTop() > 50){  
		jQuery('body').addClass("sticky-2");
		jQuery('header').addClass("sticky-1");
		jQuery('header .info').addClass('h_info_hide');
		
	  } 
	  else{
		// --------------------------------------------------
		//back to default styles
		// --------------------------------------------------
		jQuery('body').removeClass("sticky-2");
		jQuery('header').removeClass("sticky-1");
		jQuery('header .info').removeClass('h_info_hide');
	  }
	});
	
	
	
	
	window.onresize = function(event) {
		jQuery('#gallery').isotope('reLayout');
  	};
	
	
	// --------------------------------------------------
	// prettyPhoto function
	// --------------------------------------------------
	jQuery("area[data-type^='prettyPhoto']").prettyPhoto();
	jQuery(".gallery:first a[data-type^='prettyPhoto']").prettyPhoto({animation_speed:'fast',theme:'pp_default',slideshow:3000, autoplay_slideshow: false});
	jQuery(".gallery:gt(0) a[data-type^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
	jQuery("#custom_content a[data-type^='prettyPhoto']:first").prettyPhoto({
		custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
		changepicturecallback: function(){ initialize(); }
	});
	jQuery("#custom_content a[data-type^='prettyPhoto']:last").prettyPhoto({
		custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
		changepicturecallback: function(){ _bsap.exec(); }
	});
	
	
	// --------------------------------------------------
	// scroll to top
	// --------------------------------------------------
	jQuery().UItoTop({ easingType: 'easeOutQuart' });
	
	
	// --------------------------------------------------
	// lazyload
	// --------------------------------------------------
	 jQuery(function() {
          jQuery("img").lazyload({
              effect : "fadeIn",
			  effectspeed: '1000' 

          });
      });
	  
	  
	// --------------------------------------------------
	// gallery hover
	// --------------------------------------------------
	jQuery('.overlay').fadeTo(1, 0);
	jQuery(".item .picframe").hover(
	function() {
	 jQuery(this).parent().find(".overlay").width(jQuery(this).find("span.itemColor img").css("width"));
	 jQuery(this).parent().find(".overlay").height(jQuery(this).find("span.itemColor img").css("height"));
	 jQuery(this).parent().find(".overlay").fadeTo(150, 1);
	 picheight = jQuery(this).find("span.itemColor img").css("height");
	 newheight = (picheight.substring(0, picheight.length - 2)/2)-18;
	 //alert(newheight);
	 jQuery(this).parent().find(".info-area").animate({'margin-top': newheight},'fast');

	},
    function() {
	 jQuery(this).parent().find(".info-area").animate({'margin-top': '10%'},'fast');
	 jQuery(this).parent().find(".overlay").fadeTo(150, 0);
  	})
	
	
	// team hover
	jQuery(".team .picframe").hover(
	function() {
	 jQuery(this).parent().find(".overlay").width(jQuery(this).find("img.team-pic").css("width"));
	 jQuery(this).parent().find(".overlay").height(jQuery(this).find("img.team-pic").css("height"));
	 jQuery(this).parent().find(".overlay").fadeTo(150, 1);
	 picheight = jQuery(this).find("img.team-pic").css("height");
	 newheight = (picheight.substring(0, picheight.length - 2)/2)-24;
	 //alert(newheight);
	 jQuery(this).parent().find(".sb-icons").animate({'margin-top': newheight},'fast');

	},
    function() {
	 jQuery(this).parent().find(".sb-icons").animate({'margin-top': '10%'},'fast');
	 jQuery(this).parent().find(".overlay").fadeTo(150, 0);
  	})
	
	
	
	jQuery(window).load(function() {
	// --------------------------------------------------
	// filtering gallery
	// --------------------------------------------------
	var $container = jQuery('#gallery');
		$container.isotope({
			itemSelector: '.item',
			filter: '*',
	});
	jQuery('#filters a').click(function(){
		var $this = jQuery(this);
		if ( $this.hasClass('selected') ) {
			return false;
			}
		var $optionSet = $this.parents();
		$optionSet.find('.selected').removeClass('selected');
		$this.addClass('selected');
				
		var selector = jQuery(this).attr('data-filter');
		$container.isotope({ 
		filter: selector,
	});
	return false;
	});
		

	  
	});
	
	
	// --------------------------------------------------
	// tabs
	// --------------------------------------------------
	jQuery('.de_tab').find('.de_tab_content div').hide();
	jQuery('.de_tab').find('.de_tab_content div:first').show();
	
	jQuery('.de_nav li').click(function() {
		jQuery(this).parent().find('li span').removeClass("active");
		jQuery(this).find('span').addClass("active");
		jQuery(this).parent().parent().find('.de_tab_content div').hide();
	
		var indexer = jQuery(this).index(); //gets the current index of (this) which is #nav li
		jQuery(this).parent().parent().find('.de_tab_content div:eq(' + indexer + ')').fadeIn(); //uses whatever index the link has to open the corresponding box 
	});

	
});

