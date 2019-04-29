$( document ).ready(function() {


    $('#network-container h5 a').click(function(){
        if ($('#network-container ul').hasClass('show')) {
            $('#network-container ul').removeClass('show');
            $('#network-container h5 a').removeClass('active');
            $('#network-container h5').removeClass('active');
            $('#network-container nav').removeClass('active1');
        } else {
            $('#network-container ul').addClass('show');
            $('#network-container h5 a').addClass('active');
            $('#network-container h5').addClass('active');
            $('#network-container nav').addClass('active1');
        }

    });

    $('#network-container nav').on("click", function(){
        $(this).toggleClass('hover');             
    });

    $('#network-container h5 a').hover(function(){
       $(this).toggleClass('hover');       
    });

    $('#network-container h5 a').on("touchstart", function(){
        $(this).removeClass('hover');             
    });
    
	var isMobile = {
	    Android: function() {
	        return navigator.userAgent.match(/Android/i);
	    },
	    BlackBerry: function() {
	        return navigator.userAgent.match(/BlackBerry/i);
	    },
	    iOS: function() {
	        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	    },
	    Opera: function() {
	        return navigator.userAgent.match(/Opera Mini/i);
	    },
	    Windows: function() {
	        return navigator.userAgent.match(/IEMobile/i);
	    },
	    any: function() {
	        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
	    }
	};

    function imageresize() {
        var contentwidth = $(window).width();
        if ((contentwidth) < '768' && (contentwidth) > '480'){
            if ($('#content-image img').length > 0){ 
                $('#content-image img').each(function(){
                	var thisImg = $(this);
                	var src = $(this).attr('src'); 
                	var srcSet = $(this).attr('srcset'); 
                	if (src.indexOf("print-specs-desktop") >= 0) {
                		var newSrc =  src.replace('print-specs-desktop', 'print-specs-tablet'); 
                		var newSrcset =  srcSet.replace('print-specs-desktop', 'print-specs-tablet'); 
                	} else if (src.indexOf("print-specs-phone") >= 0) {
                		var newSrc =  src.replace('print-specs-phone', 'print-specs-tablet'); 
                		var newSrcset =  srcSet.replace('print-specs-phone', 'print-specs-tablet'); 
                	}
                	thisImg.attr('src', newSrc);
                	thisImg.attr('srcset', newSrcset);
            	});
            }
    	} else if ((contentwidth) < '480' || isMobile.any()){
            if ($('#content-image img').length > 0){ 
        		$('#content-image img').each(function(){
                	var thisImg = $(this);
                	var src = $(this).attr('src'); 
                	var srcSet = $(this).attr('srcset'); 
                	if (src.indexOf("print-specs-desktop") >= 0) {
                		var newSrc =  src.replace('print-specs-desktop', 'print-specs-phone'); 
                		var newSrcset =  srcSet.replace('print-specs-desktop', 'print-specs-phone'); 
                	} else if (src.indexOf("print-specs-tablet") >= 0) {
                		var newSrc =  src.replace('print-specs-tablet', 'print-specs-phone'); 
                		var newSrcset =  srcSet.replace('print-specs-tablet', 'print-specs-phone'); 
                	}
                	thisImg.attr('src', newSrc);
                	thisImg.attr('srcset', newSrcset);
            	});
            }      	
    	} else {
            if ($('#content-image img').length > 0){ 
        		$('#content-image img').each(function(){
                	var thisImg = $(this);
                	var src = $(this).attr('src'); 
                	var srcSet = $(this).attr('srcset'); 
                	if (src.indexOf("print-specs-phone") >= 0) {
                		var newSrc =  src.replace('print-specs-phone', 'print-specs-desktop'); 
                		var newSrcset =  srcSet.replace('print-specs-phone', 'print-specs-desktop'); 
                	} else if (src.indexOf("print-specs-tablet") >= 0) {
                		var newSrc =  src.replace('print-specs-tablet', 'print-specs-desktop'); 
                		var newSrcset =  srcSet.replace('print-specs-tablet', 'print-specs-desktop'); 
                	}
                	thisImg.attr('src', newSrc);
                	thisImg.attr('srcset', newSrcset);
            	});
            }    
    	}	
    }

    $(window).load(function() {
    	imageresize();
	});

    $(window).bind("resize", function(){
        imageresize();
    });

});