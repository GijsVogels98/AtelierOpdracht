(function($){
	$(document).ready(function(){
					
		if ($("#products .list").length > 0) {
        var options = {
            valueNames: [ 'name', 'product', 'date', 'email' ]
        };
        var productsList = new List('products', options);
    	}

	});

})(jQuery);   