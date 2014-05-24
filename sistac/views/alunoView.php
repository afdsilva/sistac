
<div class="container">

    <div class="container">
        
            <div> <h1>Bem vindo <?= $pedido->nome; ?> </h1></div>
            <hr>
        
        <section id="home">
            
            <div class="jumbotron">
                <h2>Você ainda não fez o pedido de formatura.</h2>
                <h2> <small>Importe o arquivo feito no SISTAC versão DESKTOP. </small></h2>
                <p align="right"><a class="btn btn-lg btn-success" href="" role="button">Importar Pedido</a></p>
            </div>
        </section>



    <div class="container">    
        <section id="status">
            <form class="form-horizontal" method="POST">
               <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="nome">Aluno</label>
                            <div class="controls">
                              <input type="text" class="span3" id="txtNome" placeholder="nome">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="email">Email</label>
                            <div class="controls">
                              <input type="text" class="span3" id="txtEmail" placeholder="email">
                            </div>
                        </div>
                        

                   
                </fieldset>

                <div class="form-actions"style="padding-top:15px">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <a onclick="" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </section>
    </div>
    </div>
</div>
<script>

window.onload = function(){
  init();
}

function init(){
    var pedido = <?php echo json_encode($pedido->id); ?>;
    if(pedido == null){
        $("#status").hide();
        $("#home").show();
    } else {
        $("#home").hide();
        $("#status").show();
        
    }
    
    
}

function status(){
    
    $("#home").hide();
    $("#status").show();
}



</script>

