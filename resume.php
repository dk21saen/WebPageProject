<?php

include('functions.php');	

$page_name = 'Resume';

$style = '
	article ul {
		padding: 0px;
	}
	
	article li {
		font-weight: bold;
		background-color: #ddf;
		border-radius: 4px;
		padding: 2px 12px 8px;
		margin: 2px;
		display: inline-block;		
	}
	
	article li li {
		font-weight: normal;
		border: 1px solid #446;
		background-color: #ffc;
		padding: 2px 12px;
	}	
	
	@media print {
		article ul ul{
			padding: 0 2em !important;
		}
		
		article li {
			background-color: white !important;
			color: black !important;
			border: none !important;
			padding: 0px !important;
			margin: 0px !important;
			width: 310px !important;
		}		
	}
';

$sites = array(	'https://www.udemy.com/' => 'Udemy',
										'https://canvas.siena.edu/' => 'Canvas',
										'https://www.linkedin.com' => 'LinkedIn' );
									
$side_menu = make_listgroup('Academic/Professional Sites', $sites, 'success');			

$main_content = file_get_contents('resume.html');
						
$content = make_main_content($main_content, $side_menu, $aside_content);

make_basic_page($page_name, $content);

?>