
<div class="container">

    <div class="masthead">
        <h3 class="text-muted">SISTAC - Sistema de Atividades Complementares</h3>
        <ul class="nav nav-justified navbar-default">
            <li><a href="frontpage">Home</a></li>
            <li><a href="login">Login</a></li>
            <li class="active"><a href="#enviarPedido" onclick="enviarPedido()">Enviar Pedido</a></li>
            <li><a href="#editarPedido" onclick="editarPedido()">Editar Pedido</a></li>
            <li><a href="#removerPedido">Remover Pedido</a></li>
        </ul>
    </div>

    <div class="container">    
        <section id="enviarPedido">
            <div style="padding-top:55px"></div>

            <div class="jumbotron">
                <h1 align="center">Upar pedido</h1>
                <p align="center"><a class="btn btn-lg btn-success" href="" role="button">Escolher Arquivo</a></p>
            </div>
        </section>
    </div>


    <div class="container">    
        <section id="editarPedido">
            <div style="padding-top:55px"></div>

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
                        
                   
                        <ul>
                            <?php //foreach($pedido as $pedido):?>

                                <p><?php print_r($pedido); ?></p>

                            <?php// endforeach;?>
                        </ul>
                        
                   
                </fieldset>

                <div class="form-actions"style="padding-top:15px">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <a onclick="" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </section>
    </div>

    <section id="footer">
        <div style='position: '>
            <hr>
            <p>LAMMA²</p>
        </div>
    </section>

</div>
<script>

function enviarPedido(){
    
    $("#enviarPedido").show();
    $("#editarPedido").hide();
}

function editarPedido(){
    
    $("#enviarPedido").hide();
    $("#editarPedido").show();
}



</script>

