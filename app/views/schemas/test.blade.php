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
				<!-- content begin -->
		        <div id="content">
		            <div class="container">
						<ul class="document-list">
		                    <li><div class="text-code" data-path="<?php echo asset('pdf/Sources.png'); ?>">Instructions
		                    </div></li>
		                </ul>
						
						<div id="document-preview"></div>
						 
		            </div>	
		        </div>
		        <!-- content close -->
		        
			 	<object width="600" type="image/svg+xml" data="<?php echo asset('pdf/sources2.svg'); ?>" class="logo">
				  Kiwi Logo <!-- fallback image in CSS -->
				</object>
		</div>
	</div>
</div>
					
@stop