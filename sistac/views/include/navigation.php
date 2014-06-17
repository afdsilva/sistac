<div class="container">
	<div class="masthead">
	<h5>
	<?php 
		echo anchor('/','Home');
		$n = '/';
		foreach ($navigation as $key => $nav ) {
			$n = $n . $key . '/';
			echo ' > '.anchor($n,$nav);
		}

	?>
	
	</h5>
	</div>
