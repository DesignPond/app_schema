if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};

RedactorPlugins.addmodal = {

	init: function()
	{
		var callback = $.proxy(function()
		{
			this.selectionSave();

			var sel  = this.getSelection();		
			var text = sel.toString();

			$('#redactor_modal #mymodal-link').click($.proxy(function()
			{				
				this.insertFromMyModal(text);
				return false;

			}, this));
		}, this);

		this.buttonAdd('addmodal', 'Ajouter lien vers un projet', $.proxy(function()
		{			
			this.modalInit('Ajouter lien vers un projet', '#mymodal', 500, callback);
			
		}, this));

		this.buttonAddSeparatorBefore('addmodal');

	},
	insertFromMyModal: function(html)
	{
		var _self = this;
		
		var id  = $('#redactor_link_addmodal').val();
		var url = $('#redactor_link_addmodal_url').val();
		
		var a = '<a href="'+ url + '/' + id + '" class="popup_modal">' + html + '</a>';
			
		_self.selectionRestore();
		
		if(id)
		{
			_self.execCommand('inserthtml', a);
			_self.modalClose();
		}
	}

}