<?php
  include('../_include/configuration.php');
  
  
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
 
 
?>
 <!--
 <form  id="uno" name="uno" action="" method="post">
   </p>
     <p>id:
     <input name="id" type="text" id="id" />
   </p>
   <p> inicio:
     <input name="inicio" type="text" id="inicio" />
   </p>
   <p>fin:
     <input name="fin" type="text" id="fin" />
      <p> inicio2:
     <input name="inicio2" type="text" id="inicio2" />
   </p>
   <p>fin2:
     <input name="fin2" type="text" id="fin2" />
  
   <p>
     <label>
       <input type="submit" name="envia" id="envia" value="Guardar" />
     </label>
   </p>
  
 </form> !-->
<?php 
 
/*  
$file = fopen("../_database/parametros_bq.csv", "r") or exit("Unable to open file!");
//Output a line of the file until the end is reached



//Output a line of the file until the end is reached
while(!feof($file))
{
//echo fgets($file). "<br />";
 $pieces = explode(';',fgets($file));
// echo $pieces[0];

 $newphrase = str_replace('·','',$pieces[0]);
 $newphrase = ltrim($newphrase);
 if($newphrase !='')
  {
   echo $query = "insert into barrio2(barrio_nombre,barrio_precio,municipio_id)values('$newphrase','5000','1')";
 $result= mysql_query($query,$connection);
  }

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
 
 /* $query="insert into mercancia(mercancia_nombre,mercancia_active)values('$_POST[mercancia]',1) ";
  $result=mysql_query($query,$connection);
  if($result)
   {
     echo 'Item Ingresado Satisfactoriamente.'; 
   }
   else
	  {
	    echo mysql_error();
	  }

   if(isset($_POST['envia']))
    {
		$ini=$_POST['inicio'];
		$fin=$_POST['fin'];;
	  
	  while($ini<=$fin)
		{
		echo  $query= "call calles('$ini', '$_POST[id]')";
		  $result = mysql_query($query,$connection);
		  $ini++;
		}

	

		$ini=$_POST['inicio2'];
		$fin=$_POST['fin2'];;
	 
	   while($ini<=$fin)
		{
		echo  $query= "call carreras('$ini', '$_POST[id]')";
		  $result = mysql_query($query,$connection);
		  $ini++;
		}
	
	}
 mysql_close($connection); */
 



?>