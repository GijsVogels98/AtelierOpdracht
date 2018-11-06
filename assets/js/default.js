(function($){
	$(document).ready(function(){
					
		if ($("#products .list").length > 0) {
        var options = {
            valueNames: [ 'name' ]
        };
        var productsList = new List('products', options);
    	}

	});

})(jQuery);   