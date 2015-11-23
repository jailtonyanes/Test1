<?php
    $texto = '12563OLHHH';
    eregi('^([0-9]+)([a-z]+)$', $texto, $arreglo);
    echo $arreglo[1] . '<br />';
    echo $arreglo[2] . '<br />';
?>