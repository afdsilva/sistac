<div class="container">
    <div class="jumbotron">
        <h2>CodeIgniter Bootstrap</h2>
        <p>CodeIgniter Bootstrap kick starts the development process of the web development process by including Twitter Bootstrap into CodeIgniter. It also includes certain libraries such as AWS and Facebook in-case you are developing applications requiring those SDKs. So stop writing the same code over again and start working on your idea.</p>
        <a class="btn btn-primary btn-large" href="<?= base_url() ?>aluno">Aluno</a>
    </div>
</div>
<div class="span5">

    <div class="row" style="margin-left: 30px !important;margin-right: 30px">
        <div class="span3">
            
        </div>  

    </div>    
</div>

<div class="container">
    <?php for ($i = 0; $i < 3; $i++) { ?>
    <div class="row">
        <div class="col-sm-1"><p><?= $categorias[$i]->id; ?></p></div>
        <div class="col-md-4"><p><?= $categorias[$i]->nome; ?></p></div>
    </div>
    <?php } ?>
</div>

<script>


function teste(){
    
    altert("teste");
    
}

</script>    