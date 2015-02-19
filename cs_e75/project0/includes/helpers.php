<?php
/**
*
* Alaa Awad
* 2/17/2015
*
*/

$title = "Pizza Menu";
class Menu {
	$sections = 
		array(	"Pizzas",
				"Specialty Pizzas",
				"Specialty Dinners",
				"Side Orders",
				"Salads",
				"Spachetti or Ziti",
				"Lasagna Ravioli",
				"Homemade Calzones",
				"Wrap",
				"Grinders"
			);
}

function render($template, $data = array()) {
 if (file_exists($path))
    $path = __DIR__ . '/../templates/' . $template . '.php';
    {
        extract($data);
        require($path);
    }
}


function setupPage($page) {
	if (!isset($page))
		$page = 'index';

	// determine which page to enter
	switch ($page)
	{
		case 'index':
			render('templates/header',array('title' => 'Welcome to Restuarant'));
			render('index');
			render('templates/footer');
			break;
		case 'menu'
			render('templates/header',array('title' => 'PizzaMenu'));
			render('menu');
			render('templates/footer');
			break;
	}
}
?>

