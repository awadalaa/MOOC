<!DOCTYPE html>
<html>
<head>
	<title>My Menu</title>
	<link rel="stylesheet" href="../includes/css/reset.css" type="text/css">
	<link rel="stylesheet" href="../includes/css/style.css" type="text/css">
</head>
<body>
	<header>
		<nav id="brand">
			<ul class="navbar">
				<li><a href="#" class="logo">Pizza<strong>Shop</strong></a></li>
				<li><a href="#">Menu</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Contact Us</a></li>
			</ul>				
		</nav>
		<section class="site-header" role="banner">

		</section>
	</header>
	<h1>Pizza Shop Menu</h1>
	<ul>
		<?php
			$dom = simplexml_load_file("../includes/menu.xml");
			foreach ($dom->xpath('/restaurants/restaurant_menu/sections/section') as $elem)
			{
				echo "<li>";
				echo $elem->category;
					echo "<ol>";
					foreach ($elem->items->element as $item){
						echo "<li>";
						echo $item->name;
						echo ".......................";
						echo $item->price->element['0']->sm;
						echo "&nbsp";
						echo $item->price->element['1']->lg;
						echo "</li>";
					}
					echo "</ol>";
				echo "</li>";
			}
		?>
	</ul>

</body>
</html>