@extends('layouts.app')

@section('content')

<?php  $custom = new Custom; ?>
	
<div id="content">
    <div class="container">
        <div class="row"> 
        
		    <script type="text/javascript">
		    
		        $(function() {
		     		
		     		myDocViewer = $('#document-preview').documentViewer();
		            //handle document clicks in the sidebar
		            $('.document-list').find('div').on('click', function(e) {
		                var $document = $(this);
		
		                //load the document
		                currentDocument = $document.attr('data-path');
		                myDocViewer.load(currentDocument, {width:800 });
		                e.preventDefault();
		            });

		        });
		
		    </script>	
		
		        <div class="span12" id="content">
		           
		           <div class="row">
		           		<div class="span3">
					   		<div id="infoBlocSchema">
						   		<h2 style="color:#ac1480;">Cadre général</h2>
						   		<h3><i class="icon-bookmark"></i> Sources</h3>
					   		</div>
						</div>
						<div class="span9">
							<object type="image/svg+xml" data="<?php echo asset('pdf/sources2.svg'); ?>" class="logo">
							  Kiwi Logo 
							</object>
						<!--
						<ul class="document-list">					
		                    <li><div class="text-code" data-path="<?php echo asset('pdf/Instructions.pdf'); ?>">Instructions</div></li>
		                    <li><div class="text-code" data-path="<?php echo asset('pdf/sources2.svg'); ?>">SOurces</div></li>
		                </ul>		
						<div id="document-preview"></div>
						-->
						</div>
						 
		           </div>
		        </div>
		 
		        
			 
		</div>
	</div>
</div>
					
@stop