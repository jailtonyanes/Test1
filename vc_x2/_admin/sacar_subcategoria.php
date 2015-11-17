<?php
 include('../_include/configuration.php');
  $connection=mysql_connect($server,$user,$password);
  mysql_select_db($dbname);
   //sacar las subcategorias
   $query="select sc.subcategoria_nombre,sc.subcategoria_id from 
subcategoria sc where sc.categoria_id='$_GET[uid]' order by sc.subcategoria_nombre asc";
  $result=mysql_query($query,$connection);
  if ($result) 
  {
    $num_rows=mysql_num_rows($result);
     if($num_rows>0)
      {
        while($row=mysql_fetch_array($result)) 
           {
            ?>
              <option value="<?php echo $row['subcategoria_id']  ?>"><?php echo strtoupper($row['subcategoria_nombre']) ?></option>
            <?php
           }
      }
      else  
      {
       ?> 
        <option value="">No se hallaron registros para esa consulta</option>
       <?php
      }  

  }
  else
     {
       echo mysql_error();
     }



?>
