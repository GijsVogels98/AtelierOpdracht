(function($){
	$(document).ready(function(){
					
		if ($("#products .list").length > 0) {
        var options = {
            valueNames: [ 'name', 'product', 'date', 'email', 'student_number' ]
        };
        var productsList = new List('products', options);
    	}
    	

      $( "#student_number" ).autocomplete({
      	source: "<?php echo site_url('borrowed/get_autocomplete/?');?>"
      });


	});

})(jQuery);   