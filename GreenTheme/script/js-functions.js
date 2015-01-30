(function($){
	/* Custom - Scrollbar */
	        $(window).load(function(){
	            $(".tagcloud").mCustomScrollbar({
					autoHideScrollbar: true,
					theme:"dark"
				});
	        });
	        
	        
    /* news-boxes slider */
	        $('.book-cover').hover(function () {
	    		var height = $('.cover-title', this).css('height');
	    		 $('.cover-title', this).animate({
	    				bottom: 0
	    			},{
	    				duration: 200,
	    				easing: "linear"
	    			});
	    	},
	    	function() {
	    	var height = $('.cover-title', this).css('height');
	    		$('.cover-title', this).animate({
	    			bottom: "-"+height
	    			},{
	    				duration: 200,
	    				easing: "linear"
	    			});
	    	});
    	})(jQuery);


	