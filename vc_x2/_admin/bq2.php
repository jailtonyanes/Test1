<?php
  include('../_include/configuration.php');
    $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
 ?>
 <?php 
 $file = fopen("../_database/Taxicsv.csv", "r") or exit("Unable to open file!");
//Output a line of the file until the end is reached
//Output a line of the file until the end is reached
while(!feof($file))
{
//echo fgets($file). "<br />";
 $pieces = explode(';',fgets($file));
// echo $pieces[0];

   $saca= trim($pieces[1]);
   echo $query = "call call_conductores('$pieces[2]','$pieces[0]','$saca')";
 $result= mysql_query($query,$connection);
 

}
fclose($file);
/*while(!feof($file))
{
 echo fgets($file) '<br/>'; 
$pieces = explode(';',fgets($file));
	 if($pieces[0]!='')
	 {
      echo $pieces[0];
	 $newphrase = str_replace('.','', $phrase);
	  $newphrase = trim($newphrase);
	  ;	 
	 }
}
fclose($file);
*/
 mysql_close($connection);
?>