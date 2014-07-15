function containerSize(){
	var $window 			= $(window),
	$container 		= $('#container'),
	$footer 			= $('#footer'),
	windowSize 		= $window.height(),
	containerSize = 0,
	gap		 				= 0;

	$container.css('padding-top', gap + 'px');
	$footer.css('margin-top', gap + 'px');

	containerSize = $container.height() + 100;

	if(windowSize >= containerSize){
		gap = Math.floor((windowSize - containerSize) / 2);

		$container.css('padding-top', gap + 'px');
		$footer.css('margin-top', gap + 'px');
	}
}

function scrollTo(y){
	$('html, body').animate({
		scrollTop: y
	}, 500);
}

$(document).ready(function(){
	containerSize();
	$('#container').css('visibility', 'visible');

	$(window).resize(function(){
		containerSize();
	});

	$('#carousel').carousel({
		interval: 2000
	});

	$('#goToTop').click(function(){
		scrollTo(0);
	});

	$('#pedidos, #atividades').jtable('load', undefined, function(){
		containerSize();
	});

	$('.ano').each(function(){
		for(var i = 2014; i <= (new Date()).getFullYear(); i++){
			$(this).append('<option value="' + i + '"> ' + i + ' </option>');
		}
	});

	$("#relatorio").submit(function(event){
		if(!$('#relatorioAno').val() || !$('#relatorioSemestre').val()){
			event.preventDefault();
		}

		return true;
	});
});