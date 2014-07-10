$(document).ready(function(){
  function containerSize(){
		var $window 			= $(window),
				windowSize 		= $window.height(),
				$container 		= $('#container'),
				containerSize = $container.height() + 100,
				margin		 		= 0;

		if(windowSize > containerSize){
			margin = Math.floor((windowSize - containerSize) / 2);
		}

		$container.css('padding-top', margin + 'px');
		$('#footer').css('margin-top', margin + 'px');
	}

	function scrollTo(y){
		$('html, body').animate({
			scrollTop: y
		}, 500);
	}

	containerSize();

	$(window).resize(function(){
		containerSize();
	});

	$('#carousel').carousel({
      interval: 2000
  });

  $('#goToTop').click(function(){
  	scrollTo(0);
  });
});