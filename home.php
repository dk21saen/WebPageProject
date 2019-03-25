<?php

include('functions.php');	

$page_name = 'Home';

$main_content = file_get_contents('home.html');

$sites1 = array(	'http://www.espn.com' => 'ESPN',
									'https://www.footlocker.com/' => 'FootLocker',
									'https://www.nike.com/' => 'Nike' );
																	
$sites2 = array(	'http://www.github.com' => 'GitHub',
									'https://www.basspro.com/shop/en/fishing' => 'Fishing',
									'http://www.siena.edu' => 'Siena College' );

$side_menu = make_listgroup('Favorite Sites', $sites1);
$side_menu .= make_listgroup('More of My Favorite Sites', $sites2);


$aside_content  = make_card('Interesting Fact 1', 'I have two tattoos and I hope on getting many more.', 'success');
$aside_content .= make_card('Interesting Fact 2', 'My passions revolve around sports and the outdoors.', 'danger');
$aside_content .= make_card('Interesting Fact 3', 'I graduated high school with the 8th highest GPA in a class of around 400 students.', 'warning');


$content = make_main_content($main_content, $side_menu, $aside_content);


make_basic_page($page_name, $content);

?>