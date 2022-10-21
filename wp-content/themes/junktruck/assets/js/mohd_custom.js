jQuery(document).ready(function($) {
    $(document).scroll(function() {
  		var y = $(this).scrollTop();
  		if (y > 185) {
    		
            $('#book-onlie-head').css('border','1px solid black');
            $ ('.elementor-61 .elementor-element.elementor-element-ffdcb6f.elementor-view-stacked .elementor-icon').css('background-color','#fff');
			$('#call-onlie-head').css('border','1px solid black');
  		} else if(y < 185){
    		
           $('#book-onlie-head').css('border','none');
			$('#call-onlie-head').css('border','none');
  		}
	});
});