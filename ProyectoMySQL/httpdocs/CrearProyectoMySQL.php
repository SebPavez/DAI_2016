<?php
if($_SESSION['conectado']=FALSE ){
    
}
    
else
    {
    include ('includes/header.html');
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $errores = array();
    
    if(empty($_POST['nom_proj'])){
        $errores[]  = 'Olvidaste ingresar el nombre del proyecto';
    }else{
        $nom_proye = trim($_POST['nom_proj']);
    }    
    
    if(empty($errores)){
        require ('../conexionMySQL.php');
        
        $consulta=oci_parse($dbc,"INSERT INTO TABLE proyectos VALUES (:nombre_proj:)");
        oci_bind_by_name($consulta, ':nombre_proj', $nom_proye, 200);
        $res = oci_execute($consulta);
        
        if($res){
            echo "<h1>ELIMINADO</h1>"
            . "<p>Se ha agregado con éxito el proyecto a la base de datos</p>";
        }else{
            echo "<h1>Error </h1>"
            . "<p>No se ha logrado crear el proyecto debido a un error de sistema.</p>";
            
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
<form method="post" action="crearProyecto.php">
    <h1>Agregar proyecto</h1>
    <table>
        <tr>
            <td>Nombre nuevo proyecto</td>
            <td><input type="text" name="nombre_proj" size="20" required /> </td>
        </tr>
        <tr>
            <td><input type="button" name="enviar" text="eliminar" /></td>
        </tr>
    </table>
</form>
<?php include ('includes/footer.html');


}
    
