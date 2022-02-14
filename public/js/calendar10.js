$(document).ready(function(){    
    let current_day = $('.current_day').offset().top;  
    $("html,body").animate({scrollTop: current_day}, 1000);  		
}); 