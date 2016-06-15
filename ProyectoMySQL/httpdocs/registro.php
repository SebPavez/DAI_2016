<?php

include ('includes/header.html');

if($_SERVER['REQUEST_METHOD']=='POST'){
    $errores = array();
    
    if(empty($_POST['nombre'])){
        $errores[]  = 'Olvidaste ingresar tu nombre';
    }else{
        $nom = trim($_POST['nombre']);
    }
    
    if(empty($_POST['apellido'])){
        $errores[]  = 'Olvidaste ingresar tu apellido';
    }else{
        $ape = trim($_POST['nombre']);        
    }
    
    if(empty($_POST['nick'])){
        $errores[]  = 'Olvidaste ingresar nick';
    }else{
        $nick = trim($_POST['nick']);        
    }
    
    if(empty($_POST['email'])){
        $errores[]  = 'Olvidaste ingresar tu correo';
    }else{
        $mail = trim($_POST['email']);
    }
    
    if(!empty($_POST['pass1'])){
        if($_POST['pass1'] != $_POST['pass2']){
            $errores[] = 'La contraseña no coincide';
        }
        else{
            $p = trim($_POST['pass1']);
        }
    }else{
        $errores[]  = 'Olvidaste ingresar tu contraseña';
    }
    
    if(empty($errores)){
        require ('../conexionOracle.php');
        $consulta=oci_parse($dbc,"begin insert_usuario( :nick, :nom, :ape, :mail, :pass); end;");
        oci_bind_by_name($consulta, ':nom', $nom,200);
        oci_bind_by_name($consulta, ':nick', $nick,200);        
        oci_bind_by_name($consulta, ':mail', $mail,200);        
        oci_bind_by_name($consulta, ':ape', $ape,200);
        oci_bind_by_name($consulta, ':pass', $pass,200);
        $res = oci_execute($consulta);
        
        if($res){
            echo "<h1>GRACIAS!</h1>"
            . "<p>Te has registrado exitósamente!</p>";
        }else{
            echo "<h1>Error </h1>"
            . "<p>No te hemos podido registrar debido a un error de sistema.</p>";
            
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
<h1>Registro</h1>
<form action="registro.php" method="post">
    <p>Nombre: <input type="text" name="nombre" size="20" maxlength="60" value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre']; ?>"/></p>
    <p>Apellido: <input type="text" name="apellido" size="20" maxlength="60" value="<?php if(isset($_POST['apellido'])) echo $_POST['apellido']; ?>"/></p>
    <p>Nickname: <input type="text" name="nick" size="20" maxlength="60" value="<?php if(isset($_POST['nick'])) echo $_POST['nick']; ?>"/></p>
    <p>Email: <input type="text" name="email" size="20" maxlength="60" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"/></p>
    <p>Contraseña: <input type="password" name="pass1" size="20" maxlength="20"/></p>
    <p>Repita contraseña: <input type="password" name="pass2" size="20" maxlength="20"/></p>
    <p><input type="submit" name="submit" value="Registrar!"> </p>
</form>
<?php include ('includes/footer.html');
