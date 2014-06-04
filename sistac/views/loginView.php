<div style="width: 320px; margin: 0 auto;">
    <h3>Login</h3>
    <form action="<?= base_url() ?>login/validate" class="well" method="POST">
        <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-envelope"></span>    
            <input class="form-control" type="text" name="username" style="width: 240px;"  placeholder="Email" >
        </div>
        <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-lock"></span>
            <input class="form-control" type="password" name="password" style="width: 240px;" placeholder="Senha">    
        </div>

        <div style="padding-top:15px"></div>
        <input type="submit" value="Login" class="btn btn-primary" >
    </form>
</div>

