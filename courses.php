<?php

include('functions.php');	

$page_name = 'Courses';

$style = '
	li {
		list-style: none;
	}
	ul, ol {
		padding: 0px;
	}
	
	li {
		font-weight: bold;
		font-size: 16px;
		margin-bottom: 20px;
		vertical-align: top;
	}
	
	li li {
		font-weight: bold;
		font-size: 0.9em;
		margin-bottom: 5px;
			
	}
	
	li li li {
		font-weight: normal;
	}
	
	li li {
		display: inline-block;
		width: 320px;
	}
';


$courses = file_get_contents('courses.html');

$side_menu = null;

$main_content = make_main_content($courses, $side_menu);

make_basic_page($page_name, $main_content, $style);

?>