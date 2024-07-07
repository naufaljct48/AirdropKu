$(document).ready(function() {
    
    "use strict";
    $('#blockui-1').click(function() { 
        $('#blockui-card-1').block({ 
            message: '<div class="spinner-grow text-primary" role="status"><span class="sr-only">Loading...</span></div>',
            timeout: 2000 
        }); 

    }); 

    $('#blockui-2').click(function() { 
        $.blockUI({ 
            message: '<div class="spinner-grow text-primary" role="status"><span class="sr-only">Loading...</span></div>',
            timeout: 2000 
        }); 
    }); 

});