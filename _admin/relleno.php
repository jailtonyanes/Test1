 <tr>
     <td class="margen_der_abj" >- Hace cu&aacute;nto fue el pirmer episodio?</td>
     <td class="margen_der_abj" ><input name="primer_episodio" type="text" id="primer_episodio"  size="65" /></td>
    </tr>
     <tr>
     <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>>- Qu&eacute; lo produjo?</td>
     <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><input name="produjo" type="text" id="produjo"  size="65" /></td>
    </tr>
     <tr>
     <td class="margen_der_abj" >- Con qu&eacute; se mejora?</td>
     <td class="margen_der_abj" ><input name="mejora" type="text" id="mejora"  size="65" /></td>
    </tr>
     <tr>
     <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>>- Con qu&eacute; se empeora?</td>
     <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><input name="empeora" type="text" id="empeora"  size="65" /></td>
    </tr>
     <tr>
     <td class="margen_der_abj" >- Describa los principlaes s&iacute;ntomas</td>
     <td class="margen_der_abj" ><input name="sintomas" type="text" id="sintomas" size="65" /></td>
    </tr>
    
    
     <tr>
     <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>>- Ha requerido evaluaci&oacute;n m&eacute;dica con: </td>
     <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><select name="evaluacion" id="evaluacion" class="tipo">
          <option value="" selected="selected">Escoja opci&oacute;n</option>
          <option value="M&eacute;dico General" >M&eacute;dico General</option>
          <option value="Ortopedista">Ortopedista</option>
          <option value="Neur&oacute;logo">Neur&oacute;logo</option>
          <option value="Reumat&oacute;logo">Reumat&oacute;logo</option>
          <option value="Fisioterapeuta">Fisioterapeuta</option>
          <option value="Otros">Otros</option>
          <option value="No he requerido">No he requerido</option>
       </select></td>
    </tr>
    <tr>
     <td class="margen_der_abj" >- Qu&eacute; ayudas diagn&oacute;sticas recibi&oacute;? </td>
     <td class="margen_der_abj" ><select name="apis" id="apis" >
          <option value="" selected="selected">Escoja opci&oacute;n</option>
          <option value="Rayos X" >Rayos X</option>
          <option value="Electromiograf&iacute;a">Electromiograf&iacute;a</option>
          <option value="Otros">Otros</option>
          <option value="No las requeri">No las requer&iacute;</option>
          
      </select></td>
    </tr>
    <tr>
     <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>>- Cu&aacute;les?</td>
     <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?>><input name="cuales" type="text" id="cuales" size="65" /></td>
    </tr>
    <tr>
     <td class="margen_der_abj" >- Diagn&oacute;stico(s) final(es):</td>
     <td class="margen_der_abj" ><input name="diagnose" type="text" id="diagnose" size="65" /></td>
    </tr>
    <tr>
     <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?> >- Recibi&oacute; tratamiento? </td>
     <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?> ><select name="trata" id="trata" >
          <option value="" selected="selected">Escoja opci&oacute;n</option>
          <option value="Si">Si</option>
          <option value="No">No</option>
          
      </select></td>
    </tr>
    <tr>
     <td class="margen_der_abj" >- Qu&eacute; tipo de tratamiento?</td>
     <td class="margen_der_abj" ><input name="tipo_de_t" type="text" id="tipo_de_t"  size="65" /></td>
    </tr>
     <tr>
     <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?> >- Por cu&aacute;nto tiempo recibi&oacute; incapacidad? </td>
     <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?> ><select name="tinca" id="tinca" >
          <option value="" selected="selected">Escoja opci&oacute;n</option>
          <option value="De 1 a 3 D&iacute;as" >De 1 a 3 D&iacute;as</option>
          <option value="De 4 a 15 D&iacute;as">De 4 a 15 D&iacute;as</option>
          <option value="M&aacute;s de 15 D&iacute;as">M&aacute;s de 15 D&iacute;as</option>
          <option value="No recibi">No recib&iacute;</option>
          
       </select></td>
    </tr>
    
    <tr>
     <td class="margen_der_abj"  >- Cu&aacute;ntas veces ha sido incapacitado por el mismo problema? </td>
     <td class="margen_der_abj" ><select name="vinca" id="vinca" >
          <option value="" selected="selected">Escoja opci&oacute;n</option>
          <option value="De 1 a 3 veces" >De 1 a 3 veces</option>
          <option value="M&aacute;s de 3 D&iacute;as">M&aacute;s de 3 D&iacute;as</option>
          <option value="No he  recibido incapacidad">No he  recibido incapacidad </option>
          
      </select></td>
    </tr>
    
    
     <tr>
     <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?> >- La enfermedad le produjo secuelas? </td>
     <td class="margen_der_abj" <?php if( $i % 2 !=0){echo 'style="background-color:#F0F0F6" ';} ?> ><select name="secuelas" id="secuelas" >
          <option value="" selected="selected">Escoja opci&oacute;n</option>
          <option value="Si" >Si</option>
          <option value="No">No</option>
          
       </select></td>
    </tr>
    <tr>
     <td class="margen_der_abj" >- Qu&eacute; tipo de secuelas</td>
     <td class="margen_der_abj" ><input name="tipo_de" type="text" id="tipo_de"  size="65" /></td>
    </tr>