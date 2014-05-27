<div style="width: 320px; margin: 0 auto;">
   <h3>Login</h3>
   <form action="<?= base_url() ?>login/validate" class="well" method="POST">
      <label>Username</label>
      <input type="text" name="username" style="width: 260px;"  value="" >
      <label>Password</label>
      <input type="password" name="password" style="width: 260px;">
      <input type="submit" value="Login" class="btn btn-primary">
      <?php echo anchor("/aluno/index/01767688075","Login Provisorio");?>
   </form>
</div>

