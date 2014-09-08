var url  = location.protocol + "//" + location.host+"/";	

require.config({
    paths: {
        'jquery'     : '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min',
        'jqueryui'   : '//codeorigin.jquery.com/ui/1.10.3/jquery-ui.min',
        'underscore' : '//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.1/underscore-min',
        'redactor'   : url + 'js/vendor/redactor/redactor',
        'colorpicker': url + 'js/vendor/jquery.simple-color',
        'main'       : url + 'js/utils/main',
        'contextMenu': url + 'js/vendor/jquery.contextMenu',
        'backbone'   : '//cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min'
    },
    shim: {
        'jquery': {
            exports: '$'
        },
		'jqueryui': {
            deps: ['jquery'],
        },
        'redactor': {
            deps: ['jquery'],
        },
        'colorpicker': {
            deps: ['jquery'],
        },
        'main': {
            deps: ['jquery','contextMenu'],
        },
        'contextMenu': {
            deps: ['jquery'],
        },
        'underscore': {
            exports: '_'
        },
        'backbone' :{
            //These script dependencies should be loaded before loading backbone.js
            deps: ['underscore', 'jquery','jqueryui','redactor','colorpicker','main'],
            //Once loaded, use the global 'Backbone' as the module value.
            exports: 'Backbone'
        },
    }
});


require(['app'], function(App) {
	App.init();
});