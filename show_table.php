<?php

require('functions.php');

$db = db_connect();

$sql = "SHOW COLUMNS FROM nbateams";

//Returns a pointer to the output of the query

$output = $db->query($sql);

//You have to fetch the output of the query one row at a time
//returns as an associative array
$string = '<table> <tr>';
while($column = $output->fetch_array()){
    
    $string .= '<th>'.$column['Field']. '</th>';
    
}
$string .= '</tr> </table>';
make_basic_page("Show Table", $string);

?>
