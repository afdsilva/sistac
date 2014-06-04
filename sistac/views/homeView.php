
<div class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
            <div class="collapse navbar-collapse">
                    <ul class="nav nav-pills pull-left"> 
                        <li><img src="<?= base_url() ?>static/img/sistac-black.png"></li>
                    </ul>
                    <ul class="nav nav-pills pull-right">
                        <li><a class="btn btn-success" href="cadastrar">Cadastrar</a></li>
                        <li><a class="btn btn-primary" href="login">Login</a></li>
                        
                    </ul>
                </div>
    </div>
</div>

<div class="container">
    <section id='home' style="margin-top: 150px">
        <div class="container">
            <div class="row">
                <div class="container-fluid">
                    <div id="carousel" class="carousel" style="height:400px; width:1024px;">
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
            </div>
        </div>
    </section>
</div>

<script>
    $('#carousel').carousel({
        interval: 2000
    })
</script>

