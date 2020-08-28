$(document).ready(
  function() {
    
    $(".logo").hover(function(){
    	$(this).removeClass("animated zoomIn");
		$(this).toggleClass("animated pulse infinite");
	});
  }
);
