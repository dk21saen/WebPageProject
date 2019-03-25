<?php
	
	require('functions.php');

    $table_name = 'nbateams';
	
	$sql = "CREATE TABLE $table_name (
    team TEXT        NULL     COMMENT 'team',
    nbap1   VARCHAR(20)  NOT NULL COMMENT 'Player #1', 
    nbap2   VARCHAR(20)  NOT NULL COMMENT 'Player #2', 
    nbap3 VARCHAR(20)  NOT NULL COMMENT 'Player #3',
    chps  INT(4)      NULL     COMMENT 'Championships Won',
    con  TEXT        NULL     COMMENT 'Conferance',
    year INT(4)      NULL     COMMENT 'Year Established'
    )";
	
	$db = db_connect();
		
	$result = $db->query($sql);
	
	if ($result === TRUE) {
    $content = $table_name.'table created successfully';
	}
	else {
		$content = 'Error: '.$db->error;
	}
	
	make_basic_page('Create'.$table_name.'table', $content);
	
?>



