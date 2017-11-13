var main = function() {     
    $('.icon-menumob').click(function() {        
        $('.menumob').animate({
            left: '0px' 
        }, 100);         
    });
    
    $('.icon-close').click(function() { 
        $('.menumob').animate({
            left: '-300%' 
        }, 100);         
    });
    
    $('#content').click(function() { 
        $('.menumob').animate({ 
            left: '-500%'
        }, 100);         
    });
};
 
$(document).ready(main); 