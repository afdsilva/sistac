
<div class="container">
    
    <div class="page-header">
    <h1 class="h1"> Equipe </h1>
    <p class="lead">
        A origem do nome/símbolo da equipe é uma coleta das letras iniciais de cada componentes, como há dois colegas com o mesmo nome foi colocado o ² no final ao lado do A.
        <br>
        <img src="<?= base_url() ?>static/img/lamma2.jpg" alt="LAMMA²" height="120" width="">
    </div>
    
</div>


<h2 style='padding-bottom:25px'>Integrantes</h2>


<div class="row" style='padding-bottom: 25px'>    
    <div class="col-xs-2">
        <img src="<?= base_url() ?>static/img/equipe/alan.jpg" alt="Alan" class="img-thumbnail">
    </div>
    <div class="col-xs-4">
        <h4><p><b>Alan Romagnoli</b></p></h4>
        <p>Buenos Aires, Argentina</p>
        <p>Curso de Ciência da Computação, ingresso em 2010/2</p>
        <p>Conhecimento C/C++, argentina, hotmail, facebook</p>
        <button class="btn btn-linkedin"onClick="linkedin(1)"><i class="fa fa-linkedin"></i></button>
        <button class="btn btn-google-plus"onClick="plus(1)"><i class="fa fa-google-plus"></i></button>
    </div>   
    <div class="col-xs-2">
        <img src="<?= base_url() ?>static/img/equipe/andre.jpg" alt="André" class="img-thumbnail">
    </div>
    <div class="col-xs-4">
        
<h4><p><b>André Felipe Silva</b></p></h4>
        <p>Pelotas, Rio Grande do Sul, Brasil</p>
        <p>Curso de Ciência da Computação, ingresso em 2011/1</p>
        <p>Conhecimento Java, C/C++, PHP, SQL</p>
        <button class="btn btn-linkedin"onClick="linkedin(2)"><i class="fa fa-linkedin"></i></button>
        <button class="btn btn-google-plus"onClick="plus(2)"><i class="fa fa-google-plus"></i></button>
    </div>
</div>

<div class="row"  style='padding-bottom: 25px'>    
    <div class="col-xs-2">
        <img src="<?= base_url() ?>static/img/equipe/peil.jpg" alt="Peil" class="img-thumbnail">
    </div>
    
    <div class="col-xs-4">
        <h4><p><b>André Guimarães Peil</b></p></h4>
        <p>Pelotas, Rio Grande do Sul, Brasil</p>
        <p>Curso de Ciência da Computação 2010/2</p>
        <p>Conhecimento em Java, PHP, JavaScript, HTML, SQL e Visual Basic</p>
        <button class="btn btn-linkedin" onClick="linkedin(3)"><i class="fa fa-linkedin"></i></button>
        <button class="btn btn-google-plus" onClick="plus(3)"><i class="fa fa-google-plus"></i></button>
    </div>
    

   
    <div class="col-xs-2">
        <img src="<?= base_url() ?>static/img/equipe/lidi.jpg" alt="Lidi" class="img-thumbnail">
    </div>
    <div class="col-xs-4">
        <h4><p><b>Lidiane Costa</b></p></h4>
        <p>Pelotas, Rio Grande do Sul, Brasil</p>
        <p>Curso de Ciencia da Computação 2010/2</p>
        <p>Conhecimento PHP, Java, Engenharia de Software</p>
        <button class="btn btn-linkedin" onClick="linkedin(4)"><i class="fa fa-linkedin"></i></button>
        <button class="btn btn-google-plus" onClick="plus(4)"><i class="fa fa-google-plus"></i></button>
    </div>
    </div>
 <div class="row"  style='padding-bottom: 25px'>  
    <div class="col-xs-2">
        <img src="<?= base_url() ?>static/img/equipe/fay.jpg" alt="Fay" class="img-thumbnail">
    </div>
    <div class="col-xs-4">
        <h4><p><b>Marcelo Fay</b></p></h4>
        <p>Pelotas, Rio Grande do Sul, Brasil</p>
        <p>Curso de Ciência da Computação, 2010/1</p>
        <p>Conhecimento C/C++, Java</p>
        <button class="btn btn-linkedin" onClick="linkedin(4)"><i class="fa fa-linkedin"></i></button>
        <button class="btn btn-google-plus" onClick="plus(4)"><i class="fa fa-google-plus"></i></button>
    </div>
   
    <div class="col-xs-2">
        <img src="<?= base_url() ?>static/img/equipe/max.jpg" alt="Max" class="img-thumbnail">
    </div>
    <div class="col-xs-4">
        <h4><p><b>Maximiliano Dalla Porta</b></p></h4>
        <p>Porto Alegre, Rio Grande do Sul, Brasil</p>
        <p>Curso de Ciência da Computação, 2010/1</p>
        <p>Conhecimento Java, PHP, HTML, CSS, JavaScript, AJAX</p>
        <button class="btn btn-linkedin" onClick="linkedin(4)"><i class="fa fa-linkedin"></i></button>
        <button class="btn btn-google-plus" onClick="plus(4)"><i class="fa fa-google-plus"></i></button>
    </div>
</div>
</div>
<script>

function linkedin($id){
    
    switch($id){
        case 1:
            // Alan
            window.location.href = "";
        break;
        case 2:
            // André
            window.location.href = "";
        case 3:
            // Peil
            window.location.href = "https://www.linkedin.com/profile/view?id=129238399&trk=nav_responsive_tab_profile";
        break;
        case 4:
             // Lidi
            window.location.href = "";
        break;
        
        case 5:
            // Fay
            window.location.href = "";
        break;
        
        case 6:
                // Max
            window.location.href = "";
        break;
    }
}

function plus($id){
    
    switch($id){
        case 1:
            // Alan
            window.location.href = "";
        break;
        case 2:
            // André
            window.location.href = "";
        case 3:
            // Peil
            window.location.href = "";
        break;
        case 4:
             // Lidi
            window.location.href = "";
        break;
        
        case 5:
            // Fay
            window.location.href = "";
        break;
        
        case 6:
                // Max
            window.location.href = "";
        break;
    }
}


</script>








