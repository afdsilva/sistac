		<footer id="footer" class="col-md-12">
			<ul class="col-md-12">
				<li class="col-md-4">contato <a href="mailto:email_equipe@gmail.com.br">email_equipe@gmail.com.br</a></li>
				<li class="col-md-4">
					<div id="footer-logo">
						<p>Desenvolvido por</p>
						<img src="<?= base_url() ?>static/img/footer-logo-sistac.jpg" alt="sistac" onClick="equipe()">
					</div>
				</li>
				<li class="col-md-4"><a href="JavaScript:void(0);" id="goToTop">Voltar ao topo</a></li>
			</ul>
		</footer>
	</div><!--contaier-->

	<script src="<?php echo base_url('assets/js/jquery1.11.1.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/jquery-ui-1.10.4.custom.min.js') ?>"></script>
  <script src="<?php echo base_url('static/jtable/jquery.jtable.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
</body>
</html>

<script>
function equipe(){
     window.location.href = "<?= base_url() . 'home/equipe'; ?>"
}


</script>