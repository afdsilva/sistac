<section id='home'>

	<div class="row container-fluid">
		<div id="carousel" class="carousel col-md-12">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<!-- Carousel items -->
			<div class="carousel-inner">
				<div class="active item" style="text-align: center;">
					<img src="<?= base_url() ?>static/img/carousel/carousel01.jpg" > 
					<div class="carousel-caption">
						<h4>SISTAC</h4>
						<p>Sistema de Atividades Complementares</p>
					</div>
				</div>
				<div class="item">
					<img src="<?= base_url() ?>static/img/carousel/carousel02.jpg" > 
					<div class="carousel-caption">
						<h4>Eai, vai se formar quando?</h4>
						<p>O SISTAC calcula todas as suas horas complementares faça seu cadastro e envie o seu pedido.</p>
					</div>
				</div>
				<div class="item">
					<img src="<?= base_url() ?>static/img/carousel/carousel03.jpg" > 
					<div class="carousel-caption">
						<h4>UFPel</h4>
						<p> Cursos de Ciência e Engenharia de Computação.</p>
					</div>
				</div>
			</div>
			<!-- Carousel nav -->
			<a class="left carousel-control" href="#carousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div>
	</div>

	<section id="you-know-nothing" class="col-md-12">
		<div class="jumbotron">
			<h1>Você sabia?</h1>
			<p>O SISTAC foi implementado por alunos de graduação do curso de ciência da computação na disciplina de desenvolvimento de software, ministrada pelos professores Paulo Ferreira e Lisane Brisolara.<br><br>Nesta disciplina os alunos tem a possibilidade de ter uma experiência de fazer parte de uma equipe de desenvolvimento criando um ambiente mais próximo ao de uma empresa do mercado de trabalho, os alunos são estimulados a analisar, projetar, implementar e trabalhar em equipe. </p>
                        <p><a class="btn btn-primary" href="<?php base_url() ?>home/equipe">Equipe</a></p>
		</div>
	</section>

	<section id="about" class="col-md-12 content">
		<header>
			<p>SISTAC <span>SISTEMA DE ATIVIDADES COMPLEMENTARES</span></p>
		</header>
		<p class="content-text">
			Descricao do sistema, como funciona e tudo mais....<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam elit nisl, rutrum ut metus eu, dapibus cursus turpis. Fusce eget lacus vulputate, vestibulum quam ac, rutrum est. Integer justo lectus, luctus et varius sed, sollicitudin a dolor. Aliquam interdum, elit quis ultrices vestibulum, sem nulla euismod risus, et scelerisque nulla leo a risus. Quisque ac facilisis massa. Suspendisse sodales sollicitudin nisl, a volutpat dui sollicitudin a. Mauris id commodo eros. Fusce eget mattis felis, sed scelerisque nisi. Phasellus viverra velit in ligula laoreet lobortis. Nulla et vehicula arcu. Nunc mattis sed libero lobortis dignissim. Pellentesque vel libero imperdiet, sollicitudin nunc non, ornare felis. Vestibulum nec ullamcorper tortor, nec accumsan dui.<br><br>Aliquam erat enim, tristique vel lectus in, vulputate tristique tellus. Maecenas vitae sapien sit amet dui cursus rhoncus placerat vel urna. Mauris id elit rhoncus, posuere mi et, gravida velit. Phasellus rhoncus tellus sapien, in ullamcorper enim blandit in. Phasellus semper pellentesque diam ut varius. 
		</p>
	</section>

	<section id="download" class="col-md-12 content">
		<header>
			<p>Download</p>
		</header>
		<ul>
			<li>
				<img src="<?= base_url() ?>static/img/linux.png" alt="Linux">
				<ul>
					<li>Ubuntu 13.10</li>
					<li>Java 8</li>
				</ul>
				<a href="" class="btn btn-success">Download</a>
			</li>
			<li>
				<img src="<?= base_url() ?>static/img/windows.png" alt="Windows">
				<ul>
					<li>Windows 7</li>
					<li>Java 8</li>
				</ul>
				<a href="" class="btn btn-success">Download</a>
			</li>
			<li>
				<img src="<?= base_url() ?>static/img/mac.png" alt="Mac">
				<ul>
					<li>Mac OS v10.9</li>
					<li>Java 8</li>
				</ul>
				<a href="" class="btn btn-success">Download</a>
			</li>
		</ul>
	</section>
</section>