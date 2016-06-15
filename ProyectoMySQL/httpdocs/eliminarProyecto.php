<?php #eliminarProyecto.php 
    include ('includes/header.html');
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $errores = array();
    
    if(empty($_POST['id_proj'])){
        $errores[]  = 'Olvidaste ingresar el id del proyecto';
    }else{
        $id_proye = trim($_POST['id_proj']);
    }    
    
    if(empty($errores)){
        require ('../conexionOracle.php');
        $consulta=oci_parse($dbc,"DELETE FROM proyectos WHERE id_proyecto = :id_proyecto");
        oci_bind_by_name($consulta, ':id_proyecto', $id_proye, 200);
        $res = oci_execute($consulta);
        
        if($res){
            echo "<h1>ELIMINADO</h1>"
            . "<p>Se ha eliminado con éxito el proyecto de la base de datos</p>";
        }else{
            echo "<h1>Error </h1>"
            . "<p>No se ha logrado eliminar el proyecto debido a un error de sistema.</p>";
            
            //mensaje de debug
            echo "<p>".oci_error($dbc);
        }       
        oci_close($dbc);
        include ('includes/footer.html');
        exit();
    }else{
        echo "<h1>Error </h1>"
            . "<p>Ocurrieron los siguientes errores: <br/>";
            foreach($errores as $msg){
                echo " - $msg<br/>\n";                
            }
            echo "</p><p>Por favor, intente nuevamente</p>";
            
            //mensaje de debug
            echo "<p>".oci_error($dbc);
    }    
} 
?>
<form method="post" action="eliminarProyecto.php">
    <h1>Eliminar proyecto</h1>
    <table>
        <tr>
            <td>Id. Proyecto</td>
            <td><input type="text" name="id_proj" size="20" required /> </td>
        </tr>
        <tr>
            <td><input type="button" name="eliminar" text="eliminar" /></td>
        </tr>
    </table>
</form>
<?php include ('includes/footer.html');
