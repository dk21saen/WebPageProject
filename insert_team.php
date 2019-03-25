
<?php
require('functions.php');
$table_name = 'nbateams';

$valid = false;
foreach($_POST as $key=>$value){
    if($value){
        $fields .= "$key,";
        $values .= "'$value',";
        $valid = true;
    }
    else{
        $valid = false;
        break;
    }
    
}

$fields = rtrim($fields, ',');
$values = rtrim($values, ',');

if ($valid){
    
    $db = db_connect();
    $sql = "INSERT INTO $table_name ($fields) VALUES ($values)";
    $db->query($sql);
    $db->close();
    
    
    $output = '<a class = "btn btn-primary" href="'.basename(__FILE__).'">Back</a>';
    $output .= '<div class = "alert alert-info"><code>'.$sql.'</code></div>';
    $output .= make_table($table_name);
   
}
else {
    $output = make_form($table_name, $_POST);
}
make_basic_page("Insert Course", $output);

function make_table($table_name) {
  $db = db_connect();
  $rows = $db->query("SELECT * FROM $table_name ORDER BY cid DESC");
  $cols = $db->query("SHOW FULL COLUMNS FROM $table_name");
  $db->close();

  while($col = $cols->fetch_assoc())
    $ths .= '<th>'.$col['Field']. '</th>';

  while($row = $rows->fetch_assoc()) {
    $tds .=  '<tr>';
    foreach($row as $value)
      $tds .=  '<td>'.$value.'</td>';
    $tds .=  '</tr>';
  }

  $table = '<h3>'.$table_name.'</h3>
  <table class="table">
    <thead>
      <tr>'.$ths.'<tr>
    </thead>
    <tbody>
      '.$tds.'
    </tbody>
  </table>';		

  return $table;
}

/* -----------------------------------------------------------------------
  Makes a form group from a given id, label and value
----------------------------------------------------------------------- */	
function make_form_group($id, $label, $value) {
  return '
    <div class="form-group">
      <label for="'.$id.'">'.$label.'</label>
      <input type="text" class="form-control" id="'.$id.'" name="'.$id.'" value="'.$value.'">
    </div>		
  ';
}

function make_form($table_name, $submitted_values) {
  $db = db_connect();
  $cols = $db->query("SHOW FULL COLUMNS FROM $table_name");
  $db->close();
    while($col = $cols->fetch_assoc()){
        if ($col['Field'] != 'cid'){
            $id = $col['Field'];
            $label = $col['Comment'];
            $value = $submitted_values[$id];
            
            $divs .= make_form_group($id, $label, $value);
            
        }    
    }
    
    
    
  return '
    <form action="'.basename(__FILE__).'" method="post">
        '.$divs.'
      <input type = "submit" class = "btn btn-primary">
    </form>';			
}
?>
