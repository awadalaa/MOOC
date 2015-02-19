<!DOCTYPE html>
<html>
<head>
	<title>My Menu</title>
</head>
<body>
	<h1>Pizza Shop Menu</h1>
	<ul>
		<?php
			$dom = simplexml_load_file("../includes/menu.xml");
			foreach ($dom->xpath('/restaurants/restaurant_menu/sections/section') as $elem)
			{
				echo "<li>";
				echo $elem->category;
				echo "</li>";
			}
		?>
	</ul>

</body>
</html>