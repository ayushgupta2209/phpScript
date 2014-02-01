<?php
$Connection = mysql_connect("localhost","root","");
if (!$Connection)
  {die('Could not connect to Server: ' . mysql_error()); }
$DBCon = mysql_select_db("test",$Connection);
if (!$DBCon)
  {die('Could not connect to Database: ' . mysql_error()); }
  
$result = mysql_query('SELECT `data`,`ID` FROM `numberbase`');

while($String = mysql_fetch_row($result)){
	$data = $String[0];
	$ID = $String[1];

$index = 0;	
	if($data!="" && $data!=NULL){
			$tokens = preg_split("/[\s,]+/", $data);
			print_r($tokens);
			while(isset($tokens[$index]) && $tokens[$index]!=""){
				$sql = "INSERT INTO word_index (word,Id,Frequency) values('$tokens[$index]','$ID','1') on duplicate key update Frequency = Frequency+1,Id = CONCAT (Id,';','$ID')";
				echo mysql_query($sql);
				$index++;
			}
			
		}

	
}


?>