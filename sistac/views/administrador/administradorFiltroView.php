
    <div class="form-group">
            <div class="form-group">
                <form action="<?= base_url() ?>administrador/cadastrar" class="well" method="POST">
                    <input type="submit" value="Novo Usuário" class="btn btn-primary">
                </form>
            </div> 
        <form class="form-horizontal well" role="form">
            <h3><strong>Filtro</strong></h3>
            <hr>
            <div class="form-group">
                <label class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="nome" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="email" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Tipo de Usuário</label>
                <div class="col-sm-3">
                    <select id="" class="form-control">
                        <option></option>
                        <option>Admiinstrador</option>
                        <option>Gerente</option>
                        <option>Coordenador</option>
                        <option>Aluno</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button type='button' class="btn btn-success btn-lg pull-right" onClick="filtrar()">Filtrar</button>
            </div>
        </form>
    </div>
    
    <?php
    //var_dump($usuarios);
        echo('<table border="1">'
           . '<tr><th>Nome</th><th>Email</th><th>Tipo de Usuario</th><th> </th></tr>');
        foreach($usuarios['Records'] as $usuario){
            //var_dump($usuario);
            echo('<tr>');
            echo('<td>'.$usuario->nome.'</td>');
            echo('<td>'.$usuario->email.'</td>');
            echo('<td>'.$usuario->descricao.'</td>');
            echo('<td>
                    <form  action="'.base_url().'administrador/editar" method="POST">
                        <input type=hidden name="cpf" value='.$usuario->cpf.'>
                        <input type="submit" value="Editar">
                    </form>
                </td>');
            echo('</tr>');
        }
        echo('</table>');
        
    ?>
    
    
    <?php 
        //echo jTableStart('usuario', 'Usuários', 'administrador/listaUsuarios', '', '', '', array('selecting')); 
        //echo jPanelAddID(true, true, true);
        //echo jPanelAddCampo('nome', 'Nome', '', '25%', true, false, true);
        //echo jPanelAddCampo('email', 'Email', '', '25%', true, false, false);
        //echo jPanelAddCampo('descricao', 'Tipo de Usuário', '', '20%', true, false, false); 
        //echo jTableEnd() 
    ?>
<script>
    
    
    function getOnClick($value) {
        //console.log($value);
        alert($('#usuario').getSelectedRow()); location.href = 'administrador/editar/'; //.id;
    }
    
    
     function filtrar() {
     
     console.log($("#nome").val());
     
     $('#usuario').jtable('load', {
        nome: $("#nome").val(),
        email: $("#email").val(),
        tipoUsuario: $('#tipoUsuario').val()
     });
 }
</script>