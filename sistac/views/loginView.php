<div style="width: 320px; margin: 0 auto;">
   <h3>Login</h3>
   <form class="well" method="POST">
      <label>Username</label>
      <input type="text" name="username" style="width: 260px;"  value="" >
      <label>Password</label>
      <input type="password" name="password" style="width: 260px;">
      <a class="btn btn-primary" href="<?= base_url() ?>aluno">Login</a>
      <?php echo anchor("/aluno/index/01767688075","Login Provisorio");?>
   </form>
</div>

