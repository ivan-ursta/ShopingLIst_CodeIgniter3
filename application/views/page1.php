<?php
echo '<h2>'.$title.'</h2>';
echo '<p>'.$text.'</p>';
echo '<ul>';
		foreach ($countries as $c)
		{
			echo '<li>'.$c.'</li>';
		}
echo '</ul>';

