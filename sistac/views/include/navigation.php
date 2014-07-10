<div style="margin-bottom: 20px;">
	<ol class="breadcrumb">
	<?php
		$temp = '<li>' . anchor('./', 'Home') . '</li>';

		foreach($navigation as $key => $nav){
			$n = '/' . $key . '/';

			if(is_array($nav) && $nav['active']) $temp .= '<li class="active">' . $nav['name'] . '</li>';
			else $temp .= '<li>' . anchor($key, $nav) . '</li>';
		}

		echo $temp;
	?>
	</ol>
</div>
