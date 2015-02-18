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

?>

