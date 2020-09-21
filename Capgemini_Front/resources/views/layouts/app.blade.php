<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Capgemini</title>

    <!-- Scripts -->
    <!-- 
    <script src="{{ asset('js/manifest.js') }}" defer></script>
    <script src="{{ asset('js/vendor.js') }}" defer></script>
     -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js" defer></script>  
        
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css">
        
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    
</head>
<body>
    <div id="app">
    
    <!-- <div class="container"> -->
        <div class="fixed-top">            
            
        </div>


        <!-- Modal -->
        <div class="modal fade modalSpinnerComponente" id="spinnerComponente" tabindex="-1" role="dialog"
        	aria-labelledby="spinnerComponenteModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        	<div class="modal-dialog modal-dialog-centered" role="document">
        		<div class="modal-content">
        			
        			<div>
            			<div class="modal-body text-center">
            				<div class="spinner-border text-primary text-center" role="status">
                              <span class="sr-only">Loading...</span>
                            </div>
            			</div>
            			
        			</div>
        		</div>
        	</div>
        </div>
        <!-- Fim Modal -->

        

        <div class="mb-md-0 mb-5">&nbsp;</div>
        <div class="mb-md-0 mb-3">&nbsp;</div>

        <main class='container mb-5'>
            @yield('content')
        </main>
        
    </div>
      
    <script>

    var toastr = [];
    
    window.onload = function() {
        
        
        toastr["error"] = function(msg){
    		$.toast({
        	    //heading: 'Aviso',
        	    text: msg,
        	    showHideTransition: 'fade',
        	    position: 'top-right',
                icon: 'error',
                stack: false
        	});
        };
    
        toastr["success"] = function(msg){
    		$.toast({
        	    //heading: 'Aviso',
        	    text: msg,
        	    showHideTransition: 'fade',
        	    position: 'top-right',
                icon: 'success',
                stack: false
        	});
        };
        
        spinner = function(param) {
            if(param == 'open'){
            	$('.modalSpinnerComponente').modal();
            }
            if(param == 'close'){
            	setTimeout(function() {
            		$('.modalSpinnerComponente').modal('hide');
            	}, 1000);
            }
        }

        $(function(){   

        	$('[required]').each(function(chave, valor){
        		var id = $(this).prop('id');
        		$('label[for='+ id +']').html( $('label[for='+ id +']').html() + " <span style='color:red;'>*</span>" );
        	});
        	
        	$.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
        });
    };
	
    </script>
    

            
</body>
</html>
