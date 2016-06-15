<?php
$instancia = new DAOPostImplementado();
$coleccion = $instancia->listarUltimosCincoPost();
?>
<p>
   Últimos 5 post :) <input list="post_anteriores">
</p>
<datalist id="post_anteriores">
   <?php?
   foreach($valor in $coleccion){
       echo '<option value='.$valor.'>\n';
   }
   ?>
</datalist> 

<?php
