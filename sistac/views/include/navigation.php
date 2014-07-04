<div class="row container-fluid nameless">
	<h5>
	<?php
		$temp = anchor('./','Home');
		$n = '/';

		foreach($navigation as $key => $nav ){
			$n .= $key . '/';

			$temp .= ' > ' . anchor($n,$nav);
		}

		echo $temp;
	?>
	</h5>
</div>
